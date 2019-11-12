<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class myUser extends Model
{
    protected $table = "users";
    protected $fillable = ["username", "name", "surname", "password", "email", "type"];
}
