@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center h-screen">
    <div class="bg-white shadow-md p-6 rounded w-full md:w-2/3 lg:w-1/2">
        <h2 class="text-2xl font-semibold mb-4">Create Notice</h2>

        <a href="{{ route('notice.index') }}"
            class="bg-blue-500 hover:bg-blue-700 text-black py-2 px-4 rounded inline-block mb-4">Back</a>

        @if ($message = Session::get('success'))
        <div class="bg-green-200 text-green-700 p-2 rounded mb-4">{{ $message }}</div>
        @endif

        @if (session('status'))
        <div class="bg-green-200 text-green-700 p-2 rounded mb-4">{{ session('status') }}</div>
        @endif

        <form action="{{ route('notice.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <label class="block font-semibold">Notice</label>
            <input type="text" name="name"
                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300 @error('name') border-red-500 @enderror"
                placeholder="Notice">
            @error('name')
            <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror

            <label class="block font-semibold">Information</label>
            <input type="text" name="information"
                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300 @error('information') border-red-500 @enderror"
                placeholder="Notice Information">
            @error('information')
            <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror

            @csrf
            <label class="block font-semibold mb-2">File (PDF)</label>
            <input type="file" name="pdf"
                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300 @error('pdf') border-red-500 @enderror">
            @error('pdf')
            <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror

            @if ($message = Session::get('error'))
            <div class="bg-red-200 text-red-700 p-2 rounded mb-4">{{ $message }}</div>
            @endif

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-black py-2 px-4 rounded mt-3">Submit</button>
        </form>
    </div>
</div>
@endsection