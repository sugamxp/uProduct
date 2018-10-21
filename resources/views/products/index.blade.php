@extends('layouts.app')

@section('content')

<div class="container">
    @if (count($products)>0)
    <div class="row">
        <div class="col-md-8">
            <!-- <div class="alert alert-success">Today's</div> -->
            <div class="card" style="width: 100%; background-color: rgba(245, 245, 245, 1)">
                <div class="card-header">
                    Latest Products
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($products as $prod)
                    <li class="list-group-item" style="height:100px">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="/storage/cover_images/{{$prod->cover_image}}" class="rounded" alt="" width="100%"
                                    height="80px">
                            </div>
                            <div class="col-md-10">
                                <h5><a href="/products/{{$prod->id}}">{{$prod->title}}</a></h5>
                                <small class="font-italic">{{$prod->summary}}</small>
                                @if(Auth::user())
                                @if(!Auth::user()->votes()->where('prod_id',$prod->id)->first())
                                <button type="button" class="btn btn-outline-danger btn-sm float-right votebtn" data-id="{{$prod->id}}"><i
                                        class="fas fa-caret-up"></i> {{$prod->votes}}</button>
                                @else
                                <button type="button" class="btn btn-danger btn-sm float-right" data-id="{{$prod->id}}"
                                    disabled><i class="fas fa-caret-up"></i> {{$prod->votes}}</button>
                                @endif
                                @else
                                <button type="button" class="btn btn-outline-danger btn-sm float-right popbtn" data-id="{{$prod->id}}"
                                    data-container="body" data-toggle="popover" title="Login/Register" data-trigger="focus"
                                    data-placement="top" data-content="Login or Register to Upvote this product!."><i
                                        class="fas fa-caret-up"></i> {{$prod->votes}}</button>
                                @endif
                            </div>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>

        </div>
    </div>
    @else
    @endif

    @if (count($prod_votes)>0)
    <div class="row">
        <div class="col-md-8">
            <!-- <div class="alert alert-success">Today's</div> -->
            <div class="card" style="width: 100%; background-color: rgba(245, 245, 245, 1)">
                <div class="card-header">
                    Popular Products
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($prod_votes as $prod)
                    <li class="list-group-item" style="height:100px">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="/storage/cover_images/{{$prod->cover_image}}" class="rounded" alt="" width="100%"
                                    height="80px">
                            </div>
                            <div class="col-md-10">
                                <h5><a href="/products/{{$prod->id}}">{{$prod->title}}</a></h5>
                                <small class="font-italic">{{$prod->summary}}</small>
                                @if(Auth::user())
                                @if(!Auth::user()->votes()->where('prod_id',$prod->id)->first())
                                <button type="button" class="btn btn-outline-danger btn-sm float-right votebtn" data-id="{{$prod->id}}"><i
                                        class="fas fa-caret-up"></i> {{$prod->votes}}</button>
                                @else
                                <button type="button" class="btn btn-danger btn-sm float-right" data-id="{{$prod->id}}"
                                    disabled><i class="fas fa-caret-up"></i> {{$prod->votes}}</button>
                                @endif
                                @else
                                <button type="button" class="btn btn-outline-danger btn-sm float-right popbtn" data-id="{{$prod->id}}"
                                    data-container="body" data-toggle="popover" title="Login/Register" data-trigger="focus"
                                    data-placement="top" data-content="Login or Register to Upvote this product!."><i
                                        class="fas fa-caret-up"></i> {{$prod->votes}}</button>
                                @endif
                            </div>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>

        </div>
    </div>
    @else
    @endif
</div>
@endsection
@section('page-js-script')

<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
        console.log('ready');
        $(document).on('click', '.votebtn', function (event) {
            event.preventDefault();
            var btnid = $(this).data('id')
            console.log(btnid)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            console.log('Clicked');
            $.ajax({
                type: 'post',
                url: '/products/vote',
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'id': btnid
                },
                success: function (data) {
                    // $(".votebtn[data-id='" + data.id + "']").attr("disabled", true);
                    $(".votebtn[data-id='" + data.id + "']").removeClass("btn-outline-danger").addClass("btn-danger");
                    $(".votebtn[data-id='" + data.id + "']").html(data.votes).attr("disabled", true);
                }
            });
        });
    });
</script>
@endsection