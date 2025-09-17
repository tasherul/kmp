@extends('admin.master')
@section('title','Photo')


@section('content')

<!-- Home Content Start -->
<div class="home_content">
    <div class="row">
        <div class="col-lg-5">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Photo Gallery</h4>
                    <p class="sub-title">Upload photo gallery from here.</p>

                    <form class="" action="{{route('photoInsertUpdate')}}"  method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="image_tittle" value="{{$photo->image_tittle}}" class="form-control" required placeholder="Type something"/><br/>
                            <p class="sub-title">Upload image.</p>
                            <div class="m-b-30">
                            <input name="gallery_image" value="{{$photo->gallery_image}}" type="file" accept="image/*">
                            </div>
                        </div>

                        <input type="hidden" name="edit_id" value="{{$photo->id}}">    
                        
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
                    From here you can edit and delete photo gallery
                    </p>

                    @if(isset($photos[0]))

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($photos as $key => $photo)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td> <img src="{{asset('public/upload/').$photo->gallery_image}}" alt="user" width="100px" height="100px"/>  </td>
                                    <td class="text_property">{{$photo->image_tittle}} </td>
                                    <td>
                                    <a href="{{route('photoEdit', $photo->id )}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> ||
                                    <a href="{{route('photoDelete', $photo->id )}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="content_center">

                        {{$photos->links()}}
       
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
  
  
  
  