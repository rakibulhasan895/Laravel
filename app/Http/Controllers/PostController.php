<?php

namespace App\Http\Controllers;

use App\Events\PostPublished;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Display a list of posts
    }

    public function create(Request $request)
    {
        $post = Post::create([
            'title' => $request->input('title') ?? ' test title',
            'content' => $request->input('content') ?? 'asfdgfghj'
        ]);
        PostPublished::dispatch($post);
        return response()->json(['message' => 'Post created successfully'], 201);

    }

    public function store(Request $request)
    {
        // Validate and save a new post
    }

    public function show($id)
    {
        // Display a single post
    }

    public function edit($id)
    {
        // Show a form to edit an existing post
    }

    public function update(Request $request, $id)
    {
        // Validate and update an existing post
    }

    public function destroy($id)
    {
        // Delete a post
    }
}
