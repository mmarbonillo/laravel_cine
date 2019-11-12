<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $now = Carbon\Carbon::now();
        $date = $now->toDateTimeString();
        //User::truncate(); //Vacía la tabla antes de rellenarla
        DB::table('users')->insert([
            'username' => 'mmarbonillo',
            'name' => 'Maria del Mar',
            'surname' => 'Fernández',
            'password' => Hash::make('mmarbonillo'),
            'type' => 0,
            'email' => 'maria@gmail.com',
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('users')->insert([
            'username' => 'callejas',
            'name' => 'Maria',
            'surname' => 'Callejas',
            'password' => Hash::make('callejas'),
            'type' => 1,
            'email' => 'callejas@gmail.com',
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('users')->insert([
            'username' => 'malu',
            'name' => 'Mariluz',
            'surname' => 'Baeza',
            'password' => Hash::make('malu'),
            'type' => 0,
            'email' => 'malu@gmail.com',
            'created_at' => $date,
            'updated_at' => $date,
        ]);
    }
}
