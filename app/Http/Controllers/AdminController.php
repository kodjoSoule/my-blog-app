<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }
    public function posts()
    {
        $posts = Post::all();
        return view('administration.posts', [
            'posts' => $posts
        ]);
    }
    public function postsEdit($post_id)
    {
    }
}
