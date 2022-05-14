<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Profile;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class ProfileController extends Controller
{
    /**
     * Show user profile.
     *
     * @return \Inertia\Response
     */
    public function show(Request $request, string $username)
    {
        $fullname = explode('@', $username, 2);
        $username = $fullname[0];
        $domain = count($fullname) == 2
            ? $fullname[1]
            : config('app.domain');

        try {
            $account = Account::query()
                ->where('username', $username)
                ->where('domain', $domain)
                ->firstOrFail();

            $action = explode('.', Route::currentRouteName())[1];
            $isOwner = Auth::guard('web')->check()
                && strcmp($request->user()->uuid, $account->uuid) == 0;

            return Inertia::render('User/Profile', [
                'target' => [
                    'isOwner' => $isOwner,
                    'account' => $account,
                    'profile' => $account->profile(),
                ],
                "$action" => 1,
            ]);
        } catch(ModelNotFoundException $_) {
            abort('404');
        }
    }
}
