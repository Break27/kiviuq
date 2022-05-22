<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Show post editing page.
     *
     */
    public function create(Request $request)
    {
        return Inertia::render('Content/Publish');
    }

    /**
     * Show a post by id.
     *
     */
    public function show($id)
    {
        return Inertia::render('Content/Post', [
            'post' => function () use ($id) {
                $post = PostService::getPostById($id);
                abort_if(!$post, 404);
                return $post;
            },
        ]);
    }

}
