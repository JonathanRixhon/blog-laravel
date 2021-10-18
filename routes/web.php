<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use \App\Models\Post;
use \App\Models\Category;


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class,'show'])->name('post');

Route::get('register',[RegisterController::class,'create']);
Route::post('register',[RegisterController::class,'store']);

//Route::get('/authors', function () {
//    $authors = User::all();
//    return view('authors', ["authors" => $authors, "page_title" => 'Utilisateurs']);
//});


//Route::get('/authors/{author:slug}', function (User $author) {
//    $author->load('posts.category');
//    $posts = $author->posts;
//    $posts->load('author');
//
//    return view('posts.index', [
//        "posts" => $posts,
//        "categories" => Category::whereHas('posts')->orderBy('name')->get(),
//        "authors" => User::all()
//    ]);
//});
//

//Route::get('/categories/{category:slug}', function (Category $category) {
//    $category->load('posts.author');
//    $posts = $category->posts;
//    $posts->load('category');
//
//    return view('posts', [
//        "posts" => $posts,
//        "categories" => Category::whereHas('posts')->orderBy('name')->get(),
//        "authors" => User::all(),
//        "currentCategory" => $category
//    ]);
//})->name('single-category');


//Route::get('/categories', function () {
//    $categories = Category::all();
//    return view('categories', ["categories" => $categories, "page_title" => 'Catégories']);
//});
