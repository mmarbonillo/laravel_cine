<?php

use Illuminate\Database\Seeder;

class GenresmoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon\Carbon::now();
        $date = $now->toDateTimeString();
        DB::table('genresmovies')->insert([
            'genre_id' => 2,
            'movie_id' => 1,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genresmovies')->insert([
            'genre_id' => 8,
            'movie_id' => 1,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genresmovies')->insert([
            'genre_id' => 7,
            'movie_id' => 1,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genresmovies')->insert([
            'genre_id' => 7,
            'movie_id' => 2,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genresmovies')->insert([
            'genre_id' => 6,
            'movie_id' => 2,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genresmovies')->insert([
            'genre_id' => 9,
            'movie_id' => 2,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genresmovies')->insert([
            'genre_id' => 1,
            'movie_id' => 2,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genresmovies')->insert([
            'genre_id' => 7,
            'movie_id' => 3,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genresmovies')->insert([
            'genre_id' => 6,
            'movie_id' => 3,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genresmovies')->insert([
            'genre_id' => 9,
            'movie_id' => 3,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genresmovies')->insert([
            'genre_id' => 1,
            'movie_id' => 3,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genresmovies')->insert([
            'genre_id' => 2,
            'movie_id' => 4,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genresmovies')->insert([
            'genre_id' => 3,
            'movie_id' => 4,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genresmovies')->insert([
            'genre_id' => 4,
            'movie_id' => 4,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genresmovies')->insert([
            'genre_id' => 11,
            'movie_id' => 4,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genresmovies')->insert([
            'genre_id' => 12,
            'movie_id' => 4,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
    }
}
