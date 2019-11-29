<?php

use Illuminate\Database\Seeder;

class PeopledirectmoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people_direct_movies')->insert([
            'director_id' => 4,
            'movie_id' => 1,
        ]);
        DB::table('people_direct_movies')->insert([
            'director_id' => 5,
            'movie_id' => 2,
        ]);
        DB::table('people_direct_movies')->insert([
            'director_id' => 6,
            'movie_id' => 2,
        ]);
        DB::table('people_direct_movies')->insert([
            'director_id' => 7,
            'movie_id' => 2,
        ]);
        DB::table('people_direct_movies')->insert([
            'director_id' => 8,
            'movie_id' => 2,
        ]);
        DB::table('people_direct_movies')->insert([
            'director_id' => 5,
            'movie_id' => 3,
        ]);
        DB::table('people_direct_movies')->insert([
            'director_id' => 6,
            'movie_id' => 3,
        ]);
        DB::table('people_direct_movies')->insert([
            'director_id' => 7,
            'movie_id' => 3,
        ]);
        DB::table('people_direct_movies')->insert([
            'director_id' => 8,
            'movie_id' => 3,
        ]);
        DB::table('people_direct_movies')->insert([
            'director_id' => 3,
            'movie_id' => 4,
        ]);
    }
}
