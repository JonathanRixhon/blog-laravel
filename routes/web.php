<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\User;
use App\Services\MailchimpNewsletter;
use Illuminate\Support\Facades\Route;
use \App\Models\Post;
use \App\Models\Category;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post');

Route::get('register', [RegisterController::class, 'cr eate'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])->middleware("auth");
Route::post('/session', [SessionController::class, 'store'])->middleware("guest");

Route::post('/posts/{post}/comments', [PostCommentController::class, 'store'])->middleware("auth");

Route::post('/newsletter', NewsletterController::class);


Route::get('/hello', fn()=>"Hello");

//ADMIN
Route::middleware('can:admin')->group(function ()
{
    Route::resource('admin/posts',AdminPostController::class)->except('show');
    /*

    Route::get('/admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
    Route::patch('/admin/posts/{post}', [AdminPostController::class, 'update']);
    Route::delete('/admin/posts/{post}', [AdminPostController::class, 'destroy']);
    Route::get('/admin/posts/create', [AdminPostController::class, 'create']);
    Route::post('/admin/posts', [AdminPostController::class, 'store']);
    Route::get('/admin/posts', [AdminPostController::class, 'index']);

    */
});



















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
//    return view('categories', ["categories" => $categories, "page_title" => 'Cat??gories']);
//});
