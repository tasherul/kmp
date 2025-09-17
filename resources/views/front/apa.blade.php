@extends('front.master')
@section('title','APA')


@section('content')

	<!-- APA Section Start -->
	<section class="kmp_apa mb-30">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<span class="service_tittle">
						<i class="fa fa-check-square-o" aria-hidden="true"></i>Our Service :
					</span>
						@include('front.left_side_our_service')
				</div>
				<div class="col-lg-9">
					<div class="kmp_apa_area">
						<div class="history_tittle">
							<h2 class="white_color">APA</h2>
						</div>
						<div class="apa_list">
							<ul>
								@if (isset($apas[0]))

									@foreach ($apas as $apa)

										<li><a href="{{asset('public/upload/').$apa->APA_pdf_doc}}" target="_blank"> {{$apa->APA_tittle}}</a></li>
								
									@endforeach
																
								@else

									No Data Found
									
								@endif

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- APA Section End -->

@endsection