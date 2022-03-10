@extends('adminlte::page')

@section('title', 'Blod')

@section('content_header')
    <h1>Crear user</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.users.store']) !!}

                @include('admin.users.partials.form')
                
                {!! Form::submit('Crear user', ['class' => 'mt-2 btn btn-primary']) !!}
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