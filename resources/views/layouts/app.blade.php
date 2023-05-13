<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cars, cars, cars</title>
    @vite('resources/css/app.css')
</head>
<body>
    <nav class="shadow-xl sticky top-0 z-50 capitalize">
        <div class="container px-10 py-4 flex justify-between">
            <a href="#">home</a>
            <div class="space-x-2 ">
                <a href="#" class="hover:underline">login</a>
                <span>/</span>
                <a href="#" class="hover:underline">register</a>
                <a href="#" class="px-10 py-2 rounded-md  bg-blue-300 hover:bg-blue-500 hover:text-white">add listing</a>
            </div>
            
        </div>
    </nav>
    @yield('content')
</body>
</html>