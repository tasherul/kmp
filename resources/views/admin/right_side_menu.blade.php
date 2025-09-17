@extends('admin.master')
@section('title','RIGHT SIDE MENU')


@section('content')
<form action="{{Route('menu_right_insert')}}" method="POST"  enctype="multipart/form-data">
@csrf
    <div class="row">
        
        <div class="col-md-3">
            <label>Menu Name</label>
            <input type="text" class="form-control" name="name" id="">
        </div>
        <div class="col-md-3">
            <label>Menu Icon</label>
            <input type="file" class="form-control" name="icon" id="">
        </div>
        <div class="col-md-3">
            <label>Menu Link</label>
            <input type="text" class="form-control" name="link" id="">
        </div>
        <div class="col-md-3">
            <label>Link Position</label>
            <input type="number" class="form-control" name="position" id="">
        </div>
        <div>
        
        </div>
        
    </div>
    <button type="submit" class="btn btn-primary float-right"  style="margin-top: 10px;" >Submit</button>
    
</form>
<div style="margin-top: 100px;">
<h5>RIGHT SIDE MENU LIST</h5>
<table id="datatable" class="display" style="width:100%; margin-top:20px ">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Icon</th>
                <th>Link</th>
                <th>Position</th>
                <th>Action</th>
            
            </tr>
        </thead>
        <tbody>
     @php $i=0; @endphp
            @foreach($view_menu as $key)
            @php $i=$i+1; @endphp
            <tr>
                <td>{{$i}}</td>
                <td>{{$key->name}}</td>
                <td><img src="{{asset('public/upload/').$key->icon}}" alt="user" width="70px" height="70px" style="border-radius: 60%;"/></td>
                <td> <a href="{{$key->link}}" target="_blank"><button  class="btn btn-primary">LINK</button></a></td> 
                <td>{{$key->position}}</td>
                <td>
                    <a href="{{url('admin/right_menu_edit',$key->id)}}" class="btn btn-success btn-sm waves-effect waves-light">Edit</a>
                    <a href="{{url('admin/right_menu_delete',$key->id)}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>    
</div>

@endsection