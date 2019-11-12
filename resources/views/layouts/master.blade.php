<!doctype html>
<html>

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="author" content="Maria Del Mar Fernandez Bonillo">

    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <!--<script type="text/javascript" src="javascript/javascript.js"></script>-->
    @yield('scripts')
    
</head>

<body>
    <div id="all">
        <div id="header">
            <p><a href="index.php">MOVIES BONILLO</a></p>
        </div>
        <div id="menu">

            <p><a href='index.php?opc=closeSession&controller=userController'>Logout</a></p>
            <img id='imagen' src='{{ url('images/icons/user.png') }}' alt='usuario' onclick="window.location.href='#'"/>
            <p><a href="{{ route('movie.create') }}">Añadir Película</a></p>

            <input type="text" name="search" id="search" placeholder="Search...">
            <input type="button" name="search_button" id="search_button" value="Search" onclick="window.location.href='#'">

        </div>

        <div id="content">
            @yield('content')
        </div>
    </div>
</body>