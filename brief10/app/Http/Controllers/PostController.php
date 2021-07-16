<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {
        if(Auth::user()->role == "user")
        {
            return redirect()->route("home");
        }
        return view('posts.index');
    }

    public function store(Request $request)
    {

        if(Auth::user()->role == "user")
        {
            return redirect()->route("home");
        }
        $path = '';


        $this->validate($request, [
            'body' => 'required',
            'image' => 'required',

        ]);

        if($request->hasFile('image'))
        {
            $path = $request->file('image')->store('public');
            $path = explode('/',$path);
        }
        $request->user()->posts()->create([
            'body' => $request->body,
            'image' => $path[1]
        ]);





        return back();
    }
}
