@extends('admin.layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6">{{ isset($user) ? 'Edit' : 'Create' }} User</h1>
    <form action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}" method="POST">
        @csrf
        @if(isset($user))
            @method('PUT')
        @endif
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" value="{{ $user->name ?? '' }}" class="w-full p-2 border border-gray-300 rounded mt-1" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" value="{{ $user->email ?? '' }}" class="w-full p-2 border border-gray-300 rounded mt-1" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password</label>
            <input type="password" name="password" class="w-full p-2 border border-gray-300 rounded mt-1" {{ isset($user) ? '' : 'required' }}>
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
            <input type="password" name="password_confirmation" class="w-full p-2 border border-gray-300 rounded mt-1" {{ isset($user) ? '' : 'required' }}>
        </div>
        <div class="mb-4">
            <label for="is_admin" class="block text-gray-700">Role</label>
            <select name="is_admin" class="w-full p-2 border border-gray-300 rounded mt-1" required>
                <option value="0" {{ isset($user) && !$user->is_admin ? 'selected' : '' }}>User</option>
                <option value="1" {{ isset($user) && $user->is_admin ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow">
            <i class="fas fa-check mr-2"></i>{{ isset($user) ? 'Update' : 'Create' }}
        </button>
    </form>
</div>
@endsection
