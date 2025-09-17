<?php 

$homepages=  App\Model\Homepage::get()->first();
$newss =  App\Model\News::orderBy('id', 'desc')->get();
$contacts = App\Model\Contact::wherenotnull('control_room_office')->get()->first();

?>	

<?php echo e(Visitor::log()); ?>


<!doctype html>
<html lang="en">

<head>
	<!-- Basic Page Needs =====================================-->
	<meta charset="utf-8">

	<!-- Mobile Specific Metas ================================-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Site Title- -->
	<title>KMP - Khulna Metropolitone Police</title>

	<!-- CSS
   ==================================================== -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo e(asset('kmp')); ?>/css/bootstrap.min.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo e(asset('kmp')); ?>/css/font-awesome.min.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo e(asset('kmp')); ?>/css/animate.css">

	<!-- IcoFonts -->
	<link rel="stylesheet" href="<?php echo e(asset('kmp')); ?>/css/icofonts.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="<?php echo e(asset('kmp')); ?>/css/owlcarousel.min.css">

	<!-- slick -->
	<link rel="stylesheet" href="<?php echo e(asset('kmp')); ?>/css/slick.css">

	<!-- navigation -->
	<link rel="stylesheet" href="<?php echo e(asset('kmp')); ?>/css/navigation.css">

	<!-- magnific popup -->
	<link rel="stylesheet" href="<?php echo e(asset('kmp')); ?>/css/magnific-popup.css">

	<!-- Style -->
	<link rel="stylesheet" href="<?php echo e(asset('kmp')); ?>/css/style.css">
	<!-- Style -->
	<link rel="stylesheet" href="<?php echo e(asset('kmp')); ?>/css/colors/color-0.css">

	<!-- Responsive -->
	<link rel="stylesheet" href="<?php echo e(asset('kmp')); ?>/css/responsive.css">
	
	<!-- Fancybox -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('kmp')); ?>/css/jquery.fancybox.min.css">

	<!-- For Slider -->
	<link rel="stylesheet" href="<?php echo e(asset('kmp')); ?>/nivo/default/default.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo e(asset('kmp')); ?>/nivo/light/light.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo e(asset('kmp')); ?>/nivo/dark/dark.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo e(asset('kmp')); ?>/nivo/bar/bar.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo e(asset('kmp')); ?>/nivo/nivo-slider.css" type="text/css" media="screen" />

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<!-- Fav Icon -->
	<link rel="icon" href="<?php echo e(asset('kmp')); ?>/images/favicon.ico" type="image/x-icon"/>



</head>

<body class="body-color">

	<!-- <div id="preloader">
		<div class="spinner">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
		</div>
		<div class="preloader-cancel-btn-wraper">
			<a href="#" class="btn btn-primary preloader-cancel-btn">Cancel Preloader</a>
		</div>
	</div> -->


	<div id="google_translate_element" ></div>

	<script type="text/javascript">
	function googleTranslateElementInit() {
	  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
	}
	</script>
	
	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


	<!-- top bar start -->
<?php echo $__env->make('front.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<!-- end top bar-->

	<!-- ad banner start -->
<?php echo $__env->make('front.banner&header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<!-- header nav end-->

	<!-- block post area start-->

	<?php echo $__env->yieldContent('content'); ?>  

<?php echo $__env->make('front.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




	<!-- javaScript Files
	=============================================================================-->

	<!-- initialize jQuery Library -->
	<script src="<?php echo e(asset('kmp')); ?>/js/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
	<script src="<?php echo e(asset('kmp')); ?>/js/jquery.nivo.slider.js"></script> 
	<!-- navigation JS -->
	<script src="<?php echo e(asset('kmp')); ?>/js/navigation.js"></script>
	<!-- Popper JS -->
	<script src="<?php echo e(asset('kmp')); ?>/js/popper.min.js"></script>
	
	<!-- magnific popup JS -->
	<script src="<?php echo e(asset('kmp')); ?>/js/jquery.magnific-popup.min.js"></script>



	<!-- Bootstrap jQuery -->
	<script src="<?php echo e(asset('kmp')); ?>/js/bootstrap.min.js"></script>
	<!-- Owl Carousel -->
	<script src="<?php echo e(asset('kmp')); ?>/js/owl-carousel.2.3.0.min.js"></script>
	<!-- slick -->
	<script src="<?php echo e(asset('kmp')); ?>/js/slick.min.js"></script>

	<!-- smooth scroling -->
	<script src="<?php echo e(asset('kmp')); ?>/js/smoothscroll.js"></script>

	<script src="<?php echo e(asset('kmp')); ?>/js/main.js"></script>
	<script src="<?php echo e(asset('kmp')); ?>/js/jquery.fancybox.min.js"></script>
	
	<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
	 
	

</body>


</html><?php /**PATH C:\xampp\htdocs\kmpnew\resources\views/front/master.blade.php ENDPATH**/ ?>