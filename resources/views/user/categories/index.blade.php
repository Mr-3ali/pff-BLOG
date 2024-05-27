@extends('layout')

@section('content')
<!-- Categories Section -->
<section class="w-full md:w-2/3 flex flex-col items-center px-3">

    <h1 class="text-4xl font-bold mb-4">Categories</h1>

    @foreach ($categories as $category)
        <div class="bg-white shadow rounded my-4 p-6">
            <a href="{{ route('categories.show', $category->slug) }}" class="text-2xl font-bold hover:text-gray-700">{{ $category->name }}</a>
        </div>
    @endforeach

</section>
@endsection
