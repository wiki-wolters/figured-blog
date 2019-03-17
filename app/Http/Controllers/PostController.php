<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostCollection;
use App\Post;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $post = new Post($request->all());

        $post->save();

        return response()->json(['success' => 1]);
    }

    public function index($startIndex = 0)
    {
        return Post::orderBy('created_at', 'desc')->paginate(15);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);

        $post->update($request->all());

        return response()->json(['success' => 1]);
    }

    public function delete($id)
    {
        $post = Post::find($id);

        $post->delete();

        return response()->json(['success' => 1]);
    }
}