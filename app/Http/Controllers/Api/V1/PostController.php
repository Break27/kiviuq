<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends ApiController
{
    /**
     * POST api/v1/posts
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request) {
        $post = PostService::createPost($request);
        return response()->json($post);
    }

    /**
     * GET api/v1/posts/{id}
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id) {
        $post = PostService::getPostById($id);
        return $post
            ? response()->json($post)
            : $this->error('NoRecord');
    }

    /**
     * DELETE api/v1/posts/{id}
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id) {
        $post = PostService::removePost($id);
        return $post
            ? response()->json($post)
            : $this->error('NoRecord');
    }
}
