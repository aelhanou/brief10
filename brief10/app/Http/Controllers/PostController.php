<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {


        return view('posts.index');
    }

    public function store(Request $request)
    {

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
