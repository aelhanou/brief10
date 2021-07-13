<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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

}
