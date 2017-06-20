<?php

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
    // $posts = \App\Post::all();
    // $posts = \App\Post::with('author')->get();
    // $posts = \App\Post::with(['author', 'comments'])->get();
    $posts = \App\Post::withCount('comments')->with('author')->get();
    return view('welcome', compact('posts'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
