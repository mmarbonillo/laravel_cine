@extends('layouts.master')

@if (isset($mensaje))
    {{ $mensaje }}
@endif

@section('scripts')
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script type="text/javascript">
        function changeStars(star){
            if(star.class == 'yellow')
                star.src = '{{ url("images/stars/estrellablanca.png") }}';
            else
                star.src = '{{ url("images/stars/estrllaamarilla.png") }}';
        }

        $(".rating").mouseenter(changeStars(this));

        $().ready(function(){
            $("option.noGenreOption").dblclick(function(){
                var movieId = $("#movieId").val();
                var genreId = $(this).val();
                var text = $(this).text();
                $.get("{{ route('genre.add') }}", {genre: $(this).val(), movie: movieId}, function(resp) {
                    //if(resp == 1){
                        //Recojo el div con los géneros y le añado el género
                        $("div.genres").append("<a class='genres indentp' href='{{ route('genre.show', "+ genreId +") }}'>"+ text +" </a>");
                        //Elimino el género de la lista de "no generos"
                        $("#nogenre"+genreId).remove();
                    //}
                })
            });

            $("#newCastButton").click(function(){
                $("#newCastButton").css("display", "none");
                $("#inputSearchCast").css("display", "block");
            });
            $("#inputSearchCast").keydown(function(){
                $(".castList").css("display", "none");
            });
            $("#inputSearchCast").keyup(function(){
                var valor = $(this).val();
                if(valor != null && valor != ''){
                    $.get("{{ route('people.search') }}", {name: valor}, function(resp){
                        var people = JSON.parse(resp);
                        for(i = 0; i < people.length; i++){
                            $("#a"+people[i].id).css("display", "block");
                        }
                    });
                }else{
                    $(".castList").css("display", "none");
                }
                var idCast = 0;
                $("p.castList").click(function(){
                    idCast = ($(this).attr('id')).substring(1);
                    var name = ($(this).text()).substring(1);
                    var idMovie = $("#movieId").val();
                    //alert("movie: " + idMovie);
                    $.get("{{ route('movie.addCast') }}", {movie: idMovie, cast: idCast}, function(resp){
                        var cadena = "<a class='indentp' href='{{ url('people/showw') }}"+"/"+idCast+"'>"+ name +"</a>";
                        $("#info2").append(cadena);
                        $("#a"+resp).remove();
                    });
                });
            });
            $("#newDirectorButton").click(function(){
                $("#newDirectorButton").css("display", "none");
                $("#inputSearchDirector").css("display", "block");
            });
            $("#inputSearchDirector").keydown(function(){
                $(".directorList").css("display", "none");
            });
            $("#inputSearchDirector").keyup(function(){
                var valor = $(this).val();
                if(valor != null && valor != ''){
                    $.get("{{ route('people.search') }}", {name: valor}, function(resp){
                        var people = JSON.parse(resp);
                        for(i = 0; i < people.length; i++){
                            $("#d"+people[i].id).css("display", "block");
                        }
                    });
                }else{
                    $(".directorList").css("display", "none");
                }
                $(".directorList").click(function(){
                    var idDirector = ($(this).attr('id')).substring(1);
                    var name = ($(this).text()).substring(1);
                    var idMovie = $("#movieId").val();
                    $.get("{{ route('movie.addDirectors') }}", {movie: idMovie, director: idDirector}, function(resp){
                        var cadena = "<a class='indentp' href='{{ url('people/showw') }}"+"/"+idDirector+"'>"+ name +"</a>";
                        $("#info3").append(cadena);
                        $("#d"+resp).remove();
                    });

                });
            });
        });

       
       
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
        <input type="hidden" name="movieId" id="movieId" value="{{ $movie->id }}">
        <input type="file" name="cover" value="{{ $movie->cover }}" style="display:{{$displayi ?? 'none'}}" style="color: transparent;">
        @auth
            <input type='button' name='editt' class='editButton' value='EDIT' onclick="window.location.href='{{ route('movie.edit', ['id' => $movie->id]) }}'" style='display:{{$displayp ?? 'none'}}'>
            <input type='button' name='deletee' class='deleteButton' value='DELETE' onclick="window.location.href='{{ route('movie.destroy', ['id' => $movie->id]) }}'" style='display:{{$displayp ?? 'none'}}'>
        @endauth
        
