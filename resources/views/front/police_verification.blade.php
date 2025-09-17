@extends('front.master')
@section('title','Police Verification')


@section('content')
	
	<!-- Verification Start -->
	<section class="kmp_verification">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<span class="service_tittle">
						<i class="fa fa-check-square-o" aria-hidden="true"></i>Our Service :
					</span>

					@include('front.left_side_our_service')	

					</ul>
				</div>
				<div class="col-lg-9">
					<div class="history_tittle">
						<h2 class="white_color">Police Verification:</h2>
					</div>
					<div>
					<img style="margin-top: 10px;" src="{{asset('public/upload/').$police_verification->image_service}}">
					</div>
					<div class="victim_support_area mt-15">

						{!! $police_verification->service_content !!}
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Verification End -->
@endsection