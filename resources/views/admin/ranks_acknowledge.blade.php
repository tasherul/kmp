@extends('admin.master')
@section('title','Ranks')


@section('content')

<!-- Home Content Start -->
<div class="home_content">
    <div class="row">
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Add Ranks</h4>
                    <p class="sub-title">Add KMP Ranks System</p>
                    <form action="{{Route("ranksAcknowledgeInsertUpdate")}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Rank Content</label>
                            <textarea required name="rank_content" class="form-control" rows="5">{{$rank->rank_content}}</textarea>
                        </div>
                            
                        <div class="form-group">
                            <label>Upload Ranks System Image</label>
                            <input name="ranks_system_image" type="file" value="{{$rank->ranks_system_image}}" multiple="multiple">                                           
                        </div>

                        <input type="hidden" name="edit_id" value="{{$rank->id}}">   
                        
                        <div class="form-group">
                            <div>
                                <button type="submit" name="ranks" class="btn btn-primary waves-effect waves-light">
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
                    From here can edit and delete Career post
                    </p>

                    

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Rank</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($ranks as $key => $rank)       
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td class="text_property"> {{$rank->rank_content}}</td>
                                    <td><a href="#"> <img src="{{asset('public/upload/').$rank->ranks_system_image}}" alt="user" width="50px" height="50px"/> </a>  </td>
                                    <td>											
                                    <a href="{{Route('ranks_acknowledgeEdit', $rank->id)}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a>
                                  <!---  <a href="{{Route('ranks_acknowledgesDelete', $rank->id)}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a> -->
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
                    <h4 class="mt-0 header-title">Add Acknowledgement</h4>
                    <p class="sub-title">Add KMP Acknowledgement</p>
                    <form action="{{Route("ranksAcknowledgeInsertUpdate")}}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label>Acknowledgement Content</label>
                                <textarea  name="acknowledgement_content" class="form-control" rows="5">{{$acknowledge->acknowledgement_content}}</textarea>
                            </div>

    
                            <input type="hidden" name="edit_id" value="{{$acknowledgement_content->id}}">    
    
                            <div class="form-group">
                                <div>
                                    <button type="submit" name="acknowledgement_content_submit" class="btn btn-primary waves-effect waves-light">
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
                From here can edit and delete Comissoner list
                </p>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($acknowledgement_contents as $key => $acknowledgement_content)
                                
                            
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td class="text_property"> {{$acknowledgement_content->acknowledgement_content}}</td>									
                                <td>
                                    <a href="{{Route('ranks_acknowledgeEdit', $acknowledgement_content->id)}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a>
                                    <!--<a href="{{Route('ranks_acknowledgesDelete', $acknowledgement_content->id)}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>-->								    
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
                <h4 class="mt-0 header-title">Add Acknowledgement</h4>
                <p class="sub-title">Add KMP Acknowledgement</p>
                <form action="{{Route("ranksAcknowledgeInsertUpdate")}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="acknowledgement_name" value="{{$acknowledge->acknowledgement_name}}"class="form-control"  placeholder="Type something"/>
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" name="acknowledgement_designation"  value="{{$acknowledge->acknowledgement_designation}}" class="form-control"  placeholder="Type something"/>
                        </div>

                        <input type="hidden" name="edit_id" value="{{$acknowledge->id}}">    

                        <div class="form-group">
                            <div>
                                <button type="submit" name="acknowledgement" class="btn btn-primary waves-effect waves-light">
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

                        <h4 class="mt-0 header-title">List View</h4>
                    <p class="sub-title">
                    From here can edit and delete Comissoner list
                    </p>

                    @if(isset($acknowledges[0]))

                    <div class="table-responsive">
                        <table id="table2" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($acknowledges as $key => $acknowledge)
                                    
                                
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td class="text_property"> {{$acknowledge->acknowledgement_name}}</td>
                                    <td> {{$acknowledge->acknowledgement_designation}}</td>										
                                    <td>
                                     <a href="{{Route('ranks_acknowledgeEdit', $acknowledge->id)}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> ||
                                     <a href="{{Route('ranks_acknowledgesDelete', $acknowledge->id)}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>										    
                                     </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="content_center">

                        {{$acknowledges->links()}}
       
                    </div>
                    
                    @else

                        No Data Found

                    @endif


                </div>
            </div>
        </div>  
    </div> <!-- end row -->      
</div>
  
<!-- Home Content End -->
@endsection