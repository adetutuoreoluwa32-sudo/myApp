<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */


public function index()
{
    $posts = Post::latest()->get();

    $apiResponse = Http::get('https://jsonplaceholder.typicode.com/posts');

    $externalPosts = collect($apiResponse->json())->take(5);

    return view('posts.index', compact('posts', 'externalPosts'));
}
    /**
     * Show the form for creating a new resource.
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
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'author' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('posts', 'public');
    }

    Post::create([
        'title' => $request->title,
        'content' => $request->content,
        'author' => $request->author,
        'image' => $imagePath,
    ]);

    return redirect('/')->with('success', 'Post created successfully!');
}


    /**
     * Display the specified resource.
     */
public function show(Post $post)
{
    return view('posts.show', compact('post'));
}

    /**
     * Show the form for editing the specified resource.
     */
  public function edit(Post $post)
{
    return view('posts.edit', compact('post'));
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Post $post)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'author' => 'required',
    ]);

    $post->update($request->all());

    return redirect('/')->with('success', 'Post updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
{
    $post->delete();

    return redirect('/')->with('success', 'Post deleted!');
}
}
