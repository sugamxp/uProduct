@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="mt-4">{{$prod->title}}</h1>

            <p class="lead">{{$prod->summary}}</p>
            <!-- Author -->
            <p class="lead">
                by
                <a href="#">{{$owner->name}}</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Created at {{$prod->created_at}}</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="/storage/cover_images/{{$prod->cover_image}}" alt="">
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
                        {{Form::text('pros','', ['class' => 'form-control', 'placeholder' => 'Pros'])}}
                    </div>
                    <div class="form-group">
                        {{Form::text('cons','', ['class' => 'form-control', 'placeholder' => 'Cons'])}}
                    </div>
                    <div class="form-group">
                        {{Form::textarea('descr','', ['class' => 'form-control', 'placeholder' => 'Description', 'rows'
                        => 2,
                        'cols' => 40])}}
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
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">{{$comment->user->name}}</h5>
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