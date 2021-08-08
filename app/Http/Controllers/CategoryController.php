<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $Categories = Category::all();
        return view('category.index',compact('Categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $Categories = Category::all();

        return view('category.create');

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
        $this->validate($request,[
            'name' =>  'required',
            'avatar' =>  'required|image',
        ]);

        $avatar = $request->avatar;
        $newAvatar = time().$avatar->getClientOriginalName();
        $avatar->move('uploads/categories',$newAvatar);

        $category = Category::create([
            'name' =>  $request->name,
            'avatar' => 'uploads/categories/'.$newAvatar,
        ]);
         return redirect()->route('category.index')
         ->with('success','category added successflly') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)//Category $category
    {
        //
        $category = Category::where('id',$id)->first();
        // return view('category.index', compact('Categories'));
        return view('category.show', compact('category'))  ;


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::where('id',$id)->first();

        return view('category.edit', compact('category'))  ;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)//Request $request, Category $category
    {
        $category = Category::find( $id ) ;
        // $this->validate($request,[
        //     'name' =>  'required',
        //     'avatar' =>  'required'
        // ]);

     //   dd($request->all());

    if ($request->has('avatar')) {
        $avatar = $request->avatar;
        $newAvatar = time().$avatar->getClientOriginalName();
        $avatar->move('uploads/categories',$newAvatar);
        $category->avatar ='uploads/categories/'.$newAvatar ;
    }

    $category->name = $request->name;
    $category->save();
        //
        // $request->validate([
        //     'name'=>'required',
        //     'avatar'=>'required',
        // ]);

        // $category->update($request->all());
         return redirect()->route('category.index')
         ->with('success','category updated successflly') ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Category::where('id', $id)->delete();
        $category = Category::where('id', $id)->first();//Category::find( $id ) ;
        // dd($category->authors==null);
        if($category->authors!=null){
            foreach($category->authors as $author){
                $author->delete();
            // $category->authors->delete();
        }
                }
        if($category->posts!=null){
            foreach($category->posts as $post){

                if($category->posts->comments!=null){
                    foreach($category->posts->comments as $comment){
                        $comment->delete();
                    // $category->authors->delete();
                }         
                    // $category->posts->delete();
                }
                $post->delete();
            // $category->authors->delete();
        }         
            // $category->posts->delete();
        }

        // if($category->posts!=null){
        //     foreach($category->posts as $post){
        //         $post->delete();
        //     // $category->authors->delete();
        // }         
        //     // $category->posts->delete();
        // }

        // $category->posts->comment->delete;
        $category->delete();

        // $category->decrement('id');
        return redirect()->route('category.index')
        ->with('success','category deleted successflly') ;
    }
}
