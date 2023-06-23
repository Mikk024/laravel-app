@extends('layouts.app')

@section('content')
    <div class="px-32 mt-12">
        <p class="text-4xl text-center my-10 capitalize">edit listing</p>
        <div class="w-3/4 mx-auto">
            @if ($listing->images)
                <div id="animation-carousel" class="relative w-full" data-carousel="static">
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        @foreach ($listing->images as $image)
                        <div class="hidden duration-500 ease-linear" data-carousel-item>
                            <img src="{{ asset('storage/' . $image) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        @endforeach
                    </div>
                    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
            @else
                <img src="{{ asset('storage/no-image.jpeg') }}">
            @endif
        </div>
        <form method="POST" class="flex flex-col items-center mt-10 mb-20" enctype="multipart/form-data" action="{{ route('listing.update', ['id' => $listing->id ]) }}">
            @method('PUT')
            @csrf
            @livewire('edit-form', ['id' => $listing->id])
            <div class="my-6 space-y-2 text-center text-xl">
                <label for="fuel" class="capitalize">fuel</label>
                <select name="fuel" class="px-8 py-2 rounded-md bg-gray-200 block">
                    <option selected value="{{ old('fuel', $listing->fuel) }}">{{ old('fuel', $listing->fuel)}}</option>
                    @foreach ($fuel as $item)
                        @if ($item !== $listing->fuel)
                        <option value="{{ $item }}">{{ $item }}</option>
                        @endif
                    @endforeach
                </select>
                @error('fuel')
                        <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-6 space-y-2 text-center text-xl">
                <label for="year" class="capitalize">year</label>
                <select name="year" class="px-8 py-2 rounded-md bg-gray-200 block">
                    <option selected value="{{ old('year', $listing->year) }}">{{ old('year', $listing->year) }}</option>
                    @for ($i = 1980; $i < $currentYear; $i++)
                        @if ($i !== $listing->year)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endif
                    @endfor
                </select>
                @error('year')
                        <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-6 space-y-2 text-center text-xl">
                <label for="body" class="capitalize">body style</label>
                <select name="body" class="px-8 py-2 rounded-md bg-gray-200 block">
                    <option selected value="{{ old('body', $listing->body)}}">{{ old('body', $listing->body)}}</option>
                    @foreach ($body as $item)
                    @if ($item !== $listing->body)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endif
                    @endforeach
                </select>
                @error('body')
                        <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-6 space-y-2 text-center text-xl">
                <label for="horsepower" class="capitalize">horsepower</label>
                <input type="number" name="horsepower" class="px-8 py-2 rounded-md bg-gray-200 block" value="{{ old('horsepower', $listing->horsepower)}}">
                @error('horsepower')
                        <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-6 space-y-2 text-center text-xl">
                <label for="capacity" class="capitalize">engine capacity (cm3)</label>
                <input type="number" name="capacity" class="px-8 py-2 rounded-md bg-gray-200 block" value="{{ old('capacity', $listing->capacity)}}">
                @error('capacity')
                        <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-6 space-y-2 text-center text-xl">
                <label for="doors" class="capitalize">doors</label>
                <select name="doors" class="px-8 py-2 rounded-md bg-gray-200 block">
                    <option selected value="{{ old('doors', $listing->doors)}}">{{ old('doors', $listing->doors)}}</option>
                    @for ($i = 1; $i < 8; $i++)
                    @if ($i !== $listing->doors)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endif
                    @endfor
                </select>
                @error('doors')
                        <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-6 space-y-2 text-center text-xl">
                <label for="color" class="capitalize">color</label>
                <select name="color" class="px-8 py-2 rounded-md bg-gray-200 block">
                    <option selected value="{{ old('color', $listing->color) }}">{{ old('color', $listing->color) }}</option>
                    @foreach ($color as $item)
                    @if ($item !== $listing->color)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endif
                    @endforeach
                </select>
                @error('color')
                        <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-6 space-y-2 text-center text-xl">
                <label for="transmission" class="capitalize">transmission</label>
                <select name="transmission" class="px-8 py-2 rounded-md bg-gray-200 block">
                    <option selected value="{{ old('transmission', $listing->transmission)}}">{{ old('transmission', $listing->transmission) }}</option>
                    @if ($listing->transmission === 'Automatic')
                    <option value="Manual">Manual</option>
                    @elseif ($listing->transmission === 'Manual')
                    <option value="Automatic">Automatic</option>
                    @endif
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
            <button type="submit" class="capitalize px-6 py-2 bg-red-500 text-white rounded-full hover:bg-red-700">edit</button>
        </form>
    </div>
@endsection