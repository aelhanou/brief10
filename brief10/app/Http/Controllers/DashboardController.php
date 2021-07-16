<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use \Hamcrest\Core\IsTypeOf;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
public function __construct()
{
    $this->middleware(['auth']);
}

    public function index(Request $request)
    {

        $posts = Post::get();


        return view('dashboard',[
            'posts' => $posts
        ]);
    }

    public function Delete($id)
    {
        if(Auth::user()->role == "user")
        {
            return redirect()->route("home");
        }
        $posts = Post::find($id)->delete();

        return back();
    }


    public function Readedit($id)
    {
        if(Auth::user()->role == "user")
        {
            return redirect()->route("home");
        }
        $post = Post::find($id);

        return view('edit',['post' => $post]);
    }

    public function edit(Request $request,$id)
    {
        if(Auth::user()->role == "user")
        {
            return redirect()->route("home");
        }
        $post = Post::find($id);

        if($request->hasFile('image'))
        {
            $path = $request->file('image')->store('public');
            $path = explode('/',$path);
            $post->image = $path[1];
        }

        $post->body = $request->body;
        $post->save();

        return redirect()->route("home");
    }

}
