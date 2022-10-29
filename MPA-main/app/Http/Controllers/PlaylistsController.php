<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Playlist;
use App\Models\Song;
use App\Models\Genre;
use App\Models\Playlist_song;

use App\Classes\PlaylistQueue;

class PlaylistsController extends Controller
{

    /**
     * show which pages are accessible if not logged in
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => [

            ]]);
    }

    /**
     * shows the index page
     */
    public function index() 
    {
        $classData = new PlaylistQueue();
        $playlists = Playlist::all();
        return view('playlists.index', compact('playlists', 'classData'));
    }


    /**
     * shows detail page of a single playlist
     *
     * @param [int] $playlist_id
     */
    public function details($id)    // !!** naar compact veranderen
    {
        if ($id == 0) {
            
            $queue = true;
            $classData = new PlaylistQueue();
            $songs = Song::all();
            return view('playlists.detailspage', compact('songs', 'classData'))
                ->with('queue', $queue);
        }
        else{
            $queue = false;
            return view('playlists.detailspage')
                ->with('playlist', Playlist::where('id', $id)->first())->with('queue', $queue);
        }
    }

    /**
     * shows page for form to create permant playlist from session queue
     */
    public function convertPlaylist()
    {
        $classData = new PlaylistQueue();
        return view('playlists.convertplaylist', compact('classData'));
    }




    /**
     * shows the create page
     *
     */
    public function create() 
    {
        $playlists = Playlist::all();
        return view('playlists.create', compact('playlists'));
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
            'description' => 'required'
        ]);
        Playlist::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'user_id' => auth()->user()->id
        ]);
        return redirect('/playlists')->with('message', 'playlist created'); 
    }


    /**
     * creates permant playlist from session queue, and creates records in pivot table
     * 
     * @param Request $request
     */
    public function createPlaylistFromQueue(Request $request)
    {
        
        $classData = new PlaylistQueue();
        
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $playlist = Playlist::create([
            'id' => null,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'user_id' => auth()->user()->id
        ]);


        $playlist->songs()->attach($classData->getSessionSongs());


    
        $classData->deleteSession();
        return redirect('/playlists')->with('message', 'Queue has been made into playlist');
    }




    /**
     * shows the form page of the update functionality
     *
     * @param [int] $id
     */
    public function update($id)
    {
        return view('playlists.update')
            ->with('playlist', Playlist::where('id', $id)->first());
    }




    /**
     * get the data from the update form request and updates the database
     *
     * @param Request $request
     * @param [int] $id
     */
    public function updateIntoDB(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        Playlist::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'description' => $request->input('description')
            ]);
            return redirect('/playlists')->with('message', 'playlist successfully updated');
    }

    


    
    /**
     * deletes playlist entry
     *
     * @param [int] $id
     */
    public function delete($id)
    {
        $playlist = Playlist::where('id', $id);
        $playlist->delete();

        $playlist_song = Playlist_song::where('playlist_id', $id);
        $playlist_song->delete();

        return redirect('/playlists')->with('message', 'playlist successfully deleted');
    }


    /**
     * removes a song from playlist with both foreign keys
     *
     * @param [int] $playlist_id
     * @param [int] $song_id
     */
    public function removeFromPlaylist($playlist_id, $song_id)
    {
        $playlist_song = Playlist_song::where('playlist_id', $playlist_id)
        ->where('song_id', $song_id);
        $playlist_song->delete();
        return redirect('/playlists/details/'.$playlist_id)->with('message', 'song successfully deleted');
    }


    /**
     * removes a song from the session queue
     *
     * @param Request $request
     * @param [type] $song_id
     */
    public function removeSongFromQueue(Request $request, $song_id)
    {
    
        $classData = new PlaylistQueue();
        $classData->removeSongFromQueue($request, $song_id);


        return redirect('/playlists/details/0')->with('message', 'song successfully deleted');
    }



    /**
     * deletes the queue by forgetting the session for the queue
     *
     */
    public function removeQueue()
    {
        $classData = new PlaylistQueue();
        $classData->deleteSession();

        return redirect('/playlists')->with('message', 'queue has been removed');
    }








}
