@extends('layouts.app')
@section('content')
    <div class="px-20 mt-10 mb-32">
        <div id="animation-carousel" class="relative w-full" data-carousel="static">
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                @foreach ($listing->images as $image)
                <div class="hidden duration-500 ease-linear" data-carousel-item>
                    <img src="{{ asset('storage/' . $image) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 max-w-full" alt="...">
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
        <p class="text-4xl text-center mt-10">{{ $listing->make->name . ' ' . $listing->model->name}}</p>
        <div class="mt-10 flex justify-center px-12">
            <div class="basis-1/2 space-y-2">
                <p class="text-blue-500 text-xl capitalize">make : <span class="text-black">{{ $listing->make->name }}</span></p>
                <p class="text-blue-500 text-xl capitalize">model : <span class="text-black">{{ $listing->model->name }}</span></p>
                <p class="text-blue-500 text-xl capitalize">year of production : <span class="text-black">{{ $listing->year }}</span></p>
                <p class="text-blue-500 text-xl capitalize">body style : <span class="text-black">{{ $listing->body }}</span></p>
                <p class="text-blue-500 text-xl capitalize">fuel : <span class="text-black">{{ $listing->fuel }}</span></p>
                <p class="text-blue-500 text-xl capitalize">engine capacity : <span class="text-black">{{ $listing->capacity }} cm3</span></p>
                <p class="text-blue-500 text-xl capitalize">horsepower : <span class="text-black">{{ $listing->horsepower}}</span></p>
                <p class="text-blue-500 text-xl capitalize">transmission : <span class="text-black">{{ $listing->transmission}}</span></p>
                <p class="text-blue-500 text-xl capitalize">color : <span class="text-black">{{ $listing->color}}</span></p>
                <p class="text-blue-500 text-xl capitalize">doors : <span class="text-black">{{ $listing->doors }}</span></p>
            </div>
            <div class="basis-1/2 text-center space-y-2">
                <p class="text-2xl">{{ $listing->user->name }}</p>
                <p class="text-lg">{{ $listing->user->email }}</p>
                <p class="text-lg">638 837 837</p>
                <p class="text-lg">Location</p>
            </div>
        </div>
        <div class="mt-32 px-12 space-y-4">
            <p class="text-4xl capitalize">description</p>
            <p class="text-lg">Aliquip dolor enim ullamco pariatur. Sint laborum velit deserunt reprehenderit consequat quis nisi occaecat velit nulla labore nulla irure reprehenderit. Irure non eiusmod officia aliquip duis dolore deserunt consequat occaecat tempor fugiat.

Ex sunt ad nisi labore ad proident esse deserunt qui. Mollit eu mollit nisi dolore occaecat sit ad excepteur consectetur. Ut dolore exercitation sit exercitation. Adipisicing ex Lorem do esse qui officia pariatur. Ut non dolor nostrud eiusmod proident eu cupidatat Lorem do culpa cupidatat est. Non ut ut non ut eu id laboris cupidatat do dolor elit aliquip reprehenderit qui.

Dolor voluptate magna velit minim non deserunt. Incididunt deserunt anim in excepteur incididunt aliquip ad qui consequat sint id irure consectetur mollit. Anim pariatur et pariatur nostrud consectetur excepteur ad reprehenderit consectetur anim mollit occaecat ut. Aliquip elit consectetur consectetur minim eu Lorem voluptate do sint ut sint aute. Amet incididunt exercitation sint culpa id fugiat do Lorem labore cupidatat consequat dolor. Mollit eu voluptate quis excepteur et laboris exercitation anim non minim amet in exercitation. Excepteur velit incididunt magna do.</p>
        </div>
    </div>
@endsection