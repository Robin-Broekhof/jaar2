@extends('layouts.app')
@section('content')



    <h1 class="large-title">All Songs</h1>
    @if (auth::check())
        <a href="{{ url('songs/create')}} " class="btn btn-dark d-block">ADD SONG</a>
    @endif
    

    
    @foreach ($songs as $song)
        @if (auth()->id() == $song->user_id)
            <div class="card song-card">
                <div class="card-body">
                    <h5 class="card-title">{{ $song->name}}</h5>
                    <a class="card-text"> {{ $song->creator}} </a>
                    <a class="card-text"> {{ $song->length}} </a>


                    <br>
                    <a class="card-text">genre: {{ $song->genre->name }} </a><br>



                
                    
                    <a href="/songs/details/{{ $song->id}}" class="btn btn-dark text-white">DETAILS</a>
                        <a href="/songs/delete/{{ $song->id }}" class="btn btn-danger">DELETE</a>
                        <a href="/songs/update/{{ $song->id }}" class="btn btn-warning">UPDATE</a>
                        <a href="/songs/addtoplaylist/{{ $song->id }}" class="btn btn-info">Add to playlist</a>
                </div>
            </div>
        @endif
    @endforeach


    
@endsection
