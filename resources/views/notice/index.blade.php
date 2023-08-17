@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-center">
        <div class="w-1/4">
            <div class="bg-white rounded shadow">
                <div>
                    <a href="{{ route('notice.create') }}" class="bg-green-500 text-black px-4 py-2 rounded mb-3">Create Notice</a>
                </div>
                <div class="p-4">
                    <table class="table-auto w-full border-collapse border">
                        <thead>
                            <tr>
                                <th class="border p-2">ID</th>
                                <th class="border p-2">Name</th>
                                <th class="border p-2">Information</th>
                                <th class="border p-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($notices as $notice)
                            <tr class="border">
                                <td class="border p-2">{{ $notice->id }}</td>
                                <td class="border p-2">{{ $notice->name }}</td>
                                <td class="border p-2">{{ $notice->information }}</td>
                                <td>
                                    <form action="{{ route('notice.destroy', $notice->id) }}" method="post">
                                        <a href="{{ route('notice.view', $notice->id) }}" class="btn btn-warning">View</a>
                                        <a href="{{ route('notice.edit', $notice->id) }}" class="btn btn-warning">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $notices->links('pagination::tailwind') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection