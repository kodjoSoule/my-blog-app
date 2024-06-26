<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::all();

        $posts = Post::orderBy('created_at', 'desc')->paginate(6);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     *
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $data['user_id'] = auth()->id();
        Post::create($data);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        $comments = Comment::where('post_id', $id)->get();
        return view('posts.show', ['post' => $post, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //edit post


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = Post::find($id);
        $post->update($data);

        return redirect()->route('posts.show', ['id' => $post->id]);
    }

    /**
     *
     * Remove the specified resource from storage.
     *
     */
    public function destroy(string $id)
    {
    }
}
