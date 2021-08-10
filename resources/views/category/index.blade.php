@extends('category.layout')

@section('content')


<div class="jumbotron container">
  {{-- <p class="card-text">  <span><a href="{{ route('admin')}}"> back</a> </span></p> --}}
    <p> <span><a href="{{ route('admin')}}"> back</a> </span>  It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <a class="btn btn-primary btn-lg" href="{{ route('category.create')}}" role="button">Create  </a>
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
            <th scope="col">category name</th>
            <th scope="col">avatar</th>
            <th scope="col" style="width: 400px">Actions</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ($categories as $item)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{ $item->name }}</td>
                <td>                
                  <img src="{{URL::asset($item->avatar)}}" alt="{{$item->avatar}}"
                  {{-- <img src="{{$item->photo}}" alt="{{$item->photo}}" --}}
                  class="img-tumbnail" width="100" height="100">
                </td>
                <td>

                    <div class="row">
                        <div class="col-sm">
                            <a  class="btn btn-success" href="{{ route('category.edit',$item->id)}}"> Edit </a>

                        </div>
                        <div class="col-sm">
                            <a  class="btn btn-primary" href="{{ route('category.show',$item->id)}}"> Show</a>

                        </div>

                        {{-- <div class="col-sm">
                            <a  class="btn btn-warning" href="{{ route('soft.delete',$item->id)}}"> Soft delete </a>
                        </div>  --}}

                        <div class="col-sm">
                            <form action="{{ route('category.destroy',$item->id)}}" method="POST">
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

      {{-- {!! $c->links() !!} --}}
      
  </div>

@endsection