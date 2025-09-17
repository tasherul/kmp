@extends('admin.master')
@section('title','ADD STAFF')


@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{Route('staff_information_insert')}}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control-plaintext" name="image" id="">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="">
                    </div>
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" class="form-control" name="mobile" id="">
                    </div>

                </div>
                <div class="col-md-6">
                <div class="form-group">
                        <label>Surname</label>
                        <input type="text" class="form-control" name="surename" id="">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" id="">
                    </div>
                    <div class="form-group">
                        <label>Fax</label>
                        <input type="text" class="form-control" name="fax" id="">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" id="">
                    </div>
                    <input type="hidden" name='hidden_id' value="{{$id}}">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection