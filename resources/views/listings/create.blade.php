@extends('layouts.app')

@section('content')
    <div class="px-10 mt-10 flex justify-center">
        <div class="px-20 py-4 shadow-xl mb-20">
            <p class="text-3xl capitalize text-center">add listing</p>
            <form method="POST" class="flex flex-col items-center" enctype="multipart/form-data" action="{{ route('listing.store') }}">
                @csrf
                <livewire:drop-down-form>
                <div class="my-6 space-y-2 text-center text-xl">
                    <label for="fuel" class="capitalize">fuel</label>
                    <select name="fuel" class="px-8 py-2 rounded-md bg-gray-200 block">
                        <option selected value="">Choose fuel</option>
                        @foreach ($fuel as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    @error('fuel')
                            <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-6 space-y-2 text-center text-xl">
                    <label for="year" class="capitalize">year</label>
                    <select name="year" class="px-8 py-2 rounded-md bg-gray-200 block">
                        <option selected value="">Choose year</option>
                        @for ($i = 1980; $i < $currentYear; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    @error('year')
                            <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-6 space-y-2 text-center text-xl">
                    <label for="body" class="capitalize">body style</label>
                    <select name="body" class="px-8 py-2 rounded-md bg-gray-200 block">
                        <option selected value="">Choose body style</option>
                        @foreach ($body as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    @error('body')
                            <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-6 space-y-2 text-center text-xl">
                    <label for="horsepower" class="capitalize">horsepower</label>
                    <input type="number" name="horsepower" class="px-8 py-2 rounded-md bg-gray-200 block">
                    @error('horsepower')
                            <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-6 space-y-2 text-center text-xl">
                    <label for="capacity" class="capitalize">engine capacity (cm3)</label>
                    <input type="number" name="capacity" class="px-8 py-2 rounded-md bg-gray-200 block">
                    @error('capacity')
                            <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-6 space-y-2 text-center text-xl">
                    <label for="doors" class="capitalize">doors</label>
                    <select name="doors" class="px-8 py-2 rounded-md bg-gray-200 block">
                        <option selected value="">Choose number of doors</option>
                        @for ($i = 1; $i < 8; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    @error('doors')
                            <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-6 space-y-2 text-center text-xl">
                    <label for="color" class="capitalize">color</label>
                    <select name="color" class="px-8 py-2 rounded-md bg-gray-200 block">
                        <option selected value="">Choose color</option>
                        @foreach ($color as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    @error('color')
                            <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-6 space-y-2 text-center text-xl">
                    <label for="transmission" class="capitalize">transmission</label>
                    <select name="transmission" class="px-8 py-2 rounded-md bg-gray-200 block">
                        <option selected value="">Choose transmission</option>
                        <option value="Automatic">Automatic</option>
                        <option value="Manual">Manual</option>
                    </select>
                    @error('transmission')
                            <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-6 space-y-2 text-center text-xl">
                    <label for="images" class="capitalize">images</label>
                    <input type="file" name="images[]" class="block" multiple>
                    @error('images')
                            <p class="text-red-500">{{ $message }}</p>
                    @enderror
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