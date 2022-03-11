@extends('adminlte::page')

@section('title', 'Blod')

@section('content_header')
    <h1>Listado de Categorias</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            @can('admin.categories.create')
                <a href="{{ route('admin.categories.create') }}" class="btn btn-secondary">
                    Crear categoria
                </a>
            @endcan
        </div>

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
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td width="10px">
                                @can('admin.categories.edit')
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary btn-sm">Editar</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.categories.destroy')
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>

                                    </form>
                                @endcan
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