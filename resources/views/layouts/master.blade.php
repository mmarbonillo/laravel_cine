<!doctype html>
<html>

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="author" content="Maria Del Mar Fernandez Bonillo">

    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/menu.css') }}">
    <!--<script type="text/javascript" src="javascript/javascript.js"></script>-->
    
    <!--SELECT CON BUSCADOR-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $().ready(function() {
            $('input#genre').keypress(function(key){
                if(key.which == 13){
                    var valor = $('input#genre').val();
                $.get("{{ route('genre.new') }}",{genre: valor}, function() {
                    $('div#allGenres').append('<p class="oneGenre">'+valor+'</p>');
                    $('input#genre').val('');
                });
                }
            });

            $("#addGenre").click(function(){
                $.get("{{ route('genre.all') }}", function(resp) {
                    var names = JSON.parse(resp);
                    for(i = 0; i < names.length; i=i+1){
                        $("div#allGenres").append("<p class='oneGenre'>"+ names[i] +"</p>");
                    }
                    $("#addGenreModal").css("display", "block");
                });
            });
            $("#editGenre").click(function(){
                $.get("{{ route('genre.alll') }}", function(resp){
                    var data = JSON.parse(resp);
                    $("#selectEditGenre").append("<option value='0'>Selecciona un género</option>")
                    for(i = 0; i < data['ids'].length; i++){
                        $("#selectEditGenre").append("<option id='"+ data['ids'][i] +"' value='"+ data['ids'][i] +"'>"+ data['names'][i] +"</option>")
                    }
                });
                $("#editGenreModal").css("display", "block");
            });
            var valor = 0;
            var texto = "";
            $("#selectEditGenre").change(function(){
                valor = $("#selectEditGenre option:selected").val();
                texto = $("#selectEditGenre option:selected").text();
                $("#selectEditGenre").css("display", "none");
                $("#inputEditGenre").val(texto);
                $("#selectEditGenre").css("display", "none");
                $("#inputEditGenre").css("display", "block");
                $("button#save").css("display", "block");
            });
            $("button#save").click(function(){
                var txt = $("#inputEditGenre").val();
                $.get("{{ route('genre.modify') }}", {id: valor, name: txt}, function(resp){
                    //alert(JSON.parse(resp));
                    var data = JSON.parse(resp);
                    $("option#"+data['id']).text(data["genre"]);
                    $("#selectEditGenre").val(0);
                    $("#selectEditGenre").css("display", "block");
                    $("#selectEditGenre").css("display", "block");
                    $("#inputEditGenre").css("display", "none");
                    $("button#save").css("display", "none");
                });
            });

            $("a#deleteGenre").click(function(){
                $.get("{{ route('genre.alll') }}", function(resp){
                    var data = JSON.parse(resp);
                    for(i = 0; i < data['ids'].length; i++){
                        $("#deleteSelectSite").append("<input class='checkbox' type='checkbox' id='"+ data['ids'][i] +"' value='"+ data['ids'][i] +"'>"+data['names'][i]+"<br>");
                    }
                });
                $("#deleteGenreModal").css("display", "block");
            });

            $("button#deleteGenreButton").click(function(){
                //alert("hola");
                var seleccionados = new Array();
                var i = 0;
                var elementos = $("input.checkbox");
                //console.log(elementos);
                var x = 0;
                for(i = 0; i < elementos.length; i++){
                    if(elementos[i].checked){
                        seleccionados[x] = elementos[i].value;
                        x++;
                    }
                }
                var genres = JSON.stringify(seleccionados);
                alert(genres);
                $.get("{{ url('genre/destroy') }}"+"/"+encodeURI(genres), function(resp){
                    $("#deleteGenreModal").css("display", "none");
                    $("#deleteSelectSite").empty();
                });
            });

            $("#addParrafo").mouseover(function(){
                $("#add").css("display", "block");
            });
            $("#add").mouseover(function(){
                $("#add").css("display", "block");
            })
            $("#addParrafo").mouseleave(function(){
                $("#add").css("display", "none");
            });
            $("#add").mouseleave(function(){
                $("#add").css("display", "none");
            });
            $("#editParrafo").mouseover(function(){
                $("#edit").css("display", "block");
            });
            $("#edit").mouseover(function(){
                $("#edit").css("display", "block");
            })
            $("#editParrafo").mouseleave(function(){
                $("#edit").css("display", "none");
            });
            $("#edit").mouseleave(function(){
                $("#edit").css("display", "none");
            });
            $("#deleteParrafo").mouseover(function(){
                $("#delete").css("display", "block");
            });
            $("#delete").mouseover(function(){
                $("#delete").css("display", "block");
            })
            $("#deleteParrafo").mouseleave(function(){
                $("#delete").css("display", "none");
            });
            $("#delete").mouseleave(function(){
                $("#delete").css("display", "none");
            });


        });

        
        function showModal(id) {
            document.getElementById(id).style.display = 'block';
        }

        function CloseModal(id) {
            document.getElementById(id).style.display = 'none';
            $("#selectEditGenre").val(0);
            $("#selectEditGenre").css("display", "block");
            $("#selectEditGenre").css("display", "block");
            $("#inputEditGenre").css("display", "none");
            $("button#save").css("display", "none");
            $("#deleteSelectSite").empty();
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
                <p id="deleteParrafo"><a id="deleteP" class="nodecoration" style="cursor: pointer;">Delete</a></p>
                <p id="editParrafo"><a id="editP" class="nodecoration"  href="#">Edit</a></p>
                <p id="addParrafo" style="border: 1px solid red;"><a id="addP" class="nodecoration" href="#">Add</a></p>
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

        
        <div id="addGenreModal" class="modalDialog" style="display: none">
            <div>
                <a href="#" title="Close" class="close" onclick="CloseModal('addGenreModal')">X</a>
                <h3>ADD GENRE</h3>
                <label for="genre">Genre</label>
                <input id="genre" type="text" name="genre">
                <div id="allGenres">

                </div>
            </div>
        </div>
        <div id="editGenreModal" class="modalDialog" style="display: none">
            <div id="div">
                <a href="#" title="Close" class="close" onclick="CloseModal('editGenreModal')">X</a>
                <h3>EDIT GENRE</h3>
                <div id="selectSite">
                    <select id='selectEditGenre' name='genres'></select>
                    <input type="text" id="inputEditGenre" style="display: none;">
                    <button id='save' style="display: none;">Save Changes</button>
                </div>
            </div>
        </div>
        <div id="deleteGenreModal" class="modalDialog" style="display: none">
                <div id="div">
                    <a href="#" title="Close" class="close" onclick="CloseModal('deleteGenreModal')">X</a>
                    <h3>DELETE GENRE</h3>
                    <div id="deleteSelectSite">
                    </div>
                    <button id="deleteGenreButton">Delete selected</button>
                </div>
            </div>
        <div id="add" style="display:none;">
            <p><a class="nodecoration" href="{{ route('movie.create') }}">Movie</a></p>
            <p><a class="nodecoration" href="{{ route('people.create') }}">People</a></p>
            <p><a id="addGenre" class="nodecoration" style="cursor: pointer;">Genre</a></p>
        </div>
        <div id="edit" style="display:none;">
            <p><a class="nodecoration" href="#">Movie</a></p>
            <p><a class="nodecoration" href="{{ route('people.index') }}">People</a></p>
            <p><a id="editGenre" class="nodecoration" style="cursor: pointer;">Genre</a></p>
        </div>
        <div id="delete" style="display:none;">
            <p><a class="nodecoration" href="#">Movie</a></p>
            <p><a class="nodecoration" href="#">People</a></p>
            <p><a id="deleteGenre" class="nodecoration" style="cursor: pointer;">Genre</a></p>
        </div>
    </div>
</body>