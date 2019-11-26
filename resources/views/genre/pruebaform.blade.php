@extends('layouts.master')

@if (isset($mensaje))
    {{ $mensaje }}
@endif

@section('content')
<form action="{{route('genre.modify') }}" method="GET">
    @csrf
    <label for="genre">Genre</label>
    <input type="text" name="genre">
    <input type="hidden" name="id" value="1">
    <input type="submit" name="mandar" value="Enviar">
</form>
    
@endsection