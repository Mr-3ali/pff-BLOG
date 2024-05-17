@extends('layout')

@section('content')
    <div class="bg-white shadow-md rounded p-6">
        <h1 class="text-2xl font-bold mb-4">Edit Post</h1>
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
                <input type="text" name="title" class="mt-1 block w-full border border-gray-300 rounded p-2" value="{{ $post->title }}">
            </div>
            <div class="mb-4">
                <label for="content" class="block text-gray-700">Content</label>
                <textarea name="content" class="mt-1 block w-full border border-gray-300 rounded p-2">{{ $post->content }}</textarea>
            </div>
            <div class="mb-4">
                <label for="slug" class="block text-gray-700">Slug</label>
                <input type="text" name="slug" class="mt-1 block w-full border border-gray-300 rounded p-2" value="{{ $post->slug }}">
            </div>
            <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">Update</button>
        </form>
    </div>
@endsection
