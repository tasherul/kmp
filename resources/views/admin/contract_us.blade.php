@extends('admin.master')
@section('title','Contact')


@section('content')

<!-- Home Content Start -->
<div class="home_content">
    <div class="row">
        <!--<div class="col-lg-6">-->
        <!--    <div class="card m-b-30">-->
        <!--        <div class="card-body">-->

        <!--            <h4 class="mt-0 header-title">Head Assistant:</h4>-->
        <!--            <p class="sub-title">Add KMP Head Assistant Information</p>-->

        <!--            <form class="" action="{{Route('contactInsertUpdate')}}" method="POST">-->
        <!--                @csrf-->
                        
        <!--                <div class="form-group">-->
        <!--                    <label>Banner Image</label>-->
        <!--                    <input type="text"  name="head_assistant_range_address" value="" placeholder="Type something.." class="form-control">-->
        <!--                </div>								-->
        <!--                <div class="form-group">-->
        <!--                    <label>Contract Image 1</label>-->
        <!--                    <input type="text" name="head_assistant_mobile_no"  value="" placeholder="Type something.." class="form-control">-->
        <!--                </div>-->
        <!--                <div class="form-group">-->
        <!--                    <label>Contract Image 2</label>-->
        <!--                    <input type="text" name="head_assistant_phone_no"  value="" placeholder="Type something.." class="form-control">-->
        <!--                </div>-->
                        										
        <!--                <input type="hidden" name="edit_id" value="">                             -->
        <!--                <div class="form-group content_center">-->
        <!--                    <div>-->
        <!--                        <button type="submit" name="head_assistant" class="btn btn-primary waves-effect waves-light">-->
        <!--                            Update-->
        <!--                        </button>-->
        <!--                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">-->
        <!--                            Cancel-->
        <!--                        </button>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </form>-->

        <!--        </div>-->
        <!--    </div>-->
        <!--    <div class="card m-b-30">-->
        <!--        <div class="card-body">-->

        <!--                <h4 class="mt-0 header-title">List View</h4>-->
        <!--            <p class="sub-title">-->
        <!--            From here you can edit and delete Head Assistant content.-->
        <!--            </p>-->

        <!--            <div class="table-responsive">-->
        <!--                <table class="table mb-0">-->
        <!--                    <thead>-->
        <!--                        <tr>-->
        <!--                            <th>#</th>-->
        <!--                            <th>Name</th>-->
        <!--                            <th>Action</th>-->
        <!--                        </tr>-->
        <!--                    </thead>-->
        <!--                    <tbody>-->
                               
        <!--                    </tbody>-->
        <!--                </table>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div> <!-- end col -->-->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Control Room & Address</h4>
                    <p class="sub-title">Add KMP control room information & address</p>

                      <form class="" action="{{Route('contactInsertUpdate')}}" method="POST">		
                       @csrf                                             
                        <div class="form-group">
                            <label>KMP Office</label>
                        <input type="hidden" name="control_room_office" value="" placeholder="Type something.." class="form-control">
                        </div>	
                        <div class="form-group">
                            <label>Mobile No</label>
                            <input type="text" name="control_room_mobile_no"  value="" placeholder="Type something.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Phone No</label>
                            <input type="text" name="control_room_phone_no" value="" placeholder="Type something.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Fax</label>
                            <input type="text" name="control_room_fax" value="" placeholder="Type something.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="control_room_email" value="" placeholder="Type something.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>KMP Address</label>
                            <input type="text" name="control_room_kmp_address"  value="" placeholder="Type something.." class="form-control">
                        </div>
                        <input type="hidden" name="edit_id" value="">    
                        <div class="form-group content_center">
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

                        <h4 class="mt-0 header-title">List View</h4>
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
                                                         
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
<!-- Home Content End -->
 @endsection  
  
  
  