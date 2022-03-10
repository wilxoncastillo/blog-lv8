@extends('adminlte::page')

@section('title', 'Blod')

@section('content_header')
    @if(session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <a href="{{ route('admin.users.create') }}" class="btn btn-secondary btn-sm float-right">
        Nuevo Post
    </a>
    <h1>Listado de usuarios</h1>
@stop

@section('content')
    @livewire('admin.user-index')
@stop

@section('css')
    <link rel="stylesheet" href="">
@stop

@section('js')
    <script></script>
@stop