<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Spatie\ViewModels\ViewModel;

class TvViewModel extends ViewModel
{
    public function __construct(public $popularTv, public $topRatedTv, public $genres)
    {
        $this->topRatedTv = $topRatedTv;
        $this->popularTv = $popularTv;
        $this->genres = $genres;
    }

    public function popularTv(): Collection
    {
        return $this->formatTv($this->popularTv);
    }

    public function topRatedTv(): Collection
    {
        return $this->formatTv($this->topRatedTv);
    }

    public function genres(): Collection
    {
        return collect($this->genres)
            ->mapWithKeys(function ($genre) {
                return [$genre['id'] => $genre['name']];
            });
    }

    private function formatTv($shows): Collection
    {
        return collect($shows)->map(function ($show) {
            $genresFormatted = collect($show['genre_ids'])->mapWithKeys(function ($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($show)->merge([
                'poster_path' => "https://image.tmdb.org/t/p/original" . $show['poster_path'],
                'vote_average' => round($show['vote_average'] * 10) . "%",
                'first_air_date' => Carbon::make($show['first_air_date'])->toFormattedDateString(),
                'genres' => $genresFormatted,
            ])->only([
                'poster_path',
                'id',
                'genres_id',
                'name',
                'vote_average',
                'overview',
                'first_air_date',
                'genres',
            ]);
        });
    }
}
