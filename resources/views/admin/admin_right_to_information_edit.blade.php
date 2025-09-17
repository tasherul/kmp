@extends('admin.master')
@section('title','RIGHT TO INFORMATION')


@section('content')
<form action="{{Route('right_to_information_update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <input type="hidden" name="hidden_id" value="{{$view_info->id}}">
        <div class="col-md-3">
            <label>Information Title</label>
            <input type="text" class="form-control" name="titel" value="{{$view_info->titel}}">
        </div>

        <div class="col-md-3">
            <label>Information Link</label>
            <input type="text" class="form-control" name="link" value="{{$view_info->link}}">
        </div>
        <div class="col-md-3">
            <label>Information File/pdf</label>
            <input type="file" class="" name="in_file" id="">
        </div>
        <div class="col-md-3">
            <label>Information Position</label>
            <input type="number" class="form-control" name="position" value="{{$view_info->position}}">
        </div>
    </div>

            <div style="margin-top: 25px;">
                <button type="submit" class="btn btn-primary float-right">Update</button>
            </div>

        

        </div>

    </div>


</form>
@endsection