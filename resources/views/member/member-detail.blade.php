@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-center">Member Details</h1>

<div class="bg-white p-6 rounded shadow-lg">
    <h2 class="text-xl font-semibold mb-4">Member Information</h2>
    <p><strong>Name:</strong> {{ $member->name }}</p>
    <p><strong>Email:</strong> {{ $member->email }}</p>
    <p><strong>Phone:</strong> {{ $member->phone }}</p>
    <p><strong>Address:</strong> {{ $member->address }}</p>
</div>

<div class="bg-white p-6 rounded shadow-lg mt-6">
    <h2 class="text-xl font-semibold mb-4">Borrowed Books</h2>
    @if ($member->borrowedBooks->isEmpty())
        <p>No books borrowed by this member.</p>
    @else
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Author</th>
                    <th class="border px-4 py-2">Publisher</th>
                    <th class="border px-4 py-2">Year</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($member->borrowedBooks as $book)
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2">{{ $book->title }}</td>
                    <td class="border px-4 py-2">{{ $book->author }}</td>
                    <td class="border px-4 py-2">{{ $book->publisher }}</td>
                    <td class="border px-4 py-2">{{ $book->year }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<div class="mt-6">
    <a href="{{ route('members.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back to Members List</a>
</div>
@endsection