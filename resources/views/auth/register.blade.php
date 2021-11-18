@extends('layouts.app')

@section('content')

<div class="flex justify-center">
    <div class="w-4/12 bg-white rounded-lg p-6">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" id="name" placeholder="Your name" class="bg-gray-100 border-2 w-full p-2 rounded-lg  @error('name') border-red-500 @enderror" value="{{ old('name') }}">
                @error('name')
                <div class="p-2 text-red-500">
                    {{ $message }}
                </div>
                @enderror
            </div>

          

            <div class="mb-4">
                <label for="username" class="sr-only">username</label>
                <input type="text" name="username" id="username" placeholder="Your username" class="bg-gray-100 border-2 w-full p-2 rounded-lg  @error('username') border-red-500 @enderror" value="{{ old('username') }}">
                @error('username')
                <div class="p-2 text-red-500">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="text" name="email" id="email" placeholder="Your email" class="bg-gray-100 border-2 w-full p-2 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                @error('email')
                <div class="p-2 text-red-500">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" placeholder="Your password" class="bg-gray-100 border-2 w-full p-2 rounded-lg  @error('password') border-red-500 @enderror" value="">
                @error('password')
                <div class="p-2 text-red-500">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="sr-only">Password again</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" class="bg-gray-100 border-2 w-full p-2 rounded-lg" value="">
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-green-500 p-2 w-full text-white rounded-lg">Register</button>
            </div>
        </form>
    </div>




</div>

@endsection
