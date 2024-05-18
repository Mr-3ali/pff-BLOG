@extends('layout')

@section('content')
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
    </div>
@endsection
