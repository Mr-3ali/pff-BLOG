@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="max-w-md mx-auto my-10 bg-white p-5 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center">Login</h2>
        <form method="POST" action="{{ route('login') }}" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                @error('email')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" required autocomplete="current-password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                @error('password')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="mr-2">
                    <label for="remember" class="text-gray-700">Remember Me</label>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Login</button>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">Forgot Your Password?</a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection
