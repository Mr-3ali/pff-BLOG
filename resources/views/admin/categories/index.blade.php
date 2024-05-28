@extends('admin.layout')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold text-gray-800">Categories</h1>
        <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center">
            <i class="fas fa-plus mr-2"></i>Add Category
        </button>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-600">Name</th>
                    <th class="px-4 py-2 text-right text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($categories as $category)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $category->name }}</td>
                    <td class="px-4 py-2 text-right">
                        <button class="text-blue-500 hover:text-blue-700">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="text-red-500 hover:text-red-700 ml-2">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
