<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Category $category)
    {
        // Only admin can update categories
        return $user->is_admin;
    }

    public function delete(User $user, Category $category)
    {
        // Only admin can delete categories
        return $user->is_admin;
    }
}
