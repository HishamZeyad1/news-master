@extends('category.layout')

@section('content')

<div class="container"   style="padding-top: 12%">
    <div class="card ">

        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
</div>


<div class="container" style="padding-top: 2%">
<form action="{{ route('category.store')}}" method="POST"  enctype="multipart/form-data">
    @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">  Category Name</label>
          <input type="text" name="name" class="form-control"  placeholder="Category name">
        </div>
        {{-- <div class="form-group">
            <label for="exampleFormControlInput1">  avatar</label>
            <input type="text" name="avatar" class="form-control"  placeholder="Category avatar">
          </div> --}}

          <div class="form-group">
            <label for="exampleFormControlInput1">avatar  </label>
            <input type="file"  name="avatar" class="form-control"   >
          </div>
            {{-- <div class="form-group">
              <label for="exampleFormControlSelect2">Example multiple select</label>
              <select multiple class="form-control" id="exampleFormControlSelect2">
                @foreach ($Categories as $item)
                <option>{{$item->name}}</option>
                @endforeach
              </select>
            </div> --}}

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>



    </form>
</div>





@endsection