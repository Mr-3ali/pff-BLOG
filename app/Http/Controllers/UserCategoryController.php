<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class UserCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('user.categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->paginate(9);
        $categories = Category::all();
        $recent_posts = Post::latest()->take(5)->get();

        return view('user.categories.show', compact('category', 'posts', 'categories', 'recent_posts'));
    }
}
