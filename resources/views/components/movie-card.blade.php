<div class="flex flex-col space-y-1 ">
    <div>
        <a href="{{ route('movies.show', $movie['id']) }}" class="cursor-pointer">
            <img class="rounded shadow-gray-700 hover:shadow-gray-900 transition-all shadow-2xl" src="https://image.tmdb.org/t/p/original{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}">
        </a>
    </div>
    <div>
        <a href="{{ route('movies.show', $movie['id']) }}" class="cursor-pointer">
            <span class="text-gray-200">
                {{ $movie['title'] }}
            </span>
        </a>
        <div class="flex items-center flex-wrap space-x-1.5 text-gray-300">
            <x-star-svg with="16px" height="16px" />
            <span>{{ round($movie['vote_average'] * 10) }}%</span>
            <span>|</span>
            <time>{{ \Carbon\Carbon::make($movie['release_date'])->toFormattedDateString() }}</time>
        </div>
        <div class="flex items-center text-gray-300 space-x-1.5">
            <span>{{ implode(', ', $genres) }}</span>
        </div>
    </div>
</div>
