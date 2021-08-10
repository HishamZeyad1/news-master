@extends('user.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">       
          <p> <span><a href="{{ route('user.index')}}"> back</a> </span>  It uses utility classes for typography and spacing to space content out within the larger container.</p>
        </div>
      </div>
</div>
<div class="container" style="padding-top: 2%">
<form style="padding-bottom: 3%">
    @csrf

        {{-- <div class="form-group">
          <label for="exampleFormControlTextarea1">	name</label>
          <textarea class="form-control" name="	name" id="exampleFormControlTextarea1" rows="1" disabled>
            {{ $user->	name  }}
          </textarea>
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">	email</label>
          <textarea class="form-control" name="email" id="exampleFormControlTextarea1" rows="1" disabled>
            {{ $user->email  }}
          </textarea>
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">	password</label>
          <textarea class="form-control" name="password" id="exampleFormControlTextarea1" rows="1" disabled>
            {{ $user->password  }}
          </textarea>
        </div> --}}


        <div class="form-group">
          <label for="post_id">Name</label>
          <select class="form-control" name="post_id" id="post_id" disabled>
              <option  value="{{ $user->name }}">
                {{ $user->name  }}
              </option>
          </select>
        </div>
        <div class="form-group">
          <label for="post_id">Email</label>
          <select class="form-control" name="post_id" id="post_id" disabled>
              <option  value="{{$user->email}}">
                {{ $user->email  }}
              </option>
          </select>
        </div>


          {{-- <div class="form-group">
            <label for="user_id">User</label>
            <select class="form-control" name="user_id" id="user_id" disabled>
                <option  value="{{$user->user->name}}" >
                  {{$user->user->name}}
                </option>
            </select>
          </div>

          <div class="form-group">
            <label for="post_id">Post</label>
            <select class="form-control" name="post_id" id="post_id" disabled>
                <option  value="{{$user->post->title}}">
                  {{$user->post->title}}
                </option>
            </select>
          </div> --}}




    </form>
</div>





@endsection