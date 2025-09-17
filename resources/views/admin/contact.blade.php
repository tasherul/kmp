@extends('admin.master')
@section('title','Contact')


@section('content')

<!-- Home Content Start -->
<div class="home_content">
    <div class="row">
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Head Assistant:</h4>
                    <p class="sub-title">Add KMP Head Assistant Information</p>

                    <form class="" action="{{Route('contactInsertUpdate')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="head_assistant_name" value="{{ $head_assistant->head_assistant_name }}" placeholder="Type something.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Range Address</label>
                            <input type="text" name="head_assistant_range_address" value="{{ $head_assistant->head_assistant_range_address }}" placeholder="Type something.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Mobile No</label>
                            <input type="text" name="head_assistant_mobile_no" value="{{ $head_assistant->head_assistant_mobile_no }}" placeholder="Type something.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Phone No</label>
                            <input type="text" name="head_assistant_phone_no" value="{{ $head_assistant->head_assistant_phone_no }}" placeholder="Type something.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="head_assistant_email" value="{{ $head_assistant->head_assistant_email }}" placeholder="Type something.." class="form-control">
                        </div>
                        <input type="hidden" name="edit_id" value="{{$control_room->id}}">
                        <div class="form-group content_center">
                            <div>
                                <button type="submit" name="head_assistant" class="btn btn-primary waves-effect waves-light">
                                    Update
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Basic example</h4>
                    <p class="sub-title">
                        From here you can edit and delete Head Assistant content.
                    </p>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($head_assistants as $head_assistant)
                                <tr>
                                    <th scope="row">1</th>
                                    <td class="text_property">{{$head_assistant->head_assistant_name}} </td>
                                    <td>
                                        <a href="{{Route('contactEdit', $head_assistant->id)}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a>
                                        <!-- <input class="btn btn-danger" type="reset" value="Delete">-->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">KMP Mobile Number</h4>
                    <p class="sub-title">
                        From here you can add KMP mobile number.
                    </p>
                    <form class="" action="{{Route('contract_us_mobile')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Desigation</label>
                            <input type="text" name="designation" value="" placeholder="Type Desigation.." class="form-control">
                        </div>
                        <!--<div class="form-group">-->
                        <!--    <label>Old Mobile No</label>-->
                        <!--    <input type="text" name="old_mobile_number" value="" placeholder="Type Old Mobile No.." class="form-control">-->
                        <!--</div>-->
                        <div class="form-group">
                            <label>Mobile No</label>
                            <input type="text" name="new_mobile_number" value="" placeholder="Type New Mobile No.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Position</label>
                            <input type="text" name="position" value="" placeholder="Type Position.." class="form-control">
                        </div>
                        <div>
                            <button type="submit" name="head_assistant" class="btn btn-primary waves-effect waves-light">
                                Save
                            </button>

                        </div>
                    </form>
                </div>
            </div>
            
            

            
        </div> <!-- end col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Control Room & Address</h4>
                    <p class="sub-title">Add KMP control room information & address</p>

                    <form class="" action="{{Route('contactInsertUpdate')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>KMP Office</label>
                            <input type="text" name="control_room_office" value="{{ $control_room->control_room_office }}" placeholder="Type something.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Mobile No</label>
                            <input type="text" name="control_room_mobile_no" value="{{ $control_room->control_room_mobile_no }}" placeholder="Type something.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Phone No</label>
                            <input type="text" name="control_room_phone_no" value="{{ $control_room->control_room_phone_no }}" placeholder="Type something.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Fax</label>
                            <input type="text" name="control_room_fax" value="{{ $control_room->control_room_fax }}" placeholder="Type something.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="control_room_email" value="{{ $control_room->control_room_email }}" placeholder="Type something.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>KMP Address</label>
                            <input type="text" name="control_room_kmp_address" value="{{ $control_room->control_room_kmp_address }}" placeholder="Type something.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Banner Image</label>
                            <img src="{{asset('public/upload/').$control_room->contract_banner}}" style="width: 100px; float: right; margin-bottom: 10px;">
                            <input type="file" name="contract_banner" value="" class="form-control">
                        </div>
                        <!-- <div class="form-group">
                            <label>Contract Number 1</label>
                            <img src="{{asset('public/upload/').$control_room->cont_num_1}}" style="width: 100px; float: right; margin-bottom: 10px">
                            <input type="file" name="cont_num_1"  value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Contract Number 2</label>
                            <img src="{{asset('public/upload/').$control_room->cont_num_2}}" style="width: 100px; float: right; margin-bottom: 10px;">
                            <input type="file" name="cont_num_2"  value="" class="form-control">
                        </div> -->
                        <input type="hidden" name="edit_id" value="{{$control_room->id}}">
                        <div class="form-group content_center" required>
                            <div>
                                <button type="submit" name="control_room" class="btn btn-primary waves-effect waves-light">
                                    Update
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Basic example</h4>
                    <p class="sub-title">
                        From here you can edit and delete control room content.
                    </p>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>KMP Office</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($control_rooms as $control_room)
                                <tr>
                                    <th scope="row">1</th>
                                    <td class="text_property">{{$control_room->control_room_office}}</td>
                                    <td>
                                        <a href="{{Route('contactEdit', $control_room->id)}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a>
                                        <!-- <input class="btn btn-danger" type="reset" value="Delete">	-->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">KMP Mobile List</h4>
                    <p class="sub-title">
                        From here you can edit and delete KMP mobile number.
                    </p>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th></th>
                        
                        <th>Designation</th>
                        
                        <th>Mobile Number</th>
                        <th>Position</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @php $i=0; @endphp
                    @foreach($mobile_no as $key)
                    @php $i=$i+1; @endphp
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$key->designation}}</td>
                        <!--<td>{{$key->old_mobile}}</td>-->
                        <td>{{$key->new_mobile}}</td>
                        <td>{{$key->position}}</td>
                        <td>
                            <a href="{{url('admin/Number_Edit',$key->id)}}" class="btn btn-success btn-sm waves-effect waves-light">Edit</a>
                            <a href="{{url('admin/Number_delete',$key->id)}}" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                </div>
            </div>
    <!-- Home Content End -->
    @endsection