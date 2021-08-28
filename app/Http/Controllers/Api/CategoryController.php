<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CategoriesResource;
use App\Http\Resources\PostsResource;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return CategoriesResource::collection( \App\Models\Category::paginate(env('CATEGORIES_PER_PAGE')) );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Category::whereId($id)->first();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function posts( $id ){
        $category = Category::whereId($id)->first();

        if ($category!=null) {
            $posts = $category->posts()->paginate( env('POSTS_PER_PAGE') );
            return new PostsResource( $posts );
        }else{return "The category does not exist"; }

        // $posts = $category->posts()->paginate( env('POSTS_PER_PAGE') );
        // return new PostsResource( $posts );
    }
}
