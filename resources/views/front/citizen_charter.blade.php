@extends('front.master')
@section('title','Citizen Charter')


@section('content')
	
	
	<!-- Citizen Charter Start -->
	<section class="kmp_citizen mb-30">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<span class="service_tittle">
						<i class="fa fa-check-square-o" aria-hidden="true"></i>Our Service :
					</span>
					@include('front.left_side_our_service')
				</div>
				<div class="col-lg-9">
					<div class="citizen_area">
						<div class="history_tittle">
							<h2 class="white_color">Citizen Charter</h2>
						</div>

						@if (isset($citizen_charter))

							<embed  src="https://docs.google.com/viewerng/viewer?embedded=true&url={{asset('public/upload/').$citizen_charter->citizen_charter_image}}"  width="100%" height="700px" />
						
						@else
							No data Found
						@endif

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Citizen Charter End -->

@endsection