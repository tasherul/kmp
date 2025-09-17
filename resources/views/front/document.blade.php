@extends('front.master')
@section('title','Document')

@section('content')

	<!-- Document Section Start -->
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
							<div class="history_tittle">
								<h2 class="white_color">Document</h2>
							</div>
		
		
							@if (isset($documents[0]))
		
								@foreach ($documents as $document)
		
								<ul class="caarer_post">
									<li><a href="{{asset('public/upload/').$document->document_pdf_doc}}" target="_blank"> {{$document->document_tittle}}<span class="float-right"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span></a></li>
								</ul>
									
								@endforeach
								
							
								<!-- pagination-->
								<div class="row justify-content-md-center">
		
									{{$documents->links()}}
				
								</div>
								<!-- pagination end-->
		
							@else
		
								No Data Found
								
							@endif
		
						</div>
					</div>
				</div>
	</section>
	<!-- Document Section End -->
@endsection