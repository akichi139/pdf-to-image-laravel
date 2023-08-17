@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-center">
        <div class="w-1/4">
            <div class="bg-white rounded shadow">
                <div>
                    <a href="{{route('reserve.create')}}" class="btn btn-success mb-3">Create Room</a>
                </div>
                <div class="p-4">
                    <table class="table-auto w-full border-collapse border">
                        <thead>
                            <tr>
                                <th class="border p-2">ID</th>
                                <th class="border p-2">Name</th>
                                <th class="border p-2">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reserves as $reserve)
                            <tr class="border">
                                <td class="border p-2">{{$reserve->id}}</td>
                                <td class="border p-2">{{$reserve->name}}</td>
                                <td class="border p-2">{{$reserve->time}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!!$reserves->links('pagination::tailwind')!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
