@extends('admin.master')
@section('title','Settings2')


@section('content')

<!-- Home Content Start -->
<div class="home_content">
    <div class="row">
            <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">
                    
                    <form action="{{Route('settings2InsertUpdate')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h4 class="mt-0 header-title">Upload Carrer Post</h4>
                    <p class="sub-title">
                        Upload carrer post from here 
                    </p>  								
                        <div class="form-group">
                            <label>Carrer Tittle</label>
                            <input type="text" name="carrer_tittle" value="{{$carrer_post->carrer_tittle}}" class="form-control" required placeholder="Type something"/>
                        </div><br/>
                        <div class="form-group">
                            <label>Upload caarer pdf/doc file</label>
                            <input name="caarer_pdf_doc" value="{{$carrer_post->caarer_pdf_doc}}" type="file" multiple="multiple">                                      
                        </div>

                        <input type="hidden" name="edit_id" value="{{$carrer_post->id}}"> 

                        <div class="form-group">
                            <div>
                                <button type="submit" name="carrer_post" class="btn btn-primary waves-effect waves-light">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">

                        <h4 class="mt-0 header-title">List View Carrer</h4>
                    <p class="sub-title">
                    Edit and delete caarer post
                    </p>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tittle</th>
                                    <th>Thumbnail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carrer_posts as $carrer_post)                             
                                    <tr>
                                        <th scope="row">1</th>
                                            <td class="text_property">{{$carrer_post->carrer_tittle}}  </td>												
                                        <td>
                                        <div class="">
                                            <a href="#"> <img src="{{asset('public/upload/').$carrer_post->caarer_pdf_doc}}" alt="user" width="80px" height="80px"/> </a>
                                        </div>  
                                        </td>
                                        <td>														
                                            <a href="{{route('settings2Edit', $carrer_post->id )}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> ||
                                            <a href="{{route('settings2Delete', $carrer_post->id )}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
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
            <!--
            <div class="card m-b-30">
                <div class="card-body">

                        <h4 class="mt-0 header-title">Citizen Charter</h4>
                    <p class="sub-title">
                    Contant Contant Contant Contant Contant Contant Contant Contant Contant 
                    </p>

                    <div class="">
                        <embed src="image/citizen.pdf" width="100%" height="200px" />
                    </div>
                    <br>
                        <div class="form-group">
                            <label>Ornogram Image (Requid Size 100 x 100)</label>
                            <input name="file" type="file" multiple="multiple">                                        
                        </div>
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-success waves-effect waves-light form-control">
                                    Update
                                </button>                                                    
                            </div>
                        </div>
                </div>
            </div>-->
            <div class="card m-b-30">
                <div class="card-body">
                    <form action="{{Route('settings2InsertUpdate')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <h4 class="mt-0 header-title">Document</h4>
                        <p class="sub-title">
                            Upload Document file from here 
                        </p>  								
                            <div class="form-group">
                                <label>Document Tittle 2</label>
                                <input type="text" name="document_tittle_2" value="{{$document_2->document_tittle_2}}" class="form-control" required placeholder="Type something"/>
                            </div><br/>
    
                            <div class="form-group">
                                <label>Upload  pdf/doc file 2 </label> <br>
                                <input name="documentr_pdf_doc_2" value="{{$document_2->documentr_pdf_doc_2}}" type="file" multiple="multiple">                                      
                            </div>

                            <input type="hidden" name="edit_id" value="{{$document_2->id}}">  

                            <div class="form-group">
                                <div>
                                    <button type="submit" name="document_2" class="btn btn-primary">
                                        Submit
                                    </button> 

                                    <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                            Cancel
                                    </button>                                                
                                </div>
                            </div>
                        </form>
                </div>
                <div class="card-body">

                        <h4 class="mt-0 header-title">List View Document</h4>
                    <p class="sub-title">
                    Edit and delete Document
                    </p>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tittle</th>
                                    <th>Thumbnail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($document_2s as $document_2)
                                    <tr>
                                        <th scope="row">1</th>
                                            <td class="text_property"> {{$document_2->document_tittle_2}} </td>												
                                        <td>
                                        <div class="">
                                            <a href="#"> <img src="{{asset('public/upload/'). $document_2->documentr_pdf_doc_2}}" alt="user" width="80px" height="80px"/> </a>
                                        </div>  
                                        </td>
                                        <td>														
                                            <a href="{{route('settings2Edit', $document_2->id )}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> ||
                                            <a href="{{route('settings2Delete', $document_2->id )}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                                           </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    </div>
                </div>
            </div>
        </div> <!-- end col -->   
    </div> <!-- end row -->       
</div>
<!-- Home Content End -->
@endsection