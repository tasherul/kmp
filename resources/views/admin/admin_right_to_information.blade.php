@extends('admin.master')
@section('title','RIGHT TO INFORMATION')


@section('content')
<form action="{{Route('right_to_information_insert')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-md-3">
            <label>Information Title</label>
            <input type="text" class="form-control" name="titel" id="">
        </div>

        <div class="col-md-3">
            <label>Information Link</label>
            <input type="text" class="form-control" name="link" id="">
        </div>
        <div class="col-md-3">
            <label>Information File/pdf</label>
            <input type="file" class="" name="in_file" id="">
        </div>
        <div class="col-md-3">
            <label>Information Position</label>
            <input type="number" class="form-control" name="position" id="">
        </div>
        
        
    </div>
    <button style="margin-top: 10px;" type="submit" class="btn btn-primary float-right">Submit</button>


</form>
<div style="margin-top: 100px;">
    <h5>VIEW RIGHT TO INFORMATION</h5>
    <table id="datatable" class="display" style="width:100%; margin-top:20px ">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Name</th>

                <th>Link</th>
                <!-- <th>Add</th> -->
                <th>View</th>
                <th>Position</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @php $i=0; @endphp

            @foreach($view_information as $key)
            @php $i=$i+1; @endphp
            <tr>
                <td>{{$i}}</td>
                <td>{{$key->titel}}</td>

                <td> <a href="{{$key->link}}" target="_blank"><button class="btn btn-primary">LINK</button></a></td>
                <!-- <td> <a href="{{url('admin/right_information_add_staff',$key->id)}}"><button class="btn btn-secondary">ADD</button></a></td> -->
                @php if($key->in_file!=false){ @endphp
                <td> <a href="{{asset('public/upload/').$key->in_file}}" target="_blank" > <img src="{{asset('kmp_dash')}}/image/pdf.png"  alt="user" width="30px" height="30px"/> </a></td>
                @php }
                else { @endphp <td></td>@php } @endphp
                <td>{{$key->position}}</td>
                <td>

                    <a href="{{url('admin/right_information_edit',$key->id)}}" class="btn btn-success btn-sm waves-effect waves-light">Edit</a>
                    <a href="{{url('admin/right_information_delete',$key->id)}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection