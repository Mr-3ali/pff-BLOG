@extends('admin.layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6">Admin - Create Post</h1>
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Title</label>
            <input type="text" name="title" class="w-full p-2 border border-gray-300 rounded mt-1" required>
        </div>
        <div class="mb-4">
            <label for="content" class="block text-gray-700">Content</label>
            <div id="editor" class="w-full p-2 border border-gray-300 rounded mt-1"></div>
            <input type="hidden" name="content" id="content">
        </div>
        <div class="mb-4">
            <label for="slug" class="block text-gray-700">Slug</label>
            <input type="text" name="slug" class="w-full p-2 border border-gray-300 rounded mt-1" required>
        </div>
        <div class="mb-4">
            <label for="category_id" class="block text-gray-700">Category</label>
            <select name="category_id" class="w-full p-2 border border-gray-300 rounded mt-1" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-700">Image</label>
            <input type="file" name="image" class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow">
            <i class="fas fa-check mr-2"></i>Create
        </button>
    </form>
</div>

@push('scripts')
<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });

    document.querySelector('form').onsubmit = function() {
        document.querySelector('input[name=content]').value = quill.root.innerHTML;
    };
</script>
@endpush
@endsection