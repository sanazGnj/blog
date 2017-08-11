@extends('welcome')
@section('content')

<div class="container">
    <div class="row">

@if( isset($val) )


        <!-- edit status -->
        <img src="/images/{{$val->img}}">

         <form action="/update/{{ $val->id }}" method="post" class="form-horizontal" enctype="multipart/form-data">
             
             {{ csrf_field() }}
             <div class="form-group">
                <lable for="title">Name:</lable>
                <input type="text" name="name" class="form-controll" value="{{$val->name}}">
            </div>

             <div class="form-group">
                <input type="file" class="form-control" name="featured_image" value="{{$val->img}}">
            </div>
            <div class="form-group">
                <button  type="submit" class="btn btn-info">edit</button>
            </div>
        </form>


@else
        <!-- create --> 
        <form action="{{route('upload.file')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <lable for="title">Name:</lable>
                <input type="text" name="name" class="form-controll">
            </div>
            <div class="form-group">
                <input type="file" name="featured_image">
            </div>
            
            <button type="submit" class="btn btn-success">Add</button>
            
        </form>
       
@endif
   </div>
</div>
@endsection