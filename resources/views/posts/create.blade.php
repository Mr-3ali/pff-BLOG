@extends('layout')

@section('content')
    <div class="bg-white shadow-md rounded p-6">
        <h1 class="text-2xl font-bold mb-4">Create Post</h1>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
                <input type="text" name="title" class="mt-1 block w-full border border-gray-300 rounded p-2">
            </div>
            <div class="mb-4">
                <label for="content" class="block text-gray-700">Content</label>
                <textarea name="content" class="mt-1 block w-full border border-gray-300 rounded p-2"></textarea>
            </div>
            <div class="mb-4">
                <label for="slug" class="block text-gray-700">Slug</label>
                <input type="text" name="slug" class="mt-1 block w-full border border-gray-300 rounded p-2">
            </div>
            <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">Create</button>
        </form>
    </div>
@endsection
