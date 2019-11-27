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
    
    public function show($id){
        $cast = People::find($id)->act;
        $directors = People::find($id)->direct;
        //dd($cast->toArray());
        //echo "<pre>".$cast."</pre>";
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
        return view('people/form', $data);
    }

}
