<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//add to seed pages
use Illuminate\Support\Facades\DB;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('songs')->insert(
            [
                'id' => 0,
                'genre_id' => 1,
                'user_id' => 2,
                'creator' => 'Ed Sheeran',
                'name' => 'shape of you',
                'length' => '00:03:01'
            ]);
        DB::table('songs')->insert(
            [
                'id' => 0,
                'genre_id' => 1,
                'user_id' => 2,
                'creator' => 'Ed Sheeran',
                'name' => 'bad habits',
                'length' => '00:04:02'
            ]);  
            


                
            DB::table('songs')->insert(
                [
                    'id' => 0,
                    'genre_id' => 2,
                    'user_id' => 1,
                    'creator' => 'Miles Davis',
                    'name' => 'mood indigo',
                    'length' => '00:03:32'
                ]);
            DB::table('songs')->insert(
                [
                    'id' => 0,
                    'genre_id' => 2,
                    'user_id' => 1,
                    'creator' => 'Dizzy Gillespie',
                    'name' => 'A night in tunisia',
                    'length' => '00:04:17'
                ]);  
                
                


            DB::table('songs')->insert(
                [
                    'id' => 0,
                    'genre_id' => 3,
                    'user_id' => 2,
                    'creator' => 'Deep Puriple',
                    'name' => 'Smoke on the water',
                    'length' => '00:04:54'
                ]);
            DB::table('songs')->insert(
                [
                    'id' => 0,
                    'genre_id' => 3,
                    'user_id' => 2,
                    'creator' => 'AC/DC',
                    'name' => 'You shook me all night long',
                    'length' => '00:04:32'
                ]);   
                




            DB::table('songs')->insert(
                [
                    'id' => 0,
                    'genre_id' => 4,
                    'user_id' => 1,
                    'creator' => 'Bach',
                    'name' => 'Toccata and fugue d-flat',
                    'length' => '00:14:02'
                ]);
            DB::table('songs')->insert(
                [
                    'id' => 0,
                    'genre_id' => 4,
                    'user_id' => 1,
                    'creator' => 'Bach',
                    'name' => 'Fugue G-minor',
                    'length' => '00:11:02'
                ]);     






            DB::table('songs')->insert(
                [
                    'id' => 0,
                    'genre_id' => 5,
                    'user_id' => 2,
                    'creator' => 'Rihanna',
                    'name' => 'We found love',
                    'length' => '00:03:43'
                ]);
            DB::table('songs')->insert(
                [
                    'id' => 0,
                    'genre_id' => 5,
                    'user_id' => 2,
                    'creator' => 'Spice girls',
                    'name' => 'Wannabe',
                    'length' => '00:03:15'
                ]);  
        
                
    }
}
