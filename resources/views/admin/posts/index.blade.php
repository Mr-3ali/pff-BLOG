@extends('admin.layout')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold text-gray-800">Posts: {{ $totalPosts }}</h1>
        <a href="{{ route('admin.posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center">
            <i class="fas fa-plus mr-2"></i>Add Post
        </a>
    </div>

    <!-- Search and Filter Form -->
    <form class="flex flex-col md:flex-row gap-3 mb-4" method="GET" action="{{ route('admin.posts.index') }}">
        <div class="flex">
            <input type="text" name="search" placeholder="Search for posts" value="{{ request('search') }}"
                class="w-full md:w-80 px-3 h-10 rounded-l border-2 border-sky-500 focus:outline-none focus:border-sky-500">
            <button type="submit" class="bg-sky-500 text-white rounded-r px-2 md:px-3 py-0 md:py-1">Search</button>
        </div>
        <select name="sort_order"
            class="w-full h-10 border-2 border-sky-500 focus:outline-none focus:border-sky-500 text-sky-500 rounded px-2 md:px-3 py-0 md:py-1 tracking-wider">
            <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Date Descending</option>
            <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Date Ascending</option>
        </select>
    </form>

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
                        <form action="{{ route('admin.posts.destroy', $post->slug) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this post?');">
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

    <!-- Pagination -->
    <div class="flex items-center py-8">
        {{ $posts->links('vendor.pagination.custom') }}
    </div>
</div>
@endsection
