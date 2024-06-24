<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\UserCategoryController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\UserCommentController; // Correct the casing for consistency

// Public Routes
Route::get('/', [UserPostController::class, 'index'])->name('home');
Route::get('/posts', [UserPostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post:slug}', [UserPostController::class, 'show'])->name('posts.show');
Route::get('/categories', [UserCategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category:slug}', [UserCategoryController::class, 'show'])->name('categories.show');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::post('/posts/{post:slug}/comments', [UserCommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [UserCommentController::class, 'destroy'])->name('comments.destroy');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->as('admin.')->group(function () {
    // Admin Posts Routes
    Route::resource('posts', AdminPostController::class)->except(['show']);
    
    // Admin Categories Routes
    Route::resource('categories', AdminCategoryController::class)->except(['show']);
});

// Authentication Routes
Auth::routes();
