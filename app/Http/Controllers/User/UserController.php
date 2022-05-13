<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Show user-page index.
     *
     * @param Request $request
     * @param string $username
     * @return \Inertia\Response
     */
    public function create(Request $request, string $username)
    {
        try {
            $profile = Profile::findOrFail($username);
            $isOwner = Auth::guard('web')->check()
                && strcmp($request->user()->username, $username) == 0;
        } catch(ModelNotFoundException $_) {
            abort('404');
        }
        return Inertia::render('User', [
            'target' => [
                'profile' => [
                    'isOwner' => $isOwner,
                    'username' => $username,
                    'name' => $profile->name,
                ],
            ],
        ]);
    }

    /**
     * Show user profile tab.
     *
     * @param Request $request
     * @param string $username
     * @return \Inertia\Response
     */
    public function profile(Request $request, string $username) {
        return $this->create($request, $username);
    }

    /**
     * Show user media tab.
     *
     * @param Request $request
     * @param string $username
     * @return \Inertia\Response
     */
    public function media(Request $request, string $username) {
        return $this->create($request, $username);
    }

    /**
     * Show user friends tab.
     *
     * @param Request $request
     * @param string $username
     * @return \Inertia\Response
     */
    public function friends(Request $request, string $username) {
        return $this->create($request, $username);
    }
}
