@extends('../layout/master')

@section('title', 'Login')

@section('content')
<div id="formularios">
    <div id="formulariologin">
        <form action="{{route('login')}}" method="POST">
            <div class="opcion">
                <div class="etiqueta">
                    <label for="username">Usuario: </label>
                </div>
                <div class="campo">
                    <input type="text" name="username" />
                </div>
            </div>
            <div class="opcion">
                <div class="etiqueta">
                    <label for="passwd">Contraseña: </label>
                </div>
                <div class="campo">
                    <input type="password" name="passwd" />
                </div>
            </div>
            <br>
            @if(isset($mensaje))
                {{$mensaje}}
                <br>
            @endif
            
            <input type="submit" name="comprobar" value="Comprobar" />
            <input type="hidden" name="opc" value='processLogin'>
        </form>
    </div>
</div>
@endsection