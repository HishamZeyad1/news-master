<?php
namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\Http\Resources\UsersResource;
use App\Http\Resources\AuthorPostsResource;
use App\Http\Resources\AuthorCommentsResource;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserRescouce;


use App\Http\Resources\TokenResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //\App\Models\User
            $users =  \App\Models\User::paginate(env('AUTHORS_PER_PAGE') );
            return new UsersResource( $users);
            
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required',
            'password'  => 'required',
            // 'usertype'  => 'required'
        ]);
        $user = new User();

        // $user->name = $request->get( 'name' );
        // $user->email = $request->get( 'email' );
        // $user->password = Hash::make( $request->get( 'password' ) );
            
        

        $user->name = $request->name;
        $user->email = $request->email;
       $user->password = Hash::make( $request->password );
       $user->usertype="user";
       $user->avatar="https://source.unsplash.com/random";

    // $user->attributes['password'] = \Hash::make($password);
        // // to generate a new token for the new user
        $user->api_token = Str::random(12);//str_random(60);

        $user->save();
        



       return new UserResource( $user );
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

                return User::whereId($id)->first();
    }

    public function posts( $id ){
        $user = User::find( $id );
        $posts = $user->posts()->paginate( env('POSTS_PER_PAGE') );
        return new AuthorPostsResource( $posts );
    }

    /**
     * @param $id
     * @return AuthorCommentsResource
     */
    public function comments( $id ){
        $user = User::find( $id );
        $comments = $user->comments()->paginate( env('COMMENTS_PER_PAGE') );
        return new AuthorCommentsResource( $comments );
    }

    public function getToken( Request $request ){
        $request->validate( [
            'email' => 'required',
            'password'  => 'required'
        ] );
        $credentials = $request->only('email' , 'password' );
        if( Auth::attempt( $credentials ) ){
            // return Auth::attempt( $credentials );
            $user = User::where( 'email' , $request->get( 'email' ) )->first();
        //    return new TokenResource( [ 'token' => $user->api_token] );
        //    return new UserResource($user);
           return [
            'token' => new TokenResource( ['token' =>$user->api_token]) ,
            'user' => new UserResource($user),
        ];
            // new TokenResource( [ 'token' => $user->api_token] );
            // return ['token' => $token->plainTextToken];

        }
        return 'not found';
    }

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
    public function update(Request $request, $id)
    {
        
        $user = User::whereId($id)->first();
        if( $request->has('name') ){
            $user->name = $request->get( 'name' );//$request->name;
        }
        // if( $request->has( 'avatar' ) ){
        //     $user->avatar = $request->get( 'avatar' );
        // }

        // if( $request->hasFile('avatar') ){
        //     $featuredImage = $request->file( 'avatar' );
        //     $filename = time().$featuredImage->getClientOriginalName();
        //     Storage::disk('images')->putFileAs(
        //         $filename,
        //         $featuredImage,
        //         $filename
        //     );
        //     $user->avatar = url('/') . '/images/' .$filename;//uploads
        // }

        if ($request->has('avatar')) {
            $avatar = $request->avatar;
            $newAvatar = time().$avatar->getClientOriginalName();
            $avatar->move('uploads/users',$newAvatar);
            $user->avatar ='uploads/users/'.$newAvatar ;
        }
    


        $user->save();
        return new UserResource( $user );
        // return $id;

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
}
