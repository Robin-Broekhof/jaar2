<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;


    /**
     * A single genre can have many songs
     *
     */
    public function genre()
    {
        return $this->hasMany(Song::class);
    }
    
}
