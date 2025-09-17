@extends('front.master')
@section('title','Staff')


@section('content')
<!-- Khulna Sadar -->
<section class="area_range">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<span class="service_tittle">
					<i class="fa fa-check-square-o" aria-hidden="true"></i>Our Service :
				</span>
				
					@include('front.left_side_our_service')

				<div class="ts-grid-box widgets ">
					<h2 class="ts-title">KMP Units</h2>
				
					@include('front.laft_side_range_unit')

				</div>
			</div>
			<div class="col-lg-9">
				<div class="history_tittle">
					<h2 class="white_color">{{$range->range}}</h2>
				</div>
				<div class="range_intro">
					<img src="{{asset('public/upload/').$range->range_image}}" />
				<p>{{$range->history}}</p>
				</div>
				<div class="range_contact">
					<div class="range_staff_tittle">
						<h3>Staff Information:</h3>
					</div>

					@if (isset($rangeunits[0]))

						<table class="range_info_table" style="width: 100%;">
							<tr>
							<th>Sl No.</th>
							<!--<th>Name</th>-->
							<th>Designation</th>
							<th>Contact</th>
							<!--<th>Picture</th>-->
							</tr>
									
							@foreach ($rangeunits as $Key=> $rangeunit)
								<tr>
								<td>{{ $Key+1 }}</td>
								<!--<td>{{$rangeunit->staff_name}}</td>-->
								<td>{{$rangeunit->staff_designation}}</td>
								<td>{{$rangeunit->staff_contact}}</td>
								<!--<td><img src="{{asset('public/upload/').$rangeunit->range_unit_staff_image}}"/></td>-->
								</tr>
							@endforeach
						</table>

					@else
						
					No Data Found
					
					@endif
					
				</div>
			</div>
		</div>
	</div>
</section>
@endsection