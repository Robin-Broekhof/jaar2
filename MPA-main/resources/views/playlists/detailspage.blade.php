@extends('layouts.app')
@section('content')



@if (session()->has('message'))
    <div>
        <h2 class="bg-success">
            {{ session()->get('message') }}
        </h2>
    </div>
@endif

@php $length = 0 @endphp












<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header"> Playlist Name: 
                    @if ($queue == true)
                        Temporary Playlist</h2>   
                    @else
                        {{ $playlist->name }}
                    @endif


                

                <a href="/playlists" class="btn btn-dark">Return To The Playlists Page</a>
                <div class="card-body">
                    
                @if ($queue == true)
                    <table class="table table-dark table-hover">
                        <tr>
                        <th>Song Name</th>
                        <th>Creator</th>
                        <th>Genre</th>
                        <th>Duration</th>
                        <th>Delete</th>
                        </tr>

                
                        @foreach ($classData->getSessionSongs() as $key => $item)
                            @php
                                $song = DB::table('songs')->find($classData->getSessionSongs()[$key]);
                                $genre = DB::table('genres')->find($song->genre_id);
                            @endphp
                        <tr> 
                            @php $length += strtotime($song->length) @endphp 
                            <td> {{ $song->name }} </td>
                            <td> {{ $song->creator }} </td>
                            <td> {{ $genre->name }} </td>
                            <td> {{ $song->length }} </td>
                            <td><a href="/playlists/removesongfromqueue/{{ $song->id }}" class="btn btn-danger">X</a></td>
                          </tr>


                          @endforeach
                          @if ($classData->getSessionSongs() !== null)
                            <h2> {{ date("H:i:s",$length) }} </h2>
                        @endif

                    </table>
                @else
                    
                


                    @if ($playlist->songs->isEmpty())
                        <a>No songs in playlist</a>
                    @else
                        <table class="table table-dark table-hover">
                            <tr>
                            <th>Song Name</th>
                            <th>Creator</th>
                            <th>Genre</th>
                            <th>Duration</th>
                            <th>Delete</th>
                            </tr>
                    @endif

                           
                            
                           

                        @forelse ($playlist->songs as $song)
                            <tr>
                                @php $length += strtotime($song->length) @endphp 
                              <td>{{ $song->name}}</td>
                              <td>{{ $song->creator}}</td>
                              <td>{{ $song->genre->name}}</td>
                              <td>{{ $song->length}}</td>
                              <td><a href="/playlists/removefromplaylist/{{ $playlist->id }}&{{ $song->id }}" class="btn btn-danger">X</a></td>
                            </tr>
                        @empty
                        @endforelse
                        @if (!$playlist->songs->isEmpty())
                            <h2> {{ date("H:i:s",$length) }} </h2>
                        @endif
                    </table>
                @endif

                </div>
            </div>
        </div>
    </div>
</div>



@endsection