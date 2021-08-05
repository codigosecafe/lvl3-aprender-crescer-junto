<?php

namespace App\Http\Controllers;

use App\Entities\Post;
use App\Http\Requests\Request;



class PostsController extends Controller
{
    public function index()
    {

        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index',['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $input = $request->toCollection();

        $post = new Post();
        $post->titulo   = $input->get('titulo-post');
        $post->conteudo = $input->get('content-post');
        $post->save();

        return redirect()->route('post.index')->with('message', 'Post created successfully!');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
    }

    public function update($id, Request $request)
    {

        $input = $request->toCollection();

        $post = Post::where('id', '=', $id)->first();

        $post->titulo   = $input->get('titulo-post');
        $post->conteudo = $input->get('content-post');
        $post->save();

        return redirect()->route('post.index')->with('message', 'Post updated successfully!');
    }



    public function destroy($id, Request $request)
    {

        $input = $request->toCollection();
        Post::where('id', '=', $id)->delete();
        return redirect()->route('post.index')->with('message', 'Post deleted successfully!');
    }
}
