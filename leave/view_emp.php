<?php include('head.php');

if ($_SESSION['TXuty'] !== 'L0' && $_SESSION['TXuty'] !== 'L1' && $_SESSION['TXuty'] !== 'L2'){echo "<script>document.location = 'desk.php?m=NPAD';</script>";}

if(isset($_GET['pub']) && !empty($_GET['pub'])){
    $isql3 = mysqli_query($db_com,"UPDATE `emp_info` SET `pub`='1', `mby`='$_SESSION[TXuser]' WHERE `ep_code`='$_GET[pub]'");
    echo "<script>document.location = '?m=OK';</script>";
}
if(isset($_GET['upub']) && !empty($_GET['upub'])){
    $isql4 = mysqli_query($db_com,"UPDATE `emp_info` SET `pub`='2', `mby`='$_SESSION[TXuser]' WHERE `ep_code`='$_GET[upub]'");
    echo "<script>document.location = '?m=OK';</script>";
}
if(isset($_GET['doa']) && !empty($_GET['doa'])){
    $isql4 = mysqli_query($db_com,"UPDATE `emp_info` SET `oacc`='2', `mby`='$_SESSION[TXuser]' WHERE `ep_code`='$_GET[doa]'");
    echo "<script>document.location = '?m=OK';</script>";
}
if(isset($_GET['deld']) && !empty($_GET['deld'])&& $_SESSION['TXuty'] == 'L0'){
    $isql4 = mysqli_query($db_com,"DELETE FROM `emp_info` WHERE `ep_code`='$_GET[deld]'");
    echo "<script>document.location = '?m=OK';</script>";
}

?>

    <div class="page-content">
    	<div class="row">
		  <?php include_once('smenu.php'); ?>
		  <div class="col-md-10">
			<div class="content-box-header panel-heading"><div class="panel-title">কর্মচারী তালিকা দেখুন</div></div>
  			<div class="content-box-large box-with-header">
				<?php include("dismass.php"); ?>
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr style="font-size: 0.9em;">
							    <th>ক্রঃ নং</th>
								<th>র‌্যাংক/পদবী</th>
								<th>কেএমপি পরিচিতি নম্বর</th>
							    <th>বাংলাদেশ পুলিশ পরিচিতি নম্বর</th>								
								<th>নাম</th>
								<th>শাখা/বিভাগ</th>							
								<th>মোবাইল/ই-মেইল</th>
								<th>ছবি</th>
								<th>অবস্থান</th>
								<th>কার্যক্রম</th>
								<th>সিস্টেম অটোমেটিক আইডি</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$sl = 0;
							$q_mysql3 = mysqli_query($db_com,"SELECT * FROM `emp_info` WHERE `emp_pid`!='19710000' ORDER BY `epid` DESC") or die(mysqli_error());
							$q_cot3 = mysqli_num_rows($q_mysql3);
							if($q_cot3 > 0){
								while($q_cot_row3=mysqli_fetch_array($q_mysql3)){                                    

                                    $q_mysql33 = mysqli_query($db_com,"SELECT * FROM `designation` WHERE `did`='$q_cot_row3[emp_deg]' limit 1");
                                    $q_cot_row33=mysqli_fetch_array($q_mysql33);
									
									$q_mysql36 = mysqli_query($db_com,"SELECT * FROM `section` WHERE `sid`='$q_cot_row3[section]' limit 1");
                                    $q_cot_row36=mysqli_fetch_array($q_mysql36);
									
                                    	if($q_cot_row3['pub']=='1'){
                                                $pubdata = "<span class='label label-primary'>Publish</span>";
                                                $eye = "<a href='?upub=$q_cot_row3[ep_code]' onclick='return confirmUp(this);' title='Unpublish'><i class='glyphicon glyphicon-eye-close'></i></a> ||";
                                            }
                                            else{
                                                $pubdata = "<span class='label label-default'>Unpublish</span>";
                                                $eye = "<a href='?pub=$q_cot_row3[ep_code]' onclick='return confirmP(this);' title='Publish'><i class='glyphicon glyphicon-eye-open'></i></a> ||";
                                            }
											
										if($q_cot_row3['oacc']=='1'){$online = "<br/><span class='label label-success'>Active</span>";
											$onl="<a href='?doa=$q_cot_row3[ep_code]' onclick='return confirmDOA(this);' title='Disable Online Access' style='color:black;'><i class='glyphicon glyphicon-off'></i></a>";}
                                        else{$online = "";
											$onl="";}
											
										if($_SESSION['TXuty']=='L0'){$del="<a href='?deld=$q_cot_row3[ep_code]' onclick='return confirmD(this);' title='Permanent Delete' style='color:red;'><i class='glyphicon glyphicon-trash'></i></a> || ";}
                                        else{$del="";}
										
										if($q_cot_row3['utype']=='L1' or $q_cot_row3['utype']==$_SESSION['TXuty']){$onl=""; $eye="";}
										
										
									$sl = $sl+1;
									echo"
										<tr class='gradeA'>
											<td class='text-center'>$sl</td>
											<td>$q_cot_row33[dname]</td>
											<td>$q_cot_row3[kidn]</td>
											<td>$q_cot_row3[idn]</td>
											<td>$q_cot_row3[emp_name]</td>
											<td>$q_cot_row36[sname]</td>
											<td>$q_cot_row3[cell_off]<br/>$q_cot_row3[email]</td>
											<td><img src='$q_cot_row3[emp_photo]'";?> onerror="this.onerror=null;this.src='userimg/noimg.jpg';" width="50px" alt="Photo"/><?php echo "</td>
											<td>$pubdata $online</td>											
											<td><a style='color:green;' href='empprofile.php?vpo=$q_cot_row3[ep_code]' title='View Profile'><i class='glyphicon glyphicon-user'></i></a> || $eye $del $onl</td>
											<td>$q_cot_row3[emp_pid]</td>
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