<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    /**
     * Get local timelines.
     *
     */
    public function local(Request $request) {


        return response()->json();
    }

    /**
     * Get timelines from federated instances.
     *
     */
    public function remote(Request $request) {
        // todo
    }
}
