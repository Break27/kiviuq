<?php

namespace App\Services;

use App\Models\Account;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Ramsey\Uuid\Uuid;

class AccountService
{
    /**
     * Create a new account.
     *
     * @param Request $request
     * @return mixed
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public static function createAccount(Request $request) {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $un = $request->username;
        $domain = config('app.domain');
        $seed = md5($domain.'@'.time());
        $uuid = Uuid::uuid3($seed, $un)->toString();

        $user = User::create([
            'username' => $un,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Account::create([
            'uuid' => $uuid,
            'username' => $un,
            'domain' => $domain,
        ]);

        Profile::create([
            'uuid' => $uuid,
            'name' => $un,
        ]);

        event(new Registered($user));
        return $user;
    }

    /**
     * Update user profile.
     *
     * @param Request $request
     * @return false|mixed
     */
    public static function updateProfile(Request $request) {
        if(!Auth::guard('web')->check())
            return false;

        $profile = $request->user()->account()->profile();

        if($request->has('name')) $profile->name = $request->name;

        $profile->save();

        return $profile;
    }
}
