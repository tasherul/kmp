@extends('front.master')
@section('title','Acknowledgement')


@section('content')
	
	<!-- Acknowledgement Start -->
	<section class="kmp_acknowledgement mb-30">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<span class="service_tittle">
						<i class="fa fa-check-square-o" aria-hidden="true"></i>Our Service :
					</span>
					@include('front.left_side_our_service')
				</div>
				<div class="col-lg-9">
					<div class="acknowledge_area">
						<div class="history_tittle">
							<h2 class="white_color">Acknowledgement</h2>						
						</div>
						<p>{{$acknowledgement_content->acknowledgement_content}}</p>
						<table class="kmp_ace_table" style="width:100%">
						  <tr>
							<th>Sl No:</th>
							<th>Name</th>
							<th>Designation</th>
						  </tr>

							@foreach ($acknowledgements as $key=>$acknowledgement)							
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$acknowledgement->acknowledgement_name}}</td>
								<td>{{$acknowledgement->acknowledgement_designation}}</td>
							</tr>

							@endforeach

						  

						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Acknowledgement End -->
	@endsection