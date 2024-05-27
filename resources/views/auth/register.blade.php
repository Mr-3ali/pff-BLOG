@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="max-w-md mx-auto my-10 bg-white p-5 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center">Register</h2>
        <form method="POST" action="{{ route('register') }}" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                @error('name')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                @error('email')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" required autocomplete="new-password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                @error('password')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password-confirm" class="block text-gray-700">Confirm Password</label>
                <input type="password" id="password-confirm" name="password_confirmation" required autocomplete="new-password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Register</button>
                <a href="{{ route('login') }}" class="text-sm text-blue-500 hover:underline">Already have an account?</a>
            </div>
        </form>
    </div>
</div>
@endsection
