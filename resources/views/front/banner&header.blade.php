

	<section class="header-middle">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="banner_logo">
						<a href="../">
							<img src="{{asset('public/upload/').$homepages->logo_upload}}" alt="Khulna Metropolitan Police">
						</a>
						<div class="logo_text">
							<h2>Khulna Metropolitan Police</h2>
							<p>Khulna, Bangladesh</p>
						</div>
					</div>
				</div>
				<!-- col end -->
			</div>
			<!-- row  end -->
		</div>
		<!-- container end -->
	</section>
	<!-- ad banner end -->

	<!-- header nav start-->
	<header class="header-default">
		<div class="container">
			<div class="row">

				<div class="col-lg-12 ">
					@if (\Request::is('/'))  
						@include('front.breaking_news')
 
					@endif
					@if (\Request::is('home'))  
						@include('front.breaking_news')
 
					@endif
					
					<!--nav top end-->
					<nav class="navigation ts-main-menu ts-menu-sticky navigation-landscape">
						<div class="nav-header">
							<a class="nav-brand mobile-logo visible-xs" href="../">
								<img src="{{asset('public/upload/').$homepages->logo_upload}}" alt="Khulna Metropolitan Police">
							</a>
							<div class="nav-toggle"></div>
						</div>
						<!--nav brand end-->

						<div class="nav-menus-wrapper clearfix">
							<!--nav right menu start-->
							<ul class="right-menu align-to-right">

								<li class="header-search">
									<div class="nav-search">
										<div class="nav-search-button">
											<i class="icon icon-search"></i>
										</div>
										<form>
											<span class="nav-search-close-button" tabindex="0">✕</span>
											<div class="nav-search-inner">
												<input type="search" name="search" placeholder="Type and hit ENTER">
											</div>
										</form>
									</div>
								</li>
							</ul>
							<!--nav right menu end-->
							<!-- nav menu start-->
							<ul class="nav-menu">
								<li {{(current_page("home"))?'class=active':''}}>
									<a href="../">Home</a>
								</li>

								<li {{(current_page("staff-list"))||(current_page("ornogram"))||(current_page("carrer"))||(current_page("ranks"))||(current_page("acknowledgement"))||(current_page("citizen-charter"))||(current_page("apa"))?'class=active':''}}>
									
							<!-- <ul class="nav-menu">
								<li {{(current_page("/home"))?'class=active':''}}  >
									<a href="{{Route('home')}}">Home</a>									
								</li>
								<li  }}> -->
									<a href="">About Us</a>
									<ul class="nav-dropdown">
										<li {{(current_page("staff-list"))?'class=active':''}}>
											<a href="{{Route('staffList')}}">Senior Officer's Directory</a>											
										</li>
										<li {{(current_page("ornogram"))?'class=active':''}}>
											<a href="{{Route('ornogram')}}">Organogram</a>											
										</li>
										
											
												<li  {{(current_page("carrer"))?'class=active':''}}>
													<a href="{{Route('carrer')}}">Career</a>
												</li>

												<li {{(current_page("ranks"))?'class=active':''}} >
													<a href="{{Route('ranks')}}">Ranks</a>
												</li>

												<!--<li  {{(current_page("acknowledgement"))?'class=active':''}} >-->
												<!--	<a href="{{Route('acknowledgement')}}">Acknowledgement</a>-->
												<!--</li>-->

										<li {{(current_page("citizen-charter"))?'class=active':''}}>
													<a href="{{Route('citizenCharter')}}">Citizen Charter</a>
												</li>

												<li {{(current_page("apa"))?'class=active':''}}>
													<a href="{{Route('apa')}}">APA</a>
												</li>

									</ul>
								</li>

								<li {{(current_page("history"))?'class=active':''}} >
									<a href="{{Route('history')}}">History</a>
								</li>
																
								<li {{(current_page("comunity-policing"))||(current_page("beat-polising"))||(current_page("money-escort"))||(current_page("police-verification"))||(current_page("protection"))||(current_page("victim-support"))||(current_page("traffic"))||(current_page("info-desk"))?'class=active':''}}>
									<a href="#">Service</a>
									<ul class="nav-dropdown">
										<li {{(current_page("comunity-policing"))?'class=active':''}} >
											<a href="{{Route('comunityPolicing')}}">Community Policing</a>											
										</li>
										<li >
											<a href="http://pcc.police.gov.bd:8080/ords/f?p=500:1::::::">Online Police Clearance</a>
										</li>

										<li {{(current_page("beat-polising"))?'class=active':''}}>
											<a href="{{Route('beat_polising')}}">Beat Policing</a>
										</li>

										<li {{(current_page("money-escort"))?'class=active':''}} >
											<a href="{{Route('moneyEscort')}}">Money Escort</a>
										</li>

										<li {{(current_page("police-verification"))?'class=active':''}} >
											<a href="{{Route('policeVerification')}}">Police Verification</a>
										</li>

										<li {{(current_page("protection"))?'class=active':''}} >
											<a href="{{Route('protection')}}">Protection & Protocol</a>
										</li>

										<li {{(current_page("victim-support"))?'class=active':''}}>
											<a href="{{Route('victimSupport')}}">Victim Support</a>
										</li>

										<li {{(current_page("traffic"))?'class=active':''}} >
											<a href="{{Route('traffic')}}">Traffic Management</a>
										</li>

										<li {{(current_page("info-desk"))?'class=active':''}} >

											<a href="{{Route('infoDesk')}}">Info Desk</a>
										</li>										
									</ul>
								</li>
								<li {{(current_page("kmp-units"))?'class=active':''}} >
									<a href="{{Route('kmp_units')}}">KMP Units</a>
								</li>

								<li {{(current_page("news"))?'class=active':''}}  >
									<a href="{{Route('news')}}">News</a>
								</li>
								<li {{(current_page("noc"))?'class=active':''}}  >
									<a href="{{Route('noc')}}">NOC</a>
								</li>
								<li {{(current_page("photo-gallery"))||(current_page("video-gallery"))?'class=active':''}}>
									<a href="#">Gallery</a>
									<ul class="nav-dropdown">
										<li {{(current_page("photo-gallery"))?'class=active':''}}  >
											<a href="{{Route('photoGallery')}}">Photo Gallery</a>											
										</li>

										<li {{(current_page("video-gallery"))?'class=active':''}}  >
											<a href="{{Route('videoGallery')}}">Video Galary</a>
										</li>
										
									</ul>
								</li>
								<li {{(current_page("contact-us"))?'class=active':''}}  >
									<a href="{{Route('contactUs')}}">Contact Us</a>
								</li>
								<li {{(current_page("list-pc"))||(current_page("document"))||(current_page("carrer"))||(current_page("notice"))||(current_page("we-remember"))||(current_page("wanted"))||(current_page("missing"))?'class=active':''}}>
									<a href="#">Others</a>
									<ul class="nav-dropdown">
										<li {{(current_page("list-pc"))?'class=active':''}}  >
											<a href="{{Route('listPc')}}">List Of PC</a>											
										</li>
										<li {{(current_page("document"))?'class=active':''}}  >
											<a href="{{Route('document')}}">Document</a>
										</li>

										<li {{(current_page("carrer"))?'class=active':''}}  >
											<a href="{{Route('carrer')}}">Circulars</a>
										</li>

										<li {{(current_page("notice"))?'class=active':''}}  >
											<a href="{{Route('notice')}}">Notice</a>
										</li>

										<li {{(current_page("we-remember"))?'class=active':''}}  >
											<a href="{{Route('weRemember')}}">We Remember</a>
										</li>

										<li {{(current_page("wanted"))?'class=active':''}} >
											<a href="{{Route('wanted')}}">Wanted</a>
										</li>

										<li {{(current_page("missing"))?'class=active':''}} >
											<a href="{{Route('missing')}}">Missing</a>
										</li>
										<li {{(current_page("missing"))?'class=active':''}} >
											<a href="{{Route('right_to_information')}}">Right To Information</a>
										</li>
									</ul>
								</li>
							</ul>
							<!--nav menu end-->
						</div>
					</nav>
					<!-- nav end-->
				</div>
			</div>
		</div>
	</header>