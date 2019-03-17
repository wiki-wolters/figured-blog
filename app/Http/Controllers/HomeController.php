<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'posts' => Post::orderBy('created_at', 'desc')->paginate(15)
        ]);
    }

    public function post($slug)
    {
        if (!$post = Post::whereSlug($slug)->first()) {
            abort(404);
        }

        return view('post', [
            'post' => $post
        ]);
    }
}
