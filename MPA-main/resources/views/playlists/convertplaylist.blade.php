@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">Convert the queue to a permant playlist</h2>
                <h2 class="card-header">Songs in queue: {{ $classData->countSongs() }} </h2>
                <div class="card-body">
                    <form method="POST" action="{{ url('playlists/createPlaylistFromQueue')}} ">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Playlist name</label>
                            <div class="col-md-6">
                                <input id="name" name="name" type="text" class="form-control" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="creator" class="col-md-4 col-form-label text-md-right">Playlist description</label>
                            <div class="col-md-6">
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control" autofocus></textarea>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">CREATE</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    

@endsection