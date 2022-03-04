@extends('adminlte::page')

@section('title', 'Blod')

@section('content_header')
    <h1>Editar Categorias</h1>
@stop

@section('content')
@if(session('info'))
    <div class="alert alert-success">
        {{ session('info') }}
    </div>
@endif

<div class="card">

    <div class="card-body">
        {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'PUT']) !!}
            <div>
                {!! Form::label('name', 'Nombe') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoria']) !!}

                @error('name')
                    <span class="text-danger text-sm">{{ $message }}</span>
                @enderror
            </div>

            {!! Form::submit('Actualizar categoria', ['class' => 'mt-2 btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="">
@stop

@section('js')
    <script></script>
@stop