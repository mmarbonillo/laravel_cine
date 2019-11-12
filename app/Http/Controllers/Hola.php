<?php

namespace App\Http\Controllers;

class Hola {

    public function show($nombre) {
        $data['nombre'] = $nombre;
        return view('hola', $data);
    }

}