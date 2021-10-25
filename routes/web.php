<?php

use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use \App\Models\Post;
use \App\Models\Category;


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');

Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionController::class, 'create'])->middleware('guest');

Route::post('/logout', [SessionController::class, 'destroy'])->middleware("auth");

Route::post('/session', [SessionController::class, 'store'])->middleware("guest");

Route::post('/posts/{post}/comments', [PostCommentController::class, 'store'])->middleware("auth");


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
