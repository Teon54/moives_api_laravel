<?php

use App\Http\Controllers\ActorShowController;
use App\Http\Controllers\ActorsIndexController;
use App\Http\Controllers\MoviesIndexController;
use App\Http\Controllers\MovieShowController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TvIndexController;
use App\Http\Controllers\TvShowController;
use Illuminate\Support\Facades\Route;

Route::get('/tv', TvIndexController::class)
    ->name('tv.index');

Route::get('/tv/{id}', TvShowController::class)
    ->name('tv.show');

Route::get('/actors', ActorsIndexController::class)
    ->name('actors.index');

Route::get('/actors/page/{page?}', ActorsIndexController::class);

Route::get('/actor/{id}', ActorShowController::class)
    ->name('actors.show');

Route::get('/', MoviesIndexController::class)
    ->name('movies.index');

Route::get('/movie/{id}', MovieShowController::class)
    ->name('movies.show');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
