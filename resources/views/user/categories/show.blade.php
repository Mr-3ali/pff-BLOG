@extends('layout')

@section('title', $category->name)

@section('content')
<div class="max-w-7xl mx-auto my-8 px-2">
    <h1 class="text-4xl font-bold mb-6 text-center">{{ $category->name }}</h1>

    <ul class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 p-2 xl:p-5">
        @foreach ($posts as $post)
            <li class="relative bg-white flex flex-col justify-between border rounded shadow-md hover:shadow-teal-400 transition-shadow duration-200">
                <a class="relative" href="{{ route('posts.show', $post->slug) }}">
                    <img class="rounded-t-lg w-full object-cover h-48" src="{{ $post->image ? asset('storage/' . $post->image) : 'https://via.placeholder.com/400x200' }}" alt="{{ $post->title }}" loading="lazy">
                </a>
                <div class="flex flex-col justify-between gap-3 px-4 py-4">
                    <a href="{{ route('posts.show', $post->slug) }}" class="flex flex-col text-left text-xl font-semibold text-teal-700 hover:text-teal-800">
                        <span>{{ $post->title }}</span>
                        <small class="font-medium text-sm">- {{ $post->category->name }}</small>
                    </a>
                    <p class="text-gray-600">{{ Str::limit(strip_tags($post->content), 150) }}</p>
                    <a href="{{ route('posts.show', $post->slug) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </li>
        @endforeach
    </ul>

    <!-- Pagination -->
    <div class="flex items-center py-8 justify-center">
        {{ $posts->links('vendor.pagination.custom') }}
    </div>
</div>
@endsection