@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                    @endif

                    {{ __('You are logged in!') }}
                    <div style="margin-top:1%"></div>
                     <div class="row" style="margin-bottom: 10px"> 
                        <div class="" style="width:100%">
                            <a class="btn btn-secondary btn-lg" href="{{ route('category.index')}}" role="button" style="width:100%">Category page  </a>
                        </div>
                    </div>

                        <div class="row" style="margin-bottom: 10px">
                        <div class="" style="width:100%">
                            <a class="btn btn-secondary btn-lg" href="{{ route('author.index')}}" role="button" style="width:100%">Author page  </a>
                        </div>
                    </div>
                        <div class="row" style="margin-bottom: 10px">
                        <div class="" style="width:100%">
                            <a class="btn btn-secondary btn-lg" href="{{ route('post.index')}}" role="button" style="width:100%">Post page </a>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 10px">
                        <div class="" style="width:100%">
                            <a class="btn btn-secondary btn-lg" href="{{ route('comment.index')}}" role="button" style="width:100%">Comment page </a>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px">
                        
                        <div class="" style="width:100%">
                            <a class="btn btn-secondary btn-lg" href="{{ route('user.index')}}" role="button"style="width:100%">User page  </a>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-4 offset-md-4">.col-md-4 .offset-md-4</div>
                     </div> --}}
                    {{-- <a class="btn btn-secondary btn-lg" href="{{ route('author.index')}}" role="button">Author  </a>
                    <a class="btn btn-secondary btn-lg" href="{{ route('post.index')}}" role="button">Post  </a>
                    <a class="btn btn-secondary btn-lg" href="{{ route('comment.index')}}" role="button">Comment  </a> --}}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
