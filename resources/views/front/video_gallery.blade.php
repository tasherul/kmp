@extends('front.master')
@section('title','Video Gallery')


@section('content')
	
	<!-- Video Gallery Start -->
	<section class="kmp_video_gallery">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 mb-30">
					<div class="history_tittle">
						<h2 class="white_color">Our Video Gallery</h2>
					</div>
				</div>
				@if(isset($videos[0]))

				@foreach ($videos as $video)

					<div class="col-lg-3 mb-30">
						<a data-fancybox href="{{$video->video_link}}">
							<span class="kmp_video_ico">
								<img src="{{asset('public/upload/').$video->video_thumbnail}}" height="200px" alt="" />
								<i class="fa fa-play" aria-hidden="true"></i>
							</span>
						</a>			
					</div>

				@endforeach

				

			</div>
			<!-- pagination-->
			<div class="ts-pagination text-center mb-20">

					{{$videos->links()}}

				</div>
				<!-- pagination end-->


				@else

					No Data Found

				@endif
		</div>
	</section>
	<!-- Video Gallery End -->
@endsection