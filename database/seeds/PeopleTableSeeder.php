<?php

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->insert([
            'name' => 'Johnny Deep',
            'photo' => 'johnnydeep.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Johnny_Depp',
        ]);
        DB::table('people')->insert([
            'name' => 'Helen Bonham Carter',
            'photo' => 'helenabonham.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Helena_Bonham_Carter',
        ]);
        DB::table('people')->insert([
            'name' => 'Tim Burton',
            'photo' => 'timburton.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Tim_Burton',
        ]);
        DB::table('people')->insert([
            'name' => 'David Fincher',
            'photo' => 'davidfincher.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/David_Fincher',
        ]);
        DB::table('people')->insert([
            'name' => 'Gore Verbinski',
            'photo' => 'goreverbinski.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Gore_Verbinski',
        ]);
        DB::table('people')->insert([
            'name' => 'Espen Sandberg',
            'photo' => 'espensandberg.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Espen_Sandberg',
        ]);
        DB::table('people')->insert([
            'name' => 'Joachim Rønning',
            'photo' => 'joachimronning.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Joachim_Rønning',
        ]);
        DB::table('people')->insert([
            'name' => 'Rob Marshall',
            'photo' => 'robmarshall.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Rob_Marshall',
        ]);
        
    }
}
