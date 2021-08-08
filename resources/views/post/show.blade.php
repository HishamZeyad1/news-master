@extends('post.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">
          <p class="card-text">  <span><a href="{{ route('post.index')}}"> back</a> </span>  {{ $post->name  }}  </p>
        </div>
      </div>
</div>
<div class="container" style="padding-top: 2%">
<form style="padding-bottom: 3%">
    @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">  Title</label>
          <input type="text" name="title" value="{{ $post->title  }} " class="form-control" disabled>
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Content</label>
          <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" disabled>
            {{ $post->content  }}
          </textarea>
        </div>


        {{-- <div class="form-group">
            <label for="exampleFormControlInput1">  Avatar</label>
            <input type="text" name="avatar" value="{{ $post->avatar  }} "  class="form-control"  placeholder="avatar">
          </div> --}}          
          {{-- <div class="form-group">
            <label for="exampleFormControlInput1">featured_image  </label>
            <input type="file" name="featured_image" class="form-control">
          </div> --}}

          <div class="form-group" style="width: 10%">
            <label for="exampleFormControlInput1"> Featured_image</label>
            <img name="featured_image" src="{{URL::asset($post->featured_image)}}"  class="card-img-top" alt="xx">
            {{-- <input type="text" name="avatar" value="{{ $category->avatar  }} "  class="form-control"  placeholder="avatar" disabled> --}}
          </div>
          
          <div class="form-group">
            <label for="exampleFormControlInput1">  votes_up</label>
            <input type="text" name="title" value="{{ $post->votes_up==null?0:$post->votes_up  }} " class="form-control" disabled>
            <label for="exampleFormControlInput1">  voters_down</label>
            <input type="text" name="title" value="{{ $post->voters_down==null?0:$post->voters_down  }} " class="form-control" disabled>
          </div> 

 
          
          {{-- <div class="form-group">
            <label for="exampleFormControlInput1">  Category_id</label>
            <input type="text" name="category_id"value="{{ $post->category_id  }} " class="form-control"  placeholder="category id">
          </div> --}}


          <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" name="category_id" id="category_id" disabled>
                <option  value="{{$post->id}}" >
                  {{$post->category ==null?"unknown":$post->category->name}}
                </option>
            </select>
          </div>

          <div class="form-group">
            <label for="author_id">Author</label>
            <select class="form-control" name="author_id" id="author_id" disabled>
                <option  value="{{$post->id}}">
                  {{-- {{$post->author->name}} --}}
                  {{ $post->author==null?"unknown":$post->author->name }}
                </option>
            </select>
          </div>




    </form>
</div>





@endsection