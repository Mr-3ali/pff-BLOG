@extends('layout')

@section('content')
    <div class="bg-white shadow-md rounded p-6">
        <h1 class="text-2xl font-bold mb-4">Posts</h1>
        <a href="{{ route('posts.create') }}" class="text-blue-500 hover:underline">Create Post</a>
        <table class="min-w-full mt-4">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b border-gray-200">Title</th>
                    <th class="px-6 py-3 border-b border-gray-200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
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
