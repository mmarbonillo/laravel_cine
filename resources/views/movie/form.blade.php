@if(isset($mensaje))
    {{$mensaje}}
@endif

@if (!isset($user))
    <form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
@else
    <form action="{{ route('movie.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
@endif

@csrf
        <div class="opcion">
            <div class="etiqueta">
                <label for="cover" >Imagen: </label>
            </div>
            <div class="campo">
                <input type="file" name="cover"/>
            </div>
        </div>
        <div class="opcion">
            <div class="etiqueta">
                <label for="filename" >Película: </label>
            </div>
            <div class="campo">
                <input type="text" name="filename"/>
            </div>
            @error('filename')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="opcion">
            <div class="etiqueta">
                <label for="title" >Título: </label>
            </div>
            <div class="campo">
                <input type="text" name="title"/>
            </div>
        </div>
        <div class="opcion">
            <div class="etiqueta">
                <label for="year" >Año: </label>
            </div>
            <div class="campo">
                <input type="number" name="year"/>
            </div>
        </div>
        <div class="opcion">
            <div class="etiqueta">
                <label for="duration" >Duración(min): </label>
            </div>
            <div class="campo">
                <input type="number" name="duration"/>
            </div>
        </div>
        <div class="opcion">
            <div class="etiqueta">
                <label for="rating" >Valoración: </label>
            </div>
            <div class="campo">
                <input type="number" name="rating"/>
            </div>
        </div>
        <div class="opcion">
            <div class="etiqueta">
                <label for="external_url" >URL externa: </label>
            </div>
            <div class="campo">
                <input type="text" name="external_url"/>
            </div>
        </div>
        <input type="submit" name="insertar" value="Insertar"/>
        <input type="hidden" name="opc" value="addMovie">
    </form>