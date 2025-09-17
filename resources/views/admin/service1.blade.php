@extends('admin.master')
@section('title','Service1')


@section('content')

<!-- Home Content Start -->
<div class="home_content">

    <div class="row">
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Community Policing</h4>
                    <p class="sub-title">Add KMP Community Policing</p>

                  <form class="" action="{{Route('serviceInsertUpdate1')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label>Conceptual Frame-work: Details</label>
                            <div>
                            <textarea required name="conceptual_frame_work" class="form-control" rows="5">{{$community_policing->conceptual_frame_work}}</textarea>
                            </div>
                        </div>									

                        <div class="form-group">
                            <label>Community policing consists of three key components:</label>
                            <div>
                                <textarea required name="community_policing_consists" class="form-control" rows="5">{{$community_policing->community_policing_consists}}</textarea>
                            </div>
                        </div>		
                        <div class="form-group">
                            <label>Bangladesh perspective:</label>
                            <div>
                                <textarea required name="bangladesh_perspective" class="form-control" rows="5">{{$community_policing->bangladesh_perspective}}</textarea>
                            </div>
                        </div>																						
                        <div class="form-group">
                            <label>Community Policing:</label>
                            <div>
                                <textarea required name="community_policing" class="form-control" rows="5">{{$community_policing->community_policing}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="file" name="image_service" class="form-control">
                        </div>	

                        <input type="hidden" name="edit_id" value="{{$community_policing->id}}">	
                                                            
                        <div class="form-group content_center">
                            <div>
                                <button type="submit" name="community_polic" class="btn btn-primary waves-effect waves-light">
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
                    From here you can edit and delete Community Policing content.
                    </p>

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
                                @foreach ($community_policings as $key => $community_policing)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td class="text_property">{{$community_policing->conceptual_frame_work}} </td>
                                    <td>
                                        <a href="{{Route('service1Edit', $community_policing->id)}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a>
                                        <!--<a href="{{Route('service1Delete', $community_policing->id)}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>-->
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

                    <h4 class="mt-0 header-title">More Service Content</h4>
                    <p class="sub-title">Choose servic and upload content</p>

                    <form class="" action="{{Route('serviceInsertUpdate1')}}" method="POST" enctype="multipart/form-data">		
                        @csrf
                        
                        
                        <div class="form-group">
                            <label>More Service</label>
                            <select class="form-control" name="more_service">
                                <option> Select Service</option>
                                <option @if($more_service->more_service == 'Money Escort') selected="selected" @endif>Money Escort</option>	
                                
                                <option @if($more_service->more_service == 'Police Verification') selected="selected" @endif>Police Verification</option>
                                <option @if($more_service->more_service == 'Protection & Protocol') selected="selected" @endif>Protection & Protocol</option>	
                                <option @if($more_service->more_service == 'Victim Support') selected="selected" @endif>Victim Support</option>	
                                <option @if($more_service->more_service == 'Traffic Management') selected="selected" @endif>Traffic Management</option>													
                            </select>
                        </div>                                            
                        <div class="form-group">
                            <input type="file" name="image_service" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Service Content:</label>
                            <div>
                                <textarea required name="service_content" class="form-control" rows="5">{{$more_service->service_content}}</textarea>
                            </div>
                        </div>	
                        
                        <input type="hidden" name="edit_id" value="{{$more_service->id}}">	
                        <div class="form-group content_center">
                            <div>
                                <button type="submit" name="more_service_content" class="btn btn-primary waves-effect waves-light">
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
                    From here you can edit and delete service content.
                    </p>

                    @if(isset($more_services[0]))

                    <div class="table-responsive">
                        <table id="table2" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Service</th>
                                    <th>Image</th>
                                    <th>Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($more_services as $key => $more_service)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td class="text_property"> {{$more_service->more_service}}</td>
                                    <td class="text_property"><img src="{{asset('public/upload/').$more_service->image_service}}" alt="user" width="100px" height="100px"/></td>
                                    <td class="text_property">{{$more_service->service_content}}</td>
                                    <td>
                                        <a href="{{Route('service1Edit', $more_service->id)}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> 
                                       <!-- <a href="{{Route('service1Delete', $more_service->id)}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>-->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    <!-- Pagination -->
                    <div class="content_center">

                        {{$more_services->links()}}

                    </div>
                                     
                    @else

                        No Data Found

                    @endif

                    </div>     
                </div>
            </div>
        </div> <!-- end col -->     
    </div>  
<!-- Home Content End -->
@endsection