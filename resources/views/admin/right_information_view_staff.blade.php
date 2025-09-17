@extends('admin.master')
@section('title','View STAFF')


@section('content')

<div>
    <h5 style="color: green;">Right to information: {{$info_sel->titel}} </h5>
<table id="datatable" class="display" style="width:100%; margin-top:20px ">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Image</th>
                <th>Name</th>
        
                <th>Surname</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Mobile</th>
                <th>Fax</th>
                <th>Email</th>
                <th>Action</th>
            
            </tr>
        </thead>
        <tbody>
     @php $i=0; @endphp
            @foreach($view_staff as $key)
            @php $i=$i+1; @endphp
            <tr>
                <td>{{$i}}</td>
                <td><img src="{{asset('public/upload/').$key->image}}" alt="user" width="70px" height="70px"  /></td>
                <td>{{$key->name}}</td>
                
                <td>{{$key->surname}}</td>
                <td>{{$key->address}}</td>
                <td>{{$key->phone}}</td>
                <td>{{$key->mobile}}</td>
                <td>{{$key->fax}}</td>
                <td>{{$key->email}}</td>
                
                
                <td>
                    <a href="{{url('admin/right_staff_edit',$key->id)}}" class="btn btn-success btn-sm waves-effect waves-light">Edit</a>
                    <a href="{{url('admin/right_staff_delete',$key->id)}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>    
</div>
@endsection