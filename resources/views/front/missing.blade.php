@extends('front.master')
@section('title','Missing')


@section('content')
	<!-- Missing Start -->
	<section class="kmp_missing">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 mb-30">
					<div class="history_tittle">
						<h2 class="white_color">Missing Person</h2>
					</div>
				</div>

				@if (isset($missings[0]))
					@foreach ($missings as $missing)

					<div class="col-lg-3 mb-30">
						<div class="kmp_missing_area">
							<a href="{{asset('public/upload/').$missing->image}}" data-fancybox="images" data-caption="My caption">
								<img src="{{asset('public/upload/').$missing->image}}" alt="" />
							</a>
							<div class="missing_information mt-15">
								<ul>
									<li><strong>Name: {{$missing->name}}</strong></li>
									<li>Details: {{$missing->wanted_or_missing_details}}</li>
									
								</ul>
							</div>
						</div>
					</div>
					
					@endforeach

					<!-- pagination-->
					<div class="ts-pagination text-center mb-20">

						{{$missings->links()}}
	
					</div>
					<!-- pagination end-->

				@else

				No data Found
					
				@endif
	
			</div>
		</div>
	</section>
	<!-- Missing End -->
	
@endsection