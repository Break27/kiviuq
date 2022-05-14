<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Show a post by id.
     *
     */
    public function show(int $id) {
        $post = PostService::getPostById($id);
        abort_if( !$post, 404);

        return Inertia::render('Post', [
            'target' => [
                'post' => function () use($post) {
                    return $post;
                },
            ],
        ]);
    }

}
