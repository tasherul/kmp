@extends('admin.master')
@section('title','Service')


@section('content')

<!-- Home Content Start -->
<div class="home_content">
    <div class="row">
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Police Activities</h4>
                    <p class="sub-title">Add KMP Police Activities</p>

                    <form class="" action="{{Route('serviceInsertUpdate2')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Police Activities Abstarct</label>
                            <div>
                                <textarea required class="form-control" name="police_activities_abstarct" rows="5">{{$police_activitie->police_activities_abstarct}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Crime Management:</label>
                            <div>
                                <textarea required name="crime_management" class="form-control" rows="5">{{$police_activitie->crime_management}}</textarea>
                            </div>
                        </div>									

                        <div class="form-group">
                            <label>Internal Security:</label>
                            <div>
                                <textarea required name="internal_security"  class="form-control" rows="5">{{$police_activitie->internal_security}}</textarea>
                            </div>
                        </div>		
                        <div class="form-group">
                            <label>Social Integration:</label>
                            <div>
                                <textarea required name="social_integration" class="form-control" rows="5"> {{$police_activitie->social_integration}}</textarea>
                            </div>
                        </div>																						
                        <div class="form-group">
                            <label>Performing Internationally:</label>
                            <div>
                                <textarea required name="performing_internationally" class="form-control"  rows="5">{{$police_activitie->performing_internationally}}</textarea>
                            </div>
                        </div>	
                        
                        <input type="hidden" name="edit_id" value="{{$police_activitie->id}}"/>
                                                            
                        <div class="form-group content_center">
                            <div>
                                <button type="submit" name="police_activities" class="btn btn-primary waves-effect waves-light">
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
                    From here you can edit and delete Police Activities content.
                    </p>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($police_activities as $key => $police_activitie)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td class="text_property"> {{$police_activitie->crime_management}}</td>
                                    <td>
                                        <a href="{{Route('service2Edit', $police_activitie->id)}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> 
                                        <!--<a href="{{Route('service2Delete', $police_activitie->id)}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>-->
                                     </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
        <div class="col-lg-6">


                <div class="card m-b-30">
                        <div class="card-body">
        
                            <h4 class="mt-0 header-title">Information Act</h4>
                           
        
                            <form class="" action="{{Route('serviceInsertUpdate2')}}" method="POST">		
                                @csrf  
                                
                                
                                <div class="form-group">
                                    <label>Right to Information Act</label>
                                    <textarea required  name="information_act" class="form-control" rows="5">{{$info_desk->information_act}}</textarea>
                                
                                </div>	
        

                                <input type="hidden" name="edit_id" value="{{$info_desk->id}}"/>
                                
                                <div class="form-group content_center">
                                    <div>
                                        <button type="submit" name="act" class="btn btn-primary waves-effect waves-light">
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
                                From here you can edit and delete info desk content.
                                </p>
            
                                @if(isset($acts[0]))
            
                                <div class="table-responsive">
                                    <table id="table2" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Details</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($acts as $key => $act)
                                            <tr>
                                                <td scope="row">{{$key+1}}</td>
                                                <td class="text_property">{{$act->information_act}}</td>
                                                <td>
                                                    <a href="{{Route('service2Edit', $act->id)}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> 
                                                   <!-- <a href="{{Route('service2Delete', $act->id)}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a> -->
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                                    
                                @else
            
                                    No Data Found
            
                                @endif
            
                            </div>
                        </div>




            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Info Desk</h4>
                    <p class="sub-title">দায়িত্বপ্রাপ্ত কর্মকর্তা  & বিকল্প দায়িত্বপ্রাপ্ত কর্মকর্তা</p>

                    <form class="" action="{{Route('serviceInsertUpdate2')}}" method="POST">		
                        @csrf      

                        <div class="form-group">
                            <label>Select Point</label>
                            <select class="form-control" name="select_point">
                                <option disabled> Select Point</option>
                                <option @if($info_desk->select_point == 'দায়িত্বপ্রাপ্ত কর্মকর্তা') selected="selected" @endif >দায়িত্বপ্রাপ্ত কর্মকর্তা</option>
                                <option @if($info_desk->select_point == 'বিকল্প দায়িত্বপ্রাপ্ত কর্মকর্তা') selected="selected" @endif >বিকল্প দায়িত্বপ্রাপ্ত কর্মকর্তা</option>												
                            </select>
                        </div> 
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{$info_desk->name}}" class="form-control" required placeholder="Type something"/><br/>
                            <label>BP No:</label>
                            <input type="text" name="bp_no" value="{{$info_desk->bp_no}}" class="form-control" required placeholder="Type something"/><br/>
                            <label>Designation:</label>
                            <input type="text" name="designation" value="{{$info_desk->designation}}" class="form-control" required placeholder="Type something"/><br/>
                            <label>Mobile</label>
                            <input type="text" name="mobile" value="{{$info_desk->mobile}}" class="form-control" required placeholder="Type something"/><br/>
                            <label>Email</label>
                            <input type="text" name="email" value="{{$info_desk->email}}" class="form-control" required placeholder="Type something"/><br/>
                            <label>Range Address</label>
                            <input type="text" name="range_address"  value="{{$info_desk->range_address}}"class="form-control" required placeholder="Type something"/><br/>
                        </div>	  
                        <input type="hidden" name="edit_id" value="{{$info_desk->id}}"/>
                        
                        <div class="form-group content_center">
                            <div>
                                <button type="submit" name="info_desk" class="btn btn-primary waves-effect waves-light">
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
                    From here you can edit and delete info desk content.
                    </p>

                    @if(isset($info_desks[0]))

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($info_desks as $key => $info_desk)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td class="text_property">{{$info_desk->select_point}}</td>
                                    <td>
                                        <a href="{{Route('service2Edit', $info_desk->id)}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a>
                                    <!--    <a href="{{Route('service2Delete', $info_desk->id)}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a> -->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="content_center">

                        {{$info_desks->links()}}

                    </div>
                                        
                    @else

                        No Data Found

                    @endif

                </div>
            </div>
        </div> <!-- end col -->
    </div>
<!-- Home Content End -->
@endsection