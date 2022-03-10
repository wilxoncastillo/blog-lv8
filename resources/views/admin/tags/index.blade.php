@extends('adminlte::page')

@section('title', 'Blod')

@section('content_header')
    @can('admin.tags.create')
        <a href="{{ route('admin.tags.create') }}" class="btn btn-secondary btn-sm float-right">
            Crear tag
        </a>
    @endcan
    
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
                            @can('admin.tags.edit')
                                <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-primary btn-sm">Editar</a>
                            @endcan
                        </td>
                        <td width="10px">
                            @can('admin.tags.destroy')
                                <form action="{{ route('admin.tags.destroy', $tag) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>

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