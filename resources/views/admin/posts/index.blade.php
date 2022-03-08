@extends('adminlte::page')

@section('title', 'Blod')

@section('content_header')
    <h1>Listado de post</h1>
@stop

@section('content')
    @livewire('admin.post-index')
@stop

@section('css')
    <link rel="stylesheet" href="">
@stop

@section('js')
    <script></script>
@stop