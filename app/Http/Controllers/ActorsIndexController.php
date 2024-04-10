<?php

namespace App\Http\Controllers;

use App\ViewModels\ActorsViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActorsIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $page = 1)
    {
        abort_if($page > 500, 204);

        $popularActors = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/popular?page=' . $page)
            ->json()['results'];

        $viewModel = new ActorsViewModel($popularActors, $page);

        return view('actors.index', $viewModel);
    }
}
