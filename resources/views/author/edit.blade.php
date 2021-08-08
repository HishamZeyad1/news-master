@extends('author.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">
          <p class="card-text">  <span><a href="{{ route('author.index')}}"> back</a> </span>  {{ $author->name  }}  </p>
        </div>
      </div>
</div>


<div class="container" style="padding-top: 2%">
<form action="{{ route('author.update', $author->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="form-group">
          <label for="exampleFormControlInput1">  Name</label>
          <input type="text" name="name" value="{{ $author->name  }} " class="form-control"  placeholder="author name">
        </div>
        {{-- <div class="form-group">
            <label for="exampleFormControlInput1">  Avatar</label>
            <input type="text" name="avatar" value="{{ $author->avatar  }} "  class="form-control"  placeholder="avatar">
          </div> --}}          
          <div class="form-group">
            <label for="exampleFormControlInput1">Avatar  </label>
            <input type="file" name="avatar" class="form-control"   >
          </div>


          <div class="form-group">
            <label for="exampleFormControlInput1">  DOB</label>
            <input type="text" name="DOB"value="{{ $author->DOB  }} " class="form-control"  placeholder="date of birth">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">  Nationality</label>
            <input type="text" name="nationality"value="{{ $author->nationality  }} " class="form-control"  placeholder="Nationality">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">  Career</label>
            <input type="text" name="career" value="{{ $author->career  }} "class="form-control"  placeholder="Career">
          </div>

          
          {{-- <div class="form-group">
            <label for="exampleFormControlInput1">  Category_id</label>
            <input type="text" name="category_id"value="{{ $author->category_id  }} " class="form-control"  placeholder="category id">
          </div> --}}


          <div class="form-group">
            <label for="category_id">Category ID</label>
            <select class="form-control" name="category_id" id="category_id">
                @foreach ($categories as $item)
                <option  value="{{$item->id}}" 
                  {{$item->id==$author->category_id?'selected="selected"':''}}>
                  {{$item->name}}
                </option>
                @endforeach
            </select>
          </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>



    </form>
</div>





@endsection