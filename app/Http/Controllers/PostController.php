<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Auth\Events\Validated;
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
        // Validation to ensure title and content are provided
        $request->validate([
            'title' => 'required|string|max:255',
            'contents' => 'required|string',
        ]);
    
        // Create the post with title and content
        $post = Post::create([
            'title' => $request->title,
            'contents' => $request->contents,
        ]);
    
        return response()->json([
            'message' => 'Post is Created!!',
            'post' => $post
        ], 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::whereId( $id )->first();
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
        

        $post-> title = $request-> title;
        $post->content= $request-> content;
        $post->save();

        return response()->json([ 
            'message'=>'post updated',
            'post'=> $post
            ],200);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
