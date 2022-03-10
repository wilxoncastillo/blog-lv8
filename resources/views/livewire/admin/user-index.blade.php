<div class='card'>
    <div class='card-header'>
        <input type="text" class='form-control' placeholder='Nombre de un user' wire:model='search'>
    </div>

    @if($users->count())

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Role</td>
                        <td colspan="2"></td>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                    {{ $role->name }}
                                @endforeach

                                {{-- {{ $user->roles->first() }} --}}
                            </td>
                            <td width="10px">
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.users.destroy', $user) }}" method="user">
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

        <div class="card-footer">
            {{ $users->links() }}
        </div>

    @else
        <div class="card-body">
            <strong>No hay ningun registro</strong>
        </div>
    @endif
</div>


