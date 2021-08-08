<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Posts = Post::all();
        // $author = Author::where('id',$id)->first();
        return view('post.index', compact('Posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories= Category::all();
        $authors = Author::all();
        return view('post.create',compact('categories'))->with('authors',$authors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // use Carbon\Carbon;
        // $date = Carbon::now();
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            // 'date_written'=>'required',
            'featured_image' =>'required|image',
            'author_id'=>'required',
            'category_id'=>'required',
        ]);
        $featured_image = $request->featured_image;
        $newFeatured_image = time().$featured_image->getClientOriginalName();
        $featured_image->move('uploads/posts',$newFeatured_image);

        $Post = Post::create([
            'title' =>  $request->title,
            'content'=>$request->content,
            'date_written'=>Carbon::now()->format('Y-m-d H:i:s'),
            'featured_image' => 'uploads/posts/'.$newFeatured_image,
            'author_id'=>$request->author_id,
            'category_id'=>$request->category_id,
        ]);

        // dd($Post->title,$Post->content,$Post->date_written,$Post->featured_image,$Post->author_id,$Post->category_id,);
        return redirect()->route('post.index')
        ->with('success','post added successflly') ;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::where('id',$id)->first();

        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id',$id)->first();
        $categories= Category::all();
        $authors = Author::all();

        return view('post.edit', compact('post'))->with('categories',$categories)
        ->with('authors',$authors);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            // 'date_written'=>'required',
            // 'featured_image' =>'required|image',
            'author_id'=>'required',
            'category_id'=>'required',
        ]);
        $post = Post::find( $id ) ;
        if ($request->has('featured_image')) {
            $featured_image = $request->featured_image;
            $newFeatured_image = time().$featured_image->getClientOriginalName();
            $featured_image->move('uploads/posts',$newFeatured_image);
            $post->featured_image ='uploads/posts/'.$newFeatured_image ;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        // $post->date_written = $request->date_written;
        $post->author_id = $request->author_id;
        $post->category_id = $request->category_id;
        $post->save();

        return redirect()->route('post.index')
        ->with('success','post update successflly') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::where('id', $id)->first();//Category::find( $id ) ;

        // $post = Post::find( $id ) ;
        // $post->delete();

        if($post->comments!=null){
            foreach($post->comments as $comment){
                $comment->delete();
        }         
        }
        $post->delete();

        // $post->comments->delete;

        // $author->decrement('id');

        return redirect()->route('post.index')
        ->with('success','post deleted successflly') ;

    }
}
