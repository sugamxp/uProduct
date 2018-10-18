@extends('layouts.app')
@section('content')
<div class="container" style="margin-top:10px">
    <h2>Welcome {{Auth::user()->name}}</h2>
    <br>
    <div style="float:right">
        <a href="products/create">
            <i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i>
            <span style=" font-size:30px">Add new product</span>
        </a>
    </div>
    <br><br>
    <h3>My Products</h3>
    @foreach ($products as $pr)
    <div class="card">
        <h3><a href="dashboard/{{$pr->id}}">{{$pr->title}}</a></h3>
    </div>
    @endforeach
</div>
@endsection