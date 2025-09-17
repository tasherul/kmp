<?php
if(isset($_GET['m']))
{   
	$mess = mysqli_query($db_com,"SELECT * FROM `dis_alart` WHERE `dscode`='$_GET[m]' limit 1") or die(mysqli_error());
	$merow3 = mysqli_num_rows($mess);
	if($merow3 > 0){
		while($mess_row3=mysqli_fetch_array($mess))
		{echo "$mess_row3[dmess]"; }
	}
}
 ?>