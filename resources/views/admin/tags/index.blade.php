@extends('adminlte::page')

@section('title', 'Blod')

@section('content_header')
    <a href="{{ route('admin.tags.create') }}" class="btn btn-secondary btn-sm float-right">
        Crear tag
    </a>
    
    <h1>Listado de Tags</h1>

@stop

@section('content')
@if(session('info'))
<div class="alert alert-success">
    {{ session('info') }}
</div>
@endif

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td colspan="2"></td>
                </tr>
            </thead>

            <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td width="10px">
                            <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{ route('admin.tags.destroy', $tag) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Eliminar
                                </button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>


        </table>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="">
@stop

@section('js')
    <script></script>
@stop