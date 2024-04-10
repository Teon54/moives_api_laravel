<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class ActorsViewModel extends ViewModel
{
    public function __construct(public $popularActors,public $page)
    {
        $this->popularActors = $popularActors;
        $this->page = $page;
    }

    public function popularActors()
    {
        return collect($this->popularActors)->map(function ($actor) {
            return collect($actor)->merge([
                'profile_path' => $actor['profile_path'] ?
                    "https://image.tmdb.org/t/p/original" . $actor['profile_path']
                    : 'https://ui_avatars.com/api/?size=235&name=' . $actor['name'],
                'known_for' => collect($actor['known_for'])
                    ->where('media_type', 'tv')
                    ->pluck('name')->union(
                        collect($actor['known_for'])
                            ->where('media_type','movie')
                            ->pluck('title')
                    )->implode(', '),
            ])->only([
                'name',
                'id',
                'profile_path',
                'known_for',
            ]);
        });
    }

    public function previous()
    {
        return $this->page > 1 ? $this->page - 1 : null;
    }

    public function next()
    {
        return $this->page < 500 ? $this->page + 1 : null;
    }
}
