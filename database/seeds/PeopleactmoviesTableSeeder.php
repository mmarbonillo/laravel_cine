<?php

use Illuminate\Database\Seeder;

class PeopleactmoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people_act_movies')->insert([
            'actor_id' => 1,
            'movie_id' => 2,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 1,
            'movie_id' => 3,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 1,
            'movie_id' => 4,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 2,
            'movie_id' => 1,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 2,
            'movie_id' => 4,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 9,
            'movie_id' => 1,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 10,
            'movie_id' => 1,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 11,
            'movie_id' => 1,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 12,
            'movie_id' => 2,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 13,
            'movie_id' => 2,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 14,
            'movie_id' => 2,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 12,
            'movie_id' => 3,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 13,
            'movie_id' => 3,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 14,
            'movie_id' => 3,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 15,
            'movie_id' => 3,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 16,
            'movie_id' => 3,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 17,
            'movie_id' => 3,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 18,
            'movie_id' => 3,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 19,
            'movie_id' => 3,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 20,
            'movie_id' => 4,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 21,
            'movie_id' => 5,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 22,
            'movie_id' => 5,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 23,
            'movie_id' => 5,
        ]);
        DB::table('people_act_movies')->insert([
            'actor_id' => 24,
            'movie_id' => 5,
        ]);
    }
}
