<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Post;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer('layout', function ($view) {
            $categories = Category::all();
            $recent_posts = Post::latest()->take(5)->get();
            $view->with(compact('categories', 'recent_posts'));
        });
    }
}
