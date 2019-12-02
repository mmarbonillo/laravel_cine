<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\People;
use App\Movie;
use Auth;
use DB;

class PeopleController extends Controller {

    public function __construct() {
        $this->middleware("auth");
    }

    public function index(){
        $peopleList = People::all();
        $data["peopleList"] = $peopleList;
        $user = Auth::user();
        $data["user"] = $user;
        return view("people/home", $data);
    }
    
    public function show($id){
        $cast = People::find($id)->act;
        $directors = People::find($id)->direct;
        $moviesList = [];
        foreach($cast as $movie){
            $moviesList[] = $movie;
        }
        foreach($directors as $movie){
            $moviesList[] = $movie;
        }
        $data['moviesList'] = $moviesList;
        $user = Auth::user();
        $data['user'] = $user;
        return view('movie/index', $data);
    }

    public function edit($id){
        $people = People::find($id);
        $data["people"] = $people;
        $user = Auth::user();
        $data["user"] = $user;
        return view("people/form", $data);
    }

    public function create(){
        $user = Auth::user();
        $data['user'] = $user;
        //dd($people);
        return view('people/form', $data);
    }

    public function new(Request $r){
        $people->name = $r->get("name");
        $people->external_url = $r->get("external_url");
        $people->photo = "photo";
        $people->save();
        return redirect()->action('PeopleController@index');
    }

    public function store(Request $r){
            $people = People::find($r->id);
            $people->name = $r->get("name");
            $people->external_url = $r->get("external_url");
            $people->save();
        return redirect()->action('PeopleController@index');
    }

    public function destroy($id){
        $people = People::find($id);
        $people->delete();
        return redirect()->action('PeopleController@index');
    }

    public function search(Request $r){
        $people = DB::table("people")->where('people.name', 'LIKE', $r->name.'%')->orWhere('people.name', 'LIKE', '%'.$r->name.'%')->get();
        echo json_encode($people);
    }

    public function searchCast(Request $r){
        $cast = DB::table('people')->join('people_act_movies', 'people.id', '=', 'people_act_movies.actor_id')->where('people.name', 'LIKE', $r->name.'%')->orWhere('people.name', 'LIKE', '%'.$r->name.'%')->select('people.*')->get();
        echo json_encode($cast);
    }

    public function searchDirectors(Request $r){
        $direct = DB::table('people')->join('people_direct_movies', 'people.id', '=', 'people_direct_movies.director_id')->where('people.name', 'LIKE', $r->name.'%')->orWhere('people.name', 'LIKE', '%'.$r->name.'%')->select('people.*')->get();
        echo json_encode($direct);
    }

}
