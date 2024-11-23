<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Dashboard</h1>

        <!-- Buku Section -->
        <div class="mb-10">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Daftar Buku</h2>
                <a href="{{ route('books.create') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Create Book
                </a>
            </div>
            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">Title</th>
                        <th class="border px-4 py-2">Author</th>
                        <th class="border px-4 py-2">Publisher</th>
                        <th class="border px-4 py-2">Year</th>
                        <th class="border px-4 py-2">Categories</th>
                        <th class="border px-4 py-2">Peminjam</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $book->title }}</td>
                            <td class="border px-4 py-2">{{ $book->author }}</td>
                            <td class="border px-4 py-2">{{ $book->publisher }}</td>
                            <td class="border px-4 py-2">{{ $book->year }}</td>
                            <td class="border px-4 py-2">
                                @foreach ($book->categories as $category)
                                    <span
                                        class="bg-gray-200 text-gray-800 px-2 py-1 rounded">{{ $category->category_name }}</span>
                                @endforeach
                            </td>
                            <td class="border px-4 py-2">
                                {{ $book->member->name ?? 'No Borrower' }}
                            </td>
                            <td class="border px-4 py-2 text-center">
                                <a href="{{ route('books.edit', $book->id) }}"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Member Section -->
        <div class="mb-10">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Daftar Member</h2>
                <a href="{{ route('members.create') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Create Member
                </a>
            </div>
            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">Nama</th>
                        <th class="border px-4 py-2">Email</th>
                        <th class="border px-4 py-2">Telepon</th>
                        <th class="border px-4 py-2">Alamat</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $member->name }}</td>
                            <td class="border px-4 py-2">{{ $member->email }}</td>
                            <td class="border px-4 py-2">{{ $member->phone }}</td>
                            <td class="border px-4 py-2">{{ $member->address }}</td>
                            <td class="border px-4 py-2 text-center">
                                <a href="{{ route('members.edit', $member->id) }}"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('members.destroy', $member->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- Kategori Section -->
        <div>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Daftar Category</h2>
                <a href="{{ route('categories.create') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Create Category
                </a>
            </div>
            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">Nama Kategori</th>
                        <th class="border px-4 py-2">Deskripsi</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $category->category_name }}</td>
                            <td class="border px-4 py-2">{{ $category->description }}</td>
                            <td class="border px-4 py-2 text-center">
                                <a href="{{ route('categories.edit', $category->id) }}"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>
