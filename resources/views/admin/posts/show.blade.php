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

        <div class="mt-8">
            <h2 class="text-xl font-bold mb-4">Comments</h2>
            @foreach ($post->comments as $comment)
                <div class="mb-4">
                    <p class="text-gray-700"><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
                    <p class="text-gray-500 text-sm">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
            @endforeach

            @auth
                <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700">Add a comment</label>
                        <textarea name="content" id="content" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Submit</button>
                </form>
            @else
                <p class="text-gray-700">You need to <a href="{{ route('login') }}" class="text-blue-500">login</a> to add a comment.</p>
            @endauth
        </div>
    </div>
@endsection
