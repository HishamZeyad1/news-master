@extends('author.layout')

@section('content')


<div class="jumbotron container">
  {{-- <p class="card-text">  <span><a href="{{ route('admin')}}"> back</a> </span></p> --}}
    <p><span><a href="{{ route('admin')}}"> back</a> </span> It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <a class="btn btn-primary btn-lg" href="{{ route('author.create')}}" role="button">Create  </a>
    {{-- <a class="btn btn-primary btn-lg" href="{{ route('product.trash')}}" role="button">Trash  </a> --}}

  </div>


  <div class="container">
      @if ($message = Session::get('success'))
      <div class="alert alert-primary" role="alert">
        {{$message}}
        </div>
      @endif

  </div>


  <div class="container">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Avatar</th>
            <th scope="col">DOB</th>
            <th scope="col">Nationality</th>
            <th scope="col">Career</th>
            <th scope="col">Category</th><!-- category_id-->
            <th scope="col" style="width: 350px;text-align:center">Actions</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ($Authors as $item)
            <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{ $item->name }}</td>
                {{-- <td>{{ $item->avatar }}   </td> --}}
                <td>                
                  <img src="{{URL::asset($item->avatar)}}" alt="{{$item->avatar}}"
                  {{-- <img src="{{$item->photo}}" alt="{{$item->photo}}" --}}
                  class="img-tumbnail" width="100" height="100">
                </td>
                <td>{{ $item->DOB }}</td>
                <td>{{ $item->nationality }}   </td>
                <td>{{ $item->career }}</td>
            @php
              // $category_name= $item->category;
              // $category_id=$item->category_id;
              if ($item->category_id==$item->category->id) {
                $item->category->name;
              }
            @endphp
                <td>{{ $item->category->name;}}</td> 

{{-- App\Models\Category::where('id',$item->category_id)->get() --}}
                 <td>

                    <div class="row">
                        <div class="col-sm">
                            <a  class="btn btn-success" href="{{ route('author.edit',$item->id)}}"> Edit </a>

                        </div>
                        <div class="col-sm">
                            <a  class="btn btn-primary" href="{{ route('author.show',$item->id)}}"> Show</a>

                        </div>

                        {{-- <div class="col-sm">
                            <a  class="btn btn-warning" href="{{ route('soft.delete',$item->id)}}"> Soft delete </a>
                        </div>  --}}

                        <div class="col-sm">
                            <form action="{{ route('author.destroy',$item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"> Delete</button>
                                </form>
                        </div>
                      </div>


                </td>
              </tr>
            @endforeach

        </tbody>
      </table>

     {{-- {{-- {!! $categories->links() !!} --}}
  </div>

@endsection