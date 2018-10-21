@extends('layouts.app')

@section('content')
<!-- <style>
.carousel-inner > .carousel-item > img{
margin:auto;
}
</style> -->
<style>
.container{
    color: white !important;
}
</style>
<div class="container">
    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <div class="row" style="width:100%">
                <div class="col-sm-4">
                        <img class="img-fluid rounded mt-4" src="/storage/cover_images/{{$prod->cover_image}}" alt="" style="height:75%; width:100% !important ">
                </div>
                <div class="col-sm-8">
                        <h1 class="mt-4 display-4">{{$prod->title}}</h1>

                        <p class="lead">{{$prod->summary}}</p>
                        <!-- Author -->
                        <p class="lead">
                            by
                            {{$owner->name}}
                        </p>                        
                </div>
                </div>
            
            
            <!-- Preview Image -->
            <!-- <img class="img-fluid rounded" src="/storage/cover_images/{{$prod->cover_image}}"alt=""> -->
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" style="width:100%; height: 400px !important;">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="/storage/caro1/{{$prod->caro1}}" alt="First slide" style="margin:auto !important">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="/storage/caro2/{{$prod->caro2}}" alt="Second slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
            <hr>
            <!-- Post Content -->
            <p class="lead">{{$prod->description}}</p>
            <hr>
            <div class="card my-2">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    {!! Form::open(['action' => 'ProductsController@comment', 'method' => 'POST', 'enctype'=>
                    'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::text('pros','', ['class' => 'form-control', 'placeholder' => 'Pros','required' => ''])}}
                    </div>
                    <div class="form-group">
                        {{Form::text('cons','', ['class' => 'form-control', 'placeholder' => 'Cons','required' => ''])}}
                    </div>
                    <div class="form-group">
                        {{Form::textarea('descr','', ['class' => 'form-control', 'placeholder' => 'Description', 'rows'
                        => 2,
                        'cols' => 40, 'required' => ''])}}
                    </div>
                    {{ Form::hidden('prodid', $prod->id) }}
                    <div class="form-group">
                        {{Form::submit('Submit', ['class' => 'btn btn-success'])}}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

            @if (count($comments)>0)
            @foreach($comments as $comment)
            <div class="media mt-4">
                <div class="media-body">
                    <h5 class="mt-0"><span>@</span>{{$comment->user->name}}</h5>
                    <strong>Pros : </strong>{{$comment->pros}} <br>
                    <strong>Cons : </strong>{{$comment->cons}} <br>
                   {{$comment->description}} <br>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>

@endsection