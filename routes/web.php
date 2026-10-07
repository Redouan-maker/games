<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', function () {
    return view('welcome');
});

// Publieke route: iedereen mag de overzichtspagina en de details van een game bekijken
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/show/{id}', [GameController::class, 'show'])->name('games.show');

// Beschermde routes: alleen toegankelijk voor ingelogde gebruikers (auth)
Route::middleware('auth')->group(function () {
    Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
    Route::post('/games/store', [GameController::class, 'store'])->name('games.store');
    Route::get('/games/edit/{id}', [GameController::class, 'edit'])->name('games.edit');
    Route::post('/games/update/{id}', [GameController::class, 'update'])->name('games.update');
    Route::post('/games/destroy/{id}', [GameController::class, 'destroy'])->name('games.destroy');

    // Profile routes (Laravel Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Overige extra beveiligde pagina's
    Route::get('/profiel', function () {
        return view('profiel');
    });

    Route::get('/geheim', function () {
        return view('geheim');
    });
});

// Dashboard (Breeze)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Standaard Breeze authenticatie routes (login, register, logout, etc.)
require __DIR__.'/auth.php';