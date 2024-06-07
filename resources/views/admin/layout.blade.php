<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Management Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Top Bar -->
    <nav class="bg-white shadow-md py-4">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <div class="text-xl font-bold text-gray-800">Admin Dashboard</div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.posts.index') }}" class="text-gray-800 hover:text-gray-600">Manage Posts</a>
                <a href="{{ route('admin.categories.index') }}" class="text-gray-800 hover:text-gray-600">Manage Categories</a>
                <a href="{{ route('logout') }}" class="text-red-500 hover:text-red-700">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-8">
        @yield('content')
    </div>

</body>
</html>
