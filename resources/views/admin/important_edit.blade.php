@extends('admin.master')
@section('title','IMPORTANT LINK')


@section('content')
<div class="home_content" style="margin-bottom: 50px;">
<form action="{{Route('link_Update')}}" method="POST">
@csrf
    <div class="row">
        
        <div class="col-md-3">
            <label>Name</label>
            <input type="text" class="form-control" value="{{$edit->name}}" name="name" id="">
        </div>
        <div class="col-md-3">
            <label>Important Link</label>
            <input type="text" class="form-control" value="{{$edit->link}}" name="important_link" id="">
        </div>
        <div class="col-md-3">
            <label>Link Position</label>
            <input type="number" class="form-control" value="{{$edit->position}}" name="position" id="">
            <input type="hidden" name="hidden_id" value="{{$edit->id}}">
        </div>
        <div class="col-md-3">
           <div class="row">
                <div class="col-md-6" >
                    <label>Update</label>
                    <button style="width: 100%;" type="submit" class="btn btn-success">Update</button>
                </div>
                
           </div>
        </div>
        
    </div>
</form>
    
</div>
@endsection