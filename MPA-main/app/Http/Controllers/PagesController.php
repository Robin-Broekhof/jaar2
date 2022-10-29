<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Song;


class PagesController extends Controller
{
    /**
     * shows the index page
     */
    public function index() 
    {
        $genres = Genre::all();
        $songs = Song::all();
        return view('index', compact('genres', 'songs'));
    }




    /**
     * shows the login page
     */
    public function login() {
        return view('auth/login');
    }


    
    /**
     * shows the register page
     */
    public function register() {
        return view('auth/register');
    }



}
