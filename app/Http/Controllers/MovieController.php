<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use App\People;
use App\Movie;
use Auth;
use DB;

class MovieController extends Controller {
    
    public function __construct() {
        $this->middleware("auth")->except("index","show");
    }

    public function index() {
        $moviesList = Movie::all();
        $user = Auth::user();
        $data["moviesList"] = $moviesList;
        $data["user"] = $user;
        return view('movie/index', $data);
    }

    public function show(Request $r) {
        $data['movie'] = Movie::find($r->id);
        $data["displayp"] = "block";
        $data["displayi"] = "none";
        $data["user"] = Auth::user();
        $genres = Movie::find($r->id)->genres;
        $data['genres'] = $genres;
        $people = People::all();
        //dd($people);
        $data["people"] = $people;
        return view("movie/open")->with($data);
    }
    
    public function create() {
        $data["user"] = Auth::user();
        $peopleDirect = DB::table('people')->join('people_direct_movies', 'people.id', '=', 'people_direct_movies.director_id')->select('people.*')->distinct()->get();
        $peopleAct = DB::table('people')->join('people_act_movies', 'people.id', '=', 'people_act_movies.actor_id')->select('people.*')->distinct()->get();
        $data["cast"] = $peopleAct;
        $data["directors"] = $peopleDirect;
        $people = People::all();
        $data["people"] = $people;
        return view('movie/form', $data);
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
        $genres = Movie::find($r->id)->genres;
        $data['genres'] = $genres;
        $data['user'] = Auth::user();
        $ids = [];
        //dd($genres->toArray());
        foreach($genres->toArray() as $genre):
            $ids[] = $genre["id"];
        endforeach;
        $noGenres = DB::table('genres')->whereNotIn('id', $ids)->get();
        //dd($noGenres);
        $data['noGenres'] = $noGenres;
        $people = People::all();
        //dd($people);
        $data["people"] = $people;
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
            $movie->cover = $name;
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

    public function delete(Request $r){
        $movie = Movie::find($r->movie);
        Storage::disk('covers')->delete($movie->cover);
        $movie->delete();
        echo "1";
    }

    public function addCast(Request $r){
        $movie = Movie::find($r->movie);
        $movie->cast()->attach($r->cast);
        echo $r->cast;
    }

    public function addDirectors(Request $r){
        $movie = Movie::find($r->movie);
        $movie->direct()->attach($r->director);
        echo $r->director;
    }

    public function view(){
        $user = Auth::user();
        $data["user"] = $user;
        return view('movie/view', $data);
    }

    public function admin(){
        $user = Auth::user();
        $data['user'] = $user;
        return view('movie/admin', $data);
    }

}
