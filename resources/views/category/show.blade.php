@extends('category.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">

          <p class="card-text">  <span><a href="{{ route('category.index')}}"> back</a> </span>  {{ $category->name  }}  </p>
        </div>
      </div>
</div>


<div class="container" style="padding-bottom: 7%">
<form >
    @csrf
    @method('PUT')
        <div class="form-group">
          <label for="exampleFormControlInput1">  Name</label>
          <input type="text" name="name" value="{{ $category->name  }} " class="form-control"  placeholder="category name" disabled>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">  Avatar</label>
            <img name="avatar" src="{{URL::asset($category->avatar)}}"  class="card-img-top" alt="xxxx">
            {{-- <input type="text" name="avatar" value="{{ $category->avatar  }} "  class="form-control"  placeholder="avatar" disabled> --}}
          </div>





    </form>
</div>





@endsection