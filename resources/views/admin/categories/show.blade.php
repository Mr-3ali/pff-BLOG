@extends('layout')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6">{{ $category->name }}</h1>
        <p class="text-gray-700">{{ $category->slug }}</p>
        <a href="{{ route('categories.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded shadow mt-4 inline-block">
            <i class="fas fa-arrow-left mr-2"></i>Back to Categories
        </a>
    </div>
@endsection
