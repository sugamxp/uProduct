@extends('layouts.app')

@section('content')
<div class="container">
        @if (count($products)>0)
                <div class="row">
                    <div class="col-md-8">
                            <div class="alert alert-success">Today's</div>

<table class="table table-hover">
        <tbody>
            @foreach ($products as $prod)
          <tr>
            <td><div class="row">
                    <div class="col-md-2">
                    <img src="/storage/cover_images/{{$prod->cover_image}}" alt="" width="100%" height="80px">
                    </div>
                    <div class="col-md-10" >
                            <h5><a href="/products/{{$prod->id}}">{{$prod->title}}</a></h5>
                                <small class="font-italic">{{$prod->summary}}</small>
                                <button type="button" class="btn btn-outline-danger btn-sm float-right"><i class="fas fa-caret-up"></i> Upvote</button>
                           
                        </div>
            </div></td>
          </tr>
          @endforeach
        </tbody>
      </table>
                    </div>
               </div>
        @else
        @endif
</div>
  
@endsection

