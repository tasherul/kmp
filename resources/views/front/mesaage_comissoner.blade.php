@extends('front.master')
@section('title','Message Comissoner')


@section('content')
	
	<!-- Mesaage Comissoner Start -->
	<section class="msg_comissoner">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="history_tittle">
						<h2 class="white_color">Messsage From Commissioner:</h2>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="comissoner_bani">
						<img src="{{asset('public/upload/').$homepages->comissoner_image}}" alt="kmp">
						<p> {{$homepages->message_from_comissoner}}</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Message Comissoner End -->

@endsection