<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6 text-center">Edit Category</h1>
        <form action="{{ route('categories.update', $category->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg max-w-lg mx-auto">
            @csrf
            @method('PUT')
            <!-- Category Name -->
            <div class="mb-4">
                <label for="category_name" class="block font-semibold mb-2 text-gray-700">Category Name</label>
                <input 
                    type="text" 
                    name="category_name" 
                    id="category_name" 
                    value="{{ $category->category_name }}" 
                    class="w-full border-gray-300 border rounded p-3 focus:outline-none focus:ring focus:ring-blue-300" 
                    placeholder="Enter category name" 
                    required>
            </div>
            <!-- Buttons -->
            <div class="flex justify-end">
                <a href="{{ route('categories.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:ring focus:ring-blue-300">
                    Update
                </button>
            </div>
        </form>
    </div>
</body>
</html>
