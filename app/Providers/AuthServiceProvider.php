<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Policies\PostPolicy;
use App\Policies\CommentPolicy;
use Illuminate\Support\Facades\Gate;
use App\Policies\CategoryPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // Register CommentPolicy for Comment model
        Comment::class => CommentPolicy::class,
        // Register PostPolicy for Post model
        Post::class => PostPolicy::class,
         // Register PostPolicy for Post model
         Category::class => CategoryPolicy::class,
        ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Additional gates can be defined here if needed
    }
}