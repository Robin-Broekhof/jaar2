<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//add to seed pages
use Illuminate\Support\Facades\DB;



class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert(
            [
                'id' => 1,
                'name' => 'pop',
                'description' => 'pop muziek'
            ]);
        DB::table('genres')->insert(
            [
                'id' => 2,
                'name' => 'jazz',
                'description' => 'jazz muziek'
            ]);
        DB::table('genres')->insert(
            [
                'id' => 3,
                'name' => 'rock',
                'description' => 'rock muziek'
            ]);
        DB::table('genres')->insert(
            [
                'id' => 4,
                'name' => 'klassiek',
                'description' => 'klassieke muziek'
            ]);
        DB::table('genres')->insert(
            [
                'id' => 5,
                'name' => 'dance',
                'description' => 'dance muziek'
            ]);
    }
}
