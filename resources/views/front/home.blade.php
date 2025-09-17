@extends('front.master')
@section('title','Home')


@section('content')







<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 mb-30">
					
					<div class="ts-grid-box ts-grid-content kmp_head">

						<div class="ts-post-thumb">
							<a href="biography">
								<img class="img-fluid" src="{{asset('public/upload/').$homepages->comissoner_image}}" alt="kmp khulna"/>
							</a>
						</div>
						<div class="post-content">
							<h3 class="post-title">
								<a href="{{Route('biography')}}" style="font-size: 17px;">{{$homepages->comissoner_name }}</a>
							</h3>
							<p style="text-align: center;">Police Commissioner</p>
							<span class="message_dig"><a href="{{Route('mesaageComissoner')}}">Message From Commissioner</a></span>
							<span class="message_dig"><a href="{{Route('biography')}}">Biography of Commissioner</a></span>
						</div>
					</div>
					<!-- ts single post item end-->

				</div>
				<div class="col-lg-9 col-md-12 mb-30">
					<div class="slider-wrapper theme-default boot_slider">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                              
                              <div class="carousel-inner">
                                   
                               
 @if(isset($sliders[0]))

@php $i=1 @endphp

							@foreach ($sliders as $slider)
 
                                  <div class="carousel-item {{$i==1 ?'active':'' }}">
                                  <img class="d-block w-100" src="{{asset('public/upload/').$slider->slider_image}}"  alt="kmp" /> 
                                  <div class="carousel-caption">
								    <p>{{$slider->titel_image}}</p>
								  </div>
                                </div>

