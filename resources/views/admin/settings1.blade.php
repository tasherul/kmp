@extends('admin.master')
@section('title','Settings')


@section('content')

<!-- Home Content Start -->
<div class="home_content">
    <div class="row">                                  				
            <div class="col-lg-4">
                <div class="card m-b-30">
                    <div class="card-body">

                            <h4 class="mt-0 header-title">Organogram</h4>
                        <p class="sub-title">
                        Upload organogram from here 
                        </p>

                        <div class="">
                            <img class="img-thumbnail" alt="200x200" style="width: 100%; height: 300px;" src="{{asset('public/upload/').$ornogram->ornogram_image}}" data-holder-rendered="true">
                        </div>
                        <br>

                        <form action="{{Route('settings1InsertUpdate')}}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label>Organogram Image (Requid Size 100 x 100)</label>
                                <input name="ornogram_image" type="file">                                        
                            </div>

                        <input type="hidden" name="edit_id" value="{{$ornogram->id}}">   
                            <div class="form-group">
                                <div>
                                    <button type="submit" name="ornogram" class="btn btn-primary">
                                        Update
                                    </button>                                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            <div class="card m-b-30">
                <div class="card-body">

                <form action="{{Route('settings1InsertUpdate')}}"  method="POST" enctype="multipart/form-data" >
                   @csrf
                    <h4 class="mt-0 header-title">APA</h4>
                    <p class="sub-title">
                        Upload APA from here 
                    </p>  								
                        <div class="form-group">
                            <label>APA Tittle</label>
                            <input  name="APA_tittle" type="text" value="{{$APA->APA_tittle}}" class="form-control" required placeholder="Type something"/>
                        </div><br/>
                        <div class="form-group">
                            <label>Upload APA pdf/doc file</label>
                            <input name="APA_pdf_doc" type="file" value="{{$APA->APA_pdf_doc}}" multiple="multiple">                                      
                        </div>

                         <input type="hidden" name="edit_id" value="{{$APA->id}}">   
                        
                        <div class="form-group">
                            <div>
                                <button type="submit" name="APA" class="btn btn-primary">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">

                        <h4 class="mt-0 header-title">List View APA</h4>
                    <p class="sub-title">
                    Edit and delete APA
                    </p>

                    @if (@isset($APAs[0]))
                        

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tittle</th>
                                    <th>Thumbnail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($APAs as $key => $APA) 
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                            <td class="text_property"> {{ $APA->APA_tittle}} </td>												
                                        <td>
                                        <div class="">
                                           <a href="{{asset('public/upload/').$APA->APA_pdf_doc}}" target="_blank"> <img src="{{asset('kmp_dash')}}/image/pdf.png" alt="user" width="30px" height="30px"/> </a>
                                        </div>  
                                        </td>
                                        <td>														
                                            <a href="{{route('settings1Edit', $APA->id )}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> ||
                                            <a href="{{route('settings1Delete', $APA->id )}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="content_center">

                        {{$APAs->links()}}

                    </div>
                                        
                    @else

                        No Data Found

                    @endif
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4">
                <div class="card m-b-30">
                    <div class="card-body">

                            <h4 class="mt-0 header-title">Beat Policing</h4>
                        <p class="sub-title">
                        Upload Beat Policing from here 
                        </p>

                        <div class="">
                            
                            <embed src="{{asset('public/upload/').$beat_policing->beat_policing}}" width="100%" height="200px" />
                        </div>
                        <br>

                        <form action="{{Route('settings1InsertUpdate')}}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label>Beat Policing Image (Requid Size 100 x 100)</label>
                                <input name="beat_policing" type="file">                                        
                            </div>

                        <input type="hidden" name="edit_id" value="{{$beat_policing->id}}">   
                            <div class="form-group">
                                <div>
                                    <button type="submit" name="policing" class="btn btn-primary">
                                        Update
                                    </button>                                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            
        </div> <!-- end col -->
        <div class="col-lg-4">
            <div class="card m-b-30">
                <div class="card-body">
                <form action="{{Route('settings1InsertUpdate')}}"  method="POST" enctype="multipart/form-data" >
                    @csrf
                     <h4 class="mt-0 header-title">Citizen Charter</h4>
                    <p class="sub-title">
                    Contant Contant Contant Contant Contant Contant Contant Contant Contant 
                    </p>

                    <div class="">
                        <embed src="{{asset('public/upload/').$citizen_charter->citizen_charter_image}}" width="100%" height="200px" />
                    </div>
                    <br>
                        
                        <div class="form-group">
                            <label>Citizen Charter</label>
                            <input name="citizen_charter_image" type="file">                                        
                        </div>
                        <input type="hidden" name="edit_id" value="{{$citizen_charter->id}}">   
                        <div class="form-group">
                            <div>
                                <button type="submit" name="citizen_charter" class="btn btn-primary">
                                    Update
                                </button>                                                    
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card m-b-30">
                <div class="card-body">
                <form action="{{Route('settings1InsertUpdate')}}"  method="POST" enctype="multipart/form-data" >
                    @csrf
                    <h4 class="mt-0 header-title">Document</h4>
                    <p class="sub-title">
                        Upload Document file from here 
                    </p>  								
                        <div class="form-group">
                            <label>Document Tittle</label>
                            <input type="text" name="document_tittle" value="{{$document->document_tittle}}" class="form-control" required placeholder="Type something"/>
                        </div><br/>
                        <div class="form-group">
                            <label>Upload pdf/doc file</label>
                              <input name="document_pdf_doc" value="{{$document->document_tittle}}" type="file" multiple="multiple">                                      
                        </div>

                        <input type="hidden" name="edit_id" value="{{$document->id}}" >   
                       
                        <div class="form-group">
                            <div>
                                <button type="submit" name="document" class="btn btn-primary waves-effect waves-light">
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

                    @if (isset($documents[0]))
                        
                    <div class="table-responsive">
                        <table id="table2" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tittle</th>
                                    <th>Thumbnail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documents as $key => $document)
                                    <tr>
                                      <th scope="row">{{$key+1}}</th>
                                            <td class="text_property"> {{$document->document_tittle}}  </td>												
                                        <td>
                                        <div class="">
                                        
                                            <a href="{{asset('public/upload/').$document->document_pdf_doc}}" target="_blank"> <img src="{{asset('kmp_dash')}}/image/pdf.png" alt="user" width="30px" height="30px"/> </a>
                                        </div>  
                                        </td>
                                        <td>														
                                            <a href="{{route('settings1Edit', $document->id )}}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> ||
                                            <a href="{{route('settings1Delete', $document->id )}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="content_center">

                        {{$documents->links()}}

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