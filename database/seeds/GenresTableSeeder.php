<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
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
        DB::table('genres')->insert([ //1
            'genre' => 'comedy',
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genres')->insert([ //2
            'genre' => 'drama',
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genres')->insert([ //3
            'genre' => 'terror',
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genres')->insert([ //4
            'genre' => 'thriller',
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genres')->insert([ //5
            'genre' => 'science fiction',
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genres')->insert([ //6
            'genre' => 'adventure',
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genres')->insert([ //7
            'genre' => 'action',
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genres')->insert([ //8
            'genre' => 'black comedy',
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genres')->insert([ //9
            'genre' => 'fantasy',
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genres')->insert([ //10
            'genre' => 'pirates',
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genres')->insert([ //11
            'genre' => 'musical',
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('genres')->insert([ //12
            'genre' => 'mistery',
            'created_at' => $date,
            'updated_at' => $date,
        ]);
    }
}
