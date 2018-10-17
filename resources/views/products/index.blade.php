@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Products</h1>
        @if (count($products)>0)
               <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                            <div class="card" style="width: 18rem;">
                                    <div class="card-header">
                                      Today
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        @foreach ($products as $prod)
                                        <li class="list-group-item"><h5><a href="/posts/{{$prod->id}}">{{$prod->title}}</a></h5>
                                        <small>Written on {{$prod->created_at}}</small>
                                        @endforeach
                                    </li>
                                    </ul>
                                  </div>
                    </div>
                </div>
               </div>
        @else
        @endif
</div>
  
@endsection