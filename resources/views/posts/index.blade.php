@extends('layout')

@section('content')
<<<<<<< HEAD
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6">Posts</h1>
        <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow mb-6 inline-block">
            <i class="fas fa-plus mr-2"></i>Create Post
        </a>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Title</th>
                    <th class="py-2 px-4 border-b">Category</th>
                    <th class="py-2 px-4 border-b">Image</th>
                    <th class="py-2 px-4 border-b">Actions</th>
=======
    <div class="bg-white shadow-md rounded p-6">
        <h1 class="text-2xl font-bold mb-4">Posts</h1>
        <a href="{{ route('posts.create') }}" class="text-blue-500 hover:underline">Create Post</a>
        <table class="min-w-full mt-4">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b border-gray-200">Title</th>
                    <th class="px-6 py-3 border-b border-gray-200">Actions</th>
>>>>>>> 7dd9dd5f84590fd390ea1829d9d5f6c6ce0f57e1
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
<<<<<<< HEAD
                        <td class="py-2 px-4 border-b">{{ $post->title }}</td>
                        <td class="py-2 px-4 border-b">{{ $post->category->name }}</td>
                        <td class="py-2 px-4 border-b">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-16 h-16 object-cover rounded">
                            @endif
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:text-blue-700">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="text-yellow-500 hover:text-yellow-700 ml-4">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block ml-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
=======
                        <td class="px-6 py-4 border-b border-gray-200">{{ $post->title }}</td>
                        <td class="px-6 py-4 border-b border-gray-200">
                            <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:underline mr-2">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="text-yellow-500 hover:underline mr-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">
>>>>>>> 7dd9dd5f84590fd390ea1829d9d5f6c6ce0f57e1
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
