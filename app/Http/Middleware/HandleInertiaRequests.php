<?php

namespace App\Http\Middleware;

use App\Models\Profile;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        $user = $request->user();
        return array_merge(parent::share($request), [
            'app' => [
                'name' => config('app.name'),
                'domain' => config('app.domain'),
            ],
            'auth' => function () use ($user) {
                return is_null($user) ? []
                    : [
                        'user' => $user,
                        'account' => $user->account(),
                        'profile' => $user->account()->profile(),
                    ];
            },
            'ziggy' => function () {
                return (new Ziggy)->toArray();
            },
        ]);
    }
}
