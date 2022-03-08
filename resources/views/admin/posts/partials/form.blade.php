<div>
    {!! Form::label('name', 'Nombe') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del post']) !!}

    @error('name')
        <span class="text-danger text-sm">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Categoria:') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>

    @foreach($tags as $tag)
        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id,null, ['class' => '']) !!}
            {{ $tag->name }}
        </label>
    @endforeach
</div>

<div class='form-group'>
    <p class="font-weight-bold">Etiquetas</p>

    <label class="mr-2">
        {!! Form::radio('status', 1, true, ['class' => '']) !!} Borrador
    </label>

    <label class="mr-2">
        {!! Form::radio('status', 2, null, ['class' => '']) !!} Publicado
    </label>
</div>

<div class="form-group">
    {!! Form::label('extract', 'Extracto') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el extracto del post']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'body') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Ingrese contenido del post']) !!}
</div>