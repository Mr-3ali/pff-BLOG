@extends('admin.layout')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <!-- Header with Total Posts and Add Post Button -->
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

    <!-- Table of Posts -->
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
                        <a href="{{ route('posts.show', $post->slug) }}" class="text-blue-500 hover:text-blue-700 mr-2">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.posts.edit', $post->slug) }}" class="text-blue-500 hover:text-blue-700">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="text-red-500 hover:text-red-700 ml-2" onclick="openModal('{{ route('admin.posts.destroy', $post->slug) }}')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex items-center py-8">
        {{ $posts->links('vendor.pagination.custom') }}
    </div>
</div>

<!-- Modal HTML -->
<div id="deleteModal" class="hidden fixed top-0 left-0 w-full h-full flex items-center justify-center z-50 bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden w-1/3">
        <div class="p-4 text-center">
            <button type="button" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600" onclick="closeModal()">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 011.414 0L10 8.586l4.293-4.293a1 1 011.414 1.414L11.414 10l4.293 4.293a1 1 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 01-1.414-1.414L8.586 10 4.293 5.707a1 1 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <!-- Danger Icon using Font Awesome -->
            <i class="fas fa-exclamation-triangle text-red-500 w-12 h-12 mx-auto my-2"></i>
            <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
            <div class="flex justify-center items-center space-x-4">
                <button type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" onclick="closeModal()">
                    No, cancel
                </button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                        Yes, I'm sure
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function openModal(action) {
        const form = document.getElementById('deleteForm');
        form.action = action;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
@endpush
@endsection
