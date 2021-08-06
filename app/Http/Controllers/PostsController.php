<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use App\Http\Requests\Request;

class PostsController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
         list('publicPosts' => $publicPosts, 'protectedPosts' => $protectedPosts) = $this->postService->listPosts();

        return view('posts.index',[
            'publicPosts' => $publicPosts,
            'protectedPosts' => $protectedPosts
        ]);
    }

    public function indexPanel()
    {
        list('publicPosts' => $publicPosts, 'protectedPosts' => $protectedPosts) = $this->postService->listPosts();
        return view('posts.painel',[
            'publicPosts' => $publicPosts,
            'protectedPosts' => $protectedPosts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        $this->postService->createPost($request->toCollection());
        return redirect()->route('post.index')->with('message', 'Post created successfully!');
    }

    public function edit($type, $id)
    {
        return view('posts.edit', [
            'post' => $this->postService->editPost($type, $id),
            'typePost' => $type
        ]);
    }

    public function update($type, $id, Request $request)
    {
        $this->postService->updatePost($type, $id, $request->toCollection());
        return redirect()->route('post.index')->with('message', 'Post updated successfully!');
    }

    public function destroy($type, $id)
    {
        $this->postService->deletePost($type, $id);
        return redirect()->route('post.index')->with('message', 'Post deleted successfully!');
    }
}
