@extends('layout')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6">Create Category</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" name="name" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label for="slug" class="block text-gray-700">Slug</label>
                <input type="text" name="slug" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow">
                <i class="fas fa-check mr-2"></i>Create
            </button>
        </form>
    </div>
@endsection
