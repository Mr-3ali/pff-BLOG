<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\UserCategoryController;
use App\Http\Controllers\AdminCategoryController;

// Public Routes
Route::get('/', [UserPostController::class, 'index'])->name('home');
Route::get('/posts', [UserPostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post:slug}', [UserPostController::class, 'show'])->name('posts.show');
Route::get('/categories', [UserCategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category:slug}', [UserCategoryController::class, 'show'])->name('categories.show');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store'])->name('comments.store');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/posts', [AdminPostController::class, 'adminIndex'])->name('admin.posts.index');
    Route::get('/admin/posts/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
    Route::post('/admin/posts', [AdminPostController::class, 'store'])->name('admin.posts.store');
    Route::get('/admin/posts/{post:slug}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/admin/posts/{post:slug}', [AdminPostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/admin/posts/{post:slug}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');

    Route::get('/admin/categories', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/{category:slug}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/{category:slug}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category:slug}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');
});

Auth::routes();