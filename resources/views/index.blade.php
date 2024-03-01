@extends('layouts.main')

@section('content')
    <div class="bg-gray-800 py-12 px-20">
        <h2 class=" font-bold text-xl text-orange-500 uppercase">Popular Movies</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-10 mt-3">
            @foreach($popularMovies as $movie)
                @php
                    $genresArray = [];
                @endphp
                @foreach($movie['genre_ids'] as $genre)
                    @php
                        $genresArray[] = $genres->get($genre);
                    @endphp
                @endforeach
                <x-movie-card :movie="$movie" :genres="$genresArray" />
            @endforeach
        </div>
        <h2 class=" font-bold text-xl text-orange-500 uppercase mt-10">Now Playing</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-10 mt-3">
            @foreach($nowPlayingMovies as $movie)
                @php
                    $genresArray = [];
                @endphp
                @foreach($movie['genre_ids'] as $genre)
                    @php
                        $genresArray[] = $genres->get($genre);
                    @endphp
                @endforeach
                <x-movie-card :movie="$movie" :genres="$genresArray" />
            @endforeach
        </div>
    </div>
@endsection
