@extends('layouts.app')
@section('content')




<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">Add "{{ $song->name }}" by "{{ $song->creator }}" to playlist</h2>
                <div class="card-body">
                    <form method="POST" action="{{ url('songs/addSongIntoPlaylist', $song->id)}} ">
                        @csrf
                        

                                <input hidden name="song_id" value="{{ $song->id }}" >

                        <div class="form-group row">
                            <label for="playlist_id" class="col-md-4 col-form-label text-md-right">Select a playlist</label>
                            <div class="col-md-6"> 
                                <select name='playlist_id' class="form-select form-select-lg" required>
                                    <option selected disabled value="">Playlist...</option>
                                    @foreach ($playlists as $playlist)
                                        @if (auth()->id() == $playlist->user_id)
                                            <option name="playlist_id" class="form-control" value="{{ $playlist->id}} " autofocus>{{ $playlist->name}}</option>  
                                        @endif
                                    @endforeach


                                    @if ($classData->hasName())
                                        <option name="addToTempQueue" id="addToTempQueue" value="addToTempQueue" class="form control" autofocus>Add to Temporary Queue</option>                                          
                                    @else
                                        <option name="createTempQueue" id="createTempQueue" value="createTempQueue" class="form control" autofocus>Create Temporary queue and add to queue</option>  
                                    @endif





                                </select>
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