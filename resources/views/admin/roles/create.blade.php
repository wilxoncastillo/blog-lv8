@extends('adminlte::page')

@section('title', 'Blod')

@section('content_header')
    <h1>Crear role</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}

                @include('admin.roles.partials.form')
                
                {!! Form::submit('Crear tag', ['class' => 'mt-2 btn btn-primary']) !!}
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