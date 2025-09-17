@extends('front.master')
@section('title','News')


@section('content')

	
	<!-- KMP Single News Start -->
	<section class="kmp_news_portal">
		<div class="container">
			<div class="row">
				
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
					<div class="news_single_area">
						<div class="news_headline">
						<h3>{{$single_news->news_tittle}}</h3>
							<span>Posted By: Admin, At <i class="fa fa-clock-o" aria-hidden="true"></i> {{ date ('H:i', strtotime($single_news->created_at))}} <i class="fa fa-calendar" aria-hidden="true"></i> {{ date ('F d, Y', strtotime($single_news->created_at))}}</span>
						</div>
						<img src="{{asset('public/upload/').$single_news->news_image}}" alt="kmp"/>
						<p>{{$single_news->news_description}}</p>
				<!--		<div class="share_news">
							<span>Share This News On Your Social Field:</span>
							<ul class="top-social">
								<li>
									<a href="#">
										<i class="fa fa-twitter"></i>
									</a>
									<a href="https://www.facebook.com/kmpkhulna/">
										<i class="fa fa-facebook"></i>
									</a>
									<a href="https://www.youtube.com/channel/UCzzohswcgmQ6eeDyKGAhAjw/featured">
										<i class="fa fa-youtube"></i>
									</a>							
								</li>							
							</ul>
						</div>-->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- KMP News End -->
	
	@endsection