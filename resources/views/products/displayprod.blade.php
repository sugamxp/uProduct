@extends('layouts.app')

@section('content')
<div class="container" style="padding: 15px;">
    <div class="row jumbotron" style="margin: 15px; padding: 15px; background-color: #d0f7cd;">
        <div class="col-md-8">
            {{-- <img src="user.jpg" style="width: 100px; height: 100px;" class="img-responsive"> --}}
            <h3>Title</h3>
            <p>@Username</p>
            <p>Date_of_post</p>
        </div>

        <div class="col-md-4">
            <img src="rang.jpg" style="width: 110px; height: 110px; float: right;" class="img-responsive img-thumbnail">
        </div>

    </div>

    <div class="row jumbotron" style="margin: 15px; padding: 15px; background-color: #d0f7cd;">
        <div class="col-md-9">
            <h3>Summary</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sit amet felis et lorem condimentum
                convallis. Nulla egestas tortor eget ipsum volutpat viverra.</p>
            <br>
            <h3>Description</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sit amet felis et lorem condimentum
                convallis. Nulla egestas tortor eget ipsum volutpat viverra. Duis in tellus vel eros vestibulum
                hendrerit non vitae libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                cubilia Curae; Suspendisse mattis consequat tortor, vel gravida orci porta ut. Nulla malesuada
                imperdiet nibh, varius venenatis urna aliquam et. Nulla facilisi. Nulla dictum, diam vitae ultricies
                cursus, enim quam fermentum ipsum, quis scelerisque orci nunc ut nisi. Phasellus a risus non nulla
                tempor pretium tristique sed metus.</p>

        </div>
        <div class="col-md-3">
            <button class="btn btn-success btn-lg" style="float: right;">UPVOTE</button>
        </div>
    </div>

    <div class="row jumbotron" style="margin: 15px; padding: 15px; background-color: #d0f7cd;">
        <div class="col-md-9">
            <h3>Reviews</h3>
            <br>
            <p>Reviews by the users will be shown here in the form of cards.</p>
        </div>


        <!-- {{-- <div class="row">
            <div class="col-md-5">
                     @if (count($reviews)>0)
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
        </div> --}} -->


        <div class="col-sm-3" style="float: right;">
            <div class="panel panel-primary">

                <div class="panel-heading">
                    {{-- <input type="text" name="FirstName" class="form-control"><br> --}}
                    <textarea class="form-control" rows="2" placeholder="Enter pros"></textarea><br>
                    <textarea class="form-control" rows="2" placeholder="Enter cons"></textarea><br>
                </div>
                <div class="panel-body">
                    <button class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection