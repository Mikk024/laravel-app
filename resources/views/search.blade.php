@extends('layouts.app')

@section('content')
    <div class="mt-12 px-32 mb-32">
            <p class="text-center text-4xl mb-10 capitalize">listings</p>
            @foreach ($listings as $listing)
            <a href="{{ route('listings.show', ['id' => $listing->id])}}">
                <div class="border-top flex flex-row shadow-lg rounded-md mb-6">
                    <div class="basis-2/5">
                        <img src="{{ asset('storage/' . $listing->images[0])}}" class="h-48 w-96  rounded-md object-cover">
                    </div>
                    <div class="basis-3/5">
                        <p class="my-2 text-2xl hover:underline">{{ $listing->make->name . ' ' . $listing->model->name }}</p>
                        <p class="text-xl">{{ $listing->year }}</p>
                    </div>
                </div>
            </a>
            @endforeach
                {{ $listings->links() }}
    </div>
@endsection