<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index(Request $request)
    {
        $post = Post::find($request->id) ;



        $users = User::join('comments', 'users.id', '=', 'comments.user_id')
        ->get(['users.name', 'comments.*']);

        return view('comments',[
            'posts' => $post,
            'comments' => $users
        ]);
    }

    public function create(Request $request,$id)
    {
        // $posts = Post::find($id);


        $this->validate($request , [
            'comments' => 'required|max:255'
        ]);


         $request->user()->commments()->create([
            'comments' => $request->comments,
            'post_id' => $id
        ]);

        return back();
    }
}
