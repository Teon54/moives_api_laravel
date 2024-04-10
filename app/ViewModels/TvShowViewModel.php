<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Spatie\ViewModels\ViewModel;

class TvShowViewModel extends ViewModel
{
    public function __construct(public $tvShow)
    {
        $this->tvShow = $tvShow;
    }

    public function tvShow(): Collection
    {
         return collect($this->tvShow)->merge([
            'poster_path' => "https://image.tmdb.org/t/p/original" . $this->tvShow['poster_path'],
            'vote_average' => round($this->tvShow['vote_average'] * 10) . "%",
            'first_air_date' => Carbon::make($this->tvShow['first_air_date'])->toFormattedDateString(),
            'genres' => collect($this->tvShow['genres'])->pluck('name')->flatten()->implode(', '),
            'crew' => collect($this->tvShow['credits']['crew'])->take(2),
            'cast' => collect($this->tvShow['credits']['cast'])->take(5),
            'images' => collect($this->tvShow['images']['backdrops'])->take(9),
        ])->only([
            'poster_path',
            'id',
            'genres',
            'name',
            'vote_average',
            'overview',
            'first_air_date',
            'credits',
            'videos',
            'images',
            'crew',
            'cast',
            'images',
        ]);
    }
}
