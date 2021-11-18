<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }

    public function index(Request $request)
    {

        $posts = Post::latest()->with(['user', 'likes'])->paginate(5);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'body' => 'required',
            'image' => 'required|mimes:jpg,png|max:1999'
        ]);

        $filename =  $request->file('image')->getClientOriginalName();

        $filename_without_ext = pathinfo($filename, PATHINFO_FILENAME);

        $filename_extention_only = $request->file('image')->getClientOriginalExtension();
        //Jut another way of getting the file extention
        $filename_extention_usingPathinfo = pathinfo($filename, PATHINFO_EXTENSION);

        $filename_name_to_store = $filename_without_ext . '-' . time() . '.' . $filename_extention_only;

        $filetoupload = $request->file('image')->storeAs('public/image', $filename_name_to_store);

        $request->user()->posts()->create([
            'body' => $request->body,
            'userimage' => $filename_name_to_store
        ]);

        //auth()->user()->posts()->create([]);

        //$request->user()->posts()->create([]);

        //Post::create([]);

        //$request->user()->posts()->create($request->only('body'));

        return back();
    }


    public function show(Post $post)
    {

        return view('posts.show', [
            'post' => $post
        ]);
    }


    public function destroy(Post $post)
    {

        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
}
