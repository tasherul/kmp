@extends('admin.master')
@section('title','Carrer')


@section('content')

<!-- Home Content Start -->
<div class="home_content">
    <div class="row">
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Add Career</h4>
                    <p class="sub-title">Add KMP Career</p>

                    <form  action="{{route('carrerInsertUpdate')}}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="carrer_title" value="{{$carrer->carrer_title}}" class="form-control" required placeholder="Type something"/>
                        </div>
                            
                        
                        <div class="form-group">
                            <label>File Upload pdf/doc</label>
                            <input name="carrer_pdf_doc" value="{{$carrer->carrer_pdf_doc}}" type="file" multiple="multiple">                                            
                        </div> 

                        <input type="hidden" name="edit_id" value="{{$carrer->id}}"> 

                        <div class="form-group">
                            <div>
                                <button type="submit" name="carrer" class="btn btn-primary waves-effect waves-light">
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
                    From here can edit and delete Career post
                    </p>

                    @if(isset($carrers[0]))

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($carrers as $key => $carrer)
                                    <tr>
                                        <th scope="row">{{ $key+1}}</th>
                                        <td class="text_property"> {{$carrer->carrer_title}}  </td>
                                        <td><a href="{{asset('public/upload/').$carrer->carrer_pdf_doc}}" target="_blank"> <img src="{{asset('kmp_dash')}}/image/pdf.png" alt="user" width="30px" height="30px"/> </a>  </td>
                                        <td>
                                           <a href="{{route('carrerEdit', $carrer->id )}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> ||
                                           <a href="{{route('carrerDelete', $carrer->id )}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>    
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="content_center">

                        {{$carrers->links()}}
    
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

                    <h4 class="mt-0 header-title">Add Police Comissoner</h4>
                    <p class="sub-title">Add KMP Police Comissoner List</p>

                    <form  action="{{route('carrerInsertUpdate')}}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="comissoner_name" value ="{{$police_comissoner->comissoner_name}}" class="form-control" required placeholder="Type something"/>
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" name="comissoner_designation" value ="{{$police_comissoner->comissoner_designation}}" class="form-control" required placeholder="Type something"/>
                        </div>
                        <div class="form-group">
                            <label>From Date</label>
                            <input type="text" name="comissoner_from_date" value ="{{$police_comissoner->comissoner_from_date}}" class="form-control"  required placeholder="Type date"/>
                        </div>
                        <div class="form-group">
                            <label>To Date</label>
                            <input type="text" name="comissoner_to_date" value ="{{$police_comissoner->comissoner_to_date}}" class="form-control" required placeholder="Type date"/>
                        </div>  
                        
                        <input type="hidden" name="edit_id" value="{{$police_comissoner->id}}">   

                      
                        <div class="form-group">
                            <div>
                                <button type="submit" name="police_comissoner"  class="btn btn-primary waves-effect waves-light">
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

                    @if(isset($police_comissoners[0]))

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
                                @foreach ($police_comissoners as $key=> $police_comissoner)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td class="text_property">{{$police_comissoner->comissoner_name}}</td>
                                    <td>{{$police_comissoner->comissoner_designation}}</td>										
                                    <td>
                                        <a href="{{route('carrerEdit', $police_comissoner->id )}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> ||
                                        <a href="{{route('carrerDelete', $police_comissoner->id )}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>    
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="content_center">

                        {{$carrers->links()}}
        
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
  