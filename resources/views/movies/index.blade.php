@extends('layouts.main')

@section('content')
    <div class="bg-gray-800 py-12 px-20">
        <h2 class=" font-bold text-xl text-orange-500 uppercase">Popular Movies</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-10 mt-3">
            @foreach($popularMovies as $movie)
                <x-movie-card :movie="$movie"/>
            @endforeach
        </div>
        <h2 class=" font-bold text-xl text-orange-500 uppercase mt-10">Now Playing</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-10 mt-3">
            @foreach($nowPlayingMovies as $movie)
                <x-movie-card :movie="$movie"/>
            @endforeach
        </div>
    </div>
@endsection
