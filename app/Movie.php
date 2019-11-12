<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ["title", "year", "duration", "rating", "cover", "filepath", "filename", "external_url"];
}
