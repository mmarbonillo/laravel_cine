@extends('layouts.master')

@section('content')
    
    <video id="video" width="1100" height="600" controls>
            <source src="{{ url('videos/movies/loca.mp4') }}" type="video/mp4">
        </video>
@endsection