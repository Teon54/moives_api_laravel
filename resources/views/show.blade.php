@extends('layouts.main')

@section('content')
    <div class="flex flex-col md:flex-row mb-4 p-4 md:p-10 space-y-5 md:space-x-14">
        <div>
            <img class="max-w-full md:m-0 md:max-w-96 rounded-md" src="https://image.tmdb.org/t/p/original{{ $movie['poster_path']  }}" alt="Movie Poster">
        </div>
        <div>
            <h2 class="title text-gray-100 font-bold text-3xl mb-3">{{ $movie['original_title'] }}</h2>
            <div class="flex items-center text-gray-300 space-x-1 mb-10">
                <x-star-svg with="16px" height="16px"/>
                <span>{{ round($movie['vote_average'] * 10) }}%</span>
                <span>|</span>
                <span>{{ \Carbon\Carbon::make($movie['release_date'])->toFormattedDateString() }}</span>
                <span>|</span>
                @foreach($movie['genres'] as $genre)
                    <span>{{ $genre['name'] }}</span> @if(!$loop->last) , @else @endif
                @endforeach
            </div>
            <p class="text-gray-300 max-w-3xl mb-10">
                {{ $movie['overview'] }}
            </p>
            <div class="mb-10">
                <h5 class="font-bold text-gray-100 mb-3">
                    Featured Crew
                </h5>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach($movie['credits']['crew'] as $crew)
                        <div>
                            <h6 class="font-semibold text-white">
                                {{ $crew['job'] }}
                            </h6>
                            <span class="text-gray-300">
                                {{ $crew['name'] }}
                            </span>
                        </div>
                    @endforeach

                </div>
            </div>
            @if(count($movie['videos']['results']) > 0)
                <a href="https://youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}">
                    <x-primary-button>
                        <x-play-button-svg with="20px" height="20px" class="mr-2" />
                        Play Trailer
                    </x-primary-button>
                </a>
            @endif
        </div>
    </div>
    <x-hr-line />
    <div class="p-8">
        <h4 class="text-gray-100 font-bold text-2xl mb-8">Cast</h4>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-10">
            @foreach($movie['credits']['cast'] as $cast)
                <x-cast-card class="w-full mb-8 md:mb-0 md:w-48" realname="{{ $cast['original_name'] }}" name="{{ $cast['name'] }}" photo="https://image.tmdb.org/t/p/original{{ $cast['profile_path'] }}" />
            @endforeach
        </div>
    </div>
    <x-hr-line />
    <div class="p-8">
        <h4 class="text-gray-100 font-bold text-2xl mb-8">Images</h4>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($movie['images']['backdrops'] as $image)
                <img class="rounded-md cursor-pointer shadow shadow-orange-500 hover:shadow-orange-700" src="https://image.tmdb.org/t/p/original{{ $image['file_path']  }}" alt="{{ $movie['original_title'] }}">

            @endforeach
        </div>
    </div>

@endsection
