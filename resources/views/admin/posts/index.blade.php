@extends('adminlte::page')

@section('title', 'Blod')

@section('content_header')
    <a href="{{ route('admin.posts.create') }}" class="btn btn-secondary btn-sm float-right">
        Nuevo Post
    </a>
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