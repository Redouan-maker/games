<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\UserRoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', function () {
    return view('welcome');
});

// Publieke of voor iedereen toegankelijke game-routes (overzicht en details)
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/show/{id}', [GameController::class, 'show'])->name('games.show');

// Beschermde Admin-routes (ALLEEN toegankelijk voor ingelogde admins)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
    Route::post('/games/store', [GameController::class, 'store'])->name('games.store');
    Route::get('/games/edit/{id}', [GameController::class, 'edit'])->name('games.edit');
    Route::post('/games/update/{id}', [GameController::class, 'update'])->name('games.update');
    Route::post('/games/destroy/{id}', [GameController::class, 'destroy'])->name('games.destroy');
});

// Beschermde algemene ingelogde routes (zoals profiel)
Route::middleware('auth')->group(function () {
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

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('role-permissions', RolePermissionController::class);
    Route::resource('user-roles', UserRoleController::class);
});

// Standaard Breeze authenticatie routes (login, register, logout, etc.)
require __DIR__.'/auth.php';