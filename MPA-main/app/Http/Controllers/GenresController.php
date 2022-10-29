<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Song;

class GenresController extends Controller
{
    /**
     * show which pages are accessible if not logged in
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index',
            'showbygenre'
            ]]);
    }


    /**
     * shows the index page
     */
    public function index() 
    {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }



    
    /**
     * display all songs by a single genre
     *
     * @param [int] $genre_id
     */
    public function showByGenre($id)    // !!** naar compact veranderen
    {
        $songs = Song::all();
        return view('genres.showbygenre', compact('songs'))
            ->with('genre', Genre::where('id', $id)->first());
    }
    

}