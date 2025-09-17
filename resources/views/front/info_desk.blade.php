@extends('front.master')
@section('title','Info Desk')


@section('content')
	
	<!-- KMP Info Start -->
	<section class="kmp_info">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<span class="service_tittle">
						<i class="fa fa-check-square-o" aria-hidden="true"></i>Our Service :
					</span>

						@include('front.left_side_our_service')

				</div>
				<div class="col-lg-9">
					<div class="kmp_info_area">
						<div class="history_tittle">
							<h2 class="white_color">Info Desk</h2>
						</div>
						<p>{{$act->information_act}}</p>
						<table style="width:100%" class="info_table">
						  <tr>
							<th>দায়িত্বপ্রাপ্ত কর্মকর্তা</th>
							<th>বিকল্প দায়িত্বপ্রাপ্ত  কর্মকর্তা</th>
						  </tr>
						  <tr>
							<td>
								<p><strong>{{$info_desk_1->name}}</strong></p>
								<ul>
									<li>বিপি নং:-{{$info_desk_2->bp_no}}</li>
									<li>{{$info_desk_2->designation}}</li>
									<li>মোবাইল:-{{$info_desk_2->mobile}}</li>
									<li>ই-মেইল:-{{$info_desk_2->email}}</li>
									<li>{{$info_desk_2->range_address}}</li>
								</ul>
							</td>
							<td>
								<p><strong>{{$info_desk_2->name}}</strong></p>
								<ul>
									<li>বিপি নং:-{{$info_desk_2->bp_no}}</li>
									<li>{{$info_desk_2->designation}}</li>
									<li>মোবাইল:-{{$info_desk_2->mobile}}</li>
									<li>ই-মেইল:-{{$info_desk_2->email}}</li>
									<li>{{$info_desk_2->range_address}}</li>
								</ul>
							</td>
						  </tr>
						  
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- KMP Info End -->
	
@endsection