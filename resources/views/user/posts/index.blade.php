@extends('layout')

@section('content')
<!-- Posts Section -->
<section class="w-full md:w-2/3 flex flex-col items-center px-3">

    @foreach ($posts as $post)
        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            <a href="{{ route('posts.show', $post->slug) }}" class="hover:opacity-75">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="{{ route('categories.show', $post->category->slug) }}" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $post->category->name }}</a>
                <a href="{{ route('posts.show', $post->slug) }}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</a>
                <p class="text-sm pb-3">
                    By <a href="#" class="font-semibold hover:text-gray-800">Author Name</a>, Published on {{ $post->created_at->format('F jS, Y') }}
                </p>
                <a href="{{ route('posts.show', $post->slug) }}" class="pb-6">{{ Str::limit($post->content, 150) }}</a>
                <a href="{{ route('posts.show', $post->slug) }}" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
            </div>
        </article>
    @endforeach

    <!-- Pagination -->
    <div class="flex items-center py-8">
        {{ $posts->links() }}
    </div>

</section>

<!-- Sidebar Section -->
<aside class="w-full md:w-1/3 flex flex-col items-center px-3">

    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <p class="text-xl font-semibold pb-5">About Us</p>
        <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>
        <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
            Get to know us
        </a>
    </div>
</aside>
@endsection
