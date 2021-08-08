<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class AuthorController extends Controller
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
        $Authors = Author::all();
        
        // $author = Author::where('id',$id)->first();
        return view('author.index', compact('Authors'));
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

        return view('author.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //id	name	DOB	nationality	career	category_id

        $request->validate([
            'name'=>'required',
            'avatar' =>  'required|image',
            'DOB'=>'required',
            'nationality'=>'required',
            'career'=>'required',
            'category_id'=>'required'
        ]);
        $avatar = $request->avatar;
        $newAvatar = time().$avatar->getClientOriginalName();
        $avatar->move('uploads/authors',$newAvatar);

        $Author = Author::create([
            'name' =>  $request->name,
            'avatar' => 'uploads/authors/'.$newAvatar,
            'DOB'=>$request->DOB,
            'nationality'=>$request->nationality,
            'career'=>$request->career,
            'category_id'=>$request->category_id,
        ]);

        // $Authors = Author::create($request->all());
         return redirect()->route('author.index')
         ->with('success','author added successflly') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show($id)//Author $author
    {
        //
        $author = Author::where('id',$id)->first();

        return view('author.show', compact('author'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//Author $author
    {
        //
        $author = Author::where('id',$id)->first();
        $categories= Category::all();

        return view('author.edit', compact('author'))->with('categories',$categories) ;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)//Request $request, Author $author
    {
        //
        $request->validate([
            'name'=>'required',
            // 'avatar'=>'required',
            'DOB'=>'required',
            'nationality'=>'required',
            'career'=>'required',
            'category_id'=>'required'
        ]);
        $author = Author::find( $id ) ;
        if ($request->has('avatar')) {
            $avatar = $request->avatar;
            $newAvatar = time().$avatar->getClientOriginalName();
            $avatar->move('uploads/authors',$newAvatar);
            $author->avatar ='uploads/authors/'.$newAvatar ;
        }
        // dd($request->category_id);

        $author->name = $request->name;
        $author->DOB = $request->DOB;
        $author->nationality = $request->nationality;
        $author->career = $request->career;
        $author->category_id = $request->category_id;
        $author->save();


         return redirect()->route('author.index')
         ->with('success','author update successflly') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//Author $author
    {
        //
        $author = Author::find( $id ) ;
        $author->delete();
        // $author->decrement('id');
        return redirect()->route('author.index')
        ->with('success','author deleted successflly') ;
    }
}
