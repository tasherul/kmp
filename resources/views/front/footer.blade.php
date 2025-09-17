<!-- Important Links -->
<section class="important_links">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="ts-title">Important Links</h2>

            </div>
            <div class="col-lg-12">
                <div class="links_slider owl-carousel">
                    <div class="item">
<!--
                        <a href="https://www.police.gov.bd/">
                            <img src="{{asset('kmp')}}/images/links/01.png" alt="" />

                       </a>
--> 
                    </div>
                    <!-- ts-grid-box end-->

                    <div class="item">

                        <a href="https://mha.gov.bd/">
                            <img src="{{asset('kmp')}}/images/links/02.jpg" alt="" />
                        </a>

                    </div>
                    <!-- ts-grid-box end-->
                    <div class="item">

                        <a href="https://www.eprocure.gov.bd/">
                            <img src="{{asset('kmp')}}/images/links/03.jpg" alt="" />
                        </a>

                    </div>
                    <!-- ts-grid-box end-->
                    <div class="item">

                        <a href="https://www.police.gov.bd/en/special_branch">
                            <img src="{{asset('kmp')}}/images/links/04.jpg" alt="" />
                        </a>

                    </div>
                    <!-- ts-grid-box end-->
                    <div class="item">

                        <a href="http://dmp.gov.bd/">
                            <img src="{{asset('kmp')}}/images/links/18.png" alt="" />
                        </a>

                    </div>
                    <!-- ts-grid-box end-->
                    <div class="item">

                        <a href="http://cmp.gov.bd/">
                            <img src="{{asset('kmp')}}/images/links/05.png" alt="" />
                        </a>

                    </div>
                    <div class="item">

                        <a href="https://www.rmp.gov.bd/">
                            <img src="{{asset('kmp')}}/images/links/06.png" alt="" />
                        </a>

                    </div>
                    <div class="item">

                        <a href="https://www.police.gov.bd/en/barisal_range">
                            <img src="{{asset('kmp')}}/images/links/07.png" alt="" />
                        </a>

                    </div>
                    <div class="item">

                        <a href="http://smp.police.gov.bd/">
                            <img src="{{asset('kmp')}}/images/links/08.png" alt="" />
                        </a>

                    </div>
                    <div class="item">

                        <a href="https://www.police.gov.bd/en/metropolitan_police">
                            <img src="{{asset('kmp')}}/images/links/09.png" alt="" />
                        </a>

                    </div>

                    <div class="item">

                        <a href="https://www.police.gov.bd/en/units_dhaka_range">
                            <img src="{{asset('kmp')}}/images/links/10.png" alt="" />
                        </a>

                    </div>
                    <div class="item">

                        <a href="http://ctgrangepolice.gov.bd/">
                            <img src="{{asset('kmp')}}/images/links/11.png" alt="" />
                        </a>

                    </div>
                    <div class="item">

                        <a href="https://www.police.gov.bd/en/khulna_range">
                            <img src="{{asset('kmp')}}/images/links/12.png" alt="" />
                        </a>

                    </div>
                    <div class="item">

                        <a href="https://www.police.gov.bd/en/barisal_range">
                            <img src="{{asset('kmp')}}/images/links/13.png" alt="" />
                        </a>

                    </div>
                    <div class="item">

                        <a href="https://www.police.gov.bd/en/sylhet_range">
                            <img src="{{asset('kmp')}}/images/links/14.png" alt="" />
                        </a>

                    </div>
                    <div class="item">

                        <a href="http://rangpurrange.police.gov.bd/">
                            <img src="{{asset('kmp')}}/images/links/15.png" alt="" />
                        </a>

                    </div>
                    <div class="item">

                        <a href="http://www.mymensinghrange.police.gov.bd/">
                            <img src="{{asset('kmp')}}/images/links/16.png" alt="" />
                        </a>

                    </div>
                    <div class="item">

                        <a href="https://www.police.gov.bd/en/railway_police">
                            <img src="{{asset('kmp')}}/images/links/17.png" alt="" />
                        </a>

                    </div>
                    <div class="item">

                        <a href="http://www.rab.gov.bd/">
                            <img src="{{asset('kmp')}}/images/links/18.jpg" alt="" />
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- footer start -->
<footer class="ts-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="footer_kmp_logo">
                    <img src="{{asset('public/upload/').$homepages->logo_upload}}" alt="kmp">
                    <div class="logo_text">
                        <h2>KMP</h2>
                        <p>Khulna,Bangladesh</p>
                    </div>
                    <span>An Ordinance to provide for the constitution of a separate police-force for the Khulna Metropolitan Area and for the regulation thereof and also provide quality of service that people want to accept from us.Please coperate with us and make a wonderful country.We are trying to do our best.</span>

                </div>

            </div><!-- col end -->
            <div class="col-lg-5">
                <div class="kmp_quick_links">
                    <h3 class="white_color">Quick Links:</h3>
                    <div class="row">
                        @php
                        $right_menu=DB::table('important_link')
                        ->select('*')
                        ->orderBy('position', 'ASC')
                        ->get();
                        @endphp
                        @foreach($right_menu as $key)
                        <div class="col-md-6">
                            <ul>
                                <li><a href="{{$key->link}}" target="_blank">{{$key->name}}</a></li>
                            </ul>
                        </div>
                        @endforeach

                    </div>

                </div>
            </div><!-- col end -->

            <div class="col-lg-3">
                <div class="kmp_contact_footer">
                    <h3 class="white_color">Contact Us:</h3>
                    <div class="kmp_addres white_color mb-15">
                        KMP Headquarters<br /> {{$contacts->control_room_kmp_address}}
                    </div>


                    <div class="kmp_emergency">
                        Emergency Helpline<br /> Call: 999
                    </div>

                    <br>
                    <div class="kmp_emergency">
                        KMP Control Room<br /> Call: {{$homepages->emergency_tittle}}
                    </div>


                    <ul class="top-social mt-15">
                        <li>
                            <a href="{{$homepages->twitter_link}}">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="{{$homepages->facebook_link}}">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="{{$homepages->youtube_link}}">
                                <i class="fa fa-youtube"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!-- col end -->

            <div class="col-lg-12">
                <div class="copyright_area">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="copyright-text white_color">
                                <span>&copy; 2019, KMP. All rights reserved</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="copyright-text_2 white_color">
                                <span>Design & Develop By <a style="color: #FFFF00;" href="http://apitsoft.com/">APitSoft</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- row end -->
        <div id="back-to-top" class="back-to-top">
            <button class="btn btn-primary" title="Back to Top">
                <i class="fa fa-angle-up"></i>
            </button>
        </div><!-- Back to top end -->
    </div><!-- Container end-->
</footer>
<!-- footer end -->