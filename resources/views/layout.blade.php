<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Minimal Blog')</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind CSS with Typography Plugin -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/typography@0.4.0/dist/typography.min.css" rel="stylesheet">
   
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: 'Karla', sans-serif;
        }
        #progressBar {
            position: fixed;
            top: 0;
            left: 0;
            width: 0;
            height: 5px;
            background-color: #3490dc;
            z-index: 50;
        }
    </style>
</head>
<body class="bg-white">

    <div id="progressBar"></div>

    <!-- Top Bar Nav -->
    <nav class="w-full py-4 bg-blue-800 shadow">
        <div class="container mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-6 text-white">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="{{ route('posts.index') }}" class="hover:text-gray-300">Home</a>
                <a href="{{ route('categories.index') }}" class="hover:text-gray-300">Categories</a>
            </div>
            <div class="flex items-center space-x-4 text-white">
                @guest
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded bg-white text-blue-800 hover:bg-gray-200">Sign In</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 rounded bg-white text-blue-800 hover:bg-gray-200">Sign Up</a>
                @else
                    @if (Auth::user()->is_admin)
                        <a href="{{ route('admin.posts.index') }}" class="flex items-center hover:text-gray-300">
                            <i class="fas fa-cogs mr-1"></i> Admin Management
                        </a>
                    @endif
                    <a href="{{ route('logout') }}" class="px-4 py-2 rounded bg-red-600 hover:bg-red-700 flex items-center" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt mr-1"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Conditional Text Header and Topic Nav -->
    @if (!request()->routeIs('posts.show'))
        <header class="container mx-auto text-center py-12">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="{{ route('posts.index') }}">Minimal Blog</a>
            <p class="text-lg text-gray-600">Lorem Ipsum Dolor Sit Amet</p>
        </header>

        <nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
            <div class="block sm:hidden">
                <a
                    href="#"
                    class="block text-base font-bold uppercase text-center flex justify-center items-center"
                    @click="open = !open"
                >
                    Topics <i :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas ml-2"></i>
                </a>
            </div>
            <div :class="open ? 'block' : 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
                <div class="container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                    @foreach ($categories as $category)
                        <a href="{{ route('categories.show', $category->slug) }}" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
        </nav>
    @endif

    <!-- Content -->
    <main class="container mx-auto py-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="w-full border-t bg-white py-6">
        <div class="container mx-auto flex flex-col items-center">
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                <a href="#" class="uppercase px-3">About Us</a>
                <a href="#" class="uppercase px-3">Privacy Policy</a>
                <a href="#" class="uppercase px-3">Terms & Conditions</a>
                <a href="#" class="uppercase px-3">Contact Us</a>
            </div>
            <div class="uppercase pb-6">&copy; myblog.com</div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>