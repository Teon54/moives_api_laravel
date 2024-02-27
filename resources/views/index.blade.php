@extends('layouts.main')

@section('content')
<div class="bg-gray-800 py-12 px-20">
    <h2 class=" font-bold text-xl text-orange-500 uppercase">Popular Movies</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-10 mt-3">
        <x-movie-card name="Parasite" cover="parasite.jpg" point="80" date="Feb 20, 2020" genres="hello"></x-movie-card>
        <x-movie-card name="Parasite" cover="parasite.jpg" point="80" date="Feb 20, 2020" genres="hello"></x-movie-card>
        <x-movie-card name="Parasite" cover="parasite.jpg" point="80" date="Feb 20, 2020" genres="hello"></x-movie-card>
        <x-movie-card name="Parasite" cover="parasite.jpg" point="80" date="Feb 20, 2020" genres="hello"></x-movie-card>
        <x-movie-card name="Parasite" cover="parasite.jpg" point="80" date="Feb 20, 2020" genres="hello"></x-movie-card>
        <x-movie-card name="Parasite" cover="parasite.jpg" point="80" date="Feb 20, 2020" genres="hello"></x-movie-card>

    </div>
</div>
@endsection
