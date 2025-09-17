@extends('admin.master')
@section('title','Contact')


@section('content')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card-body">

            <h4 class="mt-0 header-title">KMP Mobile Number</h4>
            <p class="sub-title">
                From here you can edit and delete Head Assistant content.
            </p>
            <form class="" action="{{Route('contract_us_Update')}}" method="POST">
                @csrf
                <input type="hidden" name="hidden_id" value="{{$edit_number->id}}">
                <div class="form-group">
                    <label>Desigation</label>
                    <input type="text" name="designation" value="{{$edit_number->designation}}" placeholder="Type Desigation.." class="form-control">
                </div>
                <!--<div class="form-group">-->
                <!--    <label>Old Mobile No</label>-->
                <!--    <input type="text" name="old_mobile_number" value="{{$edit_number->old_mobile}}" placeholder="Type Old Mobile No.." class="form-control">-->
                <!--</div>-->
                <div class="form-group">
                    <label>Mobile No</label>
                    <input type="text" name="new_mobile_number" value="{{$edit_number->new_mobile}}" placeholder="Type New Mobile No.." class="form-control">
                </div>
                <div class="form-group">
                    <label>Position</label>
                    <input type="text" name="position" value="{{$edit_number->position}}" placeholder="Type Position.." class="form-control">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light float-right">
                        Update
                    </button>

                </div>
            </form>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>

@endsection