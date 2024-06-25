@extends('admin.layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6">Edit User</h1>
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" class="w-full p-2 border border-gray-300 rounded mt-1" value="{{ $user->name }}" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full p-2 border border-gray-300 rounded mt-1" value="{{ $user->email }}" required>
        </div>
        <div class="mb-4">
            <label for="is_admin" class="block text-gray-700">Admin</label>
            <input type="checkbox" name="is_admin" class="mt-1" {{ $user->is_admin ? 'checked' : '' }}>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow">
            <i class="fas fa-check mr-2"></i>Update
        </button>
    </form>
</div>
@endsection
