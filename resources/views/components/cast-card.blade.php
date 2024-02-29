<div {{ $attributes->merge(['class' => 'flex flex-col space-y-1 cursor-pointer']) }}>
    <div>
        <img class="rounded shadow-gray-700 hover:shadow-gray-900 transition-all shadow-xl" src="{{ $photo }}" alt="Parasite">
    </div>
    <div class="px-2">
        <h6 class="text-gray-200 text-xl">{{ $realname }}</h6>
        <span class="text-gray-400">{{ $name }}</span>
    </div>
</div>
