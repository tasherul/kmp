@extends('front.master')
@section('title','Ranks')


@section('content')
	<!-- Ranks Section Start -->
	<section class="kmp_ranks">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<span class="service_tittle">
						<i class="fa fa-check-square-o" aria-hidden="true"></i>Our Service :
					</span>
					
						@include('front.left_side_our_service')

					<div class="ts-grid-box widgets ">
						<h2 class="ts-title">Range Units</h2>

						@include('front.laft_side_range_unit')
						
					</div>
				</div>
				<div class="col-lg-9 mb-15">
					<div class="history_tittle">
						<h2 class="white_color">Ranks System</h2>
					</div>

					@if (isset($ranks))
						
					
					<!-- KMP Ranks Area -->
					<div class="ranks_area">
						<img src="{{asset('kmp')}}/images/rank_banner.png" alt="kmp"/>
						<p>{{$ranks->rank_content}}</p>
						<div class="range_staff_tittle">
							<h3>Ranks Sytem Information:</h3>
						</div>
					<img src="{{asset('public/upload/').$ranks->ranks_system_image}}" alt="kmp"/>
					</div>

					@else

					No Data Found
						
					@endif
				</div>
			</div>
		</div>
	</section>
	<!--Ranks Section End -->

	
@endsection