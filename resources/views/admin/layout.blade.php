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
                <a href="{{ route('admin.posts.index') }}" class="text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md text-sm font-medium">Posts</a>
                <a href="{{ route('admin.categories.index') }}" class="text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md text-sm font-medium">Categories</a>
                <a href="{{ route('admin.users.index') }}" class="text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md text-sm font-medium">Users</a>
                <a href="{{ route('admin.comments.index') }}" class="text-gray-800 hover:text-gray-600 px-3 py-2 rounded-md text-sm font-medium">Comments</a>
                <a href="{{ route('logout') }}" class="text-red-500 hover:text-red-700 flex items-center"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt mr-1"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
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