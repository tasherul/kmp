@extends('front.master')
@section('title','Money Escort')


@section('content')

	
	<!-- Money Escort Start -->
	<section class="money_escort">
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
						<h2 class="white_color">Money Escort:</h2>
					</div>
					<div>
					<img style="margin-top: 10px;" src="{{asset('public/upload/').$money_escort->image_service}}">
					</div>
					<div class="money_escort_area mt-15">

						{!! $money_escort->service_content !!}
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Money Escort End -->
	
@endsection