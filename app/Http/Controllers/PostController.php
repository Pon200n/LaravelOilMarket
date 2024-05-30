<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Resources\PostResource;
use App\Http\Middleware\AdminPanelMiddleware;

use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * 
     * Display a listing of the resource.
     */

    // public function __construct()
    // {
    // Назначить ВСЕМ методам в этом Контроллере
    // $this->middleware('admin_panel');

    // Назначить только ОДНОМУ методу в этом Контроллере
    // $this->middleware('admin_panel')->only('index');

    // Назначить только указанным методам в этом Контроллере
    // $this->middleware('admin_panel')->only(['create', 'store']);

    // Назначить всем методам, КРОМЕ указанных методов в Контроллере
    // $this->middleware('admin_panel')->except('index','show');
    // }

    public function index()
    {

        $posts = Post::with(['author'])->paginate(10);
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
        $data = $request->validated();
        $post = Post::create($data);
        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        // $post = Post::with('author')->findOrFail($id);
        $post = Post::find($id);
        dd($post->tags);
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, string $id)
    {
        $data = $request->validated();
        $post = Post::find($id);
        $post->update($data);
        $posts = Post::with(['author'])->paginate(10);
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        $posts = Post::with(['author'])->paginate(10);
        return PostResource::collection($posts);
    }
    public function testPosts()
    {
        // $post = Post::find(6);
        // $post->delete();
        // $posts = Post::with(['author'])->paginate(10);
        // return new PostResource($post);

        $posts = Post::with(['author'])->paginate(10);
        return PostResource::collection($posts);
    }
}
