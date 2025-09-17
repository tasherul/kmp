<?php include('head.php');

if (isset($_GET['aplya'])) {
	$vra = $_GET['aplya'];
	if (empty($vra)) {
		echo "<script>document.location = '?m=STIW';</script>";
	} else {
		$u_mysql49 = mysqli_query($db_com, "SELECT * FROM `application` WHERE `lacode`='$vra' LIMIT 1") or die(mysqli_error());
		$u_cot49 = mysqli_num_rows($u_mysql49);
		if ($u_cot49 > 0) {
			$isql2 = mysqli_query($db_com, "UPDATE `application` SET `app_stage`='1', `status1`='1', `mby`='$by' WHERE `lacode`='$vra' LIMIT 1") or die(mysqli_error());
			echo "<script>document.location = '?m=OK';</script>";
		} else {
			echo "<script>document.location = '?m=NOK';</script>";
		}
	}
}


if (isset($_GET['del']) && !empty($_GET['del'])) {
	$vra = $_GET['del'];
	if (empty($vra)) {
		echo "<script>document.location = '?m=STIW';</script>";
	} else {
		$u_mysql49 = mysqli_query($db_com, "SELECT * FROM `application` WHERE `lacode`='$vra' and `status1`='0' LIMIT 1") or die(mysqli_error());
		$u_cot49 = mysqli_num_rows($u_mysql49);
		if ($u_cot49 > 0) {
			$isql4 = mysqli_query($db_com, "DELETE FROM `application` WHERE `lacode`='$vra'");
			echo "<script>document.location = '?m=OK';</script>";
		} else {
			echo "<script>document.location = '?m=NOK';</script>";
		}
	}
}
?>

    <div class="page-content">
    	<div class="row">
		  <?php include_once('smenu.php'); ?>
		  <div class="col-md-10">
			<div class="content-box-header panel-heading"><div class="panel-title">আমার ছুটির তালিকা</div></div>
  			<div class="content-box-large box-with-header">
				<?php include("dismass.php"); ?>
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr style="font-size: 0.9em;">
							    <th>ক্রঃ নং</th>
								<th>ছুটির আবেদন নম্বর</th>
								<th>কেএমপি পরিচিতি নম্বর</th>
							    <th>সিস্টেম অটোমেটিক আইডি</th>								
								<th>নাম</th>								
								<th>ছুটির প্রকারভেদ/ধরন</th>								
								<th>ছুটি ভোগের তারিখ ও সময়</th>								
								<th>সর্বশেষ ছুটি ভোগের তারিখ</th>								
								<th>মোট ছুটি ভোগ কালীন সময়</th>
								<th>মন্তব্য</th>
								<th>অবস্থান</th>
								<th>কার্যক্রম</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$sl = 0;
							$q_mysql3 = mysqli_query($db_com,"SELECT * FROM `application` WHERE `empid`='$_SESSION[TXuser]' ORDER BY `Id` DESC") or die(mysqli_error());
							$q_cot3 = mysqli_num_rows($q_mysql3);
							if($q_cot3 > 0){
								while($q_cot_row3=mysqli_fetch_array($q_mysql3)){
                                     
                                    $q_mysql32 = mysqli_query($db_com,"SELECT * FROM `emp_info` WHERE `emp_pid`='$q_cot_row3[empid]' limit 1");
                                    $q_cot_row32=mysqli_fetch_array($q_mysql32);

                                    $q_mysql33 = mysqli_query($db_com,"SELECT * FROM `designation` WHERE `did`='$q_cot_row32[emp_deg]' limit 1");
                                    $q_cot_row33=mysqli_fetch_array($q_mysql33);

                                    $q_mysql34 = mysqli_query($db_com,"SELECT * FROM `leavetype` WHERE `lid`='$q_cot_row3[sleave]' limit 1");
                                    $q_cot_row34=mysqli_fetch_array($q_mysql34);
									
									$q_mysql35 = mysqli_query($db_com,"SELECT * FROM `section` WHERE `sid`='$q_cot_row32[section]' limit 1");
                                    $q_cot_row35=mysqli_fetch_array($q_mysql35);
									
									if ($q_cot_row3['status1'] == '0') {
									$pubdata = "<span class='label label-warning'>Not Apply</span>";
									$eye = "<a href='?aplya=$q_cot_row3[lacode]' title='Apply' onclick='return confirmAR(this);'><i class='glyphicon glyphicon-ok'></i>";
									$rejoin = "<a href='?del=$q_cot_row3[lacode]' onclick='return confirmD(this);' title='Delete'><i class='glyphicon glyphicon-trash'></i></a>";
								} elseif ($q_cot_row3['status1'] == '1') {
									$pubdata = "<span class='label label-default'>Applyed</span>";
									$eye = "";
									$rejoin = "";
								} elseif ($q_cot_row3['status1'] == '2') {
									$pubdata = "<span class='label label-warning'>Leave Cancel</span>";
									$eye = "";
									$rejoin = "";
								} elseif ($q_cot_row3['status1'] == '3') {
									$pubdata = "<span class='label label-info'>Re-Joint</span>";
									$eye = "";
									$rejoin = "";
								} elseif ($q_cot_row3['status1'] == '4') {
									$pubdata = "<span class='label label-primary'>Leave In</span>";
									$eye = "";
									$rejoin = "";
								} else {
									$eye = "";
									$pubdata = "";
									$rejoin = "";
								}

								if ($q_cot_row3['app_stage'] == '1') {
									$stage = "<span class='label label-primary'>Pending RI</span>";
								} elseif ($q_cot_row3['app_stage'] == '2') {
									$stage = "<span class='label label-primary'>Pending AC</span>";
								} elseif ($q_cot_row3['app_stage'] == '3') {
									$stage = "<span class='label label-primary'>Pending Final</span>";
								} elseif ($q_cot_row3['app_stage'] == '4') {
									$stage = "<span class='label label-success'>Approve</span>";
								} else {
									$stage = "";
								}

								if ($q_cot_row3['status1'] == '3') {
									$stage = "";
								}

								if (empty($q_cot_row3['approver_by1'])) {
									$approve1 = "-";
								} else {
									$approve1 = "OK";
								}
								if (empty($q_cot_row3['approver_by2'])) {
									$approve2 = "-";
								} else {
									$approve2 = "OK";
								}
								if (empty($q_cot_row3['approver_by3'])) {
									$approve3 = "-";
								} else {
									$approve3 = "OK";
								}

								if ($q_cot_row32['emp_deg'] == 10 or $q_cot_row32['emp_deg'] == 11 or $q_cot_row32['emp_deg'] == 12) {
									$print = "<a href='app-print.php?aptcc=$q_cot_row3[lacode]' target='_blank' title='App Print' style='color:black;'><i class='glyphicon glyphicon-print'></i></a>";
									$acappdata = "<br/>AC: $approve2";
								} elseif ($q_cot_row32['emp_deg'] == 13 or $q_cot_row32['emp_deg'] == 14) {
									$print = "<a href='app-print2.php?aptcc=$q_cot_row3[lacode]' target='_blank' title='App Print' style='color:black;'><i class='glyphicon glyphicon-print'></i></a>";
									$acappdata = "";
								} else {
									$print = "<a href='app-print3.php?aptcc=$q_cot_row3[lacode]' target='_blank' title='App Print' style='color:black;'><i class='glyphicon glyphicon-print'></i></a>";
									$acappdata = "";
								}
                                    

									$sl = $sl+1;
									echo"
										<tr class='gradeA'>
											<td class='text-center'>$sl</td>
											<td class='text-center'>$q_cot_row3[Id]</td>
											<td>$q_cot_row32[kidn]</td>
											<td>$q_cot_row32[emp_pid]</td>
											<td>$q_cot_row32[emp_name]</td>											
											<td>$q_cot_row34[lname]</td>
											<td>$q_cot_row3[sdate]</td>
											<td>$q_cot_row3[edate]</td>
											<td>$q_cot_row3[wdate]</td>
											<td>$q_cot_row3[comment]</td>
											<td width='120px'>$pubdata - $stage<br/>RI: $approve1 $acappdata<br/>Final: $approve3</td>
											<td style='font-size:1.2em; letter-spacing:7px; line-height:2em;'>$eye $rejoin $print</td>
										</tr>
									";								
								}
							}
						?>
						</tbody>
					</table>
  			</div>
		  </div>
		</div>
    </div>

<?php include('foot.php'); ?>