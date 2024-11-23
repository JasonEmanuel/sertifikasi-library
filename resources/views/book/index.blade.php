@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Books</h1>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('books.index') }}" id="filterForm" class="mb-4 flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <label for="category_id" class="font-semibold">Filter by Category:</label>
                <select name="category_id" id="category_id" class="border-gray-300 rounded p-2"
                    onchange="document.getElementById('filterForm').submit();">
                    <option value="">-- All Categories --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Button for Creating a New Book -->
            <div>
                <a href="{{ route('books.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Create Book
                </a>
            </div>
        </form>

        <!-- Book Table -->
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
                @forelse ($books as $book)
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
                        <td class="border px-4 py-2">{{ $book->member->name ?? 'No Borrower' }}</td>
                        <td class="border px-4 py-2 text-center">
                            <a href="{{ route('books.edit', $book->id) }}"
                                class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center border px-4 py-2">No Books Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection