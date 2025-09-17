@extends('admin.auth.master')
@section('title','Login')


@section('content')

<div class="wrapper-page">
    <div class="card card-pages shadow-none">

        <div class="card-body">
            <div class="text-center m-t-0 m-b-15">
            <a href="{{Route('home')}}" class="logo logo-admin"><img src="{{asset('kmp_dash')}}/image/kmp.png" alt="" height="50"></a>
            </div>
            <h5 class="font-18 text-center">Sign in to continue</h5>
           
            @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
            @endif

        <form class="form-horizontal m-t-30" action="{{route('adminPostLogin')}}" method="POST">
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
                        <input class="form-control" name="password" type="password" required="" placeholder="Password">
                    </div>
                </div>

             <!--   <div class="form-group">
                    <div class="col-12">
                        <div class="checkbox checkbox-primary">
                                <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1"> Remember me</label>
                                      </div>
                        </div>
                    </div>
                </div>-->

                <div class="form-group text-center m-t-20">
                    <div class="col-12">
                        <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>

               <div class="form-group row m-t-30 m-b-0">
                <!--     <div class="col-sm-7">
                       <!-- <a href="{{Route('forgotPassword')}}" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                         </div>-->
                   
                </div>
           
            </form>
        </div>

    </div>
</div>

@endsection