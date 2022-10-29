@extends('layouts.app')
@section('content')



    <h1 class="large-title">All Songs</h1>
    
    @foreach ($songs as $song)
        <div class="card song-card">
            <div class="card-body">
                <h4 class="card-title">{{ $song->name}}</h4>
                <a class="card-text"> {{ $song->creator}} </a><br>
                <a class="card-text"> {{ $song->length}} </a>



                <br>
                <a class="card-text">genre: {{ $song->genre->name }} </a>
                <br>
                <a class="card-text">uploaded by: {{ $song->user->name }} </a>
                <br>



               
                
                <a href="/songs/details/{{ $song->id}}" class="btn btn-dark text-white">DETAILS</a>
                <a href="/songs/addtoplaylist/{{ $song->id }}" class="btn btn-info">Add to playlist</a>
            </div>
        </div>
    @endforeach


    
@endsection
