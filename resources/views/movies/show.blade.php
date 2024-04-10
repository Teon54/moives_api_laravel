@extends('layouts.main')

@section('content')
    <div x-data="{ isOpen: false }" class="flex flex-col md:flex-row mb-4 p-4 md:p-10 space-y-5 md:space-x-14">
        <div>
            <img class="max-w-full md:m-0 md:max-w-96 rounded-md" src="{{ $movie['poster_path'] }}" alt="Movie Poster">
        </div>
        <div>
            <h2 class="title text-gray-100 font-bold text-3xl mb-3">{{ $movie['original_title'] }}</h2>
            <div class="flex items-center text-gray-300 space-x-1 mb-10">
                <x-star-svg with="16px" height="16px"/>
                <span>{{ $movie['vote_average'] }}</span>
                <span>|</span>
                <span>{{ $movie['release_date'] }}</span>
                <span>|</span>
                <span>{{ $movie['genres'] }}</span>
            </div>
            <p class="text-gray-300 max-w-3xl mb-10">
                {{ $movie['overview'] }}
            </p>
            <div class="mb-10">
                <h5 class="font-bold text-gray-100 mb-3">
                    Featured Crew
                </h5>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach($movie['crew'] as $crew)
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
                <x-primary-button @click="isOpen = true">
                    <x-play-button-svg with="20px" height="20px" class="mr-2"/>
                    Play Trailer
                </x-primary-button>
                <div class="fixed inset-0 bg-gray-900 bg-opacity-30 backdrop-blur-sm" x-show.transition.opacity="isOpen"
                     style="display: none"></div>
                <div class="fixed top-1/4 left-1/4 z-10 w-1/2 h-3/5 bg-gray-700 rounded-md backdrop-blur-2xl"
                     x-show.transition.opacity="isOpen" style="display: none" @click.away="isOpen = false"
                     @keydown.esc.window="isOpen = false">
                    <span class="z-20 cursor-pointer absolute text-gray-200 text-3xl right-4 top-4"
                          @click="isOpen = false">&times;</span>
                    <div class="relative aspect-w-16 aspect-h-9 w-full h-full">
                        <iframe class="absolute w-[80%] h-3/4 right-[10%] bottom-5 rounded-md"
                                src="https://youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <x-hr-line/>
    <div class="p-8">
        <h4 class="text-gray-100 font-bold text-2xl mb-8">Cast</h4>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-10">
            @foreach($movie['cast'] as $cast)
                <a href="{{ route('actors.show',$cast['id']) }}">
                    <x-cast-card class="w-full mb-8 md:mb-0 md:w-48" realname="{{ $cast['original_name'] }}"
                                 name="{{ $cast['character'] }}"
                                 photo="https://image.tmdb.org/t/p/original{{ $cast['profile_path'] }}"/>
                </a>
            @endforeach
        </div>
    </div>
    <x-hr-line/>
    <div class="p-8" x-data="{ isOpen: false, image: '' }">
        <h4 class="text-gray-100 font-bold text-2xl mb-8">Images</h4>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($movie['images'] as $image)
                <div>
                    <a href="#" @click.prevent="
                    isOpen=true
                    image='https://image.tmdb.org/t/p/original{{ $image['file_path']  }}'
                    ">
                        <img class="rounded-md cursor-pointer shadow shadow-orange-500 hover:shadow-orange-700"
                             src="https://image.tmdb.org/t/p/original{{ $image['file_path']  }}"
                             alt="{{ $movie['original_title'] }}">
                    </a>
                </div>
            @endforeach
        </div>
        <div class="fixed inset-0 bg-gray-900 bg-opacity-30 backdrop-blur-sm" x-show.transition.opacity="isOpen" style="display: none"></div>
        <div class="fixed top-1/4 left-1/4 z-10 w-1/2 h-1/2 bg-gray-700 rounded-md backdrop-blur-2xl" x-show.transition.opacity="isOpen" style="display: none" @click.away="isOpen = false" @keydown.esc.window="isOpen = false">
            <span class="z-20 cursor-pointer absolute text-gray-200 text-3xl right-4 top-4" @click="isOpen = false">&times;</span>
            <div class="relative aspect-w-16 aspect-h-9 w-full h-full">
                <img class="absolute rounded-md" :src="image" alt="Poster">
            </div>
        </div>
    </div>

@endsection
