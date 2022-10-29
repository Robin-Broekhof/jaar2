<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//add to seed pages
use Illuminate\Support\Facades\DB;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('playlists')->insert(
            [
                'id' => 1,
                'user_id' => 3,
                'name' => 'dance nummers',
                'description' => 'lijst met populaire dance nummers'
            ]);
        DB::table('playlists')->insert(
            [
                'id' => 2,
                'user_id' => 3,
                'name' => 'favorieten nummers',
                'description' => 'lijst met favorieten nummers'
            ]);
    }
}
