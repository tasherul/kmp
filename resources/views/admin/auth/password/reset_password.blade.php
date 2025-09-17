@extends('admin.auth.master')
@section('title','Reset password')


@section('content')

<div class="wrapper-page">
    <div class="card card-pages shadow-none">

        <div class="card-body">
            <div class="text-center m-t-0 m-b-15">
            <a href="http://kmp.police.gov.bd" class="logo logo-admin"><img src="{{asset('kmp_dash')}}/image/kmp.png" alt="" height="50"></a>
            </div>
            <h5 class="font-18 text-center"> Reset password to continue</h5>
           
            @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
            @endif

        <form class="form-horizontal m-t-30" action="{{Route('resetPassword')}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="col-12">
                            <label>Email</label>
                        <input class="form-control" name="email" type="text" required="" placeholder="Username">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-12">
                            <label>Password</label>
                        <input class="form-control" name="password" id="password" type="password" required="" placeholder="Password"  min="8" >
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-12">
                            <label>Confirm Password</label>
                        <input class="form-control" name="" id="confirm_password" type="password" required="" placeholder="Confirm Password"  min="8" >
                    </div>
                </div>


                <div class="form-group text-center m-t-20">
                    <div class="col-12">
                        <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Update Password</button>
                    </div>
                </div>
           
            </form>
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