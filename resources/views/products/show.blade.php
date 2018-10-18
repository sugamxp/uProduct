@extends('layouts.app')

@section('content')
    <a href="/products" class="btn btn-error">Go Back</a>
    <h1>{{$prod->title}}</h1>
    <small>{{$prod->created_at}}</small>
    <hr>
    <h3>{!!$prod->summary!!}</h3>   
    
    <a href="/products/{{$prod->id}}/edit" class="btn btn-primary">Edit</a>
    {{-- {!!Form::open(['action' => ['PostsController@destroy', $prod->id], 'method'=>'POST', 'class'=> 'float-right'])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!} --}}

@endsection