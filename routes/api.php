<?php

use App\Http\Controllers\Api\V1\AccountController;
use App\Http\Controllers\Api\V1\PostController;
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

Route::prefix('api')->group(function () {

    Route::prefix('vi')->group(function () {
        Route::controller(AccountController::class)
            ->prefix('accounts')
            ->middleware(['auth']) // todo - should be verified
            ->group(function () {
                Route::post('verify_credentials', 'verifyCredentials');
                Route::patch('update_credentials', 'updateCredentials');

            });

        Route::controller(PostController::class)
            ->prefix('posts')
            ->middleware(['auth']) // todo
            ->group(function () {
                Route::post('/', 'create');
                Route::get('/{id}', 'show');
                Route::delete('/{id}', 'destroy');
            });
    });

});
