<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ["title", "year", "duration", "rating", "cover", "filepath", "filename", "external_url"];

    public function genres() {
        return $this->belongsToMany('App\Genre', 'genres_movies');
    }

    public function cast(){
        return $this->belongsToMany('App\People', 'people_act_movies', 'movie_id', 'actor_id');
    }

    public function direct(){
        return $this->belongsToMany('App\People', 'people_direct_movies', 'movie_id', 'director_id');
    }

}
