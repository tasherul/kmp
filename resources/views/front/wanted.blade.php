@extends('front.master')
@section('title','Wanted')


@section('content')
	
	<!-- We Remember Start -->
	<section class="kmp_photo_gallery">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 mb-30">
					<div class="history_tittle">
						<h2 class="white_color">Wanted Person</h2>
					</div>
				</div>
				
				@if (isset($wanteds[0]))
					@foreach ($wanteds as $wanted)
						<div class="col-lg-3 mb-30">
							<div class="kmp_remember">
								<a href="{{asset('public/upload/').$wanted->image}}" data-fancybox="images" data-caption="My caption">
									<img src="{{asset('public/upload/').$wanted->image}}" alt="" />
								</a>
								<div class="rem_text mt-15">
									<h4>{{$wanted->name}}</h4>
									<span>{{$wanted->wanted_or_missing_details}}</span>
								</div>
							</div>
						</div>
					@endforeach	
					
					<!-- pagination-->
					<div class="ts-pagination text-center mb-20">

						{{$wanteds->links()}}
	
					</div>
					<!-- pagination end-->

				@else

				No data Found
					
				@endif	

			</div>
		</div>
	</section>
	<!-- We Remember End -->
@endsection