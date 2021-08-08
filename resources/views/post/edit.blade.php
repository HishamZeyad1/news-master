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
<form style="padding-bottom: 3%"action="{{ route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="form-group">
          <label for="exampleFormControlInput1">  Title</label>
          <input type="text" name="title" value="{{ $post->title  }} " class="form-control"  placeholder="Post Title">
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Content</label>
          <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3">
            {{ $post->content  }}
          </textarea>
        </div>


        {{-- <div class="form-group">
            <label for="exampleFormControlInput1">  Avatar</label>
            <input type="text" name="avatar" value="{{ $post->avatar  }} "  class="form-control"  placeholder="avatar">
          </div> --}}          
          <div class="form-group">
            <label for="exampleFormControlInput1">featured_image  </label>
            <input type="file" name="featured_image" class="form-control">
          </div>


 
          
          {{-- <div class="form-group">
            <label for="exampleFormControlInput1">  Category_id</label>
            <input type="text" name="category_id"value="{{ $post->category_id  }} " class="form-control"  placeholder="category id">
          </div> --}}


          <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" name="category_id" id="category_id">
                @foreach ($categories as $item)
                <option  value="{{$item->id}}" 
                  {{$item->id==$post->category_id?'selected="selected"':''}}>
                  {{$item->name}}
                </option>
                @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="author_id">Author</label>
            <select class="form-control" name="author_id" id="author_id">
                @foreach ($authors as $item)
                <option  value="{{$item->id}}" 
                  {{$item->id==$post->author_id?'selected="selected"':''}}>
                  {{-- {{$item->name}} --}}
                  {{ $item==null?"unknown":$item->name }}
                </option>
                @endforeach
            </select>
          </div>


        <div class="form-group"style="margin-top:1%">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>



    </form>
</div>





@endsection