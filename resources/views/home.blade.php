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
                     <div class="row">
                        {{-- <div class="col-md-3">
                            <a class="btn btn-primary btn-lg" href="{{ route('category.index')}}" role="button">Category  </a>
                        </div>
                        <div class="col-md-3">
                            <a class="btn btn-primary btn-lg" href="{{ route('author.index')}}" role="button">Author  </a>
                        </div>
                        <div class="col-md-3">
                            <a class="btn btn-primary btn-lg" href="{{ route('post.index')}}" role="button">Post  </a>
                        </div>
                        <div class="col-md-3">
                            <a class="btn btn-primary btn-lg" href="{{ route('comment.index')}}" role="button">Comment  </a>
                        </div> --}}
                        
                     </div> 
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

