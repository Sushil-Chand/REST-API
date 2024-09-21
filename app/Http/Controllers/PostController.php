<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::get();
        return response()->json([
            'message'=>'List of Post',
            'posts'=>$posts
        ],200);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $post = new Post;
        $post->title= $request-> title;
        $post->content= $request-> content;
        $post->save();
    

        return response()->json([
            'message'=>'Post is Created!!',
            'posts'=>$post
        ],200);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json([
            'message'=>'Your Post Showed',
            'posts'=>$post
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
