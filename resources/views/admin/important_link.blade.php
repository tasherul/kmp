@extends('admin.master')
@section('title','IMPORTANT LINK')


@section('content')
<div class="home_content" style="margin-bottom: 50px;">
<form action="{{Route('link_insret')}}" method="POST">
@csrf
    <div class="row">
        
        <div class="col-md-3">
            <label>Name</label>
            <input type="text" class="form-control" name="name" id="">
        </div>
        <div class="col-md-3">
            <label>Important Link</label>
            <input type="text" class="form-control" name="important_link" id="">
        </div>
        <div class="col-md-3">
            <label>Link Position</label>
            <input type="number" class="form-control" name="position" id="">
        </div>
        <div class="col-md-3">
           <div class="row">
                <div class="col-md-6" >
                    <label>Save</label>
                    <button style="width: 100%;" type="submit" class="btn btn-success">Submit</button>
                </div>
                
           </div>
        </div>
        
    </div>
</form>
    
</div>

<table id="datatable" class="display" style="width:100%; margin-bottom:20px ">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Name</th>
               
                <th>Link</th>
                <th>Position</th>
                <th>Action</th>
            
            </tr>
        </thead>
        <tbody>
            @php $i=0;@endphp
            @foreach($show_link as $key)
            @php $i=$i+1; @endphp
            <tr>
                <td>{{$i}}</td>
                <td>{{$key->name}}</td>
                <td>{{$key->link}}</td> 
                <td>{{$key->position}}</td>
                <td>
                    <a href="{{url('admin/link_edit',$key->id)}}" class="btn btn-success btn-sm waves-effect waves-light">Edit</a>
                    <a href="{{url('admin/link_delete',$key->id)}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection

