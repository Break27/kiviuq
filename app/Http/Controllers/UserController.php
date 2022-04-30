<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * show user-page.
     *
     * @param  String  $username
     * @return \Inertia\Response
     */
    public function show($username)
    {
        try {
            $user = User::findOrFail($username);
        } catch(ModelNotFoundException $_) {
            abort('404');
        }
        return Inertia::render('User', [
            'username' => $user->value('name')
        ]);
    }
}
