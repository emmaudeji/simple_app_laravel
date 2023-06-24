<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;


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

Route::get('/', function () {
    // all posts
    $posts = Post::all();
    // posts by user reference
    $postByUser = Post::where('user_id', auth()->id())->get();

    $postByUserId = null;
    // posts by user reference  better way to do it
    if(auth()->user() !== null) {
        $postByUserId = auth()->user()->userCoolPosts()->latest()->get();
    }
    
    return view('home', ['posts' => $posts, 'postByUser' => $postByUserId]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// blog post related route
Route::post('/create-post', [PostController::class, 'createPost']);
// edit post
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);