@php $i=$i+1 @endphp
@endforeach
		@else

								<img class="d-block w-100" src="{{asset('kmp')}}/images/no-image-available.png" data-thumb="kmp" alt="kmp" /> 
								
							@endif 

	                              </div>


                              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>

					</div>
					<!-- Featured owl carousel end-->
				</div>



				<div class="col-lg-9">
					<!-- Service With Image -->
					<div class="post-list-item mb-30" style="padding: 20px 0px;">
						<div class="row">
							<div class="col-md-3 mb-30">
							<a href="{{Route('moneyEscort')}}" class="service_new_part">
								<img src="{{asset('kmp/images/money.jpg')}}">
								<span class="service_new">Money Escort</span>
							</a>
						</div>
						<div class="col-md-3 mb-30">
							<a href="{{Route('victimSupport')}}" class="service_new_part">
								<img src="{{asset('kmp/images/victim.jpg')}}">
								<span class="service_new">Victim Support</span>
							</a>
						</div>
						<div class="col-md-3 mb-30">
							<a href="http://pcc.police.gov.bd:8080/ords/f?p=500:1::::::" class="service_new_part">
								<img src="{{asset('kmp/images/kmp-new.png')}}">
								<span class="service_new">Online Police Clearance </span>
							</a>
						</div>
						<div class="col-md-3 mb-30">
							<a href="{{Route('comunityPolicing')}}" class="service_new_part">
								<img src="{{asset('kmp/images/community.jpg')}}">
								<span class="service_new">Community Policing</span>
							</a>
						</div>
						<div class="col-md-3 mb-30">
							<a href="{{Route('beat_polising')}}" class="service_new_part">
								<img src="{{asset('kmp/images/activities.jpg')}}">
								<span class="service_new">Beat Policing</span>
							</a>
						</div>
						<div class="col-md-3 mb-30">
							<a href="{{Route('policeVerification')}}" class="service_new_part">
								<img src="{{asset('kmp/images/kmp-new.png')}}">
								<span class="service_new">Police Verification</span>
							</a>
						</div>
						<div class="col-md-3">
							<a href="{{Route('protection')}}" class="service_new_part">
								<img src="{{asset('kmp/images/protection.jpg')}}">
								<span class="service_new">Protection & Protocol</span>
							</a>
						</div>
						<div class="col-md-3">
							<a href="{{Route('traffic')}}" class="service_new_part">
								<img src="{{asset('kmp/images/traffic.jpg')}}">
								<span class="service_new">Traffic Management</span>
							</a>
						</div>
						
						</div>
					</div>
				</div>
	
				<!-- col end-->
		<div class="col-lg-3">
			<div class="new_mewnu">
				<ul>
					@foreach($right_menu as $key)
					<li><a href="{{$key->link}}" target="_blank"><img src="{{asset('public/upload/').$key->icon}}" alt="" width="70px" height="70px" style="border-radius: 60%;"/> {{$key->name}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="col-lg-3">
					<!-- <span class="service_tittle">
						<i class="fa fa-check-square-o" aria-hidden="true"></i>Our Service :
					</span>
					<ul class="service_area mb-30">
						<li>
							<a href="comunity_policing.html">Community Policing</a>
						</li>
						<li>
							<a href="http://pcc.police.gov.bd:8080/ords/f?p=500:1::::::">Online Police Clearance</a>
						</li>
						<li>
							<a href="police_activities.html">Police Activities</a>
						</li>
						<li>
							<a href="money_escort.html">Money Escort</a>
						</li>
						<li>
							<a href="police_verification.html">Police Verification</a>
						</li>
						<li>
							<a href="protection.html">Protection & Protocol</a>
						</li>
						<li>
							<a href="victim_support.html">Victim Support</a>
						</li>
						<li>
							<a href="trafic.html">Traffic Management</a>
						</li>
						<li>
							<a href="info_desk.html">Info Desk</a>
						</li>
					</ul>
					-->
					
						<span class="service_tittle">
						<i class="fa fa-bell-o" aria-hidden="true"></i>Notice :
					</span>
					<ul class="notice_area mb-30">

						<marquee style="font-family: Book Antiqua; color: #FFFFFF" direction="down" height="350" behavior="alternate" scrolldelay="200" onmouseover="this.stop();" onmouseout="this.start(); ">
							@if (isset($notices[0]))
							@foreach ($notices as $notice)
							<li><a href="{{asset('public/upload/').$notice->notice_file}}">{{ $notice->notice_tittle}}</a></li>
							@endforeach
							
							@else

							No Data Found
							
							@endif
						</marquee>
						<!-- View Button -->
						<div class="view_all">
							<a href="{{Route('notice')}}">View All</a>
						</div>
					</ul>
					
					
				
					<div class="ts-grid-box widgets ">
							<h2 class="ts-title">Wanted Person</h2>
							<div class="wanted_slider owl-carousel">
							@foreach ($wanteds as $wanted)
								<div class="item">
										<a href="{{asset('public/upload/').$wanted->image}}" data-fancybox="images" data-caption="My caption">
										
											<img src="{{asset('public/upload/').$wanted->image}}" alt="" />
										</a>
								
								</div>
									@endforeach
						</div>
						<!-- View Button -->
						<div class="view_all">
							<a href="{{Route('wanted')}}">View All</a>
						</div>
					</div>
					<div class="ts-grid-box widgets ">
						<h2 class="ts-title">KMP Police Stations</h2>
						@include('front.laft_side_range_unit')
						
					</div>
				</div>
		
				<div class="col-lg-6">
					<div class="post-list-item mb-30">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation">
								<a class="active" href="#home" aria-controls="home" role="tab" data-toggle="tab">
									
									History
								</a>
							</li>
							<li role="presentation">
								<a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
									
									Our Mission
								</a>
							</li>
							<li role="presentation">
								<a href="#history" aria-controls="history" role="tab" data-toggle="tab">
									
									Our Vision
								</a>
							</li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active ts-grid-box post-tab-list" id="home">
								
								
								<p class="show-read-more">{{$homepages->kmp_history}}</p>
							</div>
							<!--ts-grid-box end -->

							<div role="tabpanel" class="tab-pane fade ts-grid-box post-tab-list" id="profile">
								<p>{{$homepages->kmp_mission}}</p>							
							</div>
							<!--ts-grid-box end -->
							<div role="tabpanel" class="tab-pane fade ts-grid-box post-tab-list" id="history">
								<p>{{$homepages->kmp_vision}}</p>							
							</div>
						</div>
						<!-- tab content end-->
					</div>
					<!-- post-list-item end-->
					
					<div class="ts-grid-box most-populer-item " id="kmp_news">
						<h2 class="ts-title">KMP News</h2>

						@if (isset($newss[0]))

						<div class="kmp_news owl-carousel">
							<!-- Grid --->
							@foreach ($newss as $news)
							
							<div class="item kmp_news_area">
								
								<div class="ts-post-thumb">
									<a href="{{Route('newsSingle', $news->id)}}">
										<img class="img-fluid" src="{{asset('public/upload/').$news->news_image}}" alt="" style="height:150px;">
									</a>
								</div>
								<div class="post-content">
									<h3 class="post-title">
										<a class="show-read-more2" href="{{Route('newsSingle', $news->id)}}">{{$news->news_tittle}}</a>
									</h3>
									<span class="post-date-info">
										<i class="fa fa-clock-o"></i>
										{{ date('F d, Y', strtotime($news->created_at))}}
									</span>
								</div>
							</div>
							@endforeach
							<!-- ts-grid-box end-->
							
						</div>
						<!-- View Button -->
						<div class="view_all">

							<a href="{{Route('news')}}">View All</a>

						</div>
						<!-- most-populers end-->
							
						@else

						No Data Found
							
						@endif

					</div>
					
					<!-- Our Photo -->
					<div class="ts-grid-box most-populer-item" id="kmp-image-slider">
						<h2 class="ts-title">Our Photo</h2>

						@if (isset($photos[0]))

						<div class="kmp-image-slider owl-carousel">

							@foreach ($photos as $photos)
							<div class="item">
								<a href="#">
									<img src="{{asset('public/upload/').$photos->gallery_image}}" alt="kmp" />
								</a>
								<a href="{{asset('public/upload/').$photos->gallery_image}}" class="overlay" data-fancybox="gallery" data-caption="{{$photos->image_tittle}}">
									<div class="text"><i class="fa fa-search-plus" aria-hidden="true"></i></div>									
								 </a>
							</div>
							@endforeach

						</div>
						
						<!-- View Button -->
						<div class="view_all">
						<a href="{{Route('photoGallery')}}">View All</a>
						</div>
							
						@else

							No Data Found
	
						@endif

					</div>
					
					<!-- Our Video -->
					<div class="ts-grid-box most-populer-item" id="video_slider">
						<h2 class="ts-title">Our Video</h2>

						@if(isset($videos[0]))

						<div class="video_slider owl-carousel  owl-theme">

							@foreach ($videos as $video)
							<div class="item">
								<a data-fancybox href="{{$video->video_link}}">
									<span class="kmp_video_ico">
										<img src="{{asset('public/upload/').$video->video_thumbnail}}" height="150px" alt="" />
										<i class="fa fa-play" aria-hidden="true"></i>
									</span>
								</a>				
							</div>

							@endforeach
							<!-- ts-grid-box end-->
						</div>
						<!-- View Button -->
						<div class="view_all">
							<a href="{{Route('videoGallery')}}">View All</a>
						</div>

						@else

							No Data Found
	
						@endif

					</div>

					
					<!-- Map -->
					
				<!-- col end -->
				

					</div>


					<div class="col-lg-3">
						<div class="ts-grid-box widgets">
							<h2 class="ts-title">Follow us</h2>
							<ul class="ts-social-list">
								<li class="ts-facebook">
									<a href="https://www.facebook.com/kmpkhulna/">
										<i class="fa fa-facebook"></i>
									</a>
									<b>12.5 k </b>
									<span>Likes</span>
								</li>

								<li class="ts-twitter">
									<a href="#">
										<i class="fa fa-twitter"></i>
									</a>
									<b>12.5 k </b>
									<span>Follwers</span>
								</li>


								<li class="ts-youtube">
									<a href="#">
										<i class="fa fa-youtube"></i>
									</a>
									<b>12.5 k </b>
									<span>Follwers</span>
								</li>
							</ul>
						</div>
					
						<div class="ts-grid-box widgets ">
							<h2 class="ts-title">Missing Person</h2>

							@if (isset($missings[0]))
								
							<div class="wanted_slider owl-carousel">

								@foreach ($missings as $missing)
									<div class="item">	
										<a href="{{asset('public/upload/').$missing->image}}" data-fancybox="images" data-caption="My caption">
											<img src="{{asset('public/upload/').$missing->image}}" alt="" />
										</a>
									</div>
								@endforeach

								<!-- ts-grid-box end-->

							</div>

							<!-- View Button -->
							<div class="view_all">
								<a href="{{Route('missing')}}">View All</a>
							</div>

						@else

						No Data Found
							
						@endif
							
					</div>

					
					<div class="ts-grid-box widgets ">
							<h2 class="ts-title">We Remember</h2>

							@if (isset($remembers[0]))
								
							
							<div class="remembar_slider owl-carousel">

								@foreach ($remembers as $remember)
									<div class="item">	
										<a href="{{asset('public/upload/').$remember->remember_person_image}}" data-fancybox="images" data-caption="My caption">
											<img src="{{asset('public/upload/').$remember->remember_person_image}}" alt="" />
										</a>
										<div class="rem_text mt-15">
											<h4> {{$remember->remember_person_name}}</h4>
											<span>{{$remember->reason}} </span>
										</div>
									</div>
								@endforeach
							</div>

							<!-- View Button -->
							<div class="view_all">
								<a href="{{Route('weRemember')}}">View All</a>
							</div>

							@else


							No Data Found
								
							@endif
							
						</div>
						<div class="ts-grid-box widgets ">
							<h2 class="ts-title">Page Visitor</h2>
							<div class="page_visitor">
								<table class="page_vistit_table">
								  <tr>
									<th>Overview</th>
									<th>Visit</th>
								  </tr>
								  <tr>
									<td>All</td>
									<td> {{$count}}</td>
								  </tr>
								  
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- row end-->
		</div>
		<!-- container end-->
	</section>
	<!-- block area end-->

	
	
@endsection
