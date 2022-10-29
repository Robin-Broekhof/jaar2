@extends('layouts.app')
@section('content')



@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">Create a song</h2>
                <div class="card-body">
                    <form method="POST" action="{{ url('songs/addToDB')}} ">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Song name</label>
                            <div class="col-md-6">
                                <input id="name" name="name" type="text" class="form-control" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="creator" class="col-md-4 col-form-label text-md-right">Song creator</label>
                            <div class="col-md-6">
                                <input id="creator" name="creator" type="text" class="form-control" autofocus>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="genre_id" class="col-md-4 col-form-label text-md-right">Song genre</label>
                            <div class="col-md-6"> 
                                <select name='genre_id' class="form-select form-select-lg" required>
                                    <option selected disabled value="">Select a genre...</option>
                                    @foreach ($genres as $genre)
                                        <option name="genre_id" class="form-control" value="{{ $genre->id}} " autofocus>{{ $genre->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="length" class="col-md-4 col-form-label text-md-right">Song duration (hh:mm:ss)</label>
                            <div class="col-md-6">
                                <input value="00:00:00" name="length" id="length" class="form-control" type="time" step="1" autofocus>
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