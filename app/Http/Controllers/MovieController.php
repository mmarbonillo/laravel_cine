<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller {
    
    public function index() {
        $moviesList = Movie::all();
        $data["moviesList"] = $moviesList;
        return view('movie/index', $data);
    }

    public function show(Request $r) {
        $data['movie'] = Movie::find($r->id);
        $data["displayp"] = "block";
        $data["displayi"] = "none";
        return view("movie/open")->with($data);
    }
    
    public function create() {
        return view('movie/form');
    }

    public function store(Request $r) {
        $movie = new Movie();
        $file = $r->file('cover');
        $name = $file->getClientOriginalName();
        Storage::disk('covers')->put($name, File::get($file));
        $movie->cover = $name;
        $movie->filename = $r->get("filename");
        $movie->filepath = "/films";
        $movie->title = $r->get("title");
        $movie->year = $r->get("year");
        $movie->duration = $r->get("duration");
        $movie->rating = $r->get("rating");
        $movie->external_url = $r->get("external_url");
        $movie->save();
        //$data["mensaje"] = "Película añadida con éxito";
        return redirect()->action("MovieController@index");
    }

    public function edit(Request $r) {
        $data["movie"] = Movie::find($r->id);
        $data["displayp"] = "none";
        $data["displayi"] = "block";
        //echo($data["user"]->name);
        return view('movie/open')->with($data);
        //echo($r->id); //da el id *.*
    }

    public function update(Request $r) {
        $movie = Movie::find($r->id);
        $movie->title = $r->get('title');
        $movie->year = $r->get('year');
        $movie->duration = $r->get('duration');
        $movie->rating = $r->get('rating');
        //echo($movie);
        if($r->file('cover') != null):
            Storage::disk('covers')->delete($movie->cover);
            $file = $r->file('cover');
            $name = $file->getClientOriginalName();
            Storage::disk('covers')->put($name, File::get($file));
        endif;
        $movie->save();
        //$movie->fill($r->all());
        $data["mensaje"] = "Pelicula editada con éxito";
        $data["displayp"] = "block";
        $data["displayi"] = "none";
        return redirect()->route('movie.show', ['id' => $r->id]);
        //return view('movie/open', $data);
    }

    public function destroy(Request $r) {
        $movie = Movie::find($r->id);
        //echo($movie);
        Storage::disk('covers')->delete($movie->cover);
        $movie->delete();
        /*$usersList = myUser::all();
        $data["usersList"] = $usersList;*/
        return redirect()->action('MovieController@index');
        //return view('user/adminPanel', $data);
    }

}
