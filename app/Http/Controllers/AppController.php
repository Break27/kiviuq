<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class AppController extends Controller
{
    /**
     *
     * @param Request $request
     * @return \Inertia\Response
     */
    public function home(Request $request) {
        return Inertia::render('Home', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }

    /**
     *
     * @return \Inertia\Response
     */
    public function about() {
        return Inertia::render('About');
    }

    /**
     *
     * @return \Inertia\Response
     */
    public function community() {
        return Inertia::render('Community');
    }
}
