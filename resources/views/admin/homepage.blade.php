@extends('admin.master')
@section('title','Home')


@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Home Content Start -->
<div class="home_content">
    <div class="d-flex justify-content-end" >  
        <i class="fas fa-edit remove" style="font-size: 30px;" onMouseOver="this.style.color='#333'" onMouseOut="this.style.color='Red'"></i>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-6"> 
            <!-- Emergency Area -->
            <div class="card m-b-30">
                <div class="card-body">       
                    <h4 class="mt-0 header-title">Add Emergency Helpline</h4>
                    <p class="sub-title">This emergency helpline are show on footrt.</p>

                    <form class="kmp_emergency" action="{{ Route('homepageUpdate')}}"  method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Emergency Tittle With Number:</label>
                            <input type="text" name="emergency_tittle" value="{{$homepage->emergency_tittle}}" class="form-control" required placeholder="Emergency Helpline : 999 And KMP Control Room : 01769690516"  />
                        </div>       									 
                        <div class="form-group">
                            <div>
                                <button type="submit" name="emergency"  class="btn btn-primary waves-effect waves-light">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div> 
            <!-- Logo Area -->
            <div class="card m-b-30">
                <div class="card-body">
                <form class="kmp_emergency" action="{{ Route('homepageUpdate')}}"  method="POST" enctype="multipart/form-data" >
                    @csrf
                        <h4 class="mt-0 header-title">Logo Area</h4>
                        <p class="sub-title">Upload logo and control from here.</p>

                        <div class="m-b-30">
                            <div class="form-group">
                                <input name="logo_upload" type="file" value="{{$homepage->logo_upload}}" >
                                <img src="{{asset('public/upload/'). $homepage->logo_upload}}" alt="user" width="70px" height="70px"/>
                             </div>
                        </div>
                        

                       <!-- <p class="sub-title">Upload logo background image.</p>

                        <div class="m-b-30">
                            <div class="form-group">
                                <input name="logo_background_image" type="file" value="{{$homepage->logo_background_image}}" disabled>
                            </div>           
                        </div>-->

                        <div class="m-t-15">
                            <div class="form-group">
                                <button type="submit" name="logo_submit" class="btn btn-primary waves-effect waves-light" >
                                    Update Logo
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!-- History, Misson And Vision -->
            <div class="card m-b-30">
                <div class="card-body">       
                    <h4 class="mt-0 header-title">Add KMP History, Misson And Vision</h4>
                    <p class="sub-title">This history,mission and vison are show on homepage</p>

                    <form class="kmp_emergency"   action="{{ Route('homepageUpdate')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Add KMP History:</label>
                            <textarea id="textarea"  name="kmp_history"  class="form-control" rows="6" placeholder="Add KMP history here..." >{{$homepage->kmp_history}}</textarea><br/>
                            <label>Add KMP Mission:</label>
                            <textarea id="textarea" name="kmp_mission"  class="form-control" rows="6" placeholder="Add KMP mission here..." >{{$homepage->kmp_mission}}</textarea><br/>
                            <label>Add KMP Vision:</label>
                            <textarea id="textarea"  name="kmp_vision"  class="form-control" rows="6" placeholder="Add KMP vision here..." >{{$homepage->kmp_vision}}</textarea>
                        </div>       									 
                        <div class="form-group">
                            <div>
                                <button type="submit" name="kmp_history_misson" class="btn btn-primary waves-effect waves-light">
                                    Update
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

                    <h4 class="mt-0 header-title">Add Social Media Link</h4>
                    <p class="sub-title">This social media link are show on every page and also footer.</p>

                    <form class="kmp_emergency"  action="{{ Route('homepageUpdate')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Facbook Link:</label>
                            <input type="text" name="facebook_link" value="{{$homepage->facebook_link}}" class="form-control" required placeholder="www.facebook.com/kmp" /><br/>
                            <label>Twitter Link:</label>
                            <input type="text" name="twitter_link"  value="{{$homepage->twitter_link}}" class="form-control" required placeholder="www.twitter.com/kmp" /><br/>
                            <label>Youtube Link:</label>
                            <input type="text"  name="youtube_link" value="{{$homepage->youtube_link}}" class="form-control" required placeholder="www.youtube.com/kmp" />
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" name="social_media" class="btn btn-primary waves-effect waves-light" >
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- Comissoner Area -->
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Add Comissoner</h4>
                    <p class="sub-title">This comissoner image, biography, messege from PC are show on homepage. </p>
                    <form class="kmp_emergency" action="{{Route('homepageUpdate')}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Add Comissoner Name</label>
                            <input type="text" class="form-control" name="comissoner_name" value="{{$homepage->comissoner_name}}" required placeholder="Comissoner Name" /><br/>
                            <label>Upload comissoner image.</label>

                            <div class="m-b-30">
                                <input name="comissoner_image" type="file" value="{{$homepage->comissoner_image}}" >
                                <img src="{{asset('public/upload/'). $homepage->comissoner_image}}" alt="user" width="70px" height="70px"/>
                            </div>
                            <label>Biography Of Comissoner:</label>
                            <textarea id="textarea" class="form-control" name="biography_of_comissoner" rows="6" placeholder="Write news description here..." > {{$homepage->biography_of_comissoner}}</textarea><br/>
                            <label>Message From Comissoner:</label>
                            <textarea id="textarea" class="form-control" name="message_from_comissoner" rows="6" placeholder="Write news description here..." > {{$homepage->message_from_comissoner}}</textarea>
                        </div>       									 
                        <div class="form-group">
                            <div>
                                <button type="submit" name="comissoner" class="btn btn-primary waves-effect waves-light" >
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                    

                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- Home Content End -->
<script type="text/javascript">
    //Remove Disable
            $('.remove').click(function() {
                $('input,textarea,button').each(function() {
                    if ($(this).attr('')) {
                        $(this).removeAttr('');
                    }
                    else {
                        $(this).attr({
                            '': ''
                        });
                    }
                });
            });
    </script>
@endsection


    