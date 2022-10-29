<?php

namespace App\Classes;
use Illuminate\Http\Request;
use Session;


class PlaylistQueue
{
    private $name;
    private $song_id;



public function __construct()
    {
        $this->name = Session::get('name');
        $this->song_id = Session::get('song_id');
    }


public function getSessionName()
{
    return($this->name);
}


public function putSessionName($name)
{
    Session::put('name', $name);
}

public function putSessionSongs(Request $request)
{
    Session::put('songs_id', [$request->input('song_id')]);
}
public function pushSessionSongs(Request $request)
{
    Session::push('song_id', $request->input('song_id'));
}

public function hasName()
{
    return(Session::has('name'));
}

public function countSongs()
{
    return(count(Session::get('song_id')));
}

public function getSessionSongs()
{
    return($this->song_id);
}

public function deleteSession()
{
    Session::forget('name');
    Session::forget('song_id');
}

public function addSessionSong(Request $request)
{
    if(Session::has('name')){
        Session::push('song_id', $request->input('song_id'));
    }
    else{
        Session::put('name', 'temporary playlist');
        Session::put('song_id', [$request->input('song_id')]);
    }
}
public function removeSongFromQueue(Request $request, $song_id)
{
    $songs = session()->pull('song_id', []); // Second argument is a default value
    if(($key = array_search($song_id, $songs)) !== false) {
        unset($songs[$key]);
    }
    session()->put('song_id', $songs);
}


}

?>