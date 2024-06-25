@extends('admin.layout')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold text-gray-800">Comments</h1>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-600">Post Title</th>
                    <th class="px-4 py-2 text-left text-gray-600">User</th>
                    <th class="px-4 py-2 text-left text-gray-600">Content</th>
                    <th class="px-4 py-2 text-right text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($comments as $comment)
                <tr class="border-t">
                    <td class="px-4 py-2">
                        <a href="{{ route('posts.show', $comment->post->slug) }}" class="text-blue-500 hover:text-blue-700">
                            {{ $comment->post->title }}
                        </a>
                    </td>
                    <td class="px-4 py-2">{{ $comment->user->name }}</td>
                    <td class="px-4 py-2">{{ $comment->content }}</td>
                    <td class="px-4 py-2 text-right">
                        <button onclick="setDeleteAction('{{ route('admin.comments.destroy', $comment->id) }}')" class="text-red-500 hover:text-red-700 ml-2">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
