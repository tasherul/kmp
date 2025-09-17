@extends('admin.master')
@section('title','Crime')


@section('content')

<!-- Home Content Start -->
<div class="home_content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Upload monthly crime report </h4>
                    <p class="sub-title">From here upload monthly crime report in specific range units.</p>
                     
                    <form action="{{Route("crimeManagementInsertUpdate")}}" method="POST">
                       @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-20">
                                    <div class="form-group">
                                        <label>Select Range</label>												
                                        <select class="form-control" name="range">
                                            <option>Select Range</option>
                                            <option @if($crime_management->range == 'Khulna Sadar') selected="selected" @endif >Khulna Sadar</option>
                                            <option @if($crime_management->range == 'Sonadangha') selected="selected" @endif >Sonadangha</option>	
                                            <option @if($crime_management->range == 'Khalishpur') selected="selected" @endif >Khalishpur</option>	
                                            <option @if($crime_management->range == 'Daulatpur') selected="selected" @endif >Daulatpur</option>	
                                            <option @if($crime_management->range == 'Khanjahan Ali') selected="selected" @endif >Khanjahan Ali</option>	
                                            <option @if($crime_management->range == 'Labanchora') selected="selected" @endif >Labanchora</option>	
                                            <option @if($crime_management->range == 'Horintana') selected="selected" @endif >Horintana</option>			
                                            <option @if($crime_management->range == 'Aranghata') selected="selected" @endif >Aranghata</option>													
                                        </select>                                                           
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Speedy Trail</label>
                                        <input type="number" name="speedy_trail"  value="{{$crime_management->speedy_trail}}" placeholder="Type something.." class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Dacoity</label>
                                        <input type="number" name="dacoity"  value="{{$crime_management->dacoity}}" placeholder="Type something.." class="form-control">                                                            
                                    </div>														
                                    <div class="form-group">
                                        <label>Robbery</label>
                                        <input type="number" name="robbery"  value="{{$crime_management->robbery}}" placeholder="Type something.." class="form-control">
                                    </div>
                                    <div class="form-group m-b-0">
                                        <label>Murder</label>
                                        <input type="number" name="murder"  value="{{$crime_management->murder}}" placeholder="Type something.." class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-20">
                                    <div class="row ">
                                    <div class="form-group col ">
                                        <label>Month</label>
                                        <select class="form-control" name="month" value="{{$crime_management->month}}" >
                                            <option>Select Month</option>
                                            <option @if($crime_management->month == 'January') selected="selected" @endif>January</option>
                                            <option @if($crime_management->month == 'February') selected="selected" @endif>February</option>	
                                            <option @if($crime_management->month == 'March') selected="selected" @endif>March</option>	
                                            <option @if($crime_management->month == 'April') selected="selected" @endif>April</option>	
                                            <option @if($crime_management->month == 'May') selected="selected" @endif>May</option>	
                                            <option @if($crime_management->month == 'June') selected="selected" @endif>June</option>	
                                            <option @if($crime_management->month == 'July') selected="selected" @endif>July</option>			
                                            <option @if($crime_management->month == 'Augest') selected="selected" @endif>Augest</option>													
                                            <option @if($crime_management->month == 'September') selected="selected" @endif>September</option>	
                                            <option @if($crime_management->month == 'October') selected="selected" @endif>October</option>	
                                            <option @if($crime_management->month == 'November') selected="selected" @endif>November</option>			
                                            <option @if($crime_management->month == 'December') selected="selected" @endif>December</option>	                                       
                                        </select>
                                    </div>


                                    <div class="form-group col">
                                        <label>Year</label>
                                        <input type="text" name="year" value="{{$crime_management->year}}" placeholder="Type something.." class="form-control">
                                    </div>
                                </div>

                                    <div class="form-group">
                                        <label>Riot</label>
                                        <input type="number" name="riot" value="{{$crime_management->riot}}" placeholder="Type something.." class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Women Repression</label>
                                        <input type="number" name="women_repression" value="{{$crime_management->women_repression}}" placeholder="Type something.." class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Child Repression</label>
                                        <input type="number" name="child_repression" value="{{$crime_management->child_repression}}" placeholder="Type something.." class="form-control">
                                    </div>
                                    <div class="form-group m-b-0">
                                        <label>Kidnapping</label>
                                        <input type="number" name="kidnapping" value="{{$crime_management->kidnapping}}" placeholder="Type something.." class="form-control">
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-6">
                                <div class="p-20">
                                    <div class="form-group">
                                        <label>Police Assault</label>
                                        <input type="number" name="police_assault" value="{{$crime_management->police_assault}}" placeholder="Type something.." class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Burglary</label>
                                        <input type="number" name="burglary" value="{{$crime_management->burglary}}" placeholder="Type something.." class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Theft</label>
                                        <input type="number" name="theft" value="{{$crime_management->theft}}"  placeholder="Type something.." class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Others Cases</label>
                                        <input type="number" name="others_cases" value="{{$crime_management->others_cases}}" placeholder="Type something.." class="form-control">
                                    </div>

                                    <!--<div class="form-group m-b-0">
                                        <label>Total Cases</label>
                                        <input type="number" name="total_cases" value="" placeholder="Type something.." class="form-control">
                                    </div>--->


                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-6">
                                <div class="p-20">
                                    <label>Recovery Cases:(Arms Act, Explosive, Narcotics, Smuggling)</label>
                                    <div class="form-group m-b-0">
                                        <label>Arms Act</label>
                                        <input type="number" name="arms_act" value="{{$crime_management->arms_act}}" placeholder="Type something.." class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Explosive</label>
                                        <input type="number" name="explosive" value="{{$crime_management->explosive}}" placeholder="Type something.." class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Narcotics</label>
                                        <input type="number" name="narcotics" value="{{$crime_management->narcotics}}" placeholder="Type something.." class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Smuggling</label>
                                        <input type="number" name="smuggling"  value="{{$crime_management->smuggling}}" placeholder="Type something.." class="form-control">
                                    </div>

                                   <!--- <div class="form-group">
                                        <label>Total</label>
                                        <input type="number" name="total"  value="" placeholder="Type something.." class="form-control">
                                    </div>-->

                                    <input type="hidden" name="edit_id" value="{{$crime_management->id}}" />
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-12">
                                <div class="form-group content_center">
                                    <div>
                                        <button type="submit" name="monthly_crime_management" class="btn btn-primary waves-effect waves-light">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end row -->
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">

                        <h4 class="mt-0 header-title">List View</h4>
                    <p class="sub-title">
                    From here you can edit and delete remember person.
                    </p>

                    @if (isset($crime_managements[0]))

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Range</th>
                                    <th>Crime Statistics</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($crime_managements as $key=> $crime_management)
                                <tr>
                                    <th scope="row"> {{$key+1 }}</th>
                                    <td scope="row"> {{$crime_management->range }}</td>
                                    <td class="text_property">{{ $crime_management->month .'-' .$crime_management->year }}</td>
                                    <td>
                                        <a href="{{Route('crimeManagementEdit', $crime_management->id)}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> ||
                                        <a href="{{Route('crimeManagementDelete', $crime_management->id)}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>   
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                    
                    <!-- Pagination -->
                    <div class="content_center">

                    {{$crime_managements->links()}}

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
