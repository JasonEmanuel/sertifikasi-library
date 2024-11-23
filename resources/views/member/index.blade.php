@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Members List</h1>
<div class="mb-4">
    <a href="{{ route('members.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create Member</a>
</div>
<table class="table-auto w-full border-collapse border border-gray-200">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Email</th>
            <th class="border px-4 py-2">Phone</th>
            <th class="border px-4 py-2">Address</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($members as $member)
        <tr>
            <td class="border px-4 py-2">{{ $member->name }}</td>
            <td class="border px-4 py-2">{{ $member->email }}</td>
            <td class="border px-4 py-2">{{ $member->phone }}</td>
            <td class="border px-4 py-2">{{ $member->address }}</td>
            <td class="border px-4 py-2 text-center">
                <a href="{{ route('members.show', $member->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded">Details</a>
                <a href="{{ route('members.edit', $member->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection