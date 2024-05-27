@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="max-w-md mx-auto my-10 bg-white p-5 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center">Reset Password</h2>
        <form method="POST" action="{{ route('password.email') }}" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                @error('email')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Send Password Reset Link</button>
            </div>
        </form>
    </div>
</div>
@endsection
