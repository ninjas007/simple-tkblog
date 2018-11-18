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
	$posts = App\Post::Paginate(6);
	$tags = App\Tag::orderBy('id', 'decs')->paginate(5);
	$categories = App\Category::All();
    return view('welcome')->withPosts($posts)->withTags($tags)->withCategories($categories);// disini withpost bisa dgantikan dengan compact
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController');

Route::resource('category', 'CategoryController');

Route::resource('tag', 'TagController');

Route::post('comment/create/{post}', 'CommentController@makeComment')->name('sendComment.store');

Route::post('search', 'SearchController@search')->name('search');