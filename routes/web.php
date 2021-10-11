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
    $posts = Post::latest('published_at')->with('category', 'author')->get();
    $page_title = "My Blog";

    return view('posts', [
        "posts" => $posts,
        "page_title" => $page_title,
        "categories" => Category::whereHas('posts')->orderBy('name')->get(),
        "authors" => User::whereHas('posts')->orderBy('name')->get(),
    ]);
})->name('home');

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', compact(['post']));
})->name('post');


Route::get('/categories', function () {
    $categories = Category::all();
    return view('categories', ["categories" => $categories, "page_title" => 'Catégories']);
});

Route::get('/authors', function () {
    $authors = User::all();
    return view('authors', ["authors" => $authors, "page_title" => 'Utilisateurs']);
});

Route::get('/authors/{author:slug}', function (User $author) {
    $author->load('posts.category');
    $posts = $author->posts;
    $posts->load('author');

    return view('posts', [
        "posts" => $posts,
        "categories" => Category::whereHas('posts')->orderBy('name')->get(),
        "authors" => User::all()
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    $category->load('posts.author');
    $posts = $category->posts;
    $posts->load('category');

    return view('posts', [
        "posts" => $posts,
        "categories" => Category::whereHas('posts')->orderBy('name')->get(),
        "authors" => User::all(),
        "currentCategory"=>$category
    ]);
})->name('single-category');
