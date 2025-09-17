@extends('admin.master')
@section('title','RIGHT SIDE MENU')


@section('content')
<form action="{{Route('menu_right_update')}}" method="POST"  enctype="multipart/form-data">
@csrf
    <div class="row">
    <div class="col-md-1">
            

            <img src="{{asset('public/upload/').$view_menu_edit->icon}}" alt="user" width="70px" height="70px" />
            <input type="hidden" name="hidden_id" value="{{$view_menu_edit->id}}">
            <input type="hidden" name="hidden_icon" value="{{$view_menu_edit->icon}}">
        </div>

        <div class="col-md-3">
            <label>Change Logo</label>
            <input type="file" name="icon">
        </div>
        <div class="col-md-3">
            <label>Menu Name</label>
            <input type="text" class="form-control" name="name" value="{{$view_menu_edit->name}}">
        </div>
        
        <div class="col-md-3">
            <label>Menu Link</label>
            <input type="text" class="form-control" name="link" value="{{$view_menu_edit->link}}">
        </div>
        <div class="col-md-2">
            <label>Link Position</label>
            <input type="number" class="form-control" name="position" value="{{$view_menu_edit->position}}">
        </div>
        <div>
        
        </div>
        
    </div>
    <button type="submit" class="btn btn-primary float-right"  style="margin-top: 10px;" >Update</button>
    
</form>
@endsection