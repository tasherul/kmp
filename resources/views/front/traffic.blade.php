@extends('front.master')
@section('title','Trafic')


@section('content')

	
	<!-- Traffic Start -->
	<section class="kmp_traffic">
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
						<h2 class="white_color">Traffic Management:</h2>
					</div>
					<div>
					<img style="margin-top: 10px;" src="{{asset('public/upload/').$traffic->image_service}}">
					</div>
					<div class="victim_support_area mt-15">

						{!! $traffic->service_content !!}

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Traffic End -->

@endsection