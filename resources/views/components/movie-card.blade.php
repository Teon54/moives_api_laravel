<div class="flex flex-col space-y-1">
    <div>
        <img class="rounded" src="{{ $cover }}" alt="Parasite">
    </div>
    <div>
        <span class="text-gray-200">{{ $name }}</span>
        <div class="flex items-center flex-wrap space-x-1.5 text-gray-300">
            <x-star-svg with="16px" height="16px" />
            <span>{{ $point }}%</span>
            <span>|</span>
            <time>{{ $date }}</time>
        </div>
        <div class="flex items-center text-gray-300 space-x-1.5">
            <span>{{ $genres }}</span>
{{--            @foreach($genres as $genre)--}}
{{--                @if($loop->last)--}}
{{--                    <span>{{ $genre }}</span>--}}
{{--                @endif--}}
{{--                    <span>{{ $genre }},</span>--}}
{{--            @endforeach--}}
        </div>
    </div>
</div>
