@extends('layout')

@section('content')
<!-- Category Section -->
<section class="w-full md:w-2/3 flex flex-col items-center px-3">

    <h1 class="text-4xl font-bold mb-4">{{ $category->name }}</h1>

    @foreach ($posts as $post)
        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            @if ($post->image)
                <a href="{{ route('posts.show', $post->slug) }}" class="hover:opacity-75">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                </a>
            @endif
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="{{ route('categories.show', $post->category->slug) }}" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $post->category->name }}</a>
                <a href="{{ route('posts.show', $post->slug) }}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</a>
                <p class="text-sm pb-3">
                    Published on {{ $post->created_at->format('F j, Y') }}
                </p>
                <a href="{{ route('posts.show', $post->slug) }}" class="pb-6">{{ Str::limit($post->content, 150, '...') }}</a>
                <a href="{{ route('posts.show', $post->slug) }}" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
            </div>
        </article>
    @endforeach

    <!-- Pagination -->
    <div class="flex items-center py-8">
        {{ $posts->links() }}
    </div>
</section>
@endsection
