<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Playlist extends Model
{
    use HasFactory;

    protected $fillable = ['id','name', 'description', 'user_id'];
    protected $table = 'playlists';


    /**
     * a playlist can have many songs
     *
     */
    public function songs()
    {
        return $this->belongsToMany(Song::class);
    }
}
