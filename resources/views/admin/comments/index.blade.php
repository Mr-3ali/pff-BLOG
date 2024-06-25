@extends('admin.layout')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold text-gray-800">Comments</h1>
        <form id="search-form" method="GET" action="{{ route('admin.comments.index') }}" class="flex">
            <input type="text" name="search" placeholder="Search for comments or posts" value="{{ $search }}"
                class="w-full md:w-80 px-3 h-10 rounded-l border-2 border-sky-500 focus:outline-none focus:border-sky-500">
            <button type="submit" class="bg-sky-500 text-white rounded-r px-2 md:px-3 py-0 md:py-1">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-600">Post Title</th>
                    <th class="px-4 py-2 text-left text-gray-600">Comment Content</th>
                    <th class="px-4 py-2 text-left text-gray-600">User</th>
                    <th class="px-4 py-2 text-left text-gray-600">Date</th>
                    <th class="px-4 py-2 text-right text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($comments as $comment)
                <tr class="border-t">
                    <td class="px-4 py-2">
                        <a href="{{ route('posts.show', $comment->post->slug) }}" class="text-blue-500 hover:text-blue-700">{{ $comment->post->title }}</a>
                    </td>
                    <td class="px-4 py-2">{{ $comment->content }}</td>
                    <td class="px-4 py-2">{{ $comment->user->name }}</td>
                    <td class="px-4 py-2">{{ $comment->created_at->format('F j, Y') }}</td>
                    <td class="px-4 py-2 text-right">
                        <button data-modal-target="deleteModal" data-modal-toggle="deleteModal" class="text-red-500 hover:text-red-700 ml-2" onclick="setDeleteAction('{{ route('admin.comments.destroy', $comment->id) }}')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex items-center py-8">
        {{ $comments->links('vendor.pagination.custom') }}
    </div>
</div>

@push('scripts')
<script>
    function setDeleteAction(action) {
        const form = document.getElementById('deleteForm');
        form.action = action;
    }
</script>
@endpush
@endsection