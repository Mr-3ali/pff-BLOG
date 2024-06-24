<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Management Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <!-- Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Top Bar -->
    <nav class="bg-white shadow-md py-4">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <div class="text-xl font-bold text-gray-800">Admin Dashboard</div>
            <div class="flex items-center space-x-4">
                <!-- Dropdown Menu -->
                <div class="relative">
                    <button class="flex items-center text-gray-800 hover:text-gray-600 focus:outline-none" onclick="toggleDropdown()">
                        <span>Manage</span>
                        <i class="fas fa-chevron-down ml-2"></i>
                    </button>
                    <div id="dropdownMenu" class="absolute mt-2 w-48 bg-white rounded-md shadow-lg z-10 hidden">
                        <a href="{{ route('admin.posts.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Posts</a>
                        <a href="{{ route('admin.categories.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Categories</a>
                    </div>
                </div>
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

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg overflow-hidden shadow-lg max-w-sm w-full">
            <div class="p-6">
                <h2 class="text-xl font-bold mb-4">Delete Confirmation</h2>
                <p class="mb-4">Are you sure you want to delete this item?</p>
                <div class="flex justify-end space-x-4">
                    <button onclick="toggleModal('deleteModal')" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Cancel</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.7/quill.js"></script>
    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('hidden');
        }

        function toggleModal(modalID) {
            var modal = document.getElementById(modalID);
            modal.classList.toggle('hidden');
        }

        function setDeleteAction(action) {
            var form = document.getElementById('deleteForm');
            form.action = action;
            toggleModal('deleteModal');
        }
    </script>
    @stack('scripts')
</body>
</html>