<!-- resources/views/layouts/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Top Bar -->
    <nav class="bg-white shadow-md py-4">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <div class="text-xl font-bold text-gray-800"><a href="{{ route('home') }}">Minimal Blog</a></div>
            <div class="flex items-center space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700">Login</a>
                    <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700">Register</a>
                @else
                    <a href="{{ route('logout') }}" class="text-red-500 hover:text-red-700"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-8">
        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>