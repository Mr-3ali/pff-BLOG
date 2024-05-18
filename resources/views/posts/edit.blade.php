@extends('layout')

@section('content')
<<<<<<< HEAD
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6">Edit Post</h1>
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
=======
    <div class="bg-white shadow-md rounded p-6">
        <h1 class="text-2xl font-bold mb-4">Edit Post</h1>
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
>>>>>>> 7dd9dd5f84590fd390ea1829d9d5f6c6ce0f57e1
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
<<<<<<< HEAD
                <input type="text" name="title" class="w-full p-2 border border-gray-300 rounded mt-1" value="{{ $post->title }}" required>
            </div>
            <div class="mb-4">
                <label for="content" class="block text-gray-700">Content</label>
                <textarea name="content" class="w-full p-2 border border-gray-300 rounded mt-1" required>{{ $post->content }}</textarea>
            </div>
            <div class="mb-4">
                <label for="slug" class="block text-gray-700">Slug</label>
                <input type="text" name="slug" class="w-full p-2 border border-gray-300 rounded mt-1" value="{{ $post->slug }}" required>
            </div>
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700">Category</label>
                <select name="category_id" class="w-full p-2 border border-gray-300 rounded mt-1" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image</label>
                <input type="file" name="image" class="w-full p-2 border border-gray-300 rounded mt-1">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="mt-4 w-32 h-32 object-cover">
                @endif
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow">
                <i class="fas fa-check mr-2"></i>Update
            </button>
=======
                <input type="text" name="title" class="mt-1 block w-full border border-gray-300 rounded p-2" value="{{ $post->title }}">
            </div>
            <div class="mb-4">
                <label for="content" class="block text-gray-700">Content</label>
                <textarea name="content" class="mt-1 block w-full border border-gray-300 rounded p-2">{{ $post->content }}</textarea>
            </div>
            <div class="mb-4">
                <label for="slug" class="block text-gray-700">Slug</label>
                <input type="text" name="slug" class="mt-1 block w-full border border-gray-300 rounded p-2" value="{{ $post->slug }}">
            </div>
            <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">Update</button>
>>>>>>> 7dd9dd5f84590fd390ea1829d9d5f6c6ce0f57e1
        </form>
    </div>
@endsection
