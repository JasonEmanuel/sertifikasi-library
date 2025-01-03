@extends('layouts.app')

@section('content')

<div class="mb-4 flex items-center justify-between">
    <h1 class="text-2xl font-bold mb-6">Categories List</h1>
    <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create Category</a>
</div>
<table class="table-auto w-full border-collapse border border-gray-200">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2">Category Name</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category)
        <tr>
            <td class="border px-4 py-2">{{ $category->category_name }}</td>
            <td class="border px-4 py-2 text-center">
                <a href="{{ route('categories.edit', $category->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="2" class="text-center border px-4 py-2 text-gray-500">No Data Available</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection