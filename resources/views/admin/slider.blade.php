@extends('admin.master')
@section('title','Slider')


@section('content')

<!-- Home Content Start -->
<div class="home_content">
    <div class="row">
        <div class="col-lg-5">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Add a Slider Image</h4>
                    <p class="sub-title">This Slider Image Are Show On Hompage Slider.</p>

                    <label>Add Slider Image:</label> 

                    <form class="kmp_emergency" action="{{Route('sliderInsertUpdate')}}"  method="POST"  enctype="multipart/form-data" >
                        @csrf                         

                        <div class="form-group">
                            <input name="slider_image" value="{{$slider->slider_image}}" type="file" accept="image/*" >  
                            <img src="{{asset('public/upload/').$slider->slider_image}}" alt="user" width="100px" height="100px"/>  
                        </div>
                        <div class="form-group">
                             <label>Add Slider Text:</label> 
                            <textarea id="" name="titel_image" rows="4" cols="50" class="form-control">{{$slider->titel_image}}
                                            </textarea>
                        </div>

                        <input type="hidden" name="edit_id" value="{{$slider->id}}"> 

                         <button type="submit" class="btn btn-primary waves-effect waves-light">
                            Add
                        </button>

                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                            Cancel
                        </button>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-lg-7">
            <div class="card m-b-30">
                <div class="card-body">

                     <h4 class="mt-0 header-title">List View</h4>
                    <p class="sub-title">
                    From Here You Update Or Delete Slider Image With Text. 
                    </p>

                    @if (isset($sliders[0]))

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Image</th>
                                    <th>Slider Text</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead> 
                            <tbody>
                                @foreach ($sliders as $key=>$slider)
                                    <tr>
                                        <td scope="row">{{$key+1}}</td>
                                        <td> <img src="{{asset('public/upload/').$slider->slider_image}}" alt="user" width="100px" height="100px"/>  </td>
                                        
                                        <td>
                                            <textarea id="" name="titel_image" rows="4" cols="50" class="form-control">{{$slider->titel_image}}
                                            </textarea> 
                                        </td>
                                        <td>
                                            <a href="{{route('sliderEdit', $slider->id )}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a>
                                            <a href="{{route('sliderDelete', $slider->id )}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>                                                        
                        </table>
                    </div>

                    <div class="content_center">
                        {{ $sliders->links() }}
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



