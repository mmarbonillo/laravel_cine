<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\myUser;
use Auth;

class UserController extends Controller {
    
    public function index() {
        $user = Auth::user();
        if($user->type == 0){
            $usersList = myUser::all();
            $data["usersList"] = $usersList;
            return view('user/adminPanel', $data);
        }else if($user->type == 1){
            $data["user"] = $user;
            return view('user/adminPanel', $data);
        }else {
            return redirect()->route('movie.index');
        }
    }

    public function show() {
        
    }
    
    public function create() {
        return view('user/formUser');
    }

    public function store(Request $r) {
        $user = new myUser($r->all());
        //$user->id = NULL;
        /*$user->username = $r->get("username");
        $user->name = $r->get("name");
        $user->surname = $r->get("surname");
        $user->password = $r->get("password");
        $user->email = $r->get("email");
        $user->type = $r->get("type");*/
        $user->save();
        $data["mensaje"] = "Usuario añadido con éxito";
        return view('user/formUser', $data);
    }

    public function edit(Request $r) {
        $data["user"] = myUser::find($r->id);
        //echo($data["user"]->name);
        return view('user/formUser', $data);
        //echo($r->id); //da el id *.*
    }

    public function update(Request $r) {
        $user = myUser::find($r->id);
        $user->fill($r->all());
        $user->username = $r->username;
        $user->name = $r->name;
        $user->surname = $r->surname;
        if($r->password == null):
            $user->password = $r->oldpassword;
        else:
            $user->password = $r->password;
        endif;
        $user->email = $r->email;
        $user->type = $r->type;
        $user->save();
        $data["user"] = myUser::find($r->id);
        $data["mensaje"] = "Usuario editado con éxito";
        return view('user/formUser', $data);
    }

    public function destroy(Request $r) {
        $user = myUser::find($r->id);
        $user->delete();
        return redirect()->route("user.index");
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('movie.index');
    }

}