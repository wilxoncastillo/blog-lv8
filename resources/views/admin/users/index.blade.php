@extends('adminlte::page')

@section('title', 'Blod')

@section('content_header')
    @if(session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

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