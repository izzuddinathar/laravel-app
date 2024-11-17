<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About', 'name' => 'Izzudin Athar']);
});

Route::get('/posts', function () {
    // $post = Post::latest()->get();

    return view('posts', ['title' => 'Blog', 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(9)->withQueryString()]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
    $post = $user->posts->load('category', 'author');

    return view('posts', ['title' => count($user->posts).' Articles By '.$user->name, 'posts' => $post]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    $post = $category->posts->load('category', 'author');

    return view('posts', ['title' => ' Articles in '.$category->name, 'posts' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
