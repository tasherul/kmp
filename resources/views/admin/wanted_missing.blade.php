@extends('admin.master')
@section('title','Wan & Miss')


@section('content')

<!-- Home Content Start -->
<div class="home_content">
    <div class="row">
        <div class="col-lg-5">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Wanted & Missing</h4>
                    <p class="sub-title">From here you can add wanted and missing person.</p>

                    <form class="" action="{{Route('wantedMissingInsertUpdate')}}" method="POST"  enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{$Wantedmissing->name}}" class="form-control" required placeholder="Type something"/>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Select Type</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="type">
                                    <option >Select Type</option>
                                    <option @if($Wantedmissing->type == 'Wanted') selected="selected" @endif >Wanted</option>
                                    <option @if($Wantedmissing->type == 'Missing') selected="selected" @endif>Missing</option>												
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Wanted or Missing Details</label>
                            <div>
                                <textarea required name="wanted_or_missing_details" class="form-control" rows="5" placeholder="Enter Description Here">{{$Wantedmissing->wanted_or_missing_details}}</textarea>
                            </div><br/>
                            <label>Suggest to upload image(300 X 150)</label>
                            <div class="m-b-30">
                                <input name="image" value="{{$Wantedmissing->image}}" type="file" multiple="multiple">
                            </div>
                        </div>									
                        <input type="hidden" name="edit_id" value="{{$Wantedmissing->id}}">

                        <div class="form-group">
                            <div>
                                <button type="submit" name="wanted_or_missing" class="btn btn-primary waves-effect waves-light">
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

        <div class="col-lg-7">
            <div class="card m-b-30">
                <div class="card-body">

                        <h4 class="mt-0 header-title">List View</h4>
                    <p class="sub-title">
                    From here you can edit and delete 
                    </p>
                    @if(isset($Wantedmissings[0]))

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Details</th>
                                    <th>Thumbnail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Wantedmissings as $key => $Wantedmissing)            
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td> {{$Wantedmissing->name}}</td>
                                    <td>{{$Wantedmissing->type}}</td>
                                    <td> {{$Wantedmissing->wanted_or_missing_details}}  </td>
                                    <td>
                                    <div class="">
                                        <a href="{{asset('public/upload/').$Wantedmissing->image}}" target="_blank"> <img src="{{asset('public/upload/').$Wantedmissing->image}}" alt="user" width="80px" height="80px"/> </a>
                                    </div>  
                                    </td>
                                    <td>
                                   <!-- <a class="btn btn-success btn-sm waves-effect waves-light" type="submit">View</a>-->
                                    <a href="{{route('wantedMissingEdit', $Wantedmissing->id )}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> ||
                                    <a href="{{route('wantedMissingDelete', $Wantedmissing->id )}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>										
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>                   

                    <!-- Pagination -->
                    <div class="content_center">

                         {{$Wantedmissings->links()}}
    
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
  