@extends('layout')

@section('title', 'Categories')

@section('content')
<!-- Categories Section -->
<section class="w-full flex flex-col items-center px-3">
    <h1 class="text-4xl font-bold mb-8">Categories</h1>

    <div class="flex flex-wrap justify-center">
        @foreach ($categories as $category)
            <a href="{{ route('categories.show', $category->slug) }}" class="m-2 px-4 py-2 bg-blue-100 text-blue-700 rounded-full shadow hover:bg-blue-200 transition duration-200">
                {{ $category->name }}
            </a>
        @endforeach
    </div>
</section>
@endsection
