@extends('admin.layout')

@section('content')
<!-- Main Container -->
<div class="bg-white p-6 rounded-lg shadow-lg">
    <!-- Page Title -->
    <h1 class="text-2xl font-bold mb-6">Edit Post</h1>
    
    <!-- Form for Editing a Post -->
    <form id="post-form" action="{{ route('admin.posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- Title and Slug Inputs -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
            <div>
                <label for="title" class="block text-gray-700 mb-2">Title</label>
                <input type="text" name="title" value="{{ $post->title }}" class="w-full p-3 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            <div>
                <label for="slug" class="block text-gray-700 mb-2">Slug</label>
                <input type="text" name="slug" value="{{ $post->slug }}" class="w-full p-3 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
        </div>
        
        <!-- Category and Image Inputs -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
            <div>
                <label for="category_id" class="block text-gray-700 mb-2">Category</label>
                <select name="category_id" class="w-full p-3 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if($post->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="image" class="block text-gray-700 mb-2">Image</label>
                <input type="file" name="image" class="w-full p-3 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400" accept="image/*">
            </div>
        </div>
        
        <!-- Content Editor -->
        <div class="mb-4">
            <label for="content" class="block text-gray-700 mb-2">Content</label>
            <div id="editor" class="w-full p-3 border border-gray-300 rounded mt-1" style="min-height: 300px;">{!! $post->content !!}</div>
            <input type="hidden" name="content" id="content">
        </div>
        
        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <i class="fas fa-check mr-2"></i>Update
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Quill Editor
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, false] }],
                    ['bold', 'italic', 'underline'],
                    ['clean']
                ]
            }
        });

        // Submit Form with Quill Content
        var form = document.getElementById('post-form');
        form.onsubmit = function () {
            var contentInput = document.querySelector('input[name=content]');
            contentInput.value = quill.root.innerHTML;
        };
    });
</script>
@endpush
@endsection
