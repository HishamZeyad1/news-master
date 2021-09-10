<?php
namespace App\Database\routes\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Illuminate\Routing\Controller;
use App\Http\Controllers\Api;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



//   Route::group(['middleware' => 'cors'])->group( function(){


    
// });


// End User Related
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware(['cors'])->group(function () {
    Route::get('authors', 'App\Http\Controllers\Api\AuthorController@index');
    Route::get('authors/{id}', 'App\Http\Controllers\Api\AuthorController@show');
    
    Route::get('posts/author/{id}', 'App\Http\Controllers\Api\AuthorController@posts');
    // Route::get('comments/author/{id}', 'App\Http\Controllers\Api\UserController@comments');
    
    Route::get( 'categories' , 'App\Http\Controllers\Api\CategoryController@index' );
    Route::get( 'categories/{id}' , 'App\Http\Controllers\Api\CategoryController@show' );
    
    Route::get( 'posts/categories/{id}' , 'App\Http\Controllers\Api\CategoryController@posts' );
    // Route::post( 'posts/categories/{id}/{myarray}' , 'App\Http\Controllers\Api\CategoryController@posts1' );
    
    Route::post('posts/categories','App\Http\Controllers\Api\CategoryController@posts1');
    Route::post('popularposts/categories','App\Http\Controllers\Api\CategoryController@posts2');


    Route::get( 'posts' , 'App\Http\Controllers\Api\PostController@index' );
    Route::get( 'posts/{id}' , 'App\Http\Controllers\Api\PostController@show' );
    Route::get( 'comments/posts/{id}' , 'App\Http\Controllers\Api\PostController@comments');
    
    Route::POST('register', 'App\Http\Controllers\Api\UserController@store');
    Route::POST('token', 'App\Http\Controllers\Api\UserController@getToken');
    Route::get('users', 'App\Http\Controllers\Api\UserController@index');
    Route::get('users/{id}', 'App\Http\Controllers\Api\UserController@show');
    
    // Route::post( 'votes/posts/{id}' , 'App\Http\Controllers\Api\PostController@votes' );
// });

Route::middleware('auth:api')->group( function(){
    Route::post( 'update-user/{id}' , 'App\Http\Controllers\Api\UserController@update' );
    Route::post( 'posts' , 'App\Http\Controllers\Api\PostController@store' );
    Route::post( 'posts/{id}' , 'App\Http\Controllers\Api\PostController@update'  );
    Route::delete( 'posts/{id}' , 'App\Http\Controllers\Api\PostController@destroy'  );
    Route::post( 'comments/posts' , 'App\Http\Controllers\Api\CommentController@store' );
    Route::post( 'votes/posts/{id}' , 'App\Http\Controllers\Api\PostController@votes' );
} ) ;



