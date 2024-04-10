<div class="flex flex-col space-y-1 ">
    <div>
        <a href="{{ route('tv.show', $tvShow['id']) }}" class="cursor-pointer">
            <img class="rounded shadow-gray-700 hover:shadow-gray-900 transition-all shadow-2xl" src="{{ $tvShow['poster_path'] }}" alt="{{ $tvShow['name'] }}">
        </a>
    </div>
    <div>
        <a href="{{ route('tv.show', $tvShow['id']) }}" class="cursor-pointer">
            <span class="text-gray-200">
                {{ $tvShow['name'] }}
            </span>
        </a>
        <div class="flex items-center flex-wrap space-x-1.5 text-gray-300">
            <x-star-svg with="16px" height="16px" />
            <span>{{ $tvShow['vote_average'] }}</span>
            <span>|</span>
            <time>{{ $tvShow['first_air_date'] }}</time>
        </div>
        <div class="flex items-center text-gray-300 space-x-1.5">
            <span>{{ $tvShow['genres'] }}</span>
        </div>
    </div>
</div>
