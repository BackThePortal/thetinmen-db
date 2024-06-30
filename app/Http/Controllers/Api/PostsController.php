<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\TopicResource;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;

/**
 * @group Posts
 */
class PostsController extends Controller
{

    //use AuthorizesRequests;

    public function __construct()
    {
        //$this->authorizeResource(Post::class, 'post');
    }

    /**
     * Get all posts
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        //$topic_id = $request->integer('topic_id');

        //$params = array_filter([
        //    'topic_id' => $topic_id
        //]);

        $query = Post::query()
           //->when($topic_id, function ($query, $topic_id) {
           //    return $query->where('topic_id', $topic_id);
           //})
            ->orderBy('id', 'desc')
            ->with([
               'topic'
            ]);

        //$posts = $query->paginate()->appends($params);

        $posts = $query->paginate();

        return PostResource::collection($posts);
    }

    /**
     * Create new post
     */
    public function store(StorePostRequest $request): PostResource
    {
        //$data = $request->validate([
        //    'title'    => 'required|max:100',
        //    'link'     => 'nullable|max:255',
        //    'topic_id' => 'required|exists:topics,id',
        //]);

        $data = $request->validated();

        $post = Post::create($data);

        return PostResource::make($post);
    }

    /**
     * Get a post
     */
    public function show(Post $post): PostResource
    {
        return PostResource::make($post);
    }

    /**
     * Update a post
     */
    public function update(Request $request, Post $post): PostResource
    {
        $data = $request->validated();

        $post->update($data);

        return PostResource::make($post);
    }

    /**
     * Remove a topic
     *
     * @authenticated
     */
    public function destroy(Post $post): JsonResponse
    {
        $post->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Post deleted successfully'
        ]);
    }

    /**
     * Get the topic of a post
     *
     */
    public function topic(Post $post): TopicResource
    {
        $topic = $post->topic()->first();

        return TopicResource::make($topic);
    }
}
