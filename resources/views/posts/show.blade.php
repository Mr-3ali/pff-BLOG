@extends('layout')

@section('content')
    <div class="bg-white shadow-md rounded p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $post->title }}</h1>
        <p class="text-gray-700">{{ $post->content }}</p>
        <a href="{{ route('posts.index') }}" class="text-blue-500 hover:underline mt-4 inline-block">Back to Posts</a>
    </div>
@endsection
