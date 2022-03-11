<div>
    {!! Form::label('name', 'Nombe') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del rol']) !!}

    @error('name')
        <span class="text-danger text-sm">{{ $message }}</span>
    @enderror

    <h2 class="h3 mt-2">Lista de permisos</h2>

    @foreach($permissions as $permission)
        <div>
            <label>
                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                {{ $permission->description }}
            </label>
        </div>
    @endforeach

    @error('permissions')
        <span class="text-danger text-sm">{{ $message }}</span>
    @enderror
</div>

