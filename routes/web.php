<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use \App\Models\Post;
use \App\Models\Category;

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
    $posts = Post::with('category', 'user')->get();
    $page_title = "My Blog";

    return view('posts', ["posts" => $posts, "page_title" => $page_title]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', compact(['post']));
});


Route::get('/categories', function () {
    $categories = Category::all();
    return view('categories', ["categories" => $categories, "page_title" => 'Catégories']);
});

Route::get('/users', function () {
    $users = User::all();
    return view('users', ["users" => $users, "page_title" => 'Utilisateurs']);
});

Route::get('/users/{user:slug}', function (User $user) {
    $user->load('posts.category');
    return view('user', compact(['user']));
});
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('category', compact(['category']));
});
