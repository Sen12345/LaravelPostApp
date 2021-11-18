@extends('layouts.app')

@section('content')

<div class="flex justify-center">
    <div class="w-8/12 bg-white rounded-lg p-6">
<h1 class="text-xl">User posts</h1>
        
<p class="text-small">Posted {{$posts->count()}} {{Str::plural('Post', $posts->count())}} and received {{$user->likes->count()}} Likes</p>


        @if($posts->count())
        @foreach ($posts as $post)
        <x-post       :post="$post" />
        @endforeach
        {{$posts->links()}}
        @else
        <p class="py-2">There are no posts</p>
        @endif
    </div>
</div>

@endsection