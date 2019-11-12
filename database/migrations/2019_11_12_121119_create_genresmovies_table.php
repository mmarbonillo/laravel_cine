<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenresmoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genresmovies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('genre_id');
            $table->bigInteger('movie_id');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genresmovies');
    }
}
