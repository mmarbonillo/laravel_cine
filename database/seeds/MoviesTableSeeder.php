<?php

use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
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
        DB::table('movies')->insert([
            'title' => 'El Club De La Lucha',
            'year' => 1997,
            'duration' => 139,
            'rating' => 8,
            'cover' => 'elclubdelalucha.jpg',
            'filepath' => '/movies',
            'filename' => 'name',
            'external_url' => 'https://es.wikipedia.org/wiki/Fight_Club',
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        DB::table('movies')->insert([
            'title' => 'Piratas Del Caribe: La Maldición De La Perla Negra',
            'year' => 2003,
            'duration' => 143,
            'rating' => 7,
            'cover' => 'piratasdelcaribe1.jpg',
            'filepath' => '/movies',
            'filename' => 'name2',
            'external_url' => 'https://es.wikipedia.org/wiki/Pirates_of_the_Caribbean:_The_Curse_of_the_Black_Pearl',
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        DB::table('movies')->insert([
            'title' => 'Piratas Del Caribe: El Cofre Del Hombre Muerto',
            'year' => 2006,
            'duration' => 151,
            'rating' => 6,
            'cover' => 'piratasdelcaribe2.jpg',
            'filepath' => '/movies',
            'filename' => 'name3',
            'external_url' => 'https://es.wikipedia.org/wiki/Pirates_of_the_Caribbean:_Dead_Man%27s_Chest',
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        DB::table('movies')->insert([
            'title' => 'Sweeney Todd, el barbero demoníaco de la calle Fleet',
            'year' => 2007,
            'duration' => 117,
            'rating' => 7,
            'cover' => 'sweeneytood.jpg',
            'filepath' => '/movies',
            'filename' => 'name4',
            'external_url' => 'https://es.wikipedia.org/wiki/Sweeney_Todd:_The_Demon_Barber_of_Fleet_Street',
            'created_at' => $date,
            'updated_at' => $date,
        ]);
    }
}
