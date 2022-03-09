@extends('adminlte::page')

@section('title', 'Blod')

@section('content_header')
    @if(session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <h1>Edit post</h1>
@stop

@section('content')
<div class="card-body">
    {!! Form::model($post, ['route' => ['admin.posts.update', $post], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}

        @include('admin.posts.partials.form')
        
        {!! Form::submit('Actualizar post', ['class' => 'mt-2 btn btn-primary']) !!}
    {!! Form::close() !!}
</div>
@stop

@section('css')
    <link rel="stylesheet" href="">

    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#extract' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );

        //cambiar imagen
        document.getElementById('file').addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];

            var reader = new FileReader();

            reader.onload = (event) => {
                document.getElementById('preview').setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file)
        }
    </script>
@stop