@extends('layouts.main')

@section('content')
    <div class="flex flex-col md:flex-row mb-4 p-4 md:p-10 space-y-5 md:space-x-14">
        <div>
            <img class="max-w-full md:m-0 md:max-w-96 rounded-md" src="{{ url('/') }}/parasite.jpg" alt="Movie Poster">
        </div>
        <div>
            <h2 class="title text-gray-100 font-bold text-3xl mb-3">Parasite</h2>
            <div class="flex items-center text-gray-300 space-x-1 mb-10">
                <x-star-svg with="16px" height="16px"/>
                <span>80%</span>
                <span>|</span>
                <span>Feb 20, 2022</span>
                <span>|</span>
                <span>hello</span>
            </div>
            <p class="text-gray-300 max-w-3xl mb-10">
                The struggling Kim family sees an opportunity when the son starts working for the wealthy Park family.
                Soon, all of them find a way to work within the same household and start living a parasitic life.
            </p>
            <div class="mb-10">
                <h5 class="font-bold text-gray-100 mb-3">
                    Featured Crew
                </h5>
                <div class="grid grid-cols-4 gap-4">
                    <div>
                        <h6 class="font-semibold text-white">
                            Director
                        </h6>
                        <span class="text-gray-300">
                            Bong Joon Ho
                        </span>
                    </div>
                    <div>
                        <h6 class="font-semibold text-white">
                            Writers
                        </h6>
                        <span class="text-gray-300">
                            Bong Joon HoHan , Jin-won
                        </span>
                    </div>
                </div>
            </div>
            <x-primary-button>
                <x-play-button-svg with="20px" height="20px" class="mr-2" />
                Play Trailer
            </x-primary-button>
        </div>
    </div>
    <x-hr-line />
    <div class="p-8">
        <h4 class="text-gray-100 font-bold text-2xl mb-8">Cast</h4>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-10">
            <x-cast-card class="w-full mb-8 md:mb-0 md:w-48" realname="hi" name="hello" photo="{{ url('/') }}/parasite.jpg" />
            <x-cast-card class="w-full mb-8 md:mb-0 md:w-48" realname="hi" name="hello" photo="{{ url('/') }}/parasite.jpg" />
            <x-cast-card class="w-full mb-8 md:mb-0 md:w-48" realname="hi" name="hello" photo="{{ url('/') }}/parasite.jpg" />
            <x-cast-card class="w-full mb-8 md:mb-0 md:w-48" realname="hi" name="hello" photo="{{ url('/') }}/parasite.jpg" />
            <x-cast-card class="w-full mb-8 md:mb-0 md:w-48" realname="hi" name="hello" photo="{{ url('/') }}/parasite.jpg" />
            <x-cast-card class="w-full mb-8 md:mb-0 md:w-48" realname="hi" name="hello" photo="{{ url('/') }}/parasite.jpg" />
        </div>
    </div>
    <x-hr-line />
    <div class="p-8">
        <h4 class="text-gray-100 font-bold text-2xl mb-8">Images</h4>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <img class="rounded-md cursor-pointer shadow shadow-orange-500 hover:shadow-orange-700" src="{{ url('/') }}/parasite-1.jpg" alt="Parasite">
            <img class="rounded-md cursor-pointer shadow shadow-orange-500 hover:shadow-orange-700" src="{{ url('/') }}/parasite-1.jpg" alt="Parasite">
            <img class="rounded-md cursor-pointer shadow shadow-orange-500 hover:shadow-orange-700" src="{{ url('/') }}/parasite-1.jpg" alt="Parasite">
            <img class="rounded-md cursor-pointer shadow shadow-orange-500 hover:shadow-orange-700" src="{{ url('/') }}/parasite-1.jpg" alt="Parasite">
            <img class="rounded-md cursor-pointer shadow shadow-orange-500 hover:shadow-orange-700" src="{{ url('/') }}/parasite-1.jpg" alt="Parasite">
        </div>
    </div>

@endsection
