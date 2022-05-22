<?php

namespace App\Services;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Stevebauman\Purify\Facades\Purify;

class PostService
{
    /**
     * Storage path for posts.
     */
    protected static $path = 'posts/';

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

        $md5 = self::seed();
        $filename = self::save($request->postContent, $md5);
        $id = self::squeeze($md5);

        $account = $request->user()->account();
        $account->posts++;
        $account->save();

        $post = Post::create([
            'id' => $id,
            'author_uuid' => $account->uuid,
            'filename' => $filename,
        ]);

        return [
            'id' => $id,
            'created_at' => $post->created_at,
            'content' => $request->postContent,
        ];
    }

    /**
     * Get a post by id.
     *
     * @return array|false
     */
    public static function getPostById(string $id)
    {
        $post = Post::query()
            ->where('visibility', 'public')
            ->find($id);
        if(is_null($post))
            return false;

        self::inject($post);
        return $post;
    }

    /**
     *
     *
     * @return array
     */
    public static function getTimeline(int $offset = 0,
                                       int $chunkSize = 10,
                                       bool $desc = false,
                                       $latest = false,
                                       $author_uuid = false
    ) {
        if($desc && !$latest) {
            $latest = Post::query()->latest()->value('created_at');
        }

        $posts = Post::query()
            ->orderBy('created_at', $desc ? 'desc' : 'asc')
            ->where('visibility', 'public')
            ->where(function ($query) use ($author_uuid, $desc, $latest) {
                if($author_uuid) {
                    $query->where('author_uuid', $author_uuid);
                }
                if($desc) $query->where('created_at', '<=', $latest);
            })
            ->offset($offset * $chunkSize)
            ->limit($chunkSize)
            ->get();

        foreach($posts as $post) {
            self::inject($post);
        }

        return [
            'posts' => $posts,
            'latest' => $latest
        ];
    }

    /**
     * Delete a post by id.
     *
     * @return bool
     */
    public static function removePost(string $id)
    {
        $post = Post::query()->find($id);
        if(is_null($post))
            return false;

        $post->delete();
        return true;
    }

    /**
     *
     * @param $content
     * @return string
     */
    protected static function save($content, $filename)
    {
        $compressed = gzdeflate($content, 9);
        Storage::put(self::$path . $filename, $compressed);
        return $filename;
    }

    /**
     *
     * @param $post
     * @return string
     */
    protected static function get($post)
    {
        $raw = Storage::get(self::$path . $post->filename);
        $decompressed = gzinflate($raw);
        return Purify::clean($decompressed);
    }

    /**
     *
     * @return void
     */
    protected static function inject($post)
    {
        $post->author = [
            'account' => $post->author(),
            'profile' => $post->author()->profile(),
        ];
        $post->content = self::get($post);
    }

    /**
     *
     * @return string
     */
    protected static function seed()
    {
        return md5(config('app.domain') . "|post@" . time());
    }

    /**
     *
     * @return string
     */
    protected static function squeeze(string $md5, int $length = 16)
    {
        if(strlen($md5) == 32 && $length > 0 && $length < 32) {
            $snippets = str_split($md5, ceil(32 / $length));
            $md5 = '';
            foreach ($snippets as $snippet) {
                $rand = mt_rand(0, strlen($snippet) - 1);
                $char = $snippet[$rand];
                $md5 .= $rand%2 == 0
                    ? Str::upper($char)
                    : $char;
            }
        }
        return $md5;
    }
}
