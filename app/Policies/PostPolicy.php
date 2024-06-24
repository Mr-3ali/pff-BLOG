<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any posts.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        // Only admins can view any posts
        return $user->is_admin;
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return bool
     */
    public function view(User $user, Post $post)
    {
        // Only admins can view a specific post
        return $user->is_admin;
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        // Only admins can create posts
        return $user->is_admin;
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return bool
     */
    public function update(User $user, Post $post)
    {
        // Only admins can update posts
        return $user->is_admin;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return bool
     */
    public function delete(User $user, Post $post)
    {
        // Only admins can delete posts
        return $user->is_admin;
    }
}