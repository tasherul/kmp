@extends('front.master')
@section('title','Police Activities')


@section('content')

	<!-- Police Activites Start -->
	<section class="police_activities">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<span class="service_tittle">
						<i class="fa fa-check-square-o" aria-hidden="true"></i>Our Service :
					</span>
					
					@include('front.left_side_our_service')

				</div>
				
					

				<div class="col-lg-9 mb-15">
					<div class="kmp_activities">
						<div class="history_tittle">
							<h2 class="white_color">Ploice Activities</h2>
						</div>
						<p>{!! $policeactivities->police_activities_abstarct !!}</p>
						<div class="row">
							<div class="col-lg-6">
								<div class="range_staff_tittle">
									<h3>Crime Management:</h3>							
								</div>
								<ul class="activities_list">
									<li>{{$policeactivities->crime_management}}</li>
								</ul>
							</div>
							<div class="col-lg-6 mt-15">
								<div class="range_staff_tittle">
									<h3>Internal Security:</h3>							
								</div>
								<ul class="activities_list">
									<li>Security Patrols</li>
									<li>Security Watchdog</li>
									<li>VVIP Security</li>
									<li>KPI Security</li>
									<li>Security at National Occasions (Religious festival, Fair, Ijtema, Pahela Baishakh etc.</li>
								</ul>
							</div>
							<div class="col-lg-6 mt-15">
								<div class="range_staff_tittle">
									<h3>Social Integration:</h3>							
								</div>
								<ul class="activities_list">
									<li>Raising Awareness (Through Training, Rally, Exhibition, Media Coverage, Visiting schools etc.)</li>
									<li>Community Policing</li>
									<li>Humanitarian Efforts (Winter cloth distribution, helping disaster victims etc)</li>
									<li>Participation in the Social Events (Being partner in Events like fair, assistance etc.)</li>
									<li>Observing Open House Day</li>
									<li>Blood Donation</li>
									<li>Victim Support Center</li>
								</ul>
							</div>
							<div class="col-lg-6 mt-15">
								<div class="range_staff_tittle">
									<h3>Performing Internationally:</h3>							
								</div>
								<ul class="activities_list">
									<li>Addressing Transnational Crimes (Interpol, SAARCPol etc)</li>
									<li>UN Peacekeeping Missions</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Police Activites End -->

@endsection