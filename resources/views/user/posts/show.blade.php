@extends('layout')

@section('content')
<!-- Post Section -->
<section class="max-w-3xl mx-auto p-4">
    <article class="bg-white rounded shadow-lg overflow-hidden mb-6">
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-64 object-cover">
        @endif
        <div class="p-6">
            <a href="{{ route('categories.show', $post->category->slug) }}" class="text-blue-700 text-sm font-bold uppercase">{{ $post->category->name }}</a>
            <h1 class="text-3xl font-bold mt-2">{{ $post->title }}</h1>
            <p class="text-sm text-gray-600 mt-2">
                Published on {{ $post->created_at->format('F j, Y') }}
            </p>
            <div class="prose prose-lg mt-6">
                {!! $post->content !!}
            </div>
        </div>
    </article>

    <!-- Comments Section -->
    <section class="bg-white rounded shadow-lg p-6 mb-6">
        <h2 class="text-xl font-bold mb-4">Comments</h2>
        @foreach ($post->comments as $comment)
            <div class="bg-gray-100 p-4 mb-4 rounded">
                <p class="text-sm text-gray-600">Published on {{ $comment->created_at->format('F j, Y') }}</p>
                <p>{{ $comment->content }}</p>
            </div>
        @endforeach

        @auth
            <form action="{{ route('comments.store', $post->slug) }}" method="POST" class="bg-gray-100 p-4 rounded">
                @csrf
                <div class="mb-4">
                    <label for="content" class="block text-gray-700">Add a Comment</label>
                    <textarea name="content" rows="3" class="w-full p-2 border border-gray-300 rounded mt-1" required></textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Post Comment</button>
            </form>
        @else
            <p class="text-gray-600">You need to <a href="{{ route('login') }}" class="text-blue-500 hover:underline">login</a> to post a comment.</p>
        @endauth
    </section>

    <div class="flex justify-between items-center">
        @if ($previous)
            <a href="{{ route('posts.show', $previous->slug) }}" class="bg-white shadow rounded p-4 w-1/2 mr-2 hover:shadow-md">
                <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i> Previous</p>
                <p class="pt-2">{{ $previous->title }}</p>
            </a>
        @endif
        @if ($next)
            <a href="{{ route('posts.show', $next->slug) }}" class="bg-white shadow rounded p-4 w-1/2 ml-2 hover:shadow-md text-right">
                <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Next <i class="fas fa-arrow-right pl-1"></i></p>
                <p class="pt-2">{{ $next->title }}</p>
            </a>
        @endif
    </div>
</section>
@endsection
