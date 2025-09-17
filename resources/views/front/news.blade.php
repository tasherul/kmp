@extends('front.master')
@section('title','News')


@section('content')

	
	<!-- KMP News Start -->
	<section class="kmp_news_portal">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 mb-30">
					<div class="history_tittle">
						<h2 class="white_color">KMP News:</h2>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="more_news">
						<h3>Recent News:</h3>
						<ul class="news_leftside">
							@foreach ($newss as $news)			
							<li><a href="{{Route('newsSingle', $news->id)}}">{{$news->news_tittle}}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="row">

						@if (isset($newss[0]))

							@foreach ($newss as $news)
								<div class="col-lg-4 mb-30">
									<div class="kmp_news_area">								
										<div class="ts-post-thumb">
											<a href="{{Route('newsSingle', $news->id)}}">
											<img class="img-fluid" src="{{asset('public/upload/').$news->news_image}}" alt="" style="height:180px;" >
											</a>
										</div>
										<div class="post-content">
											<h3 class="post-title">
												<a href="{{Route('newsSingle', $news->id)}}">{{$news->news_tittle}}</a>
											</h3>
											<span class="post-date-info">
												<i class="fa fa-clock-o"></i>
												{{ date ('F d, Y', strtotime($news->created_at))}}
											</span>
										</div>
									</div>
								</div>
							@endforeach

							<div class="ts-pagination text-center mb-20">
								<!-- pagination-->
									{{$newss->links()}}
								<!-- pagination end-->
							</div>

						@else

							No data Found
							
						@endif

					
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- KMP News End -->
@endsection