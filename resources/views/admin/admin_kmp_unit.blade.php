@extends('admin.master')
@section('title','KMP UNITS')


@section('content')

<!-- Home Content Start -->
<div class="home_content">
    <div class="row">
        <div class="col-lg-5">
            <div class="card m-b-30">
                <div class="card-body">
                    <form class="kmp_emergency" action="{{Route('kmp_units_insert')}}" method="POST">
                        @csrf   
                        <div class="form-group">

                            <label>Select Unit:</label>

                            <select name="office"  class="form-control">
							    <option value="0">Select Unit</option>
							    <option value="Commissioner's Office, KMP">Commissioner's Office, KMP</option>
							    <option value="Headquarter Division, KMP">Headquarter Division, KMP</option>
							    <option value="City Special Branch (CSB), KMP">City Special Branch (CSB), KMP </option>
							    <option value="North Division, KMP">North Division, KMP </option>
							    <option value="South Division, KMP">South Division, KMP </option>
							    <option value="Detective Branch (DB), KMP">Detective Branch (DB), KMP</option>
							    <option value="Riot COntrol Division (RCD), KMP">Riot COntrol Division (RCD), KMP </option>
							    <option value="Traffic Division, KMP ">Traffic Division, KMP </option>
							    <option value="Prosecution Division, KMP">Prosecution Division, KMP </option>
							 </select>

                            <label>Add Designation:</label>
                            <input type="text" name="designation" value=""  class="form-control"  placeholder="type designation"  /><br/>
                            <label>Add Mobile:</label>
                            <input type="text" name="mobile" value=""  class="form-control"  placeholder="type mobile"  /><br/>

                            <label>Add Telephone:</label>
                            <input type="text" name="telephone" value=""  class="form-control"  placeholder="tpe telephone"  /><br/>

                            <label>Add Email:</label>
                            <input type="text" name="email" value=""  class="form-control" placeholder="type email"  /><br/>
												
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
                                                <th>Id</th>
                                                <th>Office Name</th>
                                                <th>Designation</th>
                                                <th>Mobile</th>
                                                <th>Telephone</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            <tr>
                                                @php $i=0;  @endphp
                                                    @foreach($kmp_unit as $data)
                                                        @php $i=$i+1;  @endphp
                                                <td>{{$i}}</td>
                                                <td>{{$data->office_name}}</td>
                                                <td>{{$data->designation}}</td>
                                                <td>{{$data->mobile}}</td>
                                                <td>{{$data->telephone}}</td>
                                                <td>{{$data->email}}</td>
                                                <td><a href="{{url('admin/kmp_unit_delete',$data->id)}}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a></td>
                                            
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->      
</div>

<!-- Home Content End -->
@endsection