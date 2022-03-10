@extends('adminlte::page')

@section('title', 'Blod')

@section('content_header')
    @if(session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <h1>Asignar Rol</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}
            
        @include('admin.users.partials.form')

        {!! Form::submit('Asginar rol', ['class' => 'mt-2 btn btn-primary']) !!}
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