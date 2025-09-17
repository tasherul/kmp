@extends('front.master')
@section('title','Staff')


@section('content')

<!-- KMP Staff -->
<section class="kmp_staff">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="history_tittle">
					<h2 class="white_color">Senior Officer Directory</h2>
				</div>
			</div>
@foreach ($staffs as $staff)
			<div class="col-lg-12">
					<div class="staff_intro_area">
						<div class="row">
							<div class="col-lg-4">
								<div class="staff_imj">
									<img src="{{asset('public/upload/').$staff->staff_image}}"/>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="staff_intro">									
									<h3>{{$staff->staff_name}}</h3>
									<ul>
									    <li><span>Rank:</span> {{$staff->designation}}</li>
										<li><span>BP No:</span> {{$staff->bp_no}}</li>
										<li><span>Mobile Number:</span>{{$staff->mobile}}</li>
										<li><span>Email:</span> {{$staff->email}}</li>
										
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach


				<!-- pagination-->
				

		</div>
	</div>
</section>
@endsection

