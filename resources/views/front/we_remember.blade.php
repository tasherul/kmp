@extends('front.master')
@section('title','We Remember')


@section('content')
	
	<!-- We Remember Start -->
	<section class="kmp_photo_gallery">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 mb-30">
					<div class="history_tittle">
						<h2 class="white_color">We Remember</h2>
					</div>
				</div>

				@if (isset($remembers[0]))

					@foreach ($remembers as $remember)

						<div class="col-lg-3 mb-30">
							<div class="kmp_remember">
								<a href="{{asset('public/upload/').$remember->remember_person_image}}" data-fancybox="images" data-caption="My caption">
									<img src="{{asset('public/upload/').$remember->remember_person_image}}" alt="" />
								</a>
								<div class="rem_text mt-15">
									<h4>{{$remember->remember_person_name}}</h4>
									<span>{{$remember->reason}}</span>
								</div>
							</div>
						</div>
						
					@endforeach


						<!-- pagination-->
						<div class="ts-pagination text-center mb-20">

							{{$remembers->links()}}
			
						</div>
						<!-- pagination end-->
					
				@else

					No Data Found
					
				@endif

			</div>
		</div>
	</section>
	<!-- We Remember End -->

@endsection