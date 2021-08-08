@extends('comment.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">       

          <p class="card-text">  <span><a href="{{ route('comment.index')}}"> back</a> </span>  {{ $comment->content  }}  </p>
        </div>
      </div>
</div>
<div class="container" style="padding-top: 2%">
<form style="padding-bottom: 3%">
    @csrf

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Content</label>
          <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" disabled>
            {{ $comment->content  }}
          </textarea>
        </div>


          <div class="form-group">
            <label for="user_id">User</label>
            <select class="form-control" name="user_id" id="user_id" disabled>
                <option  value="{{$comment->user->name}}" >
                  {{$comment->user->name}}
                </option>
            </select>
          </div>

          <div class="form-group">
            <label for="post_id">Post</label>
            <select class="form-control" name="post_id" id="post_id" disabled>
                <option  value="{{$comment->post->title}}">
                  {{$comment->post->title}}
                </option>
            </select>
          </div>




    </form>
</div>





@endsection