@extends('layouts.master')

@if(isset($mensaje))
    {{$mensaje}}
@endif

@section('scripts')
    <script type="text/javascript">
        $().ready(function(){
            $("#inputCast").keydown(function(){
                $(".castList").css("display", "none");
            });
            $("#inputCast").keyup(function(){
                var valor = $(this).val();
                if(valor != null && valor != ''){
                    $.get("{{ route('people.search') }}", {name: valor}, function(resp){
                        var people = JSON.parse(resp);
                        for(i = 0; i < people.length; i++){
                            $("#"+people[i].id).css("display", "block");
                        }
                    });
                }
                $("p.castList").dblclick(function(){
                    alert($(this).attr('id'));
                });
            });
            

            $("#inputDirector").keydown(function(){
                $(".directorList").css("display", "none");
            });
            $("#inputDirector").keyup(function(){
                var valor = $(this).val();
                if(valor != null && valor != ''){
                    $.get("{{ route('people.search') }}", {name: valor}, function(resp){
                        var people = JSON.parse(resp);
                        for(i = 0; i < people.length; i++){
                            $("#"+people[i].id).css("display", "block");
                        }
                    });
                }
            });
            $(".directorList").dblclick(function(){
                alert($(this).attr('id'));
            })
        });
    </script>
@endsection

@section('content')
<div id="moviesFormLeft">
    <form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="opcion">
        <div class="etiqueta">
            <label for="cover" >Imagen: </label>
        </div>
        <div class="campo">
            <input type="file" name="cover"/>
        </div>
    </div>
    <div class="opcion">
        <div class="etiqueta">
            <label for="filename" >Película: </label>
        </div>
        <div class="campo">
            <input type="text" name="filename"/>
        </div>
        @error('filename')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="opcion">
        <div class="etiqueta">
            <label for="title" >Título: </label>
        </div>
        <div class="campo">
            <input type="text" name="title" />
        </div>
    </div>
    <div class="opcion">
        <div class="etiqueta">
            <label for="year" >Año: </label>
        </div>
        <div class="campo">
            <input type="number" name="year" />
        </div>
    </div>
    <div class="opcion">
        <div class="etiqueta">
            <label for="duration" >Duración(min): </label>
        </div>
        <div class="campo">
            <input type="number" name="duration" />
        </div>
    </div>
    <div class="opcion">
        <div class="etiqueta">
            <label for="rating" >Valoración: </label>
        </div>
        <div class="campo">
            <input type="number" name="rating" />
        </div>
    </div>
    <div class="opcion">
        <div class="etiqueta">
            <label for="external_url" >URL externa: </label>
        </div>
        <div class="campo">
            <input type="text" name="external_url" />
        </div>
    </div>
    <input type="submit" name="insertar" value="Insertar"/>
    <input type="hidden" name="opc" value="addMovie">
</div>
</form>
    

@endsection