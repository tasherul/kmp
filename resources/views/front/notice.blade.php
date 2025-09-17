@extends('front.master')
@section('title','Notice')


@section('content')

	<!-- Notice Start -->
	<section class="kmp_notice">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					@include('front.left_side_our_service')
				</div>

				<div class="col-lg-9">
					<div class="history_tittle">
						<h2 class="white_color">Notice Board:</h2>
					</div>


					@if (isset($notices[0]))

						@foreach ($notices as $notice)

						<ul class="caarer_post">
							<li><a href="{{asset('public/upload/').$notice->notice_file}}" target="_blank"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{$notice->notice_tittle}}<span class="float-right"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span></a></li>
						</ul>
							
						@endforeach
						
					
						<!-- pagination-->
						<div class="row justify-content-md-center">

							{{$notices->links()}}
		
						</div>
						<!-- pagination end-->

					@else

						No Data Found
						
					@endif

				</div>
			</div>
		</div>
	</section>
	<!-- Notice End -->

@endsection