<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function rightNow(){
        $now = Carbon\Carbon::now();
        $date = $now->toDateTimeString();
        return $date;
    }
    
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->string('username')->unique();
            $table->string('name');
            $table->string('surname');
            $table->integer('type');
            $table->string('email')->unique();
            $table->string('password');
            //$table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
