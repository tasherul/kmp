<div class="ts-breaking-news clearfix">
						<h2 class="breaking-title float-left">
							<i class="fa fa-bolt"></i> Breaking News :</h2>
						<div class="breaking-news-content owl-carousel float-left" id="breaking_slider">
							
							
								@foreach ($newss as $news)
								<div class="breaking-post-content">
									<p>
										<a class="show-read-more2" href="{{Route('newsSingle', $news->id)}}" target="_blank">{{$news->news_tittle}}</a>
									</p>
								</div>
							@endforeach
							
							
						</div>
					</div>