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
            <td>
                <div class="row">
                    <div class="col-md-2">
                    <img src="/storage/cover_images/{{$prod->cover_image}}" alt="" width="100%" height="80px">
                    </div>
                    <div class="col-md-10" >
                    <h5><a href="/products/{{$prod->id}}">{{$prod->title}}</a></h5>
                        <small class="font-italic">{{$prod->summary}}</small>
                    <button type="button" class="btn btn-outline-danger btn-sm float-right votebtn" data-id="{{$prod->id}}"><i class="fas fa-caret-up"></i> {{$prod->votes}}</button>
                    </div>
            </div>
        </td>
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
@section('page-js-script')  

<script type="text/javascript">
$(document).ready(function() {
    console.log('ready');
    $(document).on('click', '.votebtn', function(event){
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
        '_token' : $('meta[name="csrf-token"]').attr('content'), 
        'id': btnid
    },
    success: function(data) {
        $(".votebtn[data-id='" + data.id +"']").html(data.votes);       
        //  $('.votebtn' + data.id).html(data.votes);
        // $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
        // alert(data.votes);
    }
        });
    });
});
</script>    
@endsection

