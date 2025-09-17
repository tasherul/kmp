@extends('admin.auth.master')
@section('title','Forgot Password')


@section('content')

    <div class="wrapper-page">
            <div class="card card-pages shadow-none">

                <div class="card-body">
                    <div class="text-center m-t-0 m-b-15">
                            <a href="http://kmp.police.gov.bd" class="logo logo-admin"><img src="{{asset('kmp_dash')}}/image/kmp.png" alt="" height="50"></a>
                    </div>
                    <h5 class="font-18 text-center">Forgot Password</h5>
@include('inc.messages')
                     <form class="form-horizontal m-t-30" action="{{Route('validatePasswordRequest')}}" method="POST">
                        @csrf
                            <div class="col-12">
                                <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                        Enter your <b>Email</b> and instructions will be sent to you!
                                    </div>
                            </div>

                            <div class="form-group">
                                    <div class="col-12">
                                            <label>Email</label>
                                        <input class="form-control" name="email" type="text" required placeholder="Email">
                                    </div>
                                </div>

                        <div class="form-group text-center m-t-20">
                            <div class="col-12">
                                <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Send Email</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    <!-- END wrapper -->
@endsection