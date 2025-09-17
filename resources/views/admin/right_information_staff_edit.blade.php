@extends('admin.master')
@section('title','ADD STAFF')


@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{Route('staff_information_edit_process')}}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="hidden_id" value="{{$edit_staff->id}}">
    <input type="hidden" name="hidden_img" value="{{$edit_staff->image}}">
    <input type="hidden" name="right_to_information_id" value="{{$edit_staff->right_to_information_id}}">
    
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{$edit_staff->name}}">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <img src="{{asset('public/upload/').$edit_staff->image}}" alt=""  width="70px" height="70px" style="border-radius: 20%; float:right ; margin-right:20px">
                        <input type="file" class="form-control-plaintext" name="image" value="{{$edit_staff->image}}">
                        
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{$edit_staff->email}}">
                    </div>
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" class="form-control" name="mobile" value="{{$edit_staff->mobile}}">
                    </div>

                </div>
                <div class="col-md-6">
                <div class="form-group">
                        <label>Surname</label>
                        <input type="text" class="form-control" name="surename" value="{{$edit_staff->surname}}">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" value="{{$edit_staff->address}}">
                    </div>
                    <div class="form-group">
                        <label>Fax</label>
                        <input type="text" class="form-control" name="fax" value="{{$edit_staff->fax}}">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{$edit_staff->name}}">
                    </div>
                    
                    <button type="submit" class="btn btn-primary float-right">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection