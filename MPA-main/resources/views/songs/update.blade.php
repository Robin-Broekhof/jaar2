@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">Update a song</h2>
                <div class="card-body">
                    <form method="POST" action="{{ url('songs/updateIntoDB',$song->id)}} ">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Song name</label>
                            <div class="col-md-6">
                                <input id="name" name="name" type="text" class="form-control" autofocus value="{{ $song->name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="creator" class="col-md-4 col-form-label text-md-right">Song creator</label>
                            <div class="col-md-6">
                                <input id="creator" name="creator" type="text" class="form-control" autofocus value="{{ $song->creator }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="genre_id" class="col-md-4 col-form-label text-md-right">Song genre</label>
                            <div class="col-md-6"> 
                                <select name='genre_id' class="form-select form-select-lg" required>

                                    <option selected disabled value="">Select a genre...</option>

                                    @foreach ($genres as $genre)

                                        <option name="genre_id" class="form-control" value="{{ $genre->id}}" {{$genre->id == $song->genre_id  ? 'selected' : ''}} autofocus>{{ $genre->name}}</option>
                                    
                                    @endforeach

                                </select>
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="length" class="col-md-4 col-form-label text-md-right">Song duration</label>
                            <div class="col-md-6">
                                <input value="{{ $song->length }}" name="length" id="length" class="form-cntrol" type="time" step="1" autofocus>
                        

                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">UPDATE</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection