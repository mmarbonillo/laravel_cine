<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model{
    protected $fillable = ["genre"];

    public function movies() {
        return $this->belongsToMany('App\Movie', 'genres_movies');
    }

}
