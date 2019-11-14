<!doctype html>
<html>

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="author" content="Maria Del Mar Fernandez Bonillo">

    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <!--<script type="text/javascript" src="javascript/javascript.js"></script>-->
    @yield('scripts')
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script type="text/javascript">
        $().ready(function() {
            $('input#genre').keypress(function(key){
                if(key.which == 13){
                    var valor = $('input#genre').val();
                    $('div#genresList').append('<p class="oneGenre">- '+valor+'</p>');
                    $('input#genre').val('');
                }
            });
        });

        function showModal() {
            document.getElementById('openModal').style.display = 'block';
        }

        function CloseModal() {
            document.getElementById('openModal').style.display = 'none';
        }
    </script>
    
</head>

<body>
    <div id="all">
        <div id="header">
            <p><a class="nodecoration" href="{{ route('movie.index') }}">MOVIES BONILLO</a></p>
        </div>
        <div id="menu">
            @auth
                <p><a class="nodecoration" href='{{ route('user.logout', ['id' => $user->id]) }}'>Logout</a></p>
                <img id='imagen' src='{{ url('images/icons/user.png') }}' alt='usuario' onclick="window.location.href='{{ route('user.index') }}'"/>
                <!--<a class="nodecoration" onclick="showModal();">Add Genre</a>-->
                <p><a class="nodecoration" href='{{ route('genre.create') }}'>Add Genre</a></p>
                <p><a class="nodecoration" href="{{ route('movie.create') }}">Add Movie</a></p>
            @endauth
            @guest
                <p><a class="nodecoration" href='{{ route('login') }}'>Login</a></p>
            @endguest
            
            <input type="text" name="search" id="search" placeholder="Search...">
            <input type="button" name="search_button" id="search_button" value="Search" onclick="window.location.href='#'">

        </div>

        <div id="content">
            @yield('content')
        </div>
        
    </div>
</body>