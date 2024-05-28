@extends('layout')

@section('content')
<!-- Post Section -->
<section class="w-full md:w-2/3 flex flex-col items-center px-3">

    <article class="flex flex-col shadow my-4">
        <!-- Article Image -->
        @if ($post->image)
            <a href="#" class="hover:opacity-75">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
            </a>
        @endif
        <div class="bg-white flex flex-col justify-start p-6">
            <a href="{{ route('categories.show', $post->category->slug) }}" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $post->category->name }}</a>
            <h1 class="text-3xl font-bold pb-4">{{ $post->title }}</h1>
            <p class="text-sm pb-8">
                Published on {{ $post->created_at->format('F j, Y') }}
            </p>
            <div>
                {!! $post->content !!}
            </div>
        </div>
    </article>

    <!-- Comments Section -->
    <section class="w-full my-4">
        <h2 class="text-xl font-bold mb-4">Comments</h2>
        @foreach ($post->comments as $comment)
            <div class="bg-white shadow p-4 mb-4">
                <p class="text-sm text-gray-600">Published on {{ $comment->created_at->format('F j, Y') }}</p>
                <p>{{ $comment->content }}</p>
            </div>
        @endforeach

        @auth
            <form action="{{ route('comments.store', $post->slug) }}" method="POST" class="bg-white shadow p-4">
                @csrf
                <div class="mb-4">
                    <label for="content" class="text-gray-700">Add a Comment</label>
                    <textarea name="content" rows="3" class="w-full p-2 border border-gray-300 rounded mt-1" required></textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Post Comment</button>
            </form>
        @else
            <p class="text-gray-600">You need to <a href="{{ route('login') }}" class="text-blue-500 hover:underline">login</a> to post a comment.</p>
        @endauth
    </section>

    <div class="w-full flex pt-6">
        @if ($previous)
            <a href="{{ route('posts.show', $previous->slug) }}" class="w-1/2 bg-white shadow hover:shadow-md text-left p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i> Previous</p>
                <p class="pt-2">{{ $previous->title }}</p>
            </a>
        @endif
        @if ($next)
            <a href="{{ route('posts.show', $next->slug) }}" class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Next <i class="fas fa-arrow-right pl-1"></i></p>
                <p class="pt-2">{{ $next->title }}</p>
            </a>
        @endif
    </div>
</section>
@endsection
