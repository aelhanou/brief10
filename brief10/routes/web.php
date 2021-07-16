<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');


Route::post('/logout', [LogoutController::class,'logout'])->name('logout');


Route::get('/', function(){

    $posts = Post::get();
    return view('home',[
        'posts' => $posts
    ]);
})->name('home');


Route::put('/edit', function(){

    return view('edit');
})->name('edit');
Route::get('/Readedit/{id}', [DashboardController::class,'Readedit'])->name('dashboard.Readedit');
Route::put('/edit/{id}', [DashboardController::class,'edit'])->name('dashboard.edit');



Route::delete('/delete/{id}', [DashboardController::class,'Delete'])->name('dashboard.Delete');



Route::get('/comment', [CommentsController::class,'index'])->name('comment');
Route::get('/comment/{id}', [CommentsController::class,'store']);
// Route::post('/create', [CommentsController::class,'create'])->name('comment.create');
Route::post('/create/{id}', [CommentsController::class,'create'])->name('comment.create');

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'login']);


Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store']);


Route::get('/posts', [PostController::class,'index'])->name('posts');
Route::post('/posts', [PostController::class,'store']);
