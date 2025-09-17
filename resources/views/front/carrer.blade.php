@extends('front.master')
@section('title','Carrer')


@section('content')

	<!-- Carrer Section Start -->
	<section class="mb-30">
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
						<h2 class="white_color">Current Openings</h2>
					</div>

					@if (isset($carrers[0]))

						@foreach ($carrers as $carrer)

							<ul class="caarer_post">
								<li><a href="{{asset('public/upload/').$carrer->carrer_pdf_doc}}" target="_blank" ><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{$carrer->carrer_title}}</a></li>
							</ul>
							
						@endforeach

							<!-- pagination-->
							<div class="ts-pagination text-center mb-20">

								{{$carrers->links()}}

							</div>
							<!-- pagination end-->
						
					@else

						No data Found

					@endif
					
	
				</div>
			</div>
		</div>
	</section>
	<!-- Carrer Section End -->	
@endsection