@extends('admin.master')
@section('title','Dashboard')


@section('content')

<!-- Home Content Start -->
<div class="home_content">
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    
                    <div>
                        <h5 class="font-16">Total News Post</h5>
                    </div>
                    <h3 class="mt-4">{{$news}}</h3>
                    
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    
                    <div>
                        <h5 class="font-16">Total Notice Post</h5>
                    </div>
                    <h3 class="mt-4">{{$notice}}</h3>
                    
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    
                    <div>
                        <h5 class="font-16">Total Photo Upload</h5>
                    </div>
                    <h3 class="mt-4">{{$photo}}</h3>
                    
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">                                   
                    <div>
                        <h5 class="font-16">Total Video Upload</h5>
                    </div>
                    <h3 class="mt-4">{{$video}}</h3>
                    
                </div>
            </div>
        </div>
        <!--<div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">                                   
                    <div>
                        <h5 class="font-16">Total Job Post</h5>
                    </div>
                    <h3 class="mt-4">76</h3>
                    
                </div>
            </div>
        </div>-->

    </div>      
</div> 
 <!-- Home Content End -->  
@endsection