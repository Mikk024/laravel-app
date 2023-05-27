@extends('layouts.app')

@section('content')
    <div class="px-32 mt-10">
        <p class="text-3xl capitalize text-center">manage your listings</p>
        <div class="flex justify-center">
            <table class="table-auto mt-10 text-xl capitalize w-full text-center px-32">
                <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($listings as $listing)
                <tr class="border border-2">
                    <td>{{ $listing->id }}</td>
                    <td><a href="{{ route('listings.show', ['id' => $listing->id])}}" class="hover:underline">{{ $listing->year . ' ' . $listing->make->name . ' ' . $listing->model->name }}</a></td>
                    <td class="space-x-2">
                        <form action="{{ route('listing.destroy', ['id' => $listing->id]) }}" class="inline-block" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="capitalize px-4 py-2 bg-red-500 rounded-md text-white hover:bg-red-700">delete</button>
                        </form>
                        <a href="{{ route('listing.edit', ['id' => $listing->id] )}}" class="capitalize inline-block px-4 py-2 bg-green-500 rounded-md text-white hover:bg-green-700">edit</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection