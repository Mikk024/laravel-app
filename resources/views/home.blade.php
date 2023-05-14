@extends('layouts.app')

@section('content')
<div class="px-10 mt-10">
    <div class="card px-6 shadow-lg">
        <p class="text-center text-lg capitalize py-4">what are you looking for?</p>
        <form action="">
            <div class="flex justify-around mb-10">
                <div>
                    <label for="body" class="text-lg capitalize">body style</label>
                    <div>
                        <select class="bg-gray-200 px-4 py-1 rounded-md">
                                <option value="" selected>Choose body style</option>
                               @foreach ($body as $item)
                                   <option value="{{ $item }}">{{ $item }}</option>
                               @endforeach
                        </select>
                    </div>
                </div> 
                <div>
                    <label for="fuel" class="text-lg capitalize">fuel</label>
                    <div>
                        <select class="bg-gray-200 px-4 py-1 rounded-md">
                                <option value="" selected>Choose fuel</option>
                                @foreach ($fuel as $item)
                                    <option value="{{ $item }}">{{ $item}}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <livewire:cardropdown />
            <button class="bg-red-300 px-6 py-2 rounded-md hover:bg-red-500 capitalize mx-auto justify-center flex mb-10">search</button>
        </form>
        
    </div>
</div>
@endsection