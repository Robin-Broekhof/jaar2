<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Genre;
use App\Models\Song;
use App\Models\Playlist;
use App\Models\Playlist_song;

use App\Classes\PlaylistQueue;

class SongsController extends Controller
{
    /**
     * show which pages are accessible if not logged in
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index',
            'details'
            ]]);
    }


    /**
     * shows the index page
     */
    public function index() 
    {
        $songs = Song::all();
        $genres = Genre::all();
        return view('songs.index', compact('songs', 'genres'));
    }



    /**
     * shows the myuploads page
     */
    public function myUploads() 
    {
        $songs = Song::all();
        $genres = Genre::all();
        return view('songs.myuploads', compact('songs', 'genres'));
    }




     /**
     * shows the myuploads page
     */
    public function addToPlaylist($id) 
    {
        
        $classData = new PlaylistQueue();
        $playlists = Playlist::all();
        return view('songs.addtoplaylist', compact('playlists', 'classData'))
            ->with('song', Song::where('id', $id)->first());
    }



    /**
     * add song into playlist function
     *
     * @param Request $request
     */
    public function addSongIntoPlaylist(Request $request)
    {
        $sessionData = new PlaylistQueue();
        if ($request->input('playlist_id') == 'createTempQueue') {
            $sessionData->putSessionName('Temporary playlist');
            $sessionData->putSessionSongs($request);
            $sessionData->pushSessionSongs($request);
        } 
        elseif ($request->input('playlist_id') == 'addToTempQueue' ) {
            $sessionData->pushSessionSongs($request);
        }
            else {
            $request->validate([
                'song_id' => 'required',
                'playlist_id' => 'required'
            ]);
            playlist_song::create([
                'song_id' => $request->input('song_id'),
                'playlist_id' => $request->input('playlist_id')
            ]);
        }
        return redirect('/songs')->with('message', 'song added to playlist');
    }

    

    /**
     * shows detail page of a single playlist
     *
     * @param [int] $playlist_id
     */
    public function details($id)    // !!** naar compact veranderen
    {
        return view('songs.details')
            ->with('song', Song::where('id', $id)->first());
    }
    

    /**
     * shows the create page
     *
     */
    public function create() 
    {
        $songs = Song::all();
        $genres = Genre::all();
        return view('songs.create', compact('songs', 'genres'));
    }



    /**
     * adds the data requested from the create page into the database
     *
     * @param Request $request
     */
    public function addToDB(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'creator' => 'required',
            'genre' => 'required',
            'length' => 'required'
        ]);

        Song::create([
            'name' => $request->input('name'),
            'creator' => $request->input('creator'),
            'genre_id' => $request->input('genre_id'),
            'length' => $request->input('length'),
            'user_id' => auth()->user()->id
        ]);
        return redirect('/songs/myuploads')->with('message', 'song added');
    }




    /**
     * shows the form page of the update functionality
     *
     * @param [int] $song_id
     */
    public function update($id)
    {
        $genres = Genre::all();
        return view('songs.update', compact('genres'))
            ->with('song', Song::where('id', $id)->first());
    }



    /**
     * get the data from the update form request and updates the database
     *
     * @param Request $request
     * @param [int] $playlist_id
     */
    public function updateIntoDB(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'creator' => 'required',
            'genre_id' => 'required',
            'length' => 'required'
        ]);
        Song::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'creator' => $request->input('creator'),
                'genre_id' => $request->input('genre_id'),
                'length' => $request->input('length')
                //'user_id' => auth()->user()->id
            ]);
            return redirect('/songs/myuploads')->with('message', 'song successfully updated');
    }

    

    /**
     * deletes playlist entry
     *
     * @param [int] $playlist_id
     */
    public function delete($id)
    {
        $song = Song::where('id', $id);
        $song->delete();
        return redirect('/songs/myuploads');
    }



}
