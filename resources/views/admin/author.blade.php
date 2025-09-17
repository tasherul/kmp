@extends('admin.master')
@section('title','Author')


@section('content')

<div class="row">

    <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Autho Profile</h4>
                    <p class="sub-title">From here add remember person.</p>

                     <form class="" action="{{route('authorUpdate')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name"   value="{{$author_data->name}}" class="form-control" required placeholder="Type something"/><br/>
                            <label>Email</label>
                        <input type="text" class="form-control" value="{{$author_data->email}}" disabled placeholder="Type something"/><br/>
                            
                            <p class="sub-title">Upload image.</p>
                            <div class="m-b-30">
                                <input name="user_image" type="file" multiple="multiple"  value="{{$author_data->user_image}}">
                                <img src="{{asset('public/upload/'). $author_data->user_image}}" alt="user" width="70px" height="70px"/>
                      
                               
                            </div>

                            <input type="hidden" value="{{$author_data->id}}" name="edit_id">


                        </div>

                        

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Update
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
    
    <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Change Password</h4>
                    <p class="sub-title">From here change password</p>

                    <form class="" action="{{route('changePassword')}}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="text"  name="old_pass" class="form-control" required placeholder="Type something"><br/>
                            <label>New Password</label>
                            <input type="text" id="password" name="new_pass" class="form-control" required placeholder="Password"  min="8"><br/>
                            <label>Confirm Password</label>
                            <input type="text" id="confirm_password" name="new_pass_confirm" class="form-control" required placeholder="Confirm Password"  min="8" /><br/>
                            
                        </div>

                        
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Update
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
    </div>


<script type="text/javascript" >

var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>


@endsection