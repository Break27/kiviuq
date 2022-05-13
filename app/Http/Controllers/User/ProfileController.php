<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfileController extends Controller
{
    /**
     * Show user profile.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Profile');
    }

    /**
     * Handle an incoming profile alteration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Inertia\Response
     */
    public function store(Request $request)
    {
        if(Auth::guard('web')->check()) {
            $profile = Profile::findOrFail($request->user()->username);

            if($request->has('name')) $profile->name = $request->name;

            $profile->save();

            return $request->dest
                ? redirect($request->dest)
                : $this->create();
        }
        //throw new Exception()
        //todo
    }
}
