@extends('layouts.master')

@section('scripts')
    <link rel="stylesheet" href="{{ url('css/adminMovie.css') }}">
@endsection

@section('content')
    <div id="adminMoviesMenu">
        <ul>
            <li>Películas</li>
            <li>Actores</li>
            <li>Directores</li>
            <li>Géneros</li>
        </ul>
    </div>
@endsection