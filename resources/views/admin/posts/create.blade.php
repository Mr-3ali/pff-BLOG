@extends('admin.layout')

@section('content')
    <div class="min-h-screen bg-white p-6">
        <h1 class="text-2xl font-bold mb-6">Admin - Create Post</h1>
        <form id="post-form" action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div>
                    <label for="title" class="block text-gray-700">Title</label>
                    <input type="text" name="title" class="w-full p-2 border border-gray-300 rounded mt-1" required>
                </div>
                <div>
                    <label for="slug" class="block text-gray-700">Slug</label>
                    <input type="text" name="slug" class="w-full p-2 border border-gray-300 rounded mt-1" required>
                </div>
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
                <label for="content" class="block text-gray-700">Content</label>
                <input type="hidden" name="content" id="content">
                <div id="editor" class="w-full p-2 border border-gray-300 rounded mt-1" style="min-height: 400px;"></div>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image</label>
                <input type="file" name="image" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded shadow">
                    <i class="fas fa-check mr-2"></i>Create
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.quilljs.com/1.3.7/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, false] }],
                        ['bold', 'italic', 'underline'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        ['link', 'image'],
                        ['clean']
                    ]
                }
            });

            var form = document.getElementById('post-form');
            form.onsubmit = function () {
                var contentInput = document.querySelector('input[name=content]');
                contentInput.value = quill.root.innerHTML;
            };
        });
    </script>
@endsection
