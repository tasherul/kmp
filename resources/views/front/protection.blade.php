@extends('front.master')
@section('title','Protection')


@section('content')
	
	<!-- Protection Start -->
	<section class="kmp_protection">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<span class="service_tittle">
						<i class="fa fa-check-square-o" aria-hidden="true"></i>Our Service :
					</span>

					
					@include('front.left_side_our_service')	


				</div>
				<div class="col-lg-9">
					<div class="history_tittle">
						<h2 class="white_color">Protection & Protocol:</h2>
					</div>
					<div>
					<img style="margin-top: 10px;" src="{{asset('public/upload/').$protection->image_service}}">
					</div>
					<div class="victim_support_area mt-15">

						{!! $protection->service_content !!}

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Protection End -->
@endsection