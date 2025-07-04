<?php

use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\StreamingPlatformController;
use App\Http\Controllers\ProfileController;
use App\Models\Genre;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('movies', MovieController::class)
->middleware(['auth']);

Route::resource('genres', GenreController::class)
->middleware(['auth']);

Route::resource('streaming-platforms', StreamingPlatformController::class)
->middleware(['auth']);

require __DIR__.'/auth.php';
