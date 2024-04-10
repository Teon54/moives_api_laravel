@extends('layouts.main')

@section('content')
    <div class="bg-gray-800 py-12 px-20">
        <h2 class=" font-bold text-xl text-orange-500 uppercase">Popular Shows</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-10 mt-3">
            @foreach($popularTv as $tvShow)
                <x-tv-card :tv-show="$tvShow"/>
            @endforeach
        </div>
        <h2 class=" font-bold text-xl text-orange-500 uppercase mt-10">Top Rated Shows</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-10 mt-3">
            @foreach($topRatedTv as $tvShow)
                <x-tv-card :tv-show="$tvShow"/>
            @endforeach
        </div>
    </div>
@endsection
