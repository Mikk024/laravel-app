@extends('layouts.app')

@section('content')
<div class="px-10 mt-10">
    <div class="card px-6 shadow-lg">
        <p class="text-center text-lg capitalize py-4">what are you looking for?</p>
        <form action="" class="mb-10">
            <div class="px-10 flex flex-row justify-around pb-4">
                <label for="body" class="capitalize">
                    body style
                    <select name="body" class="block px-6 py-2 bg-gray-200 rounded-md">
                        <option selected>Choose body style</option>
                        @foreach ($body as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </label>
                <label for="make" class="capitalize">
                    make
                    <select name="make" class="block px-6 py-2 bg-gray-200 rounded-md">
                        <option selected>Choose make</option>
                        <option>Mercedes</option>
                        <option>BMW</option>
                        <option>Volkswagen</option>
                    </select>
                </label>
            </div>
            <div class="px-10 flex flex-row justify-around pb-4">
                <label for="model" class="capitalize">
                    model
                    <select name="model" class="block px-6 py-2 bg-gray-200 rounded-md">
                        <option selected>Choose model</option>
                        <option>E class</option>
                        <option>S class</option>
                        <option>C class</option>
                        <option>5 Series</option>
                        <option>3 Series</option>
                    </select>
                </label>
                <label for="fuel" class="capitalize">
                    fuel
                    <select name="fuel" class="block px-6 py-2 bg-gray-200 rounded-md">
                        <option selected>Choose fuel</option>
                        <option>Diesel</option>
                        <option>Gas</option>
                        <option>EV</option>
                    </select>
                </label>
            </div>
            <div class="px-10 flex flex-row justify-around pb-4">
                <label for="price" class="capitalize">
                    price
                    <div>
                        <select name="model" class="inline-block px-6 py-2 bg-gray-200 rounded-md">
                        <option selected>From</option>
                        @for ($i = 0; $i < 10001; $i+= 500)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                        @for ($i = 10000; $i < 50001; $i+= 5000)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                        </select>
                        <select name="model" class="inline-block px-6 py-2 bg-gray-200 rounded-md">
                            <option selected>From</option>
                            @for ($i = 0; $i < 10001; $i+= 500)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                            @for ($i = 10000; $i < 50001; $i+= 5000)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </label>
                <label for="price" class="capitalize">
                    year of production
                    <div>
                        <select name="model" class="inline-block px-6 py-2 bg-gray-200 rounded-md">
                            <option selected>From</option>
                            @for ($i = 1980; $i < 2024; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>    
                            @endfor
                        </select>
                        <select name="model" class="inline-block px-6 py-2 bg-gray-200 rounded-md">
                            <option selected>From</option>
                            @for ($i = 1980; $i < 2024; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>    
                            @endfor
                        </select>
                    </div>
                </label>
            </div>
            <button class="bg-red-300 px-6 py-2 rounded-md hover:bg-red-500 capitalize mx-auto justify-center flex">search</button>
        </form> 
    </div>
</div>
@endsection