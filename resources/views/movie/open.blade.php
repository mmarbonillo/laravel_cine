@extends('layouts.master')

@if (isset($mensaje))
    {{ $mensaje }}
@endif

@section('scripts')
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script type="text/javascript">
        function changeStars(star){
            if(star.class == 'yellow')
                star.src = '{{ url('images/stars/estrellablanca.png') }}';
            else
                star.src = '{{ url('images/stars/estrllaamarilla.png') }}';
        }
    </script>
@endsection


@section('content')
    
<div class='movie'>
        @if ($displayi == "block")
            <form action="{{ route('movie.update', ['id' => $movie->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
            @method('PUT')
        @endif
        <img src='{{ url('images/covers/'.$movie->cover) }}' alt='cover' height='350px' width='250px'>
        <input type="file" name="cover" value="{{ $movie->cover }}" style="display:{{$displayi ?? 'none'}}">
        <input type='button' name='edit' class='editButton' value='EDIT' onclick="window.location.href='{{ route('movie.edit', ['id' => $movie->id]) }}'" style='display:{{$displayp ?? 'none'}}'>
        <input type='button' name='delete' class='deleteButton' value='DELETE' style='display:{{$displayp ?? 'none'}}'>
</div>
<div id='movieInfo'>

    @for ($i = 0; $i < $movie->rating; $i++)
        <img class='rating yellow' src='{{ url('images/stars/estrllaamarilla.png') }}' alt='rating' height='20px' width='20px' onmouseover="changeStars(this)">
    @endfor
    @for ($i = $movie->rating; $i < 10; $i++)
        <img class='rating white' src='{{ url('images/stars/estrellablanca.png') }}' alt='rating' height='20px' width='20px'>
    @endfor
        @if ($displayi == "block")
            <br>
        @endif
        <input type="num" class="indentp" name="rating" value="{{ $movie->rating }}" style='display:{{$displayi ?? 'none'}}'>
        
    
    <h3>Tittle</h3>
    <p class='indentp' style='display:{{$displayp ?? 'none'}}'>{{ $movie->title }}</p>
    <input type='text' class='indentp' name='title' style='display:{{$displayi ?? 'none'}}' value='{{$movie->title}}'>
    <h3>Year</h3>
    <p class="indentp" style='display:{{$displayp ?? 'none'}}'>{{ $movie->year }}</p>
    <input type='number' class='indentp' name='year' style='display:{{$displayi ?? 'none'}}' value='{{$movie->year}}'>
    <h3>Duration</h3>
    <p class='indentp' style='display:{{$displayp ?? 'none'}}'>{{ $movie->duration }}</p>
    <input type='text' class='indentp' name='duration' style='display:{{$displayi ?? 'none'}}' value='{{$movie->duration}}'>
    
    @guest
        <input type='button' name='viewMovie' class='viewMovie' value='VIEW' style='display:{{$displayp ?? 'none'}}'>
    @endguest

    <br style='display:{{$displayi ?? 'none'}}'>
    <input type="submit" name="save" value="Save Changes" style='display:{{$displayi ?? 'none'}}'>

    @if ($displayi == "block")
        </form>
    @endif
    <h3>Genres</h3>
    @foreach ($genres as $genre)
        <a href="{{ route('genre.show', $genre->genre) }}">{{ $genre->genre }}</a>
    @endforeach

</div>

@endsection