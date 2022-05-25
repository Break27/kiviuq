<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    /**
     * Get local timelines.
     *
     */
    public function local(Request $request)
    {
        //todo
    }

    /**
     * Get timelines from federated instances.
     *
     */
    public function public(Request $request)
    {
        $data = PostService::getTimeline(
            $request->offset ?: 0,
            $request->chunk ?: 10,
            $request->desc == 'true',
            $request->latest ?: false,
            $request->author_uuid ?: false,
        );

        return response()->json($data);
    }
}
