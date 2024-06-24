<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Define the attributes that are mass assignable
    protected $fillable = [
        'title', 
        'content', 
        'slug', 
        'image', 
        'category_id'
    ];

    // Use 'slug' for route model binding
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Define the relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Comment model
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
