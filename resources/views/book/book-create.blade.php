<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6 text-center">Create New Book</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('books.store') }}" method="POST"
            class="bg-white p-6 rounded-lg shadow-lg max-w-lg mx-auto">
            @csrf
            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block font-semibold mb-2 text-gray-700">Title</label>
                <input type="text" name="title" id="title"
                    class="w-full border-gray-300 border rounded p-3 focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter book title" required>
            </div>
            <!-- Author -->
            <div class="mb-4">
                <label for="author" class="block font-semibold mb-2 text-gray-700">Author</label>
                <input type="text" name="author" id="author"
                    class="w-full border-gray-300 border rounded p-3 focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter author name" required>
            </div>
            <!-- Publisher -->
            <div class="mb-4">
                <label for="publisher" class="block font-semibold mb-2 text-gray-700">Publisher</label>
                <input type="text" name="publisher" id="publisher"
                    class="w-full border-gray-300 border rounded p-3 focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter publisher" required>
            </div>
            <!-- Year -->
            <div class="mb-4">
                <label for="year" class="block font-semibold mb-2 text-gray-700">Year</label>
                <input type="number" name="year" id="year"
                    class="w-full border-gray-300 border rounded p-3 focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="2024" required>
            </div>
            <!-- Categories -->
            <div class="mb-4">
                <label for="categories" class="block font-semibold mb-2 text-gray-700">Categories</label>
                <div class="flex flex-wrap">
                    @foreach ($categories as $category)
                        <div class="mr-4 mb-2">
                            <input type="checkbox" id="category_{{ $category->id }}" name="categories[]"
                                value="{{ $category->id }}"
                                class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <label for="category_{{ $category->id }}"
                                class="text-gray-600">{{ $category->category_name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Member -->
            <div class="mb-4">
                <label for="member_id" class="block font-semibold mb-2 text-gray-700">Member</label>
                <select name="member_id" id="member_id"
                    class="w-full border-gray-300 border rounded p-3 focus:outline-none focus:ring focus:ring-blue-300">
                    <option value="">No Member</option>
                    @foreach ($members as $member)
                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:ring focus:ring-blue-300">
                    Create
                </button>
            </div>
        </form>
    </div>
</body>

</html>
