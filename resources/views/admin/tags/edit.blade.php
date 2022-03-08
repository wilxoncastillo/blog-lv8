@extends('adminlte::page')

@section('title', 'Blod')

@section('content_header')
    @if(session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <h1>Editar Tag</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'PUT']) !!}
            
            @include('admin.tags.partials.form')

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