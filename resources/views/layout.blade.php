<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Laravel Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <a class="text-xl font-bold text-gray-800" href="#">Laravel Blog</a>
                <div class="flex space-x-4">
                    <a class="text-gray-800 hover:text-gray-600" href="{{ route('posts.index') }}">Posts</a>
                    <a class="text-gray-800 hover:text-gray-600" href="{{ route('posts.create') }}">Create Post</a>
=======
    <title>{{ config('app.name', 'Laravel Blog') }}</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 text-gray-900">

    <nav class="bg-white shadow mb-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-900">{{ config('app.name', 'Laravel Blog') }}</a>
                </div>
                <div>
                    <a href="{{ route('posts.index') }}" class="text-gray-700 hover:text-gray-900 mx-2">Posts</a>
                    <a href="{{ route('posts.create') }}" class="text-gray-700 hover:text-gray-900 mx-2">Create Post</a>
>>>>>>> 7dd9dd5f84590fd390ea1829d9d5f6c6ce0f57e1
                </div>
            </div>
        </div>
    </nav>

<<<<<<< HEAD
    <div class="container mx-auto mt-8 px-6">
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js" defer></script>
=======
    <div class="container mx-auto px-4">
        @yield('content')
    </div>

    <footer class="bg-white shadow mt-8 py-4">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-gray-700">&copy; {{ date('Y') }} Laravel Blog. All rights reserved.</p>
        </div>
    </footer>

    @vite('resources/js/app.js')
>>>>>>> 7dd9dd5f84590fd390ea1829d9d5f6c6ce0f57e1
</body>
</html>
