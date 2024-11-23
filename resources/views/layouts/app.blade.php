<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <nav class="bg-blue-500 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-lg font-bold">Library</h1>
            <ul class="flex space-x-4">
                <li>
                    <a href="{{ route('books.index') }}"
                        class="{{ request()->routeIs('books.index') ? 'font-bold text-yellow-300' : 'hover:underline' }}">
                        Books
                    </a>
                </li>
                <li>
                    <a href="{{ route('members.index') }}"
                        class="{{ request()->routeIs('members.index') ? 'font-bold text-yellow-300' : 'hover:underline' }}">
                        Members
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories.index') }}"
                        class="{{ request()->routeIs('categories.index') ? 'font-bold text-yellow-300' : 'hover:underline' }}">
                        Categories
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="container mx-auto p-4">
        @yield('content')
    </main>
</body>
</html>
