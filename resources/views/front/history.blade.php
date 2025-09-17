@extends('front.master')
@section('title','History')


@section('content')
	<!-- History -->
	<section class="kmp_history">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<span class="service_tittle">
						<i class="fa fa-check-square-o" aria-hidden="true"></i>Our Service :
					</span>

					@include('front.left_side_our_service')
					
					<div class="ts-grid-box widgets ">
						<h2 class="ts-title">Range Units</h2>

							@include('front.laft_side_range_unit')
						
					</div>
				</div>
				<div class="col-lg-9">
					<div class="kmp_history_area">
						<div class="history_tittle">
							<h2 class="white_color">Our History</h2>
						</div>
						<p style="text-align:justify;">{{$homepages->kmp_history}}</p>
						<div class="history_tittle">
							<h3 class="white_color">KMP Unit History</h3>
						</div>
						<div class="kmp_range_history">
							<h3>Khulna Sadar:</h3>
							<p style="text-align:justify;">{{$khulna_sadar->history}}</p>							
						</div>
						<div class="kmp_range_history">
							<h3>Sonadangha:</h3>
							<p style="text-align:justify;">{{$sonadangha->history}}</p>							
						</div>
						<div class="kmp_range_history">
							<h3>Khalishpur:</h3>
							<p style="text-align:justify;">{{$khalishpur->history}}</p>							
						</div>
						<div class="kmp_range_history">
							<h3>Daulatpur:</h3>
							<p style="text-align:justify;">{{$daulatpur->history}}</p>							
						</div>
						<div class="kmp_range_history">
							<h3>Khanjahan Ali:</h3>
							<p style="text-align:justify;">{{$khanjahan_ali->history}}</p>							
						</div>
						<div class="kmp_range_history">
							<h3>Labanchora:</h3>
							<p style="text-align:justify;">{{$labanchora->history}}</p>							
						</div>
						<div class="kmp_range_history">
							<h3>Horintana :</h3>
							<p style="text-align:justify;">{{$horintana->history}}</p>							
						</div>
						<div class="kmp_range_history">
							<h3>Aranghata :</h3>
							<p style="text-align:justify;">{{$aranghata->history}}</p>								
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection