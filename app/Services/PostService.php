<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;

class PostService
{
    /**
     * Create a new post.
     *
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public static function createPost(Request $request)
    {
        $request->validate([
            'postContent' => 'required|string', // todo - length limit
            'visibility' => 'string|in: public, unlisted, private',
        ]);

        $post = Post::create([
            'author_uuid' => $request->user()->uuid,
            'content' => $request->postContent,
        ]);

        return $post;
    }

    /**
     * Get a post by id.
     *
     * @return false|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public static function getPostById(int $id)
    {
        $post = Post::query()->find($id);
        return self::visibilityCheck($post)
            ? $post
            : false;
    }

    /**
     * Delete a post by id.
     *
     * @return bool
     */
    public static function removePost(int $id)
    {
        $post = Post::query()->find($id);
        if(is_null($post))
            return false;

        $post->delete();
        return true;
    }

    /**
     *
     * @return bool
     */
    private static function visibilityCheck($post)
    {
        return $post->active && $post->visibility != 'private';
    }
}
