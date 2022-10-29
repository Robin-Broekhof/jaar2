@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">Song Details</h2>
                <a href="{{ url()->previous(); }}" class="btn btn-dark">Return To The Song Page</a>
                <div class="card-body text-center ">
                    <h3> Song Name:      <span class="font-weight-bold">{{ $song->name }}    </span> </h3>
                    <h3> Song Creator:   <span class="font-weight-bold">{{ $song->creator }} </span> </h3>
                    <h3> Song Genre:   <span class="font-weight-bold">{{ $song->genre->name }} </span> </h3>
                    <h3> Song Duration:  <span class="font-weight-bold">{{ $song->length }}  </span> </h3>
                    <h3> Song Uploader:  <span class="font-weight-bold">{{ $song->user->name }}  </span> </h3>
                </div>
            </div>
        </div>
    </div>
</div>
    













@endsection