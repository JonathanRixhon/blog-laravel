<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use \App\Models\Post;

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
    $posts = Post::all();
    $page_title = "My Blog";
    return view('posts', ["posts" => $posts, "page_title" => $page_title]);

});

Route::get('/posts/{post:slug}', function (Post $post) {

    //$post = Post::where('slug',$slug)->firstOrFail();

    $page_title = "Le post: {$post->title}";

    return view('post', [
        'post' => $post,
        "page_title" => $page_title

    ]);
});

/*
Route::get('/n', function () {
    $user = new User();
    $user->name = 'Jonathan';
    $user->email = 'jonathan.test@hotmail.com';
    $user->password = Hash::make('jonathan');
    //$user->save();
    return User::findOrFail(1)->name;
});
 */

