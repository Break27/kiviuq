<?php

use App\Http\Controllers\Api\V1\AccountController;
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\TimelineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->name('v1.')->group(function () {
    Route::controller(AccountController::class)
        ->name('accounts.')
        ->prefix('accounts')
        ->middleware('auth:sanctum')
        ->group(function () {
            Route::post('/verify_credentials', 'verifyCredentials')
                ->name('credentials.verify');

            Route::patch('/update_credentials', 'updateCredentials')
                ->name('credentials.update');

        });

    Route::controller(PostController::class)
        ->name('posts.')
        ->prefix('posts')
        ->middleware('auth:sanctum')
        ->group(function () {
            Route::post('/', 'create')
                ->name('create');

            Route::get('/{id}', 'show')
                ->name('show');

            Route::delete('/{id}', 'destroy')
                ->name('destroy');
        });

    Route::controller(TimelineController::class)
        ->name('timelines.')
        ->prefix('timelines')
        ->group(function () {
            Route::get('/local', 'local')
                ->name('local')
                ->middleware('auth:sanctum');

            Route::get('/public', 'public')
                ->name('public');
        });
});