</div>
<div id='movieInfo'>
    <h3>
    @for ($i = 0; $i < $movie->rating; $i++)
        <img class='rating yellow' src='{{ url('images/stars/estrllaamarilla.png') }}' alt='rating' height='20px' width='20px' onmouseover="changeStars(this)">
    @endfor
    @for ($i = $movie->rating; $i < 10; $i++)
        <img class='rating white' src='{{ url('images/stars/estrellablanca.png') }}' alt='rating' height='20px' width='20px'>
    @endfor
        @if ($displayi == "block")
            <br>
        @endif
    </h3>
        <input type="num" class="indentp" name="rating" value="{{ $movie->rating }}" style='display:{{$displayi ?? 'none'}}'>
        
    <div id="info1">
        <h3>Tittle</h3>
        <p class='indentp' style='display:{{$displayp ?? 'none'}}'>{{ $movie->title }}</p>
        <input type='text' class='indentp' name='title' style='display:{{$displayi ?? 'none'}}' value='{{$movie->title}}'>
        <h3>Year</h3>
        <p class="indentp" style='display:{{$displayp ?? 'none'}}'>{{ $movie->year }}</p>
        <input type='number' class='indentp' name='year' style='display:{{$displayi ?? 'none'}}' value='{{$movie->year}}'>
        <h3>Duration</h3>
        <p class='indentp' style='display:{{$displayp ?? 'none'}}'>{{ $movie->duration }}</p>
        <input type='text' class='indentp' name='duration' style='display:{{$displayi ?? 'none'}}' value='{{$movie->duration}}'>

        <h3>Genres</h3>
        <div class="genres">
            @foreach ($genres as $genre)
                <a class="genres indentp" href="{{ route('genre.show', $genre->genre) }}">{{ $genre->genre }}&nbsp;</a>
            @endforeach
        </div>
        @if ($displayi == "block")
            <div class="noGenres">
                <select name="noGenresSelect" style="height: auto;" multiple>
                @foreach ($noGenres as $genre)
                    <option id="nogenre{{ $genre->id }}" class="noGenreOption" value="{{ $genre->id }}">{{ $genre->genre }}</option>
                @endforeach
                </select>
            </div>
        @endif
    </div>
    <div id="info2">
        <h3 >Cast</h3><input type="button" id="newCastButton" style="display:{{ $displayi ?? 'none' }}" value="Add New Cast">
        <input type="text" id="inputSearchCast" style="display:none;" placeholder="Search Actor/Actress">
        <div id="castSearchResult">
            @foreach ($people as $one)
                @php
                    $existe = false;
                    $i = 0;
                @endphp
                @while ($i < count($movie->cast) && !$existe)
                    @if ($movie->cast[$i]->id == $one->id)
                        @php
                            $existe = true;
                        @endphp
                    @endif
                    @php
                        $i++;
                    @endphp
                @endwhile
                    @if (!$existe)
                        <p class="castList" id="a{{ $one->id }}" style="display:none;">+ {{ $one->name }}</p>
                    @endif
            @endforeach
        </div>
        @foreach ($movie->cast as $actor)
            <a class="indentp" href="{{ route('people.show', $actor->id) }}">{{ $actor->name }}</a>
        @endforeach
    </div>
    <div id="info3">
        <h3>Directors</h3><input type="button" id="newDirectorButton" style="display:{{ $displayi ?? 'none' }}" value="Add New Director">
        <input type="text" id="inputSearchDirector" style="display:none;" placeholder="Search Director">
        <div id="directorSearchResult">
                @foreach ($people as $one)
                @php
                    $existe = false;
                    $i = 0;
                @endphp
                @while ($i < count($movie->direct) && !$existe)
                    @if ($movie->direct[$i]->id == $one->id)
                        @php
                            $existe = true;
                        @endphp
                    @endif
                    @php
                        $i++;
                    @endphp
                @endwhile
                    @if (!$existe)
                        <p class="directorList" id="d{{ $one->id }}" style="display:none;">+ {{ $one->name }}</p>
                    @endif
            @endforeach
        </div>
        @foreach ($movie->direct as $director)
            <a class="indentp" href="{{ route('people.show', $director->id) }}">{{ $director->name }}</a>
        @endforeach
    </div>
    
        <input type='button' name='viewMovie' class='viewMovie' value='VIEW' style='display:{{$displayp ?? 'none'}}'
        onclick="window.location.href='{{route('movie.view')}}'">
    
    <br style='display:{{$displayi ?? 'none'}}'>
    <br>
    <div>
        <input type="submit" name="save" value="Save Changes" style='display:{{$displayi ?? 'none'}}'>
    </div>
    @if ($displayi == "block")
        </form>
    @endif
</div>

@endsection