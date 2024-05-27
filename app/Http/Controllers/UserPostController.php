<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('category', 'user');

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        $posts = $query->latest()->paginate(9);
        $categories = Category::all();
        $recent_posts = Post::latest()->take(5)->get();

        return view('user.posts.index', compact('posts', 'categories', 'recent_posts'));
    }

    public function show(Post $post)
    {
        $categories = Category::all();
        $recent_posts = Post::latest()->take(5)->get();
        $previous = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
        $next = Post::where('id', '>', $post->id)->orderBy('id')->first();

        return view('user.posts.show', compact('post', 'categories', 'recent_posts', 'previous', 'next'));
    }
}
