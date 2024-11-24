@extends('layouts.app')

@section('content')

<div class="mb-4 flex items-center justify-between">
    <h1 class="text-2xl font-bold">Members List</h1>
    <a href="{{ route('members.create') }}" class="bg-blue-500 text-white px-4 py-3 rounded">Create Member</a>
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
        @forelse ($members as $member)
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
        @empty
        <tr>
            <td colspan="5" class="text-center border px-4 py-2 text-gray-500">No Data Available</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection