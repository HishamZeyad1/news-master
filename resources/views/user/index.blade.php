@extends('user.layout')

@section('content')


<div class="jumbotron container">
  <p> <span><a href="{{ route('admin')}}"> back</a> </span>  It uses utility classes for typography and spacing to space content out within the larger container.</p>

    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    {{-- <a class="btn btn-primary btn-lg" href="{{ route('user.create')}}" role="button">Create  </a> --}}
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
            <th scope="col">name</th>
            <th scope="col">email</th>
            {{-- <th scope="col">Post</th><!-- category_id--> --}}
            <th scope="col" style="width: 350px;text-align:center">Actions</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ($users as $item)
            @if ($item->usertype=="user")
            <tr>

                <th scope="row">{{ ++$i; }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}   </td>
                {{-- <td>{{ $item->password }}</td> --}}

                 <td>

                    <div class="row" style="margin-left:20%">
                        {{-- <div class="col-sm">
                            <a  class="btn btn-success" href="{{ route('user.edit',$item->id)}}"> Edit </a>

                        </div> --}}
                        <div class="col-sm-4">
                            <a  class="btn btn-primary" href="{{ route('user.show',$item->id)}}"> Show</a>
                        </div>

                        {{-- <div class="col-sm">
                            <a  class="btn btn-warning" href="{{ route('soft.delete',$item->id)}}"> Soft delete </a>
                        </div>  --}}

                        <div class="col-sm-4">
                            <form action="{{ route('user.destroy',$item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"> Delete</button>
                                </form>
                        </div>
                      </div>
                </td>
              </tr>
              @endif
              @endforeach

        </tbody>
      </table>

     {{-- {{-- {!! $categories->links() !!} --}}
  </div>

@endsection