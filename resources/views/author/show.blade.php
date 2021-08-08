@extends('author.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">

          <p class="card-text">  <span><a href="{{ route('author.index')}}"> back</a> </span>  {{ $author->name  }}  </p>
        </div>
      </div>
</div>


<div class="container" style="padding: 2%">
<form >
    @csrf
    @method('PUT')

        <div class="form-group">
          <label for="exampleFormControlInput1">  Name</label>
          <input type="text" name="name" value="{{ $author->name  }} " class="form-control"  placeholder="author name" disabled>
        </div>

        {{-- <div class="form-group">
            <label for="exampleFormControlInput1">  Avatar</label>
            <input type="text" name="avatar" value="{{ $author->avatar  }} "  class="form-control"  placeholder="avatar" disabled>
        </div> --}}

        <div class="form-group" style="width: 10%">
          <label for="exampleFormControlInput1">  Avatar</label>
          <img name="avatar" src="{{URL::asset($author->avatar)}}"  class="card-img-top" alt="$author->avatar">
          {{-- <input type="text" name="avatar" value="{{ $category->avatar  }} "  class="form-control"  placeholder="avatar" disabled> --}}
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">  DOB</label>
          <input type="text" name="DOB"value="{{ $author->DOB  }} " class="form-control"  placeholder="date of birth" disabled>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">  Nationality</label>
          <input type="text" name="nationality"value="{{ $author->nationality  }} " class="form-control"  placeholder="Nationality"disabled>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">  Career</label>
          <input type="text" name="career" value="{{ $author->career  }} "class="form-control"  placeholder="Career"disabled>
        </div>

        
        <div class="form-group">
          <label for="exampleFormControlInput1">  Category</label>
          <input type="text" name="category_id"value="{{ $author->category->name  }} " class="form-control"  placeholder="category id" disabled>
        </div>






    </form>
</div>





@endsection