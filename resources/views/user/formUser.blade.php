@if(isset($mensaje))
    {{$mensaje}}
@endif


    <form action="{{route('user.create')}}" method="POST">


@csrf
    <div class="opcion">
        <div class="etiqueta">
            <label for="username" >Usuario: </label>
        </div>
        <div class="campo">
            <input type="text" name="username" value="{{$user->username?? ''}}"/>
        </div>
    </div>
    <div class="opcion">
        <div class="etiqueta">
            <label for="nombre" >Nombre: </label>
        </div>
        <div class="campo">
            <input type="text" name="name" value="{{$user->name?? ''}}"/>
        </div>
    </div>
    <div class="opcion">
        <div class="etiqueta">
            <label for="apellidos" >Apellidos: </label>
        </div>
        <div class="campo">
            <input type="text" name="surname" value="{{$user->surname?? ''}}"/>
        </div>
    </div>
    <div class="opcion">
        <div class="etiqueta">
            <label for="password" >Contraseña: </label>
        </div>
        <div class="campo">
            <input type="text" name="password" value=""/>
            <input type="hidden" name="oldpassword" value="{{$user->password?? ''}}">
        </div>
    </div>
    <div class="opcion">
        <div class="etiqueta">
            <label for="email" >Email: </label>
        </div>
        <div class="campo">
            <input type="text" name="email" value="{{$user->email?? ''}}"/>
        </div>
    </div>
    <div class="opcion">
        <div class="etiqueta">
            <label for="tipo" >Tipo: </label>
        </div>
        <div class="campo">
            <select id="tipo" name="type">
                @if(isset($user) && $user->type == 0)
                    <option value="1">Usuario</option>
                    <option value="0" selected="selected">Administrador</option>
                @else
                    <option value="1" selected="selected">Usuario</option>
                    <option value="0">Administrador</option>
                @endif
            </select>
        </div>
    </div>
    
    <br>
    <input type="submit" name="guardar" value="Guardar"/>
    <input type="button" name="volver" value="Volver" onclick="window.location.href='http:\/\/localhost:3000/user'"/>
</form>