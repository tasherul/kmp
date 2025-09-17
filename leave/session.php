<?php
	session_start();	

	$by = $_SESSION['TXuser'];
	if(!isset($_SESSION['TXuser']) or !isset($_SESSION['TXename'])){
		header("location: index.php?m=SIF");
	}
