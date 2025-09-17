@extends('front.master')
@section('title','Photo Gallery')


@section('content')
	
	<!-- Photo Gallery Start -->
	<section class="kmp_photo_gallery">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 mb-30">
					<div class="history_tittle">
						<h2 class="white_color">Our Photo Gallery</h2>
					</div>
				</div>



				@if ($photos[0])
				
				@foreach ($photos as $photo)
				<div class="col-lg-3 mb-30">
					<div class="kmp_gallery">
						<a href="#">
							<img src="{{asset('public/upload/').$photo->gallery_image}}" alt="" />
						</a>
						
						<a href="{{asset('public/upload/').$photo->gallery_image}}" class="overylay_2" data-fancybox="gallery" data-caption="{{$photo->image_tittle}}">
							<div class="text"><i class="fa fa-search-plus" aria-hidden="true"></i></div>									
						</a>
					</div>
				</div>
				
				@endforeach	

				<!-- pagination-->
				<div class="row justify-content-md-center">

					{{$photos->links()}}

				</div>
				<!-- pagination end-->

			@else

				No Data Found
				
			@endif
			
		</div>
	</section>
	<!-- Photo Gallery End -->

@endsection