<?php

use Illuminate\Support\Arr;
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
    return view('home',['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About','name' => 'Izzudin Athar']);
});

Route::get('/posts', function () {
    return view('posts',['title' => 'Blog', 'posts' => [
        [
            'id' => 1 ,
            'slug' => 'judul-artikel-1' ,
            'title' => 'Judul Artikel 1' ,
            'author' => 'Izzudin Athar',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui voluptatibus ipsa ea iste voluptate quam architecto fugit sequi quo facilis molestiae in, aperiam molestias dolorum? Ipsa, quaerat in. Dolor, eligendi.',
        ],
        [
            'id' => 2 ,
            'slug' => 'judul-artikel-2' ,
            'title' => 'Judul Artikel 2',
            'author' => 'Izzudin Athar',
            'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt expedita fuga quidem itaque est blanditiis amet temporibus dolorum veniam. Atque recusandae mollitia quia reiciendis aut ipsa, pariatur facilis sit quod!',
        ]
    ]]);
});

Route::get('/posts/{slug}', function ($slug) {
    $posts = [
        [
            'id' => 1 ,
            'slug' => 'judul-artikel-1' ,
            'title' => 'Judul Artikel 1' ,
            'author' => 'Izzudin Athar',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui voluptatibus ipsa ea iste voluptate quam architecto fugit sequi quo facilis molestiae in, aperiam molestias dolorum? Ipsa, quaerat in. Dolor, eligendi.',
        ],
        [
            'id' => 2 ,
            'slug' => 'judul-artikel-2' ,
            'title' => 'Judul Artikel 2',
            'author' => 'Izzudin Athar',
            'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt expedita fuga quidem itaque est blanditiis amet temporibus dolorum veniam. Atque recusandae mollitia quia reiciendis aut ipsa, pariatur facilis sit quod!',
        ]
    ];

    $post = Arr::first($posts, function($post) use ($slug){
        return $post['slug'] == $slug;
    });

    return view('post',['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact',['title' => 'Contact']);
});