@extends('admin.master')
@section('title','Video')


@section('content')

<!-- Home Content Start -->
<div class="home_content">

<div class="row">
    <div class="col-lg-5">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">Add Video</h4>
                <p class="sub-title">Add video from here</p>

                <form class="" action="{{route('videoInsertUpdate')}}"  method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Video Title</label>
                        <input type="text"  name="video_title" value="{{$video->video_title}}" class="form-control" required placeholder="Type something"/>
                    </div>   

                  <!--   <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Video Type</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="video_type" required >
                                <option >Select Type</option>
                                <option @if($video->video_type == 'Youtube Video') selected="selected" @endif>Youtube Video</option>
                                <option @if($video->video_type == 'Vimo Video') selected="selected" @endif>Vimo Video</option>
                                <option @if($video->video_type == 'Private Video') selected="selected" @endif>Private Video</option>
                            </select>
                        </div>
                    </div>--->

                        <div class="form-group">
                        <label>Video Link</label>
                        <input type="text" name="video_link" value="{{$video->video_link}}" class="form-control" required placeholder="Type something"/><br/>
                       
                       
                        <label>Video Thumbnail</label>
                        <div class="m-b-30">
                            <input name="video_thumbnail" value="{{$video->video_thumbnail}}" type="file" >
                        </div>

                       <!-- <p class="sub-title">Suggest to upload video from youtube.</p>
                        <div class="m-b-30">
                            <div action="#" class="dropzone">
                                <div class="fallback">
                                    <input name="file" type="file" multiple="multiple">
                                </div>
                            </div>
                        </div>

                    -->
                    </div>
                    

                    <input type="hidden" name="edit_id" value="{{$video->id}}">   
                    
                    <div class="form-group">
                        <div>
                            <button type="submit" name="video" class="btn btn-primary waves-effect waves-light">
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
                From here you can edit and delete video.
                </p>

                @if(isset($videos[0]))

                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Thumbnail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $key => $video)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td class="text_property"> {{$video->video_title}}  </td>
                                <td>
                                <div class="">
                                    <img width="70px" height="70px" class="embed-responsive-item" src="{{asset('public/upload/').$video->video_thumbnail}}" />
                                </div>  
                                </td>
                                <td>
                                <!--<button class="btn btn-success btn-sm waves-effect waves-light" type="submit">View</button> -->
                                <a href="{{route('videoEdit', $video->id )}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> ||
                                <a href="{{route('videoDelete', $video->id )}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                                   		
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="content_center">

                    {{$videos->links()}}
    
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