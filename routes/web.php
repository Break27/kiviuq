<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SettingsController;
use Illuminate\Support\Facades\Route;

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

Route::controller(AppController::class)
    ->name('app.')
    ->group(function () {
        Route::get('/', 'home')
            ->name('home');

        Route::get('/about', 'about')
            ->name('about');

        Route::get('/community', 'community')
            ->name('community');
    });

Route::controller(ProfileController::class)
    ->name('account.')
    ->group(function () {
        Route::get('/@{username}', 'show')
            ->name('show');

        Route::get("/@{username}/media", 'show')
            ->name('media');

        Route::get("/@{username}/zone", 'show')
            ->name('zone');

        Route::get("/@{username}/friends", 'show')
            ->name('friends');
    });

Route::controller(SettingsController::class)
    ->prefix('settings')
    ->name('settings.')
    ->group(function () {
        Route::post('/', 'store');

        Route::get('/', 'show')
            ->middleware(['auth'])
            ->name('profile');

        Route::get('/security', 'show')
            ->name('security');

        Route::get('/appearance', 'show')
            ->name('appearance');

        Route::get('/email', 'show')
            ->name('email');
    });

Route::controller(PostController::class)
    ->prefix('post')
    ->name('post.')
    ->group(function () {
        Route::get('publish', 'create')
            ->middleware(['auth', 'verified'])
            ->name('publish');

        Route::get('{id}', 'show')
            ->name('show');
    });

require __DIR__.'/auth.php';
