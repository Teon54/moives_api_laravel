<div class="relative" x-data="{ isOpen: true }" @click.away="isOpen = false" >
    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
    </div>
    <input x-ref="search" @keydown.window="
    if (event.keyCode === 191 ){
        event.preventDefault();
        $refs.search.focus();
    }
    " @focus="isOpen = true" @keydown="isOpen = true" @keydown.esc.window="isOpen = false" @keydown.shift.tab="isOpen = false" wire:model.live.debounce.500ms="search" type="search" id="search" class="block w-full px-4 py-1 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" />
    <div wire:loading class="spinner right-0 top-0 mr-6 mt-4"></div>

    @if(strlen($search) !== 0)
        <div x-show.transition.opacity="isOpen" class="absolute w-full mt-2 rounded-sm p-2 bg-gray-700 text-gray-300 shadow-lg shadow-gray-700">
            <ul class="space-y-2">
                @if($searchResults->count() === 0)
                    <span>No results found!</span>
                @endif
                @foreach($searchResults as $movie)
                    <li class="border-b py-2 border-white-700 hover:opacity-70"
                    @if($loop->last) @keydown.tab="isOpen = false" @endif
                    >
                        <a href="{{ route('movies.show',$movie['id']) }}" class="hover:bg-gray-700 flex items-center">
                            @if($movie['poster_path'] === null)
                                <img class="w-12 rounded-md mr-2" src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg" alt="{{ $movie['original_title'] }}">
                            @else
                                <img class="w-12 rounded-md mr-2" src="https://image.tmdb.org/t/p/original{{ $movie['poster_path'] }}" alt="{{ $movie['original_title'] }}">
                            @endif
                            <span>{{ $movie['original_title'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
