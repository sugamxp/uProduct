@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row">
            <div class="col-sm-8">
                    <h1>Create Post</h1>
                    {!! Form::open(['action' => 'ProductsController@store', 'method' => 'POST', 'enctype'=> 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('title', 'Title')}}
                            {{Form::text('title','', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('body', 'Summary')}}
                            {{Form::textarea('body','', ['class' => 'form-control', 'placeholder' => 'Body Text', 'rows' => 2, 'cols' => 40])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('drop', 'Domain')}}
                            {{Form::select('size', ['L' => 'Large', 'S' => 'Small'],null,['class' => 'form-control'])}}
                        </div>
                        <div class="form-group">
                                {{Form::file('cover_image')}}
                        </div>
                        {{Form::submit('Submit', ['class' => 'btn btn-success'])}}
                        {!! Form::close() !!}
            </div>
        </div>
    </div>
    
@endsection
