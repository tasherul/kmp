@extends('admin.master')
@section('title','Range Unit')


@section('content')

<!-- Home Content Start -->
<div class="home_content">
    <div class="row">
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Range Units History And Image</h4>
                    <p class="sub-title">From here add range unit</p>

                    <form class="" action="{{Route('rangeUnitInsertUpdate')}}" method="POST" enctype="multipart/form-data">
                       @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Select Range</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="range">
                                    <option>Select Range</option>
                                    <option @if($rangeunits_history->range == 'Khulna Sadar') selected="selected" @endif>Khulna Sadar</option>
                                    <option @if($rangeunits_history->range == 'Sonadangha') selected="selected" @endif>Sonadangha</option>	
                                    <option @if($rangeunits_history->range == 'Khalishpur') selected="selected" @endif>Khalishpur</option>	
                                    <option @if($rangeunits_history->range == 'Daulatpur') selected="selected" @endif>Daulatpur</option>	
                                    <option @if($rangeunits_history->range == 'Khanjahan Ali') selected="selected" @endif>Khanjahan Ali</option>	
                                    <option @if($rangeunits_history->range == 'Labanchora') selected="selected" @endif>Labanchora</option>	
                                    <option @if($rangeunits_history->range == 'Horintana') selected="selected" @endif>Horintana</option>			
                                    <option @if($rangeunits_history->range == 'Aranghata') selected="selected" @endif>Aranghata</option>													
                                </select>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label>History</label>
                            <textarea id="textarea" name="history" class="form-control" rows="6" placeholder="Write range history here...">{{$rangeunits_history->history}}</textarea>
                        </div>
                        <div class="form-group">
                        <label>
                            Upload range or thana images. 
                        </label>
                         <input name="range_image" value="{{$rangeunits_history->range_image}}" type="file" multiple="multiple"> 
                        </div>
                        
                        <input type="hidden" name="edit_id" value="{{$rangeunit->id}}"> 

                        <div class="form-group">
                            <div>
                                <button name="range_unit_history" type="submit" class="btn btn-primary waves-effect waves-light">
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

                        <h4 class="mt-0 header-title">List View Range Units</h4>
                    <p class="sub-title">
                    Edit and delete range unit history and images
                    </p>

                    @if (isset($rangeunits_historys[0]))

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>History</th>
                                    <th>Thumbnail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rangeunits_historys as $key=> $rangeunits_history)                        
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                        <td class="text_property"> {{$rangeunits_history->range}}</td>
                                    <td class="text_property">{{$rangeunits_history->history}}</td>														
                                    <td>
                                    <div class="">
                                        <a href="{{asset('upload').$rangeunits_history->range_image}}"> <img src="{{asset('public/upload/').$rangeunits_history->range_image}}" alt="user" width="80px" height="80px"/> </a>
                                    </div>  
                                    </td>
                                    <td>														
                                        <a href="{{route('rangeUnitEdit', $rangeunits_history->id )}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a>
                                       <!-- <a href="{{route('rangeUnitDelete', $rangeunits_history->id )}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>-->
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
        </div> <!-- end col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Range Units Staff</h4>
                    <p class="sub-title">Add range/thana unit staff</p>

                    <form class="" action="{{Route('rangeUnitInsertUpdate')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Select Range</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="staff_range">
                                    <option>Select Range</option>
                                    <option @if($rangeunit->staff_range == 'Khulna Sadar') selected="selected" @endif>Khulna Sadar</option>
                                    <option @if($rangeunit->staff_range == 'Sonadangha') selected="selected" @endif>Sonadangha</option>	
                                    <option @if($rangeunit->staff_range == 'Khalishpur') selected="selected" @endif>Khalishpur</option>	
                                    <option @if($rangeunit->staff_range == 'Daulatpur') selected="selected" @endif>Daulatpur</option>	
                                    <option @if($rangeunit->staff_range == 'Khanjahan Ali') selected="selected" @endif>Khanjahan Ali</option>	
                                    <option @if($rangeunit->staff_range == 'Labanchora') selected="selected" @endif>Labanchora</option>	
                                    <option @if($rangeunit->staff_range == 'Horintana') selected="selected" @endif>Horintana</option>			
                                    <option @if($rangeunit->staff_range == 'Aranghata') selected="selected" @endif>Aranghata</option>														
                              												
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="staff_name" value="{{$rangeunit->staff_name}}" class="form-control" required placeholder="Type something"/>
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" name="staff_designation" value="{{$rangeunit->staff_designation}}" class="form-control" required placeholder="Type something"/>
                        </div>
                        <div class="form-group">
                            <label>Contact</label>
                            <input type="text"  name="staff_contact" value="{{$rangeunit->staff_contact}}" class="form-control" required placeholder="Type something"/>
                        </div>
            
                            
                        <div class="form-group">
                            <label>Upload Image (300x150)</label>
                            <input name="range_unit_staff_image" value="{{$rangeunit->range_unit_staff_image}}" type="file" multiple="multiple">                                          
                        </div>

                        <input type="hidden" name="edit_id" value="{{$rangeunit->id}}"> 
                        
                        <div class="form-group">
                            <div>
                                <button type="submit" name="range_unit_staff" class="btn btn-primary waves-effect waves-light">
                                    Submit
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

                        <h4 class="mt-0 header-title">List View Range Units Staff</h4>
                    <p class="sub-title">
                    Edit and delete range unit staff
                    </p>

                    @if(isset($rangeunits[0]))

                    <div class="table-responsive">
                        <table id="table2" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Thana</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Contact</th>
                                    <th>Thumbnail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($rangeunits as $key=> $rangeunit)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td> {{$rangeunit->staff_range}}</td>
                                    <td class="text_property">{{$rangeunit->staff_name}}</td>
                                    <td class="text_property">{{$rangeunit->staff_designation}}</td>
                                    <td>{{$rangeunit->staff_contact}}</td>
                                    <td>
                                    <div class="">
                                        <a href="{{asset('public/upload/').$rangeunit->range_unit_staff_image }}"> <img src="{{asset('public/upload/').$rangeunit->range_unit_staff_image }}" alt="user" width="80px" height="80px"/> </a>
                                    </div>  
                                    </td>
                                    <td>														
                                        <a href="{{route('rangeUnitEdit', $rangeunit->id )}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> ||
                                        <a href="{{route('rangeUnitDelete', $rangeunit->id )}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
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
        </div> <!-- end col -->            
    </div> <!-- end row -->      
</div>

<!-- Home Content End -->
@endsection