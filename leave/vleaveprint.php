<?php
	 include("session.php");
	 include('bdconn.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Leave Print</title>


<style>
	@font-face {
		font-family: 'Nikosh';
		src: url('css/Nikosh.ttf');
		src: url('css/Nikosh.ttf') format('truetype');
		font-weight: 100;
		font-style: normal;
	}
	
	body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        font-size: 13pt;
		font-family: 'Nikosh';
		line-height: 1.3em;
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 20mm 20mm 20mm 20mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 210mm;
        outline: 2cm #FFEAEA solid;
    }
    
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            page-break-after: always;
        }
    }
</style>
</head>

<body>
	<center>
	<div class='book'>
<?php


if(isset($_GET['lvt']))
	{
		$lvt = $_GET['lvt']; 
		$yea = $_GET['yea'];
		if(empty($yea)){$yea=$year;}
		if(!empty($lvt))
		{
		    echo"<div class='page'>";
		    $sl = 0;

								$q_mysql3 = mysqli_query($db_com,"SELECT * FROM `leavetype` WHERE `pub`='1' and `lid`='$lvt' limit 1") or die(mysqli_error());
								$q_cot3 = mysqli_num_rows($q_mysql3);
								if($q_cot3 > 0)
								{
								    $q_cot_row3=mysqli_fetch_array($q_mysql3);
								
									echo"<center><h3>$q_cot_row3[lname]তে আছে</h3></center>";
		     ?>   
		    <table cellpadding="3" width="100%" cellspacing="0" border="0" class="table table-striped table-bordered">
							<thead>
								<tr style='background-color:#EEE;'>
							    <th>ক্রঃ নং</th>
									<th>নাম</th>
									<th>ছুটির তথ্য</th>
									<th>বাংলাদেশ পুলিশ পরিচিতি নম্বর</th>
								</tr>
							</thead>
							<tbody>
								<?php
								    $q_mysql32 = mysqli_query($db_com,"SELECT * FROM `application` WHERE `lyear`='$yea' and `sleave`='$q_cot_row3[lid]' and `status1`='4'");
									$q_cot32 = mysqli_num_rows($q_mysql32);
									if($q_cot32 > 0)
								    {
    									while($q_cot_row32=mysqli_fetch_array($q_mysql32))
    									{
    										$sl = $sl+1;
    										
    										$q_mysql326 = mysqli_query($db_com,"SELECT * FROM `emp_info` WHERE `emp_pid`='$q_cot_row32[empid]' limit 1");
    										$q_cot_row326=mysqli_fetch_array($q_mysql326);
    										$emp_name = $q_cot_row326['emp_name'];
    										$idn = $q_cot_row326['idn'];
    										
    										$sdate = date("d/m/Y", strtotime($q_cot_row32['sdate']));
    										$edate = date("d/m/Y", strtotime($q_cot_row32['edate']));
    										
    										echo"
    												<tr class='gradeA'>
    													<th class='text-center'>$sl</th>
    													<td>$emp_name</td>
    													<td>$sdate - $edate = $q_cot_row32[wdate]</td>
    													<th>$idn</th>
    												</tr>
    											";
    									}echo"
										<tr style='background-color:#FFC;'>
										    <th></th>
                                            <td colspan='2' align='right'> মোট ছুটিতে আছে</th>
											<th>$q_cot32</th>
                                        </tr>";
								    }else{echo"<tr style='background-color:red;'><th colspan='4'><h3>কোন তথ্য পাওয়া যায়নি</h3></th></tr>";}
                                    echo"
							</tbody>
						</table>";
				}else{echo"<h3>কোন তথ্য পাওয়া যায়নি</h3>";
			}
			echo"</div>";
		}
		else{echo "<script>window.close();</script>";}									
	}
	else{echo "<script>window.close();</script>";}
		?>
	
</div>
    </center>
	</body>

</script>
</html>