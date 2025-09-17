<?php
	 include("session.php");
	 include('bdconn.php');

	 if(isset($_GET['SO'])){
		unset($_SESSION['TXuser']);
		unset($_SESSION['TXpass']);
		unset($_SESSION['TXecode']);
		unset($_SESSION['TXename']);
		unset($_SESSION['TXuty']);
		unset($_SESSION['TXbr']);
		unset($_SESSION['TXimg']);
		echo "<script>document.location = 'index.php?m=SLO';</script>";
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
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-6">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="desk.php">KMP-Leave Management System</a></h1>
	              </div>
	           </div>
	           <div class="col-md-6">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['TXename']; ?> <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="myprofile.php">আমার প্রোফাইল</a></li>
	                          <li><a href="?SO">প্রস্থান</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
		</div>