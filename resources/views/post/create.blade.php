@extends('post.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
</div>


<div class="container" style="padding-top: 2%">
<form action="{{ route('post.store')}}" method="POST"  enctype="multipart/form-data">
    @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">  Title</label>
          <input type="text" name="title" class="form-control"  placeholder="post title">
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Content</label>
          <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        {{-- <div class="form-group">
          <label for="exampleFormControlInput1">  Avatar</label>
          <input type="text" name="avatar" class="form-control"  placeholder="post avatar">
        </div> --}}


        <div class="form-group">
          <label for="exampleFormControlInput1">Featured_image  </label>
          <input type="file"  name="featured_image" class="form-control"   >
        </div>
          
          {{-- <div class="form-group">
            <label for="exampleFormControlInput1">  Category_id</label>
            <input type="text" name="category_id" class="form-control"  placeholder="category id">
          </div> --}}

          {{-- <div class="form-group">
            <label for="exampleFormControlSelect1">Category</label>
            <select class="form-control" name="category_id" id="exampleFormControlSelect1">
              @foreach ($categories as $item)
              <option value="{{$item->id}}">{{$item->name}}</option>
              @endforeach 
            </select>
          </div> --}}
          <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" name="category_id" id="category_id">
                @foreach ($categories as $item)
                <option  value="{{$item->id}}" >
                  {{$item->name}}
                </option>
                @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="author_id">Category</label>
            <select class="form-control" name="author_id" id="author_id">
                @foreach ($authors as $item)
                <option  value="{{$item->id}}" >
                  {{$item->name}}
                </option>
                @endforeach
            </select>
          </div>



        <div class="form-group"style="margin-top:10px">
            <button type="submit" class="btn btn-primary">Save</button>

        </div>



    </form>
</div>





@endsection