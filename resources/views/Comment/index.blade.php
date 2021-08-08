@extends('comment.layout')

@section('content')


<div class="jumbotron container">

    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    {{-- <a class="btn btn-primary btn-lg" href="{{ route('comment.create')}}" role="button">Create  </a> --}}
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
            <th scope="col">Content</th>
            <th scope="col">DateWriten</th>
            <th scope="col">User</th>
            <th scope="col">Post</th><!-- category_id-->
            <th scope="col" style="width: 350px;text-align:center">Actions</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ($Comments as $item)
            <tr>
                <th scope="row">{{$i++ }}</th>
                <td>{{ $item->content }}</td>
                <td>{{ $item->date_written }}   </td>
                <td>{{ $item->user->name }}</td>

                <td>{{$item->post->title}}   </td> 
                 <td>

                    <div class="row" style="margin-left:20%">
                        {{-- <div class="col-sm">
                            <a  class="btn btn-success" href="{{ route('comment.edit',$item->id)}}"> Edit </a>

                        </div> --}}
                        <div class="col-sm-4">
                            <a  class="btn btn-primary" href="{{ route('comment.show',$item->id)}}"> Show</a>
                        </div>

                        {{-- <div class="col-sm">
                            <a  class="btn btn-warning" href="{{ route('soft.delete',$item->id)}}"> Soft delete </a>
                        </div>  --}}

                        <div class="col-sm-4">
                            <form action="{{ route('comment.destroy',$item->id)}}" method="POST">
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