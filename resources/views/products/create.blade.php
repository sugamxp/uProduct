@extends('layouts.app')
@section('content')
<div class="container" style="margin-top:10px">
    {!! Form::open(['action' => 'ProductsController@store', 'method' => 'POST', 'enctype'=> 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title','', ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('desc', 'Description')}}
                {{Form::textarea('desc','', ['class' => 'form-control', 'placeholder' => 'Body Text'])}}
            </div>
            <div class="form-group">
                {{Form::label('summ', 'Summary')}}
                {{Form::textarea('summ','', ['class' => 'form-control', 'placeholder' => 'Body Text', 'rows' => 2,
                'cols' => 40])}}
            </div>

        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {{Form::label('website', 'Website')}}
                {{Form::text('website','', ['class' => 'form-control', 'placeholder' => 'Website Link'])}}
            </div>
            <div class="form-group">
                {{Form::label('drop', 'Domain')}}
                {{Form::select('size', ['L' => 'Large', 'S' => 'Small'],null,['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('img', 'Choose display image')}}
                {{Form::file('cover_image')}}
            </div>
            <div class="form-group">
                {{Form::submit('Submit', ['class' => 'btn btn-success'])}}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection