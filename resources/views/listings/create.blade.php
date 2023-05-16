@extends('layouts.app')

@section('content')
    <div class="px-10 mt-10 flex justify-center">
        <div class="px-20 py-4 shadow-xl mb-20">
            <p class="text-3xl capitalize text-center">add listing</p>
            <form action="" class="flex flex-col items-center">
                <div class="my-6 space-y-2 text-center text-xl">
                    <label for="make" class="capitalize">make</label>
                    <select name="make" class="px-8 py-2 rounded-md bg-gray-200 block">
                        <option selected>Choose make</option>
                    </select>
                </div>
                <div class="my-6 space-y-2 text-center text-xl">
                    <label for="model" class="capitalize">model</label>
                    <select name="make" class="px-8 py-2 rounded-md bg-gray-200 block">
                        <option selected>Choose model</option>
                    </select>
                </div>
                <div class="my-6 space-y-2 text-center text-xl">
                    <label for="fuel" class="capitalize">fuel</label>
                    <select name="fuel" class="px-8 py-2 rounded-md bg-gray-200 block">
                        <option selected>Choose fuel</option>
                    </select>
                </div>
                <div class="my-6 space-y-2 text-center text-xl">
                    <label for="year" class="capitalize">year</label>
                    <select name="year" class="px-8 py-2 rounded-md bg-gray-200 block">
                        <option selected>Choose year</option>
                    </select>
                </div>
                <div class="my-6 space-y-2 text-center text-xl">
                    <label for="body" class="capitalize">body style</label>
                    <select name="body" class="px-8 py-2 rounded-md bg-gray-200 block">
                        <option selected>Choose body style</option>
                    </select>
                </div>
                <div class="my-6 space-y-2 text-center text-xl">
                    <label for="horsepower" class="capitalize">horsepower</label>
                    <input type="number" class="px-8 py-2 rounded-md bg-gray-200 block">
                </div>
                <div class="my-6 space-y-2 text-center text-xl">
                    <label for="capacity" class="capitalize">engine capacity (cm3)</label>
                    <input type="number" class="px-8 py-2 rounded-md bg-gray-200 block">
                </div>
                <div class="my-6 space-y-2 text-center text-xl">
                    <label for="doors" class="capitalize">doors</label>
                    <select name="doors" class="px-8 py-2 rounded-md bg-gray-200 block">
                        <option selected>Choose number of doors</option>
                    </select>
                </div>
                <div class="my-6 space-y-2 text-center text-xl">
                    <label for="color" class="capitalize">color</label>
                    <select name="color" class="px-8 py-2 rounded-md bg-gray-200 block">
                        <option selected>Choose color</option>
                    </select>
                </div>
                <div class="my-6 space-y-2 text-center text-xl">
                    <label for="transmission" class="capitalize">transmission</label>
                    <select name="transmission" class="px-8 py-2 rounded-md bg-gray-200 block">
                        <option selected>Choose transmission</option>
                    </select>
                </div>
                <div class="my-6 space-y-2 text-center text-xl">
                    <label for="images" class="capitalize">images</label>
                    <input type="file" name="images[]" class="block">
                </div>
                <div class="my-6 space-y-2 text-center text-xl">
                    <label for="premium" class="capitalize">premium</label>
                    <input type="checkbox" name="premium">
                </div>
                <button type="submit" class="capitalize px-6 py-2 bg-red-500 text-white rounded-full hover:bg-red-700">add</button>
            </form>
        </div>
    </div>
@endsection