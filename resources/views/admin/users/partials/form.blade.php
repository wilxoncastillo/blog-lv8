<div>
    {!! Form::label('name', 'Nombe') !!}
        {!! Form::text('name', null, ['class' => 'form-control mb-1', 'placeholder' => 'Ingrese el nombre']) !!}
    
        @error('name')
            <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
        
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el email']) !!}
    
        @error('name')
            <span class="text-danger text-sm">{{ $message }}</span>
        @enderror

        <h2 class="h5 mt-2">Listado de Roles</h2>
        @foreach($roles as $role)
            <div>
                <label for="">
                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                    {{ $role->name }}
                </label>
            </div>
        @endforeach
</div>
