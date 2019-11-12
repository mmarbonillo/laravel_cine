@extends('layouts.master')

@section('title', 'Home')

@section('content')

<div id="movies">

@if(isset($mensaje))
    {{$mensaje}}
@endif
@foreach($moviesList as $movie)
    <div class='movie'>
        <input type='button' name='edit' class='editButton' value='EDIT' onclick="window.location.href='{{route('movie.edit', ['id' => $movie->id])}}'">
        <input type='button' name='delete' class='deleteButton' value='DELETE' onclick="window.location.href='{{route('movie.destroy', ['id' => $movie->id])}}'">
    
        <a href='{{ route('movie.show', ['id' => $movie->id]) }}'><img class='divmovie' src='{{ url('images/covers/'.$movie->cover) }}' alt='cover' height='350px' width='250px'></a>

        @for ($i = 0; $i < $movie->rating; $i++)
            <img class='rating' src='{{ url('images/stars/estrllaamarilla.png') }}' alt='rating' height='20px' width='20px'>
        @endfor
        @for ($i = $movie->rating; $i < 10; $i++)
            <img class='rating' src='{{ url('images/stars/estrellablanca.png') }}' alt='rating' height='20px' width='20px'>
        @endfor

        <p>{{ $movie->year }} - {{$movie->title}}</p>
    
    </div>
@endforeach
</div>

@endsection