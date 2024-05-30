<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Management Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar-minimized {
            width: 64px;
        }
        .sidebar-expanded {
            width: 240px;
        }
        .sidebar-text {
            transition: opacity 0.3s ease-in-out;
        }
        .hidden-text {
            opacity: 0;
        }
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
        }
    </style>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea.rich-text',
            plugins: 'image link media table',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image media link',
            height: 400
        });
    </script>
</head>
<body class="bg-gray-100 flex h-full w-full">

    <!-- Sidebar -->
    <div id="sidebar" class="h-full bg-white shadow-md flex flex-col sidebar-expanded transition-all duration-300">
        <div class="flex items-center justify-between p-4 border-b">
            <button id="toggleSidebar" class="focus:outline-none text-gray-800 text-xl">
                <i class="fas fa-bars"></i>
            </button>
            <span class="text-xl font-bold text-gray-800 ml-3 sidebar-title">Admin :</span>
        </div>
        <nav class="mt-6 flex-1">
            <div class="flex flex-col">
                <button class="flex items-center p-3 text-gray-800 hover:bg-gray-200 rounded-md focus:outline-none" onclick="toggleDropdown('postsDropdown')">
                    <i class="fas fa-pencil-alt text-lg"></i>
                    <span class="ml-3 sidebar-text">Posts :</span>
                    <i class="fas fa-chevron-down ml-auto sidebar-text"></i>
                </button>
                <div id="postsDropdown" class="hidden flex-col pl-12">
                    <a href="{{ route('admin.posts.create') }}" class="flex items-center p-3 text-gray-800 hover:bg-gray-200 rounded-md">
                        <span class="ml-3 sidebar-text">Create Post</span>
                    </a>
                    <a href="{{ route('admin.posts.index') }}" class="flex items-center p-3 text-gray-800 hover:bg-gray-200 rounded-md">
                        <span class="ml-3 sidebar-text">Manage Posts</span>
                    </a>
                </div>
            </div>
            <div class="flex flex-col">
                <button class="flex items-center p-3 text-gray-800 hover:bg-gray-200 rounded-md focus:outline-none" onclick="toggleDropdown('categoriesDropdown')">
                    <i class="fas fa-folder text-lg"></i>
                    <span class="ml-3 sidebar-text">Categories :</span>
                    <i class="fas fa-chevron-down ml-auto sidebar-text"></i>
                </button>
                <div id="categoriesDropdown" class="hidden flex-col pl-12">
                    <a href="{{ route('admin.categories.create') }}" class="flex items-center p-3 text-gray-800 hover:bg-gray-200 rounded-md">
                        <span class="ml-3 sidebar-text">Create Category</span>
                    </a>
                    <a href="{{ route('admin.categories.index') }}" class="flex items-center p-3 text-gray-800 hover:bg-gray-200 rounded-md">
                        <span class="ml-3 sidebar-text">Manage Categories</span>
                    </a>
                </div>
            </div>
            <a href="#" class="flex items-center p-3 text-gray-800 hover:bg-gray-200 rounded-md">
                <i class="fas fa-comments text-lg"></i>
                <span class="ml-3 sidebar-text">Comments :</span>
            </a>
        </nav>
        <div class="p-4 border-t">
            <a href="{{ route('logout') }}" class="flex items-center p-3 text-gray-800 hover:bg-red-100 rounded-md">
                <i class="fas fa-sign-out-alt text-lg"></i>
                <span class="ml-3 sidebar-text">Logout</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6 h-full w-full">
        @yield('content')
    </div>

    <script>
        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const sidebarText = document.querySelectorAll('.sidebar-text');
        const sidebarTitle = document.querySelector('.sidebar-title');

        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('sidebar-minimized');
            sidebar.classList.toggle('sidebar-expanded');
            sidebarText.forEach(text => text.classList.toggle('hidden-text'));
            sidebarTitle.classList.toggle('hidden');
        });

        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            dropdown.classList.toggle('hidden');
        }
    </script>

</body>
</html>
