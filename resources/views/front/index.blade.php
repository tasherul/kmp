
{{Visitor::log()}}

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>KMP - Khulna Metropolitone Police</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('kmp')}}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('kmp')}}/css/style_home.css">
   <link rel="stylesheet" href="{{asset('kmp')}}/css/font-awesome.min.css"> 
   
   <!-- Fav Icon -->
	<link rel="icon" href="{{asset('kmp')}}/images/favicon.ico" type="image/x-icon"/>
	
   
  </head>
  <body class="background_part">
      
  <!-- Preloader -->
   <div id="preloader">
		<div class="spinner">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
		</div>
		<div class="preloader-cancel-btn-wraper">
			<a href="#" class="btn btn-primary preloader-cancel-btn">Cancel Preloader</a>
		</div>
	</div>
  <div class="wrapper">
    <div class="logo_area">
		<div class="container">
			<div class="logo_part">
				<img src="{{asset('kmp')}}/images/kmp.png" alt="kmp" />
			</div>
			<div class="logo_text">
				<h2 class="kmp_text">KMP - Khulna Metropolitone Police</h2>
				<span>Khulna,Bangladesh</span>
			</div>
		</div>
	</div>
	<div class="check"> 
		<h1 class="ml6">
		  <span class="text-wrapper">
			<span class="letters">WELCOME TO KMP WEBSITE</span>
		  </span>
		</h1>
	</div>
	<div class='selector'>
	  <ul>
		<li>
			<a href="{{Route('emergencyContact')}}">
			  <input id='c1'>
			  <label for='c1' style="background-color:#007c75;color:#fff;"><i class="fa fa-phone" aria-hidden="true"></i> 999</label>
			</a>
		</li>
		<li>
			<a href="{{Route('news')}}">
			  <input id='c2'>
			  <label for='c2' style="background-color:#1F1142;color:#fff;"><i class="fa fa-newspaper-o" aria-hidden="true"></i> KMP News</label>
			</a>
		</li>
		<li>
			<a href="{{Route('wanted')}}">
			  <input id='c3'>
			  <label for='c3' style="background-color:#1EA277;color:#fff;"><i class="fa fa-user-times" aria-hidden="true"></i> Wanted</label>
			</a>
		</li>
		<li>
			<a href="{{Route('policeStation')}}">
			  <input id='c4'>
			  <label for='c4' style="background-color:#419FA7;color:#fff;"><i class="fa fa-building" aria-hidden="true"></i> Police Station</label>
			</a>
		</li>
		<li>
			<a href="{{Route('notice')}}">
			  <input id='c5'>
			  <label for='c5' style="background-color:#EDA720;color:#fff;"><i class="fa fa-bell-o" aria-hidden="true"></i> Notice</label>
			</a>
		</li>
		<li>
			<a href="{{Route('contactUs')}}">
			  <input id='c6'>
			  <label for='c6' style="background-color:#BA74AF;color:#fff;"><i class="fa fa-mobile" aria-hidden="true"></i> Contact Us</label>
			</a>
		</li>
		<li>
			<a href="{{Route('history')}}">
			  <input id='c7' >
			  <label for='c7' style="background-color:#807FBC;color:#fff;"><i class="fa fa-address-book-o" aria-hidden="true"></i> About KMP</label>
			</a>
		</li>
		<li>
		<a href="{{Route('missing')}}">
		  <input id='c8' >
		  <label for='c8' style="background-color:#2B6921;color:#fff;"><i class="fa fa-slack" aria-hidden="true"></i> Missing</label>
		</a>
		</li>
	  </ul>
  <a href="{{Route('home')}}"><button><i class="fa fa-home" aria-hidden="true" style="font-size:70px" ></i><br/>Enter Site</button></a>
</div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('kmp')}}/js/jquery.min.js"></script>
	<script src="{{asset('kmp')}}/js/main.js"></script>
	<script src="{{asset('kmp')}}/js/anime.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
	
	
	<script>
	var nbOptions = 8;
var angleStart = -360;

// jquery rotate animation
function rotate(li,d) {
    $({d:angleStart}).animate({d:d}, {
        step: function(now) {
            $(li)
               .css({ transform: 'rotate('+now+'deg)' })
               .find('label')
                  .css({ transform: 'rotate('+(-now)+'deg)' });
        }, duration: 0
    });
}

// show / hide the options
function toggleOptions(s) {
    $(s).toggleClass('open');
    var li = $(s).find('li');
    var deg = $(s).hasClass('half') ? 180/(li.length-1) : 360/li.length;
    for(var i=0; i<li.length; i++) {
        var d = $(s).hasClass('half') ? (i*deg)-90 : i*deg;
        $(s).hasClass('open') ? rotate(li[i],d) : rotate(li[i],angleStart);
    }
}

$('.selector button').click(function(e) {
    toggleOptions($(this).parent());
});

setTimeout(function() { toggleOptions('.selector'); }, 1500);//@ sourceURL=pen.js
</script>

<script>
var textWrapper = document.querySelector('.ml6 .letters');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml6 .letter',
    translateY: ["1.1em", 0],
    translateZ: 0,
    duration: 750,
    delay: (el, i) => 50 * i
  }).add({
    targets: '.ml6',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  }); </script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

  </body>
</html>