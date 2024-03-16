<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
    public $movie;

    public function __construct($movie)
    {
        $this->movie = $movie;
    }

    public function movie(): Collection
    {
        return collect($this->movie)->merge([
            'poster_path' => "https://image.tmdb.org/t/p/original" . $this->movie['poster_path'],
            'vote_average' => round($this->movie['vote_average'] * 10) . "%",
            'release_date' => Carbon::make($this->movie['release_date'])->toFormattedDateString(),
            'genres' => collect($this->movie['genres'])->pluck('name')->flatten()->implode(', '),
            'crew' => collect($this->movie['credits']['crew'])->take(2),
            'cast' => collect($this->movie['credits']['cast'])->take(5),
            'images' => collect($this->movie['images']['backdrops'])->take(9),
        ])->only([
            'poster_path',
            'id',
            'genres',
            'title',
            'original_title',
            'vote_average',
            'overview',
            'release_date',
            'credits',
            'videos',
            'images',
            'crew',
            'cast',
            'images',
        ]);
    }
}
