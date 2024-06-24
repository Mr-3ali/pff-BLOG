<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class UserCategoryController extends Controller
{
    /**
     * Display a listing of categories.
     */
    public function index()
    {
        // Fetch all categories
        $categories = Category::all();
        
        // Return the view with categories data
        return view('user.categories.index', compact('categories'));
    }

    /**
     * Display the specified category and its posts.
     */
    public function show(Category $category)
    {
        // Fetch posts that belong to the specified category with pagination
        $posts = Post::where('category_id', $category->id)->paginate(9);
        
        // Fetch all categories for the sidebar or navigation
        $categories = Category::all();
        
        // Fetch the latest 5 posts for the recent posts section
        $recent_posts = Post::latest()->take(5)->get();

        // Return the view with category, posts, categories, and recent posts data
        return view('user.categories.show', compact('category', 'posts', 'categories', 'recent_posts'));
    }
}
