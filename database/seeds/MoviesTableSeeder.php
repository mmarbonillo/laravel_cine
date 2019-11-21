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
        DB::table('movies')->insert([
            'title' => 'Frozen',
            'year' => 2013,
            'duration' => 102,
            'rating' => 10,
            'cover' => 'frozen.jpg',
            'filepath' => '/movies',
            'filename' => 'name5',
            'external_url' => 'https://es.wikipedia.org/wiki/Frozen_(película_de_2013)',
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        DB::table('movies')->insert([
            'title' => 'El rey León',
            'year' => 1994,
            'duration' => 88,
            'rating' => 10,
            'cover' => 'elreyleon.jpg',
            'filepath' => '/movies',
            'filename' => 'name6',
            'external_url' => 'https://es.wikipedia.org/wiki/El_rey_león',
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        DB::table('movies')->insert([
            'title' => 'Mejor Solteras',
            'year' => 2016,
            'duration' => 110,
            'rating' => 9,
            'cover' => 'mejorsolteras.jpg',
            'filepath' => '/movies',
            'filename' => 'name7',
            'external_url' => 'https://es.wikipedia.org/wiki/How_to_Be_Single',
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        DB::table('movies')->insert([
            'title' => 'La Vida de Brian',
            'year' => 1979,
            'duration' => 94,
            'rating' => 10,
            'cover' => 'lavidadebrian.jpg',
            'filepath' => '/movies',
            'filename' => 'name8',
            'external_url' => 'https://es.wikipedia.org/wiki/La_vida_de_Brian',
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        DB::table('movies')->insert([
            'title' => 'Pesadillas Antes de Navidad',
            'year' => 1993,
            'duration' => 73,
            'rating' => 8,
            'cover' => 'pesadillaantesdenavidad.jpg',
            'filepath' => '/movies',
            'filename' => 'name9',
            'external_url' => 'https://es.wikipedia.org/wiki/The_Nightmare_Before_Christmas',
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        DB::table('movies')->insert([
            'title' => 'V de Vendetta',
            'year' => 2006,
            'duration' => 132,
            'rating' => 9,
            'cover' => 'vdevendetta.jpg',
            'filepath' => '/movies',
            'filename' => 'name10',
            'external_url' => 'https://es.wikipedia.org/wiki/V_for_Vendetta_(película)',
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        DB::table('movies')->insert([
            'title' => 'Grease',
            'year' => 1978,
            'duration' => 110,
            'rating' => 8,
            'cover' => 'grease.jpg',
            'filepath' => '/movies',
            'filename' => 'name11',
            'external_url' => 'https://es.wikipedia.org/wiki/Grease',
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        DB::table('movies')->insert([
            'title' => 'Aladdín',
            'year' => 1992,
            'duration' => 90,
            'rating' => 8,
            'cover' => 'aladdin.jpg',
            'filepath' => '/movies',
            'filename' => 'name12',
            'external_url' => 'https://es.wikipedia.org/wiki/Aladdín',
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        
    }
}
