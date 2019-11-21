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
        DB::table('people')->insert([
            'name' => 'Brad Pitt',
            'photo' => 'bradpitt.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Brad_Pitt',
        ]);
        DB::table('people')->insert([
            'name' => 'Edward Norton',
            'photo' => 'edwardnorton.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Edward_Norton',
        ]);
        DB::table('people')->insert([
            'name' => 'Jared Leto',
            'photo' => 'jaredleto.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Jared_Leto',
        ]);
        DB::table('people')->insert([
            'name' => 'Orlando Bloom',
            'photo' => 'orlandobloom.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Orlando_Bloom',
        ]);
        DB::table('people')->insert([
            'name' => 'Geoffrey Rush',
            'photo' => 'geoffreyrush.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Geoffrey_Rush',
        ]);
        DB::table('people')->insert([
            'name' => 'Keira Knightley',
            'photo' => 'keiraknightley.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Keira_Knightley',
        ]);
        DB::table('people')->insert([
            'name' => 'Kevin McNally',
            'photo' => 'kevinmcnally.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Kevin_McNally',
        ]);
        DB::table('people')->insert([
            'name' => 'Bill Nighy',
            'photo' => 'billnighy.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Bill_Nighy',
        ]);
        DB::table('people')->insert([
            'name' => 'Jack Davenport',
            'photo' => 'jackdavenport.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Jack_Davenport',
        ]);
        DB::table('people')->insert([
            'name' => 'Stellan Skarsgård',
            'photo' => 'stellanskarsgard.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Stellan_Skarsgård',
        ]);
        DB::table('people')->insert([
            'name' => 'Jonathan Pryce',
            'photo' => 'jonathanpryce.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Jonathan_Pryce',
        ]);
        DB::table('people')->insert([
            'name' => 'Alan Rickman',
            'photo' => 'alanrickman.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Alan_Rickman',
        ]);
        DB::table('people')->insert([
            'name' => 'Kristen Bell',
            'photo' => 'kristenbell.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Kristen_Bell',
        ]);
        DB::table('people')->insert([
            'name' => 'Jonathan Groff',
            'photo' => 'jonathangroff.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Jonathan_Groff',
        ]);
        DB::table('people')->insert([
            'name' => 'Idina Menzel',
            'photo' => 'idinamenzel.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Idina_Menzel',
        ]);
        DB::table('people')->insert([
            'name' => 'Josh Gad',
            'photo' => 'joshgad.jpg',
            'external_url' => 'https://es.wikipedia.org/wiki/Josh_Gad',
        ]);
    }
}
