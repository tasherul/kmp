@extends('admin.master')
@section('title','News')


@section('content')

    <!-- Home Content Start -->
    <div class="home_content">
        <div class="row">
            <div class="col-lg-5">
                <!-- Emergency Area -->
                <div class="card m-b-30">
                    <div class="card-body">       
                        <h4 class="mt-0 header-title">Add News:</h4>
                        <p class="sub-title">This news are show on news feed.</p>

                         <form class="kmp_emergency" method="POST" action="{{route('newsInsertUpdate')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Add News Tittle:</label>
                                <input type="text" name="news_tittle" value="{{$news->news_tittle}}" class="form-control" required placeholder="কেমপি অভিযান, মোট আটক ২৮ জন ও মাদকদ্রব্য উদ্ধার"/><br/>
                                <label>Upload news image.</label>
                                <input type="file"  name="news_image" value="{{$news->news_image}}" accept="image/*" >

                            <br><br><br>
                                <label>News Description:</label>
                                <textarea name="news_description" id="textarea" class="form-control" rows="6" placeholder="Write news description here...">{{$news->news_description}}</textarea>
                            </div> 
                            
                            <input type="hidden" name="edit_id" value="{{$news->id}}">      									 
                            
                             <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Add
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                
            </div>
            <div class="col-lg-7">
                <div class="card m-b-30">
                    <div class="card-body">

                            <h4 class="mt-0 header-title">List View</h4>
                        <p class="sub-title">
                        Update Or Delete News From Here.
                        </p>

                        @if (isset($newss[0]))

                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Short Details</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($newss as $key => $news) 
                                        
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td class="text_property">{{$news->news_tittle }} </td>
                                            <td> {{ date('d-M-Y', strtotime($news->created_at))}}  </td>
                                            <td class="text_property">{{$news->news_description }}</td>													
                                            <td>
                                                <a href="{{route('newsEdit', $news->id )}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> ||
                                                <a href="{{route('newsDelete', $news->id )}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        
                        <hr>
                    
                         <!-- Pagination -->
                        <div class="content_center">
                            {{ $newss->links() }}
                        </div>
                 
                        @else
                            NO Data Found
                        @endif  

                    </div>
                </div>
            </div> <!-- end col -->              
        </div>
    </div>
    <!-- Home Content End -->              
	
@endsection