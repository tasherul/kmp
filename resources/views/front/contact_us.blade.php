@extends('front.master')
@section('title','Contact Us')


@section('content')

<!-- KMP Contact Start -->
<section class="kmp_contact_us mb-30">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 mb-30">
				<div class="history_tittle">
					<h2 class="white_color">Contact With Us:</h2>
				</div>
			</div>
			<div class="col-lg-8 mb-30">
				<div class="kmp_contacts_area">
					<img src="{{asset('public/upload/').$contacts->contract_banner}}" alt="Khulna Metropolitan Police" />
				</div>
			</div>
			<div class="col-lg-4 mb-30">
				<div class="kmp_contacts_area">
					<span><strong>Contact for Information::</strong></span>
					<ul>
						<li>{{$contacts->control_room_kmp_address}}</li>
						<li>Mobile: {{$contacts->control_room_mobile_no}}</li>
						<li>Phone: {{$contacts->control_room_phone_no}}</li>
						<li>Fax: {{$contacts->control_room_fax}}</li>
						<li>Email: {{$contacts->control_room_email}}</li>
					</ul>
				</div>
			</div>

			<div class="col-lg-12">
				<div class="apa_list">

					<button class="accordions"><b>KMP Mobile Number </b></button>
					<div class="panel">
						<table id="example" class="display" style="width:100%">
							<thead>
								<tr>
									<th style="text-align: center;">ক্রমিক নং</th>
									<th style="text-align: center;">পদবী</th>
									<!--<th style="text-align: center;">পূর্বের মোবাইল নাম্বার</th>-->
									<th style="text-align: center;">মোবাইল নম্বর</th>

								</tr>
							</thead>
							<tbody>
								@php $i=0; @endphp
								@foreach($mobile_no as $key)
								@php $i=$i+1; @endphp
								<tr>
									<td style="text-align: center;">{{$i}}</td>
									<td style="text-align: center;">{{$key->designation}} </td>
									<!--<td style="text-align: center;">{{$key->old_mobile}}</td>-->
									<td style="text-align: center;">{{$key->new_mobile}}</td>


								</tr>
								@endforeach
							</tbody>
						</table>

					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- KMP Contact End -->



@endsection

<script>
	var acc = document.getElementsByClassName("accordions");
	var i;

	for (i = 0; i < acc.length; i++) {
		acc[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var panel = this.nextElementSibling;
			if (panel.style.maxHeight) {
				panel.style.maxHeight = null;
			} else {
				panel.style.maxHeight = panel.scrollHeight + "px";
			}
		});
	}
</script>