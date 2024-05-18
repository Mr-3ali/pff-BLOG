@extends('layout')

@section('content')
<<<<<<< HEAD
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6">{{ $post->title }}</h1>
        <div class="mb-4">
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-auto object-cover rounded">
            @endif
        </div>
        <p class="text-gray-700">{{ $post->content }}</p>
        <p class="text-gray-600 mt-4">Category: {{ $post->category->name }}</p>
        <a href="{{ route('posts.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded shadow mt-4 inline-block">
            <i class="fas fa-arrow-left mr-2"></i>Back to Posts
        </a>
=======
    <div class="bg-white shadow-md rounded p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $post->title }}</h1>
        <p class="text-gray-700">{{ $post->content }}</p>
        <a href="{{ route('posts.index') }}" class="text-blue-500 hover:underline mt-4 inline-block">Back to Posts</a>
>>>>>>> 7dd9dd5f84590fd390ea1829d9d5f6c6ce0f57e1
    </div>
@endsection
