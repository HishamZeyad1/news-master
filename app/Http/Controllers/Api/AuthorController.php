<?php
namespace App\Http\Controllers\Api;

use App\Http\Resources\AuthorResource;
use App\Http\Resources\AuthorsResource;
use App\Http\Resources\AuthorPostsResource;
use App\Http\Resources\AuthorCommentsResource;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthorRescouce;


use App\Http\Resources\TokenResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //\App\Models\User
            $authors =  \App\Models\Author::paginate(env('AUTHORS_PER_PAGE') );
            return new AuthorsResource( $authors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //     $request->validate([
    //         'name'  => 'required',
    //         'email' => 'required',
    //         'password'  => 'required'
    //     ]);
    //     $author = new Author();

    //     // $author->name = $request->get( 'name' );
    //     // $author->email = $request->get( 'email' );
    //     // $author->password = Hash::make( $request->get( 'password' ) );
            
        

    //     $author->name = $request->name;
    //     $author->email = $request->email;
    //    $author->password = Hash::make( $request->password );
    //     // $author->attributes['password'] = \Hash::make($password);
    //     // // to generate a new token for the new author
    //     $author->api_token = Str::random(12);//str_random(60);

    //     $author->save();
        
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

    $author = Author::create([
        'name' =>  $request->name,
        'avatar' => 'uploads/authors/'.$newAvatar,
        'DOB'=>$request->DOB,
        'nationality'=>$request->nationality,
        'career'=>$request->career,
        'category_id'=>$request->category_id,
    ]);
       return new AuthorResource( $author );
    }

 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = User::find($request->id);
        // $user = new UserResource($user);
        //
                // return new UserResource(\App\Models\User::find($id) );
                // $data = new UserCollection($this->model->getUserById($id));
                // return $data;
                // User::where('id' = $user_id)->first()

                return Author::whereId($id)->first();
    }

    public function posts( $id ){
        $author = Author::find( $id );
        // dd($author->posts()==[]);
        if ($author!=null) {
                $posts = $author->posts()->paginate( env('POSTS_PER_PAGE') );
                return new AuthorPostsResource( $posts );
        }else{return "The Author does not exist"; }
     
    }

    // /**
    //  * @param $id
    //  * @return AuthorCommentsResource
    //  */
    // public function comments( $id ){
    //     $author = Author::find( $id );
    //     $comments = $author->comments()->paginate( env('COMMENTS_PER_PAGE') );
    //     return new AuthorCommentsResource( $comments );
    // }

    // public function getToken( Request $request ){
    //     $request->validate( [
    //         'email' => 'required',
    //         'password'  => 'required'
    //     ] );
    //     $credentials = $request->only('email' , 'password' );
    //     if( Auth::attempt( $credentials ) ){
    //         $user = User::where( 'email' , $request->get( 'email' ) )->first();
    //        return new TokenResource( [ 'token' => $user->api_token] );
    //         // new TokenResource( [ 'token' => $user->api_token] );
    //         // return ['token' => $token->plainTextToken];

    //     }
    //     return 'not found';
    // }

    // Public function show ($id){
    //     // $user=User::findOrfail($id);
    //     $data = User::find($id);
    //     Return new UserResource($data);
    //     }
    

//     public function show($id ,Request $request)
//     {
//         $user = User::find($id);
    
//      if( $request->is('api/*')){
//                 $user = new UserResource($user);
//                 return $this->sendResponse(compact('user'),$message);
//             }
// }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
        
    //     $user = User::whereId($id)->first();
    //     if( $request->has('name') ){
    //         $user->name = $request->get( 'name' );
    //     }
    //     // if( $request->has( 'avatar' ) ){
    //     //     $user->avatar = $request->get( 'avatar' );
    //     // }

    //     if( $request->hasFile('avatar') ){
    //         $featuredImage = $request->file( 'avatar' );
    //         $filename = time().$featuredImage->getClientOriginalName();
    //         Storage::disk('images')->putFileAs(
    //             $filename,
    //             $featuredImage,
    //             $filename
    //         );
    //         $user->avatar = url('/') . '/images/' .$filename;
    //     }
    //     $user->save();
    //     return new UserResource( $user );
    //     // return $id;
    // }

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
}
