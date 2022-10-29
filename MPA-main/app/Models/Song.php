<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Song extends Model
{

    protected $fillable = ['name', 'creator', 'genre_id', 'user_id', 'length'];
    protected $table = 'songs';
    

    /**
     * a song is linked to a single user
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * a song is linked to a single genre
     */
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }


    /**
     * a song has be part of many playlists
     *
     */
    public function playlists()
    {
        return $this->belongsToMany(Playlist::class);
    }

}
