@extends('layouts.master')

@section('content')
    <div id="allPeople">
        <table id="peopleTable" border=1 text-align='center'>
            <tr>
                <th style='width:80px align=right'>Eliminar</th>
                <th style='width:50px'>ID</th>
                <th style='width:170px'>Nombre</th>
                <th style='width:170px'>External URL</th>
                <th style='width:80px'>Modificar</th>
            </tr>
            @foreach ($peopleList as $people)
                <tr>
                    <td><a class="nodecoration" href="/people/delete/{{$people->id}}"><img src='images/icons/delete.png' alt='fotomodificar' width='20' height='20'/></a></td>
                    <td>{{ $people->id }}</td>
                    <td>{{ $people->name }}</td>
                    <td>{{ $people->external_url }}</td>
                    <td><a id="editPeople" class="nodecoration" href="/people/{{$people->id}}/edit"><img src='images/icons/modificar.png' alt='fotomodificar' width='20' height='20'/></a></td>
                </tr>
            @endforeach
        </table>
    </div>
    
@endsection