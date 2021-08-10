<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});


Route::group(['middleware'=>['auth','admin']],function(){

    Route::get('admin', function () {
        return view('admin.dashboard');
    })->name('admin');
});
// Route::get('/register','App\Http\Controllers\RegisterController@create')->name('register');

// Route::get('/category','App\Http\Controllers\CategoryController@index');


// Route::resource('category','App\Http\Controllers\CategoryController');
// Route::resource('author','App\Http\Controllers\AuthorController');


// Routes for category
Route::get('/category', 'App\Http\Controllers\CategoryController@index' )->name('category.index');
Route::get('/category/create', 'App\Http\Controllers\CategoryController@create' )->name('category.create');
Route::post('/category/store', 'App\Http\Controllers\CategoryController@store' )->name('category.store');
Route::get('/category/show/{id}', 'App\Http\Controllers\CategoryController@show' )->name('category.show');
Route::get('/category/edit/{id}', 'App\Http\Controllers\CategoryController@edit' )->name('category.edit');
Route::put('/category/update/{id}', 'App\Http\Controllers\CategoryController@update' )->name('category.update');
Route::delete('/category/destroy/{id}', 'App\Http\Controllers\CategoryController@destroy' )->name('category.destroy');


Route::get('/author', 'App\Http\Controllers\AuthorController@index' )->name('author.index');
Route::get('/author/create', 'App\Http\Controllers\AuthorController@create' )->name('author.create');
Route::post('/author/store', 'App\Http\Controllers\AuthorController@store' )->name('author.store');
Route::get('/author/show/{id}', 'App\Http\Controllers\AuthorController@show' )->name('author.show');
Route::get('/author/edit/{id}', 'App\Http\Controllers\AuthorController@edit' )->name('author.edit');
Route::put('/author/update/{id}', 'App\Http\Controllers\AuthorController@update' )->name('author.update');
Route::delete('/author/destroy/{id}', 'App\Http\Controllers\AuthorController@destroy' )->name('author.destroy');


Route::get('/post', 'App\Http\Controllers\PostController@index' )->name('post.index');
Route::get('/post/create', 'App\Http\Controllers\PostController@create' )->name('post.create');
Route::post('/post/store', 'App\Http\Controllers\PostController@store' )->name('post.store');
Route::get('/post/show/{id}', 'App\Http\Controllers\PostController@show' )->name('post.show');
Route::get('/post/edit/{id}', 'App\Http\Controllers\PostController@edit' )->name('post.edit');
Route::put('/post/update/{id}', 'App\Http\Controllers\PostController@update' )->name('post.update');
Route::delete('/post/destroy/{id}', 'App\Http\Controllers\PostController@destroy' )->name('post.destroy');


Route::get('/comment', 'App\Http\Controllers\CommentController@index' )->name('comment.index');
Route::get('/comment/show/{id}', 'App\Http\Controllers\CommentController@show' )->name('comment.show');
Route::delete('/comment/destroy/{id}', 'App\Http\Controllers\CommentController@destroy' )->name('comment.destroy');



Route::get('/user', 'App\Http\Controllers\UserController@index' )->name('user.index');
Route::get('/user/show/{id}', 'App\Http\Controllers\UserController@show' )->name('user.show');
Route::delete('/user/destroy/{id}', 'App\Http\Controllers\UserController@destroy' )->name('user.destroy');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');










// Route::get('category','App\Http\Controllers\CategoryController');

// Route::resource('products','App\Http\Controllers\ProductController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
