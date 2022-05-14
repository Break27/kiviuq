<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

Route::get('/community', function () {
    return Inertia::render('Community');
})->name('community');

Route::controller(ProfileController::class)->name('account.')->group(function () {
    Route::get('/@{username}', 'show')
        ->name('show');

    Route::get("/@{username}/media", 'show')
        ->name('media');

    Route::get("/@{username}/profile", 'show')
        ->name('profile');

    Route::get("/@{username}/friends", 'show')
        ->name('friends');
});

Route::get('/posts/{id}', [PostController::class, 'show'])
    ->name('post');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
