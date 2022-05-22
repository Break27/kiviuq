<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\AccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class SettingsController extends Controller
{
    /**
     *
     * @return \Inertia\Response
     */
    public function show()
    {
        $action = explode('.', Route::currentRouteName())[1];

        return Inertia::render('User/Settings/View', [
            'action' => [
                "$action" => 1
            ],
        ]);
    }

    /**
     *
     *
     */
    public function store(Request $request)
    {
        return $this->updateProfile($request);
    }

    /**
     * Handle an incoming profile alteration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Inertia\Response
     */
    public function updateProfile(Request $request)
    {
        AccountService::updateProfile($request);

        return $request->dest
            ? redirect($request->dest)
            : $this->show();
    }
}
