<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|string
     */
    protected function redirectTo($request)
    {
        return $request->expectsJson()
            ? response()->json(['error' => 'This api requires an authenticated user'], 401)
            : route('login');
    }
}
