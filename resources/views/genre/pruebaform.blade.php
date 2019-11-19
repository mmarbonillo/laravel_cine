@extends('layouts.master')

@if (isset($mensaje))
    {{ $mensaje }}
@endif

@section('content')
<form action="{{route('genre.add') }}" method="POST">
    @csrf
    <label for="movie">Movie</label>
    <input type="number" name="movie">
    <label for="genre">Genre</label>
    <input type="number" name="genre">
    <input type="submit" name="mandar" value="Enviar">
</form>
    
@endsection