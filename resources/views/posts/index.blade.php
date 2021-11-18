@extends('layouts.app')

@section('content')

<div class="flex justify-center">
    <div class="w-6/12 bg-white rounded-lg p-6 mb-4">
        @auth
        <form action="{{ route('posts') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="body">Post something!</label>
                <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 mt-2 rounded-lg  @error('body') border-red-500 @enderror "></textarea>

                @error('body')
                <div class="text-red-500 mt-2 text-small"> {{ $message}} </div>
                @enderror
            </div>
            <div class="mb-4">
                <input type="file" name="image" class="p-0 border @error('image') border-red-500 @enderror ">
                @error('image')
              <p class="text-red-500 my-2">  {{$message}}</p>
                @enderror
            </div>

            <div class="w-full">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Posts</button>
            </div>
        </form>
        @endauth

        @if($posts->count())
        @foreach ($posts as $post)
    <x-post :post="$post" />
        @endforeach
        {{$posts->links()}}
        @else
        {{auth()->user()->name }}
        <p class="py-2">Has no posts</p>
        @endif
    </div>
</div>

@endsection
