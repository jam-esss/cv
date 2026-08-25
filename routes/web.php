<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\public\PublicSite;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpotifyController;

// PUBLIC
Route::redirect('/', '/en');

Route::prefix('{locale}')->where(['locale' => 'en|ja|nl'])->group(function () {
    Route::get('/', PublicSite::class);
});

// ADMIN
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/spotify/login', [SpotifyController::class, 'login'])
        ->name('spotify.login');

    Route::get('/spotify/callback', [SpotifyController::class, 'callback'])
        ->name('spotify.callback');

});

require __DIR__.'/auth.php';
