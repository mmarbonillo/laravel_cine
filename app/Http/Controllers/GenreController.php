<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Movie;
use Auth;

class GenreController extends Controller
{
    public function index() {
        return view('genre/index');
    }

    public function show(Request $r) {
        $genero = Genre::where('genre',  $r->genre)->get();
        //echo $genero;
        $movies = Genre::find($genero[0]->id)->movies;
        $data['moviesList'] = $movies;
        $data["user"] = Auth::user();
        return view('genre/moviesfromgenre', $data);
    }

    public function create(){
        $genresList = Genre::all();
        $data['genresList'] = $genresList;
        $data['mensaje'] = session()->get('mensaje');
        $user = Auth::user();
        $data['user'] = $user;
        return view('genre/form', $data);
    }

    public function store(Request $r){
        $genre = new Genre($r->all());
        $genre->save();
        $data['mensaje'] = 'Género añadido con éxito';
        return redirect()->route('genre.create', $data);
    }

    public function edit(Request $r){
        //echo '<pre>'.$r->genre.'</pre>';
        /*$genero = Genre::where('genre',  $r->genre)->get();
        $data['genre'] = $genero;
        return view('genre/edit');*/
    }

    public function destroy(Request $r){
        foreach($r->genres as $id):
            $genre = Genre::find($id);
            $genre->delete();
        endforeach;
        $data['mensaje'] = "Géneros eliminados con éxito";
        return redirect()->route('genre.create', $data);
    }

    public function prueba(){
        $user = Auth::user();
        $data['user'] = $user;
        return view("genre/pruebaform");
    }

    public function add(Request $r){
        $movie = Movie::find($r->movie);
        $movie->genres()->attach($r->genre);
        echo "1";
    }

    public function all(){
        $all = Genre::all();
        $names = [];
        foreach($all as $genre){
            $names[] = $genre->genre;
        }
        /*for($i = 0; $i < $names; $i++){
            echo ($names[$i]."<br>");
        }*/
        echo json_encode($names);;
        /*dd($genres[0]);
        var_dump($genres);*/
    }

    public function new(Request $r){
        $genre = new Genre($r->all());
        $genre->save();
        echo "1";
    }
}
