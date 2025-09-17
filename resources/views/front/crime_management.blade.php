@extends('front.master')
@section('title','Crime')


@section('content')
	
	<!-- Crime Management Start -->
	<section class="kmp_crime_management">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 mb-30">
					<div class="history_tittle">
						<h2 class="white_color">Crime Management:</h2>
					</div>
				</div>
				<div class="col-lg-12 mb-30">
					<div class="crime_table table-responsive">

	
					@foreach ($new_data as $key=> $nd)

						<span>Crime Statistics of {{$key}} : </span>
							<table class="mdig_crime_table" width="100%">
								
								<tr>
									<th rowspan="2">
										<div class="verticalText"><strong>Range</strong></div>
									</th>
									<th rowspan="2">
										<div class="verticalText"><strong>Month</strong></div>
									</th>
									<th rowspan="2">
										<div class="verticalText"><strong>Dacoity</strong></div>
									</th>
									<th rowspan="2">
										<div class="verticalText"><strong>Robbery</strong></div>
									</th>
									<th rowspan="2">
										<div class="verticalText"><strong>Murder</strong></div>
									</th>
									<th rowspan="2">
										<div class="verticalText"><strong>Speedy Trail</strong></div>
									</th>
									<th rowspan="2">
										<div class="verticalText"><strong>Riot</strong></div>
									</th>
									<th rowspan="2">
										<div class="verticalText"><strong>Women  Repression</strong></div>
									</th>
									<th rowspan="2">
										<div class="verticalText"><strong>Child  Repression</strong></div>
									</th>
									<th rowspan="2">
										<div class="verticalText"><strong>Kidnapping</strong></div>
									</th>
									<th rowspan="2">
										<div class="verticalText"><strong>Police Assault</strong></div>
									</th>
									<th rowspan="2">
										<div class="verticalText"><strong>Burglary</strong></div>
									</th>
									<th rowspan="2">
										<div class="verticalText"><strong>Theft</strong></div>
									</th>
									<th rowspan="2">
										<div class="verticalText"><strong>Others Cases</strong></div>
									</th>
									<th colspan="5">
										<div class="verticalText1"><strong>Recovery Cases</strong></div>
									</th>
									<th rowspan="2">
										<div class="verticalText"><strong>Total Cases</strong></div>
									</th>
								</tr>

								<tr>
									<th>
										<div class="verticalText"><strong>Arms Act</strong></div>
									</th>
									<th>
										<div class="verticalText"><strong>Explosive</strong></div>
									</th>
									<th>
										<div class="verticalText"><strong>Narcotics</strong></div>
									</th>
									<th>
										<div class="verticalText"><strong>Smuggling</strong></div>
									</th>
									<th>
										<div class="verticalText"><strong>Total</strong></div>
									</th>
								</tr>


									@php

									$dacoity = 0;

									$robbery = 0;

									$murder = 0;

									$speedy_trail = 0;

									$riot = 0;

									$women_repression = 0;

									$child_repression = 0;

									$kidnapping = 0;

									$police_assault = 0;

									$burglary = 0;

									$theft = 0;

									$others_cases = 0;

									$arms_act = 0;

									$explosive = 0;

									$narcotics = 0;

									$smuggling = 0;

									$total = 0;

									$total_cases = 0;
			
									@endphp

							
								@if(count($nd))

									@foreach ($nd as $n_d)

									@php
										
										$dacoity =$dacoity+$n_d->dacoity;

										$robbery =$robbery+$n_d->robbery;

										$murder =$murder+$n_d->murder;

										$speedy_trail =$speedy_trail+$n_d->speedy_trail;

										$riot =$riot+$n_d->riot;

										$women_repression =$women_repression+$n_d->women_repression;

										$child_repression =$child_repression+$n_d->child_repression;

										$kidnapping =$kidnapping+$n_d->kidnapping;

										$police_assault =$police_assault+$n_d->police_assault;

										$burglary =$burglary+$n_d->burglary;

										$theft =$theft+$n_d->theft;

										$others_cases =$others_cases+$n_d->others_cases;

										$arms_act =$arms_act+$n_d->arms_act;

										$explosive =$explosive+$n_d->explosive;

										$narcotics =$narcotics+$n_d->narcotics;

										$smuggling =$smuggling+$n_d->smuggling;
										
										$total =$total+$n_d->arms_act+$n_d->explosive+$n_d->narcotics+$n_d->smuggling;
										
										$total_cases =$total_cases+$n_d->dacoity+$n_d->robbery+$n_d->murder+$n_d->speedy_trail+$n_d->riot+$n_d->women_repression+$n_d->child_repression+$n_d->kidnapping+$n_d->police_assault+$n_d->burglary+$n_d->theft+$n_d->others_cases+$n_d->arms_act+$n_d->explosive+$n_d->narcotics+$n_d->smuggling;

									@endphp
			
										<tr>
											<td align="center"><strong>{{$n_d->range}}</strong></td>
											<td>
												<div align="center"><strong>{{$n_d->month}}</strong></div>
											</td>
											<td>
												<div align="center">{{$n_d->dacoity}}</div>
											</td>
											<td>
												<div align="center">{{$n_d->robbery}}</div>
											</td>
											<td>
												<div align="center">{{$n_d->murder}}</div>
											</td>
											<td>
												<div align="center">{{$n_d->speedy_trail}}</div>
											</td>
											<td>
												<div align="center">{{$n_d->riot}}</div>
											</td>
											<td>
												<div align="center">{{$n_d->women_repression}}</div>
											</td>
											<td>
												<div align="center">{{$n_d->child_repression}}</div>
											</td>
											<td>
												<div align="center">{{$n_d->kidnapping}}</div>
											</td>
											<td> 
												<div align="center">{{$n_d->police_assault}}</div>
											</td>
											<td>
												<div align="center">{{$n_d->burglary}}</div>
											</td>
											<td>
												<div align="center">{{$n_d->theft}}</div>
											</td>
											<td>
												<div align="center">{{$n_d->others_cases}}</div>
											</td>
											<td>
												<div align="center">{{$n_d->arms_act}}</div>
											</td>
											<td>
												<div align="center">{{$n_d->explosive}}</div>
											</td>
											<td>
												<div align="center">{{$n_d->narcotics}}</div>
											</td>
											<td>
													<div align="center">{{$n_d->smuggling}}</div>
												</td>
											<td>
												<div align="center">{{$n_d->arms_act+$n_d->explosive+$n_d->narcotics+$n_d->smuggling}}</div>
											</td>
											<td>
												<div align="center">{{$n_d->dacoity+$n_d->robbery+$n_d->murder+$n_d->speedy_trail+$n_d->riot+$n_d->women_repression+$n_d->child_repression+$n_d->kidnapping+$n_d->police_assault+$n_d->burglary+$n_d->theft+$n_d->others_cases+$n_d->arms_act+$n_d->explosive+$n_d->narcotics+$n_d->smuggling}}</div>
											</td>
										</tr>

									@endforeach
									
									<tr style=" background:#fff; color:#333 ">
											<td align="center" colspan="2"><strong>Total</strong></td>
											<td>
												<div align="center"><strong>{{$dacoity}}</strong></div>
											</td>
											<td>
												<div align="center"><strong>{{$robbery}}</strong></div>
											</td>
											<td>
												<div align="center"><strong>{{$murder}}</strong></div>
											</td>
											<td>
												<div align="center"><strong>{{$speedy_trail}}</strong></div>
											</td>
											<td>
												<div align="center"><strong>{{$riot}}</strong></div>
											</td>
											<td>
												<div align="center"><strong>{{$women_repression}}</strong></div>
											</td>
											<td>
												<div align="center"><strong>{{$child_repression}}</strong></div>
											</td>
											<td>
												<div align="center"><strong>{{$kidnapping}}</strong></div>
											</td>
											<td>
												<div align="center"><strong>{{$police_assault}}</strong></div>
											</td>
											<td>
												<div align="center"><strong>{{$burglary}}</strong></div>
											</td>
											<td>
												<div align="center"><strong>{{$theft}}</strong></div>
											</td>
											<td>
												<div align="center"><strong>{{$others_cases}}</strong></div>
											</td>
											<td>
												<div align="center"><strong>{{$arms_act}}</strong></div>
											</td>
											<td>
												<div align="center"><strong>{{$explosive}}</strong></div>
											</td>
											<td>
												<div align="center"><strong>{{$narcotics}}</strong></div>
											</td>
											<td>
												<div align="center"><strong>{{$smuggling}}</strong></div>
											</td>
											<td>
												<div align="center"><strong>{{$total}}</strong></div>
											</td>
											<td>
												<div align="center"><strong>{{$total_cases}}</strong></div>
											</td>
										</tr>

								@endif	

							</table>
							<br><br>
						@endforeach

						

					</div>
					<!-- pagination-->
					<div class="row justify-content-md-center">
							
						{{ $new_data->links() }}
					
					</div>
					<!-- pagination end-->
				</div>

				

				


			</div>
		</div>
	</section>
	<!-- Crime Management End -->
 


			



@endsection