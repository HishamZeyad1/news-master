<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CategoriesResource;
use App\Http\Resources\PostsResource;
use App\Http\Resources\PostResource;

use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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


    public function posts1(Request $request){
            // $category_ids= $request->categories;
            // dd($category_ids);


            // $category_ids = array_map('intval', explode(',',$request->categories));
            // $category_ids = explode(',',$request->categories);
            // $category_ids = array_map('intval',$request->categories);
            $category_ids = array_map('intval', json_decode($request->categories, true));


                // dd($integerIDs);
            // $category_ids = array_map('intval',$request->categories);

            // $category_ids = array_map($request->categories);
                // dd($category_ids);
            // $category_ids = json_decode($request->data, true);
                // dd($category_ids);
            $posts=Post::whereIn('category_id',$category_ids)->orderBy('date_written', 'desc')->get();
            // $posts = $category->posts()->orderBy('date_written', 'asc')->paginate( env('POSTS_PER_PAGE') );;

            // $posts = Post::whereIn('category_id',$category_ids)::with(['comments' , 'author' , 'category'])->get();

          return PostResource::collection($posts);
  }


  public function posts2(Request $request){
    $category_ids = array_map('intval', json_decode($request->categories, true));

    $posts=Post::whereIn('category_id',$category_ids)->orderBy('votes_up', 'desc')->get();

  return PostResource::collection($posts);
}

}


        // $arr[]=$myarray;

        // if ($myarray!=null) {
        // foreach($myarray  as $item){
        
        //     // $category = Category::whereId($item)->first();
        //     Post::where( 'category_id' , $item )->get();
        // }

        // $collection = $myarray;
        // return $collection;
        // }

        // $category = Category::whereId($id)->first();
        // if ($category!=null) {
        //     $posts = $category->posts()->paginate( env('POSTS_PER_PAGE') );
        //     return new PostsResource( $posts );
        // }else{return "The category does not exist"; }

        // $posts = $category->posts()->paginate( env('POSTS_PER_PAGE') );
        // $collection = collect($myarray);
        // $collection->contains(function ($value, $key) {
        //     return $value <= 5;
        // });
        
        
        // return $collection[0] ;