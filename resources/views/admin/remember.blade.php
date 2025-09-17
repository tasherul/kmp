@extends('admin.master')
@section('title','Rremember')


@section('content')

<!-- Home Content Start -->
<div class="home_content">
    <div class="row">
        <div class="col-lg-5">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">We Remember</h4>
                    <p class="sub-title">From here add remember person.</p>

                    <form class="" action="{{ Route('rememberInsertUpdate')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="remember_person_name" value="{{$remember->remember_person_name}}" class="form-control" required placeholder="Type something"/><br/>
                            <label>Give Reason:</label>
                            <textarea id="textarea" name="reason" class="form-control" rows="6" placeholder="Write reason from here...">{{$remember->reason}}</textarea><br/>
                            <label>Upload image.</label>
                            <div class="m-b-30">
                                <input name="remember_person_image"  value="{{$remember->remember_person_image}}"  type="file" >
                            </div>
                            <input type="hidden" name="edit_id" value="{{$remember->id}}">  
                        </div>
                            
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
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
                    From here you can edit and delete remember person.
                    </p>

                    @if(isset($remembers[0]))

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Reason</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($remembers as $key => $remember)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td> <img src="{{asset('public/upload/').$remember->remember_person_image}}" alt="user" width="100px" height="100px"/>  </td>
                                    <td class="text_property">{{$remember->remember_person_name}} </td>
                                    <td class="text_property">{{$remember->reason}} </td>
                                    <td>  
                                        <a href="{{Route('rememberEdit', $remember->id)}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> ||
                                        <a href="{{Route('rememberDelete', $remember->id)}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="content_center">

                        {{$remembers->links()}}

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