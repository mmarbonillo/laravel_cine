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

    public function __construct(){
        $this->middleware("auth")->except("show");
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

    public function create(){
        $user = Auth::user();
        $data['user'] = $user;
        $people = People::all();
        $data["people"] = $people;
        //dd($people);
        return view('movie/form', $data);
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
