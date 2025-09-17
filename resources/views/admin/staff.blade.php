@extends('admin.master')
@section('title','Staff')


@section('content')

<!-- Home Content Start -->
<div class="home_content">
    <div class="row">
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Staff</h4>
                    <p class="sub-title">From here you can add staff of KMP</p>

                    <form class="" action="{{Route('staffInsertUpdate')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="staff_name" value="{{$staff->staff_name}}"  class="form-control" required placeholder="Type something"/>
                        </div>											
                        <div class="form-group">
                            <label>Rank</label>
                            <input type="text" name="designation"  value="{{$staff->designation}}" class="form-control" required placeholder="Type something"/>
                        </div>
                        <div class="form-group">
                            <label>BP NO</label>
                            <input type="text" name="bp_no"  value="{{$staff->bp_no}}" class="form-control" required placeholder="Type BP NO"/>
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" value="{{$staff->mobile}}" class="form-control" required placeholder="Type something"/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" value="{{$staff->email}}"  class="form-control" required placeholder="Type something"/>
                        </div>									
                        
                            
                        <div class="form-group">
                            <label>Upload Image</label>
                            <input name="staff_image" value="{{$staff->staff_image}}" type="file" multiple="multiple">                                         
                        </div>

                        <input type="hidden" name="edit_id" value="{{$staff->id}}">   

                        <div class="form-group">
                            <div>
                                <button type="submit" name="staff" class="btn btn-primary waves-effect waves-light">
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
        </div> <!-- end col -->

        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">

                        <h4 class="mt-0 header-title">List View</h4>
                    <p class="sub-title">
                    From here you can edit and delete 
                    </p>

                    @if(isset($staffs[0]))

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Rank</th>
                                    <th>BP NO</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Thumbnail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($staffs as $key => $staff)
                                    
                                
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                        <td class="text_property">  {{$staff->staff_name}} </td>
                                    <td class="text_property">{{$staff->designation}}</td>
                                    <td class="text_property">{{$staff->bp_no}}</td>
                                    <td class="text_property"> {{$staff->mobile}}  </td>
                                    <td class="text_property">{{$staff->email}}</td>
                                    <td>
                                    <div class="">
                                        <a href="#"> <img src="{{asset('public/upload/').$staff->staff_image}}" alt="user" width="50px" height="50px"/> </a>
                                    </div>  
                                    </td>
                                    <td>														
                                        <a href="{{route('staffEdit', $staff->id )}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> ||
                                        <a href="{{route('staffDelete', $staff->id )}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>    
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="content_center">

                            {{$staffs->links()}}
       
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