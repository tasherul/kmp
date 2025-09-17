<?php
session_start();
if (isset($_SESSION['TXuser']) and isset($_SESSION['TXpass'])) {
	echo "<script>document.location = 'desk.php?m=ASI';</script>";
}

include_once("bdconn.php");

if (isset($_POST['li']) == 'Login') {
	if (empty($_POST['KiD']) or empty($_POST['wordpass'])) {
		echo "<script>document.location = '?m=RAF';</script>";
	} else {
		$oku = $_POST['KiD'];
		$ku = preg_replace('/[^0-9]/', '', $oku);
		$wpass = $_POST['wordpass'];
		$mpass = md5($wpass);

		$cquery = mysqli_query($db_com, "SELECT * FROM `emp_info` WHERE `pub`='1' and `emp_pid`='$ku' limit 1");
		$crow = mysqli_num_rows($cquery);

		if ($crow > 0) {
			while ($crows = mysqli_fetch_array($cquery)) {
				$cueid = $crows['emp_pid'];
				$okpass = $crows['emp_pass'];
				$oacc = $crows['oacc'];
				if ($oacc == '1') {
					if ($okpass == $mpass) {
						$_SESSION['TXuser'] = $cueid;
						$_SESSION['TXpass'] = $okpass;
						$_SESSION['TXecode'] = $crows['ep_code'];
						$_SESSION['TXename'] = $crows['emp_name'];
						$_SESSION['TXuty'] = $crows['utype'];
						$_SESSION['TXbr'] = $crows['section'];
						$_SESSION['TXimg'] = $crows['emp_photo'];

						echo "<script>document.location = 'desk.php?m=WC';</script>";
					} else {
						echo "<script>document.location = '?m=PNM';</script>";
					}
				} else {
					echo "<script>document.location = '?m=UNA';</script>";
				}
			}
		} else {
			echo "<script>document.location = '?m=UNF';</script>";
		}
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>KMP-Leave Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- styles -->
	<link href="css/styles.css" rel="stylesheet">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-bg">
	<div class="page-content container">
		<div class="row"><br /><br /><br />
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
					<div class="box" style="background-color:#24947D;">
						<div class="content-wrap">
							<img src="images/kmp-logo.png" alt="KMP" width="80px" />
							<h6 style="margin: 15px -20px; color:#FFF;">Khulna Metropolitan Police<br /><small style="font-weight: bold; color:#FFC20E;">Leave Management System</small></h6>
							<?php include("dismass.php"); ?>
							<form action="" method="POST" enctype="multipart/form-data">
								<input class="form-control" type="number" name="KiD" placeholder="User Name" required><br />
								<input class="form-control" type="password" name="wordpass" placeholder="Password" required>
								<div class="action" style="margin-top:-30px">
									<input class="btn btn-warning signup" name="li" type="submit" value="Login">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jqueryv1.11.1.js"></script>
	<!-- Include all compiled plugins (below), or include individTXl files as needed -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
	<script>
		setTimeout(function() {
			$('#Aclose').fadeOut('slow');
		}, 5000);
	</script>
</body>

</html>