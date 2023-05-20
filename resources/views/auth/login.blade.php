@extends('layouts.app')

@section('content')
    <div class="mt-32 px-14 mb-20">
        <div>
            <p class="text-4xl capitalize text-center">login</p>
            <div class="bg-gray-100 rounded-md px-14 py-6 mt-6 w-1/2 mx-auto text-xl text-center flex-row justify-center">
                <form action="{{ route('login.store')}}" method="POST">
                    @csrf
                    <label for="email" class="capitalize">email</label>
                    <input type="email" name="email" class="block mx-auto w-1/2 mb-6 mt-2 rounded-md bg-gray-200">
                    <label for="password" class="capitalize">password</label>
                    <input type="password" name="password" class="block mx-auto w-1/2 mb-6 mt-2 rounded-md bg-gray-200">
                    <button type="submit" class="px-6 py-2 capitalize bg-red-500 text-white rounded-lg mt-10 hover:bg-red-700 hover:text-black">register</button>
                </form>
            </div>
        </div>
    </div>
@endsection