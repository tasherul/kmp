@extends('front.master')
@section('title','Ornogram')


@section('content')	
	<!-- Ornogram Start -->
	<section class="ornogram">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="history_tittle">
							<h2 class="white_color">Organogram</h2>
						</div>
					<div class="ornogram_area">

						@if (isset($ornogram))

							<img src="{{asset('public/upload/').$ornogram->ornogram_image}}"/>
						
						@else
							No data Found
						@endif

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Ornogram End -->

@endsection