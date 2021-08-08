@extends('author.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
</div>


<div class="container" style="padding-top: 2%">
<form action="{{ route('author.store')}}" method="POST"  enctype="multipart/form-data">
    @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">  Name</label>
          <input type="text" name="name" class="form-control"  placeholder="author name">
        </div>

        {{-- <div class="form-group">
          <label for="exampleFormControlInput1">  Avatar</label>
          <input type="text" name="avatar" class="form-control"  placeholder="author avatar">
        </div> --}}


        <div class="form-group">
          <label for="exampleFormControlInput1">avatar  </label>
          <input type="file"  name="avatar" class="form-control"   >
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">  DOB</label>
            <input type="text" name="DOB" class="form-control"  placeholder="date of birth 4/4/2000">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">  Nationality</label>
            <input type="text" name="nationality" class="form-control"  placeholder="Nationality">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">  Career</label>
            <input type="text" name="career" class="form-control"  placeholder="Career">
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



        <div class="form-group"style="margin-top:10px">
            <button type="submit" class="btn btn-primary">Save</button>

        </div>



    </form>
</div>





@endsection