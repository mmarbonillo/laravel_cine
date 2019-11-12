<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->string('title');
            $table->integer('year');
            $table->integer('duration');
            $table->integer('rating');
            $table->string('cover');
            $table->string('filepath')->default('/movies');
            $table->string('filename')->unique();
            $table->string('external_url');
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
        Schema::dropIfExists('movies');
    }
}
