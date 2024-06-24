<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    /**
     * Display a listing of posts.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Initialize query with relationships
        $query = Post::with('category', 'user');

        // Filter by category if specified
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Search by title or content if search term is provided
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        // Paginate and get posts
        $posts = $query->latest()->paginate(9);
        $categories = Category::all();
        $recent_posts = Post::latest()->take(5)->get();

        // Return view with data
        return view('user.posts.index', compact('posts', 'categories', 'recent_posts'));
    }

    /**
     * Display the specified post.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        $categories = Category::all();

        // Fetch related posts from the same category, excluding the current post
        $relatedPosts = Post::where('category_id', $post->category_id)
                            ->where('id', '!=', $post->id)
                            ->inRandomOrder()
                            ->take(3)
                            ->get();

        // If not enough related posts are found, fetch random posts from mixed categories
        if ($relatedPosts->count() < 3) {
            $relatedPosts = Post::where('id', '!=', $post->id)
                                ->inRandomOrder()
                                ->take(3)
                                ->get();
        }

        // Return view with data
        return view('user.posts.show', compact('post', 'relatedPosts', 'categories'));
    }
}