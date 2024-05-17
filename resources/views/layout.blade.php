<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8 px-6">
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js" defer></script>
</body>
</html>
