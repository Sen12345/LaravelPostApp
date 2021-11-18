@props(['post' => $post])
<div class="my-2 pt-4 flex w-full">
<div class="mr-2 "> <img src="/storage/image/{{$post->userimage}}" alt="Test Image" class="w-20 rounded"></div>
<div class="p-0 text-xs">{{ $post->body }}</div> 
</div>

<div class="flex w-full ">
<div class="text-xs pr-2">
    <a href="{{ route('user.posts',$post->user) }}" class="text-xs">{{$post->user->name}}</a>
</div>
<div class="text-xs">
    {{ $post->created_at->diffForHumans() }}
</div>

</div>



    @auth
    @if(!$post->likedBy(auth()->user()))
    <div class="w-full flex">
<div >
    <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-2">
        @csrf
        <button type="submit" class="text-blue-500 text-xs">Like</button>
    </form>
</div>
    <div class="text-xs  mt-1.5">{{ $post->likes->count() }} {{ Str::plural('Like', $post->user->likes->count())  }}</div>

    <div class="text-xs px-2 mt-1.5">
        @can('delete', $post)
        <form action="{{ route('delete.posts', $post) }}" method="POST"  class="mr-2">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500 text-xs">Delete</button>
        </form>
        @endcan()
    </div>
</div>
    @else
    <div class="flex w-full ">
   
    <div >
    <form action="{{ route('delete.likes', $post) }}" method="POST" class="mr-2">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-blue-500 text-xs">Unlike</button>
    </form>
</div>
<div class="text-xs px-2 mt-1.5">{{ $post->likes->count() }} {{ Str::plural('Like', $post->user->likes->count()) }}</div>

<div class="text-xs px-2 mt-1.5">
    @can('delete', $post)
    <form action="{{ route('delete.posts', $post) }}" method="POST"  class="mr-2">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-blue-500 text-xs">Delete</button>
    </form>
    @endcan()
</div>
</div>
    @endif
    @endauth

