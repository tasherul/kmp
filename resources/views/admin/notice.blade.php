@extends('admin.master')
@section('title','Notice')


@section('content')

<!-- Home Content Start -->
<div class="home_content">
    <div class="row">
        <div class="col-lg-5">
            <div class="card m-b-30">
                <div class="card-body">
                    <form class="kmp_emergency" action="{{Route('noticeInsertUpdate')}}" method="POST" enctype="multipart/form-data">
                        @csrf   
                        <div class="form-group">
                            <label>Add Notice Tittle:</label>
                            <input type="text" name="notice_tittle" value="{{$notice->notice_tittle}}"  class="form-control" required placeholder="kmp notice"  /><br/>
                            <label>Upload notice pdf/image.</label>

                            <div class="form-group">
                                <div class="m-b-30">
                                    <input name="notice_file" type="file" >
                                </div>
                            </div>												
                        </div>   

                        <input type="hidden" name="edit_id" value="{{$notice->id}}">  									 
                       
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
                    From here you can edit and delete notice. 
                    </p>

                    @if (isset($notices[0]))
                        
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notices as $key=> $notice) 
                                <tr>
                                    <th scope="row"> {{$key+1}}</th>
                                    <td class="text_property"> {{$notice->notice_tittle}}  </td>
                                    <td> {{ date('d-M-Y', strtotime($notice->created_at))}}  </td>
                                <td><a href="{{asset('public/upload/').$notice->notice_file}}" target="_blank" > <img src="{{asset('kmp_dash')}}/image/pdf.png"  alt="user" width="30px" height="30px"/> </a>  </td>
                                    <td>
                                        <a href="{{route('noticeEdit', $notice->id )}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> ||
                                        <a href="{{route('noticeDelete', $notice->id )}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                                     </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="content_center">

                     {{$notices->links()}}

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