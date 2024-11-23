<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6 text-center">Create New Category</h1>
        <form action="{{ route('categories.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg max-w-lg mx-auto">
            @csrf
            <!-- Category Name -->
            <div class="mb-4">
                <label for="category_name" class="block font-semibold mb-2 text-gray-700">Category Name</label>
                <input 
                    type="text" 
                    id="category_name" 
                    name="category_name" 
                    class="w-full border-gray-300 border rounded p-3 focus:outline-none focus:ring focus:ring-blue-300" 
                    placeholder="Enter category name" 
                    required>
            </div>
            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block font-semibold mb-2 text-gray-700">Description (Optional)</label>
                <textarea 
                    name="description" 
                    id="description" 
                    rows="4" 
                    class="w-full border-gray-300 border rounded p-3 focus:outline-none focus:ring focus:ring-blue-300" 
                    placeholder="Category description"></textarea>
            </div>
            <!-- Submit Button -->
            <div class="flex justify-end">
                <a href="{{ route('categories.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2">Cancel</a>
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:ring focus:ring-blue-300">
                    Create
                </button>
            </div>
        </form>
    </div>
</body>
</html>
