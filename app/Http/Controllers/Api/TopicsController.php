<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\TopicResource;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Topics
 */
class TopicsController extends Controller
{
    /**
     * Get all topics
     */
    public function index(): AnonymousResourceCollection
    {
        $query = Post::query()->orderBy('id', 'desc');

        $topics = $query->paginate();

        return TopicResource::collection($topics);

    }

    /**
     * Get a topic
     */
    public function show(Topic $topic): TopicResource
    {
        return TopicResource::make($topic);
    }

    /**
     * Get all posts in topic
     *
     * @urlParam topic_id int required The ID of the topic. Example: 1
     */
    public function posts(Topic $topic): AnonymousResourceCollection
    {
        //$posts = Post::query()->where('topic_id', $topic->id)->paginate();
        /*
        $posts = Post::query()->whereHas('topic', function ($query) use ($topic) {
            $query->where('id', $topic->id);
        })->paginate();
        */

        $posts = $topic->posts()
            ->orderByDesc('id')
            ->paginate();

        return PostResource::collection($posts);
    }

    /**
     * Create a new topic
     */
    public function store(StoreTopicRequest $request): TopicResource
    {
        $data = $request->validated();

        $topic = Topic::create($data);

        return TopicResource::make($topic);

    }

    /**
     * Update a topic
     */
    public function update(Request $request, Topic $topic): TopicResource
    {
        $data = $request->validated();

        $topic->update($data);

        return TopicResource::make($topic);
    }

    /**
     * Remove a topic
     *
     */
    public function destroy(Topic $topic): JsonResponse
    {

        $topic->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Topic deleted successfully',
        ]);
    }


}
