<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');
        body { font-family: 'Inter', sans-serif; font-size: 0.875rem; } /* Adjusted font size */
        .sidebar { width: 240px; }
        .content { margin-left: 240px; }
        .sidebar a { font-size: 0.875rem; } /* Adjusted font size */
    </style>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex">
        <aside class="fixed top-0 left-0 h-full sidebar bg-white text-gray-900 shadow-md flex flex-col justify-between">
            <div class="p-6 flex-1">
                <nav class="space-y-8 text-sm">
                    <div class="space-y-2">
                        <h2 class="text-sm font-semibold tracking-widest uppercase text-gray-600">Management</h2>
                        <div class="flex flex-col space-y-1">
                            <a rel="noopener noreferrer" href="{{ route('admin.posts.index') }}" class="hover:text-blue-500">Manage Posts</a>
                            <a rel="noopener noreferrer" href="{{ route('admin.categories.index') }}" class="hover:text-blue-500">Manage Categories</a>
                            {{-- <a rel="noopener noreferrer" href="{{ route('admin.comments.index') }}" class="hover:text-blue-500">Manage Comments</a> --}}
                        </div>
                    </div>
                </nav>
            </div>
            <div class="p-6">
                <div class="space-y-2">
                    <h2 class="text-sm font-semibold tracking-widest uppercase text-gray-600">Account</h2>
                    <div class="flex flex-col space-y-1">
                        <a rel="noopener noreferrer" href="{{ route('logout') }}" class="text-red-500 hover:text-red-700">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </aside>
        <div class="flex-1 flex flex-col min-h-screen content">
            <main class="flex-1 p-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
