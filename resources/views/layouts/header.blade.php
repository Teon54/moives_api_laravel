<header class="">
    <div class="flex flex-col md:flex-row items-center justify-between m-4">
        <nav class="flex flex-col md:flex-row mb-3 md:mb-0 items-center">
            <x-movie-svg with="32px" height="32px" />

            <span class="text-white font-bold md:mr-5">
                MovieApp
            </span>
            <ul class="flex flex-col md:flex-row items-center md:ml-3 text-gray-300 md:space-x-3">
                <li class="cursor-pointer hover:text-gray-500">Movies</li>
                <li class="cursor-pointer hover:text-gray-500">TV Shows</li>
                <li class="cursor-pointer hover:text-gray-500">Actors</li>
            </ul>
        </nav>
        <div class="flex items-center">
            <form>
                <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="search" class="block w-full px-4 py-1 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required />
                </div>
            </form>
            <img class="rounded-full w-7 ml-3" src="{{ url('/') }}/profile.jpg" alt="profile">
        </div>
    </div>
    <x-hr-line />
</header>
