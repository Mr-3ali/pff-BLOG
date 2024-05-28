@extends('admin.layout')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold text-gray-800">Posts</h1>
        <a href="{{ route('admin.posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center">
            <i class="fas fa-plus mr-2"></i>Add Post
        </a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-600">Title</th>
                    <th class="px-4 py-2 text-left text-gray-600">Category</th>
                    <th class="px-4 py-2 text-left text-gray-600">Image</th>
                    <th class="px-4 py-2 text-right text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($posts as $post)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $post->title }}</td>
                    <td class="px-4 py-2">{{ $post->category->name }}</td>
                    <td class="px-4 py-2">
                        @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-16 h-16 object-cover rounded">
                        @endif
                    </td>
                    <td class="px-4 py-2 text-right">
                        <a href="{{ route('admin.posts.edit', $post->slug) }}" class="text-blue-500 hover:text-blue-700">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.posts.destroy', $post->slug) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 ml-2">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
