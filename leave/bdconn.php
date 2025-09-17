<?php
   error_reporting('E_ALL ^ E_DEPRECATED');

    $db_com=mysqli_connect('localhost','wwwkmppo_uleave','XSql9$6H$n3A','wwwkmppo_leave');

	if (mysqli_connect_errno($db_com))
		{
			die('Not connected Server : ' . mysqli_connect_error());
        }

   $date = date("Y-m-d h:i:s", strtotime("now -6 GMT"));
   $date2 = date("Y-m-d", strtotime("now -6 GMT"));
   $year = date("Y", strtotime("now -6 GMT"));
   $todate = date("D, d-M-Y", strtotime("now -6 GMT"));
   $pagename=basename($_SERVER["SCRIPT_FILENAME"]);
   $pagename2=basename($_SERVER["SCRIPT_FILENAME"], '.php');

?>