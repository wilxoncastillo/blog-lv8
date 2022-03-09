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

    @error('category_id')
        <span class="text-danger text-sm">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>

    @foreach($tags as $tag)
        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id,null, ['class' => '']) !!}
            {{ $tag->name }}
        </label>

    @endforeach
    
    @error('tags')
        <br><span class="text-danger text-sm">{{ $message }}</span>
    @enderror
</div>

<div class='form-group'>
    <p class="font-weight-bold">Etiquetas</p>

    <label class="mr-2">
        {!! Form::radio('status', 1, true, ['class' => '']) !!} Borrador
    </label>

    <label class="mr-2">
        {!! Form::radio('status', 2, null, ['class' => '']) !!} Publicado
    </label>

    @error('status')
        <span class="text-danger text-sm">{{ $message }}</span>
    @enderror
</div>

<div  class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            <img id="preview" src="http://www.losprincipios.org/images/default.jpg" alt="">
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se mostrara en el post')!!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
            
            @error('file')
                <span class="text-danger text-sm">{{ $message }}</span>
            @enderror
        </div>


        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste, aperiam pariatur. A possimus, ad autem quas iste, sapiente ab, dolorem aut voluptatem facere rerum eligendi molestias quisquam repudiandae maiores similique.</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('extract', 'Extracto:') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el extracto del post']) !!}

    @error('extract')
        <span class="text-danger text-sm">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('body', 'Cuerpo del post:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Ingrese contenido del post']) !!}

    @error('body')
        <span class="text-danger text-sm">{{ $message }}</span>
    @enderror
</div>