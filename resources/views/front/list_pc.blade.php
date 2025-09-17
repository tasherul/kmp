@extends('front.master')
@section('title','List PC')


@section('content')
	
	<!-- List Of PC Start -->
	<section class="kmp_pc">
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
						<h2 class="white_color">List Of Police Comissoner:</h2>
					</div>

					@if(isset($listPcs[0]))
					<div class="table-responsive">
						<table style="width:100%" class="kmp_pc_table">
						  <tr>
							<th rowspan="2">SL No:</th>
							<th rowspan="2">Name</th>
							<th rowspan="2">Designation</th>
							<th colspan="2">Period</th>
						  </tr>
						  <tr>
							<td><strong>From</strong></td>
							<td><strong>To</strong></td>
						  </tr>

						  @foreach ($listPcs as $key => $listPc)  
						  
						  <tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $listPc->comissoner_name }}</td>
							<td>{{ $listPc->comissoner_designation }}</td>
							<td>{{ $listPc->comissoner_from_date }}</td>
							<td>{{ $listPc->comissoner_to_date }}</td>
						  </tr>

						  @endforeach

						</table>
					</div>

					<!-- Pagination -->
					<br>
					<div class="content_center">

						{{$listPcs->links()}}

					</div>
					
						
					@else

						No Data Found

					@endif


				</div>
			</div>
		</div>
	</section>
	<!-- List Of PC End -->

@endsection