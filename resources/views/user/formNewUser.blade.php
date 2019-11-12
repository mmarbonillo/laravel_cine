@extends('../layout/master')

@section('title', 'New User')

@section('content')
@if(isset($mensaje))
    {{$mensaje}}
@endif
<form action="{{route('user.store')}}" method="POST">
    @csrf
    <div class="opcion">
        <div class="etiqueta">
            <label for="username" >Usuario: </label>
        </div>
        <div class="campo">
            <input type="text" name="username"/>
        </div>
    </div>
    <div class="opcion">
        <div class="etiqueta">
            <label for="name" >Nombre: </label>
        </div>
        <div class="campo">
            <input type="text" name="name"/>
        </div>
    </div>
    <div class="opcion">
        <div class="etiqueta">
            <label for="surname" >Apellidos: </label>
        </div>
        <div class="campo">
            <input type="text" name="surname"/>
        </div>
    </div>
    <div class="opcion">
        <div class="etiqueta">
            <label for="passwd" >Contraseña: </label>
        </div>
        <div class="campo">
            <input type="password" name="passwd"/>
        </div>
    </div>
    <div class="opcion">
        <div class="etiqueta">
            <label for="passwd" >Email: </label>
        </div>
        <div class="campo">
            <input type="text" name="email"/>
        </div>
    </div>
    <div class="opcion">
        <div class="etiqueta">
            <label for="tipo" >Tipo: </label>
        </div>
        <div class="campo">
            <select id="tipo" name="type">
                <option value="1" selected="selected">Usuario</option>
                <option value="0">Administrador</option>
            </select>
        </div>
    </div>
    <br>
    <input type="submit" name="insertar" value="Insertar"/>
</form>
    <input type="button" name="Volver" Value="Volver" onclick="window.location.href='http:\/\/localhost:3000/user'">
@endsection