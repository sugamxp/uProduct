@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Products</h1>
        @if (count($products)>0)
           @foreach ($products as $prod)
               <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                            <h3><a href="/posts/{{$prod->id}}">{{$prod->title}}</a></h3>
                            <small>Written on {{$prod->created_at}}</small>
                            <hr>
                    </div>
                </div>
               </div>
           @endforeach
        @else
        @endif
</div>
  
@endsection