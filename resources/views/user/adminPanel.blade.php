@extends('layouts.master')

@section('title', 'Admin')

@section('content')
<div id='administracion'>
        <table border=1 text-align='center'>
            <h1>BIENVENID@</h1>
            @if(isset($mensaje))
                <div style='color:blue'>{{$mensaje}}</div>
            @endif
            <a class="nodecoration" href="{{route('user.create')}}"><img src='images/icons/nuevo.png' alt='fotonuevo' width='35' height='35'/></a>Nuevo usuario
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
@endsection