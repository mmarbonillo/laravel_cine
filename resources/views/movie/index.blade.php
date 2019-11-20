@extends('layouts.master')

@section('title', 'Home')

@section('scripts')
    <script type="text/javascript">
        $().ready(function(){
            $("input.deleteButton").click(function(){
                var capa = $(this).parent();
                $.get("{{ route('movie.delete') }}", {movie: $("#movieId").val()}, function(resp){
                    capa.remove();
                });
            });
        });
    </script>
@endsection

@section('content')

<div id="movies">

@if(isset($mensaje))
    {{$mensaje}}
@endif
@foreach($moviesList as $movie)
    <div class='movie'>
        @auth
        <input type='button' name='edit' class='editButton' value='EDIT' onclick="window.location.href='{{route('movie.edit', ['id' => $movie->id])}}'">
        <input type='button' name='deletee' class='deleteButton' value='DELETE' >
        @endauth
        <input type="hidden" name="movieId" value="{{ $movie->id }}" id="movieId">
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