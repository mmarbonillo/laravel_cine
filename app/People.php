<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = "people";
    protected $fillable = ["name", "photo", "external_url"];

    public function act(){
        return $this->belongsToMany('App\Movie', 'people_act_movies', 'actor_id', 'movie_id');
    }

    public function direct(){
        return $this->belongsToMany('App\Movie', 'people_direct_movies', 'director_id', 'movie_id');
    }
}
