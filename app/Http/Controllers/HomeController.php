<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    //
    public function index()
    {
        // $posts = Post::latest()->take(4)->get();
        //ce qui sont publier
        $posts = Post::where('is_published', 1, now())->latest()->take(10)->get();
        return view('home', ['posts' => $posts]);
    }
}
