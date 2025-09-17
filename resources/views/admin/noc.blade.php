@extends('admin.master')
@section('title','NOC')


@section('content')

<!-- Home Content Start -->
<div class="home_content">
    <div class="row">
        <div class="col-lg-5">
            <div class="card m-b-30">
                <div class="card-body">
                    <form class="kmp_emergency" action="{{Route('nocinsert')}}" method="POST" enctype="multipart/form-data">
                        @csrf   
                        <div class="form-group">
                            <label>Add Name & Rank:</label>
                            <input type="text" name="name_rank" value=""  class="form-control" required placeholder="kmp Noc"  /><br/>
                            <label>Add Issuing Authority:</label>
                            <input type="text" name="issuing_authority" value=""  class="form-control" required placeholder="kmp Noc"  /><br/>
                            <label>Upload Noc Image.</label>

                            <div class="form-group">
                                <div class="m-b-30">
                                    <input name="noc_file" type="file" >
                                </div>
                            </div>												
                        </div>   

                        <!-- <input type="hidden" name="edit_id" value="">  									  -->
                       
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
                    From here you can edit and delete Noc. 
                    </p>

                    
                        
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
                           @php $kes=0; @endphp
                            @foreach($dd as $key=>$ss)
                          @php  $kes=$kes+1; @endphp
                                <tr>
                                    <th scope="row">{{ $kes }}</th>
                                    <td class="text_property">{{ $ss->name_rank }}  </td>
                                    <td class="text_property">{{ $ss->issuing_authority }}  </td>
                                    <td><a href="{{asset('public/upload/').$ss->noc_file}}" target="_blank" > <img src="{{asset('kmp_dash')}}/image/pdf.png"  alt="user" width="30px" height="30px"/> </a></td>
                                
                                    <td>
                                        
                                        <a href="{{route('Noc_Delete', $ss->id )}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                                     </td>
                                </tr>
                               
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="content_center">

                    

                    </div>

                   

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->      
</div>

<!-- Home Content End -->
@endsection