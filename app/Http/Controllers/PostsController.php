<?php

namespace App\Http\Controllers;

use App\Entities\PublicPost;
use App\Http\Requests\Request;
use App\Entities\ProtectedPost;



class PostsController extends Controller
{
    public function index()
    {

        $publicPosts = PublicPost::orderBy('created_at', 'desc')->get();
        $protectedPosts = ProtectedPost::orderBy('created_at', 'desc')->get();
        return view('posts.index',[
            'publicPosts' => $publicPosts,
            'protectedPosts' => $protectedPosts
        ]);
    }
    public function indexPanel()
    {

        $publicPosts = PublicPost::orderBy('created_at', 'desc')->get();
        $protectedPosts = ProtectedPost::orderBy('created_at', 'desc')->get();
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
        $input = $request->toCollection();

        if($input->get('type') == 'public'){

            $post = new PublicPost();
            $post->title   = $input->get('titulo-post');
            $post->content = $input->get('content-post');
            $post->save();

        }else{

            $post = new ProtectedPost();
            $post->title   = $input->get('titulo-post');
            $post->content = $input->get('content-post');
            $post->save();
        }

        return redirect()->route('post.panel')->with('message', 'Post created successfully!');
    }

    public function edit($type, $id)
    {
        if($type == 'public'){
            $post = PublicPost::find($id);
        }else{
            $post = ProtectedPost::find($id);
        }
        return view('posts.edit', ['post' => $post, 'typePost' => $type]);
    }

    public function update($type, $id, Request $request)
    {

        $input = $request->toCollection();

        if($input->get('type') == 'public'){

            if($type == 'protected'){
                ProtectedPost::where('id', '=', $id)->delete();
                $post = new PublicPost();
            }else{
                $post = PublicPost::where('id', '=', $id)->first();
            }

            $post->title   = $input->get('titulo-post');
            $post->content = $input->get('content-post');
            $post->save();

        }else{

            if($type == 'public'){
                PublicPost::where('id', '=', $id)->delete();
                $post = new ProtectedPost();
            }else{
                $post = ProtectedPost::where('id', '=', $id)->first();
            }

            $post->title   = $input->get('titulo-post');
            $post->content = $input->get('content-post');
            $post->save();
        }

        return redirect()->route('post.panel')->with('message', 'Post updated successfully!');
    }



    public function destroy($type, $id, Request $request)
    {
        if($type == 'public'){
            PublicPost::where('id', '=', $id)->delete();
        }else{
            ProtectedPost::where('id', '=', $id)->delete();
        }

        return redirect()->route('post.panel')->with('message', 'Post deleted successfully!');
    }
}
