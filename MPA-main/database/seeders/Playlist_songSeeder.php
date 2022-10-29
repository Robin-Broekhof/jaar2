<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//add to seed pages
use Illuminate\Support\Facades\DB;

class Playlist_songSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('playlist_song')->insert(
            [
                'playlist_id' => 1,
                'song_id' => 1,
            ]);
        DB::table('playlist_song')->insert(
            [
                'playlist_id' => 1,
                'song_id' => 2,
            ]);

        DB::table('playlist_song')->insert(
            [
                'playlist_id' => 1,
                'song_id' => 4,
            ]);

        DB::table('playlist_song')->insert(
            [
                'playlist_id' => 1,
                'song_id' => 7,
            ]);
    }
}
