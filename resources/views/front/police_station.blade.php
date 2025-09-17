@extends('front.master')
@section('title','Police Station')


@section('content')

	<!-- Emergency Contact Start -->
	<section class="police_station mb-30">
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
						<h2 class="white_color">Police Station</h2>
					</div>
					<div class="ts-grid-box widgets ">
						
						<ul class="range_units">
							<li>
								<a href="{{Route('rangeUnits', 'khulna Sadar')}}">Khulna Sadar Thana</a>
							</li>
							<li>
								<a href="{{Route('rangeUnits', 'sonadangha')}}">Sonadangha Than</a>
							</li>
							<li>
								<a href="{{Route('rangeUnits', 'khalishpur')}}">Khalishpur Thana</a>
							</li>
							<li>
								<a href="{{Route('rangeUnits', 'daulatpur')}}">Daulatpur Thana</a>
							</li>	
							<li>
								<a href="{{Route('rangeUnits', 'khanjahan ali')}}">Khanjahan Ali Thana</a>
							</li>
							<li>
								<a href="{{Route('rangeUnits', 'labanchora')}}">Labanchora Thana</a>
							</li>
							<li>
								<a href="{{Route('rangeUnits', 'horintana')}}">Horintana Thana</a>
							</li>
							<li>
								<a href="{{Route('rangeUnits', 'aranghata')}}">Aranghata Thana</a>
							</li>
						</ul>	
						
					</div>										
				</div>
			</div>
		</div>
	</section>
	<!-- Emergency Contact End -->

@endsection