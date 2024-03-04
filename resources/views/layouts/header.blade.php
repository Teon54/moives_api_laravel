<header class="">
    <div class="flex flex-col md:flex-row items-center justify-between m-4">
        <nav class="flex flex-col md:flex-row mb-3 md:mb-0 items-center">
            <x-movie-svg with="32px" height="32px" />
            <span class="text-white font-bold md:mr-5">
                <a href="{{ route('movies.index') }}">
                    MovieApp
                </a>
            </span>
            <ul class="flex flex-col md:flex-row items-center md:ml-3 text-gray-300 md:space-x-3">
                <li class="cursor-pointer hover:text-gray-500">
                    <a href="{{ route('movies.index') }}">
                        Movies
                    </a>
                </li>
                <li class="cursor-pointer hover:text-gray-500">TV Shows</li>
                <li class="cursor-pointer hover:text-gray-500">Actors</li>
            </ul>
        </nav>
        <div class="flex items-center">
            <livewire:search-dropdown>

            </livewire:search-dropdown>
            <img class="rounded-full w-7 ml-3" src="{{ url('/') }}/profile.jpg" alt="profile">
        </div>
    </div>
    <x-hr-line />
</header>
