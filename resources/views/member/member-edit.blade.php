<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6 text-center">Edit Member</h1>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('members.update', $member->id) }}" method="POST"
            class="bg-white p-6 rounded-lg shadow-lg max-w-lg mx-auto">
            @csrf
            @method('PUT')
            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block font-semibold mb-2 text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ $member->name }}"
                    class="w-full border-gray-300 border rounded p-3 focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter member name" required>
            </div>
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block font-semibold mb-2 text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ $member->email }}"
                    class="w-full border-gray-300 border rounded p-3 focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter member email" required>
            </div>
            <!-- Phone -->
            <div class="mb-4">
                <label for="phone" class="block font-semibold mb-2 text-gray-700">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ $member->phone }}"
                    class="w-full border-gray-300 border rounded p-3 focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter phone number" required>
            </div>
            <!-- Address -->
            <div class="mb-4">
                <label for="address" class="block font-semibold mb-2 text-gray-700">Address</label>
                <textarea name="address" id="address" rows="4"
                    class="w-full border-gray-300 border rounded p-3 focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter member address">{{ $member->address }}</textarea>
            </div>
            <!-- Buttons -->
            <div class="flex justify-end">
                <a href="{{ route('members.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2">
                    Cancel
                </a>
                <button type="submit"
                    class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:ring focus:ring-blue-300">
                    Update
                </button>
            </div>
        </form>
    </div>
</body>

</html>
