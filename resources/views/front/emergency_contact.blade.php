@extends('front.master')
@section('title','Emergency Contact')

@section('content')

	<!-- Emergency Contact Start -->
	<section class="kmp_emergency_contact">
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
						<h2 class="white_color">জরুরি প্রয়োজনে তাৎক্ষণিক সহায়তার জন্য কল করুন ৯৯৯</h2>
					</div>
					<div class="emergency_area">
						<div class="card  ccard w-100">                        
                        <div class="card-body ccard-body" style="font-weight:normal;">
                            <div class="rmp-address">
                                <p class="text-center">৯৯৯ নম্বরটি সম্পূর্ণ টোল ফ্রি অর্থাৎ আপনার কোন খরচ হবেনা।</p>
                                <p><strong>কখন কল করবেন?</strong></p>
                                <p># কেউ যখন কোনো অপরাধ ঘটতে দেখবেন</p>
                                <p># প্রাণনাশের আশঙ্কা দেখা দিলে</p>
                                <p># কোনো হতাহতের ঘটনা চোখে পড়লে</p>
                                <p># কেউ কোনো দুর্ঘটনায় পড়লে</p>
                                <p># কোথাও অগ্নিকাণ্ডের ঘটনা ঘটলে</p>
                                <p># কারও জরুরিভাবে অ্যাম্বুলেন্সের প্রয়োজন হলে</p>
                                <p>দেশব্যাপী যে কোনো মোবাইল ফোন বা ফিক্সড/ল্যান্ড লাইন ফোন থেকে এই নম্বরে ফোন করলে পুলিশ, দমকল বাহিনী ও অ্যাম্বুলেন্স পাওয়া যায়।</p>
                                <p>তথ্য ও যোগাযোগ প্রযুক্তি বিভাগ গত বছর পরীক্ষামূলকভাবে ‘ন্যাশনাল ইমার্জেন্সি সার্ভিস’ নামে এই টেলিসেবাটি চালু করেছিল। বর্তমানে বাংলাদেশ পুলিশের ব্যবস্থাপনায় তা পরিচালিত হচ্ছে। পুলিশ বিভাগের দক্ষ ও প্রশিক্ষিত সদস্যরা ২৪ ঘন্টা এই সেবা দিতে প্রস্তুত আছে।</p>
                            </div>
							
	                        <center><a href="tel:999" class="btn btn-success bt-lg call">Call 999 now</a></center>

                        </div>
                    </div>
					</div>										
				</div>
			</div>
		</div>
	</section>
	<!-- Emergency Contact End -->
@endsection