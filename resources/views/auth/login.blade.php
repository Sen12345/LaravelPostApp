@extends('layouts.app')

@section('content')

<div class="flex justify-center">
    <div class="w-4/12 bg-white rounded-lg p-6">

        @if(session('status'))
        <div class="p-2 mb-4 text-red-500 m-auto text-center"> {{ session('status')}}</div>
        @endif

        <form action="{{ route('login') }}" method="post">
            @csrf
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
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember"  >
                    <label class="px-2" for="remember">Remember</label>
                </div>
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-green-500 p-2 w-full text-white rounded-lg">Login</button>
            </div>
        </form>
    </div>




</div>

@endsection
