<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\PlaylistsController;
use App\Http\Controllers\UsersController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//main page 
Route::get('/', [PagesController::class, 'index']);

//genres page
Route::get('/genres', [GenresController::class, 'index']);
Route::get('/genres/showbygenre/{genre_id}', [GenresController::class, 'showByGenre']);

//songs page
Route::get('/songs', [SongsController::class, 'index']);
Route::get('/songs/myuploads', [SongsController::class, 'myUploads']);
Route::get('/songs/addtoplaylist/{id}', [SongsController::class, 'addToPlaylist']);
Route::post('/songs/addSongIntoPlaylist/{id}', [SongsController::class, 'addSongIntoPlaylist']);
Route::get('/songs/details/{id}', [SongsController::class, 'details']); 
Route::get('/songs/create', [SongsController::class, 'create']);
Route::post('/songs/addToDB', [SongsController::class, 'addToDB']);
Route::get('/songs/update/{id}', [SongsController::class, 'update']);
Route::put('/songs/updateIntoDB/{id}', [SongsController::class, 'updateIntoDB']);
Route::get('/songs/delete/{id}', [SongsController::class, 'delete']);



//playlists page
Route::get('/playlists', [PlaylistsController::class, 'index']);
Route::get('/playlists/details/{id}', [PlaylistsController::class, 'details']);
Route::get('/playlists/create', [PlaylistsController::class, 'create']);
Route::post('/playlists/addToDB', [PlaylistsController::class, 'addToDB']);
Route::get('/playlists/update/{id}', [PlaylistsController::class, 'update']);
Route::put('/playlists/updateIntoDB/{id}', [PlaylistsController::class, 'updateIntoDB']);
Route::get('/playlists/delete/{id}', [PlaylistsController::class, 'delete']);
Route::get('/playlists/removefromplaylist/{playlist_id}&{song_id}', [PlaylistsController::class, 'removeFromPlaylist']);
Route::get('/playlists/convertplaylist', [PlaylistsController::class, 'convertPlaylist']);
Route::post('/playlists/createPlaylistFromQueue', [PlaylistsController::class, 'createPlaylistFromQueue']);
Route::get('/playlists/removesongfromqueue/{song_id}', [PlaylistsController::class, 'removeSongFromQueue']);
Route::get('/playlists/removequeue/', [PlaylistsController::class, 'removeQueue']);



Route::get('/fs', [PlaylistsController::class, 'fs']);
Route::get('/dds', [PlaylistsController::class, 'ddsession']);







//login page
Auth::routes();
Route::get('/login', [PagesController::class, 'login'])->name('login');

//resister page
Auth::routes();
Route::get('/register', [PagesController::class, 'register'])->name('register');

//when already loggin in go to the home page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//logout function
Auth::routes();
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
