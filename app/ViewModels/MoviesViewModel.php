<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public $popularMovies;
    public $nowPlayingMovies;
    public $genres;

    public function __construct($popularMovies, $nowPlayingMovies, $genres)
    {
        $this->popularMovies = $popularMovies;
        $this->nowPlayingMovies = $nowPlayingMovies;
        $this->genres = $genres;
    }

    public function popularMovies(): Collection
    {
        return $this->formatMovies($this->popularMovies);
    }

    public function nowPlayingMovies(): Collection
    {
        return $this->formatMovies($this->nowPlayingMovies);
    }

    public function genres(): Collection
    {
        return collect($this->genres)
            ->mapWithKeys(function ($genre) {
                return [$genre['id'] => $genre['name']];
            });
    }

    private function formatMovies($movies): Collection
    {
        return collect($movies)->map(function ($movie) {
            $genresFormatted = collect($movie['genre_ids'])->mapWithKeys(function ($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($movie)->merge([
                'poster_path' => "https://image.tmdb.org/t/p/original" . $movie['poster_path'],
                'vote_average' => round($movie['vote_average'] * 10) . "%",
                'release_date' => Carbon::make($movie['release_date'])->toFormattedDateString(),
                'genres' => $genresFormatted,
            ])->only([
                'poster_path',
                'id',
                'genres_id',
                'title',
                'vote_average',
                'overview',
                'release_date',
                'genres',
            ]);
        });
    }
}
