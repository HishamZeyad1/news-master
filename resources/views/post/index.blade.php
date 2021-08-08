@extends('post.layout')

@section('content')


<div class="jumbotron container">

    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <a class="btn btn-primary btn-lg" href="{{ route('post.create')}}" role="button">Create  </a>
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
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">DateWriten</th>
            <th scope="col">FeaturedImage</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th><!-- category_id-->
            <th scope="col" style="width: 350px;text-align:center">Actions</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ($Posts as $item)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $item->title }}</td>
                <td>{{ $item->content }}</td>
                <td>{{ $item->date_written }}   </td>
                {{-- <td>{{ $item->featured_image }}   </td> --}}
                <td>                
                  <img src="{{URL::asset($item->featured_image)}}" alt="{{$item->featured_image}}"
                  {{-- <img src="{{$item->photo}}" alt="{{$item->photo}}" --}}
                  class="img-tumbnail" width="100" height="100">
                </td>

                <td>{{ $item->author==null?"unknown":$item->author->name }}</td>
            @php
              // $category_name= $item->category;
              // $category_id=$item->category_id;
            @endphp
                <td>{{ $item->category ==null?"unknown":$item->category->name}}   </td> 
{{-- App\Models\Category::where('id',$item->category_id)->get() --}}
                 <td>

                    <div class="row">
                        <div class="col-sm">
                            <a  class="btn btn-success" href="{{ route('post.edit',$item->id)}}"> Edit </a>

                        </div>
                        <div class="col-sm">
                            <a  class="btn btn-primary" href="{{ route('post.show',$item->id)}}"> Show</a>

                        </div>

                        {{-- <div class="col-sm">
                            <a  class="btn btn-warning" href="{{ route('soft.delete',$item->id)}}"> Soft delete </a>
                        </div>  --}}

                        <div class="col-sm">
                            <form action="{{ route('post.destroy',$item->id)}}" method="POST">
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