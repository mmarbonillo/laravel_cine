<!doctype html>
<html>

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="author" content="Maria Del Mar Fernandez Bonillo">

    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <!--<script type="text/javascript" src="javascript/javascript.js"></script>-->
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script type="text/javascript">
        $().ready(function() {
            $('input#genre').keypress(function(key){
                if(key.which == 13){
                    var valor = $('input#genre').val();
                    /*$('div#div').append('<p class="oneGenre">- '+valor+'</p>');
                    $('input#genre').val('');*/
                $.get("{{ route('genre.new') }}",{genre: valor}, function() {
                    $('div#allGenres').append('<p class="oneGenre">'+valor+'</p>');
                    $('input#genre').val('');
                });
                }
            });

            $("#addGenre").click(function(){
                $.get("{{ route('genre.all') }}", function(resp) {
                    var names = JSON.parse(resp);
                    //alert(names[0]);
                    //$("div#div").append("<p>"+ names[0] +"</p>");
                    for(i = 0; i < names.length; i=i+1){
                        //alert(names[i]);
                        $("div#allGenres").append("<p class='oneGenre'>"+ names[i] +"</p>");
                    }
                    $("#openModal").css("display", "block");
                });
            })


        });

        function showModal() {
            document.getElementById('openModal').style.display = 'block';
        }

        function CloseModal() {
            document.getElementById('openModal').style.display = 'none';
        }
    </script>
    @yield('scripts')
    
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
                <p><a id="addGenre" class="nodecoration" style="cursor: pointer;">Add Genre</a></p>
                <p><a class="nodecoration"  href="{{ route('people.create') }}">Add People</a></p>
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

        
            <div id="openModal" class="modalDialog" style="display: none">
                <div id="div">
                    <a href="#" title="Close" class="close" onclick="CloseModal()">X</a>
                    <h3>ADD GENRE</h3>
                    <label for="genre">Genre</label>
                    <input id="genre" type="text" name="genre">
                    <div id="allGenres">

                    </div>
                </div>
            </div>
        
        
    </div>
</body>