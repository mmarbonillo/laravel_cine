@extends('layouts.master')

@section('title', 'Admin')

@section('scripts')
    <script src="js/jquery.form.js" type="text/javascript"></script>
    <script src="js/jquery.validate.js" type="text/javascript"></script>    
    <script type="text/javascript">
    function showModal() {
            document.getElementById('openModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('openModal').style.display = 'none';
        }
        
        $().ready(function(){
            $("img#newUser").click(function(){
                showModal();
            });
            $("input#save").click(function(){
                $.post("{{ route('user.create') }}",{username: $("#username").val(), name: $("#name").val(), surname: $("#surname").val(), password: $("#password").val(), confirmPassword: $("#confirmPassword").val(), email: $("#email").val(), type: $( "select#tipo option:selected" ).val(), _token: "{{ csrf_token() }}"}, function(resp){
                    $("#usersTable").append("<tr><td><a class='nodecoration' href=\"{{route('user.destroy', ['id' => " + resp + "])}}\"><img src='images/icons/delete.png' alt='fotomodificar' width='20' height='20'/></a></td><td>"+ resp +"</td><td>"+ $("#username").val() +"</td><td>"+ $("#name").val() +"</td><td>"+ $("#surname").val() +"</td><td>"+ $("#email").val() +"</td><td>"+ $( "select#tipo option:selected" ).val() +"</td><td><a class='nodecoration' href=\"{{route('user.edit', ['id' => " + resp + "])}}\"><img src='images/icons/modificar.png' alt='fotomodificar' width='20' height='20'/></a></td></tr>");
                    $("#username").val('');
                    $("#name").val('');
                    $("#surname").val('');
                    $("#password").val('');
                    $("#confirmPassword").val('');
                    $("#email").val('');
                    closeModal();
                });
                
            });
            
        });
    </script>
@endsection

@section('content')
<div id='administracion'>
        <table id="usersTable" border=1 text-align='center'>
            <h1>BIENVENID@</h1>
            @if(isset($mensaje))
                <div style='color:blue'>{{$mensaje}}</div>
            @endif
            <img  id="newUser" src='images/icons/nuevo.png' alt='fotonuevo' width='35' height='35' style="cursor: pointer;"/>Nuevo usuario
            <tr>
                <th style='width:80px align=right'>Eliminar</th>
                <th style='width:50px'>ID</th>
                <th style='width:170px'>Usuario</th>
                <th style='width:170px'>Nombre</th>
                <th style='width:170px'>Apellidos</th>
                <th style='width:170px'>Email</th>
                <th style='width:50px'>Tipo</th>
                <th style='width:80px'>Modificar</th>
            </tr>
            @if (isset($usersList))
                @foreach($usersList as $user)
                    <tr>
                        <td><a class="nodecoration" href="{{route('user.destroy', ['id' => $user->id])}}"><img src='images/icons/delete.png' alt='fotomodificar' width='20' height='20'/></a></td>
                        <td>{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->surname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->type}}</td>
                        <td><a class="nodecoration" href="{{route('user.edit', ['id' => $user->id])}}"><img src='images/icons/modificar.png' alt='fotomodificar' width='20' height='20'/></a></td>
                    </tr>
                @endforeach
            @else 
                <tr>
                    <td><a class="nodecoration" href="{{route('user.destroy', ['id' => $user->id])}}"><img src='images/icons/delete.png' alt='fotomodificar' width='20' height='20'/></a></td>
                    <td>{{$user->id}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->surname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->type}}</td>
                    <td><a class="nodecoration" href="{{route('user.edit', ['id' => $user->id])}}"><img src='images/icons/modificar.png' alt='fotomodificar' width='20' height='20'/></a></td>
                </tr>
            @endif
        </table>
    </div>

    <div id="openModal" class="modalDialog" style="display: none">
        <div id="div">
            <a href="#" title="Close" class="close" onclick="CloseModal()">X</a>
            <div class="opcion">
                <div class="etiqueta">
                    <label for="username" >Usuario: </label>
                </div>
                <div class="campo">
                    <input id="username" type="text" name="username"/>
                </div>
            </div>
            <div class="opcion">
                <div class="etiqueta">
                    <label for="nombre" >Nombre: </label>
                </div>
                <div class="campo">
                    <input id="name" type="text" name="name"/>
                </div>
            </div>
            <div class="opcion">
                <div class="etiqueta">
                    <label for="apellidos" >Apellidos: </label>
                </div>
                <div class="campo">
                    <input id="surname" type="text" name="surname"/>
                </div>
            </div>
            <div class="opcion">
                <div class="etiqueta">
                    <label for="password" >Contraseña: </label>
                </div>
                <div class="campo">
                    <input id="password" type="text" name="password"/>
                </div>
            </div>
            <div class="opcion">
                <div class="etiqueta">
                    <label for="password" >Confirmar Contraseña: </label>
                </div>
                <div class="campo">
                    <input id="confirmPassword" type="text" name="password"/>
                </div>
            </div>
            <div class="opcion">
                <div class="etiqueta">
                    <label for="email" >Email: </label>
                </div>
                <div class="campo">
                    <input id="email" type="text" name="email"/>
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
            <input id="save" type="button" name="guardar" value="Guardar"/>
        </div>
    </div>
@endsection