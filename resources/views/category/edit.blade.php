@extends('category.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">

          <p class="card-text">  <span><a href="{{ route('category.index')}}"> back</a> </span>  {{ $category->name  }}  </p>
        </div>
      </div>
</div>


<div class="container" style="padding-top: 2%">
<form action="{{ route('category.update', $category->id)}}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="form-group">
          <label for="exampleFormControlInput1">  Name</label>
          <input type="text" name="name" value="{{ $category->name  }} " class="form-control"  placeholder="category name">
        </div>
        {{-- <div class="form-group">
            <label for="exampleFormControlInput1">  Avatar</label>
            <input type="text" name="avatar" value="{{ $category->avatar  }} "  class="form-control"  placeholder="avatar">
          </div> --}}

              <div class="form-group">
                <label for="exampleFormControlInput1">Avatar  </label>
                <input type="file"  name="avatar" class="form-control"   >
              </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>



    </form>
</div>





@endsection