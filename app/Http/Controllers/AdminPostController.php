<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    public function adminIndex()
    {
        $this->authorize('viewAny', Post::class);
        $posts = Post::with('category')->latest()->paginate(10); // Change to paginate
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $this->authorize('create', Post::class);
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required|unique:posts',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // Handle Quill.js content
        $data['content'] = $request->input('content');

        Post::create($data);
        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required|unique:posts,slug,' . $post->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // Handle Quill.js content
        $data['content'] = $request->input('content');

        $post->update($data);
        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}
