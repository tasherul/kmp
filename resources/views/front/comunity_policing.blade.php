@extends('front.master')
@section('title','Comunity Policing')


@section('content')
	
	<!-- Comunity Policing Start -->
	<section class="kmp_comunity">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<span class="service_tittle">
						<i class="fa fa-check-square-o" aria-hidden="true"></i>Our Service :
					</span>
							
					@include('front.left_side_our_service')

				</div>

				<div class="col-lg-9">
					<div class="kpm_policing">
						<div class="history_tittle">
							<h2 class="white_color">Community Policing</h2>
						</div>
						<div>
					<img style="margin-top: 10px;" src="{{asset('public/upload/').$comunitypolicing->image_service}}">
					</div>
						<div class="range_staff_tittle mt-15">
							<h3>Conceptual Frame-work:</h3>
						</div>
							<p>{{ $comunitypolicing->conceptual_frame_work }}</p>
						<div class="range_staff_tittle mt-15">
							<h3>Community policing consists of three key components:</h3>
						</div>
						<p> {{ $comunitypolicing->community_policing_consists }}</p>
						<div class="range_staff_tittle mt-15">
							<h3>Bangladesh perspective:</h3>
						</div>
						<p>  {{ $comunitypolicing->bangladesh_perspective }} </p>
						<div class="range_staff_tittle mt-15">
							<h3>Community Policing:</h3>
						</div>
						<p> {{ $comunitypolicing->community_policing }} </p></div>
				</div>
			</div>
		</div>
	</section>
	<!-- Comunity Policing End -->

@endsection