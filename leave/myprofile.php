<?php include('head.php');

if(isset($_POST['pchan']) == 'Change' && !empty($_POST['npass']) && !empty($_POST['cpass'])){
	$newpass = md5($_POST['npass']);
    $isql2 = mysqli_query($db_com,"UPDATE `emp_info` SET `emp_pass`='$newpass' WHERE `emp_pid`='$_SESSION[TXuser]' limit 1") or die(mysqli_error());
    echo "<script>document.location = '?m=OK';</script>";
}

?>

    <div class="page-content">
    	<div class="row">
		  <?php include_once('smenu.php'); ?>		  
		  <div class="col-md-10">
		  	<div class="content-box-header panel-heading">
				<div class="panel-title ">প্রোফাইল <i><strong><?php echo $_SESSION['TXename']; ?></strong></i></div>
			</div>
		  	<div class="content-box-large box-with-header">
				<?php include("dismass.php"); 
                
                                $q_mysql3 = mysqli_query($db_com,"SELECT * FROM `emp_info` WHERE `emp_pid`='$_SESSION[TXuser]' limit 1") or die(mysqli_error());
                                $q_cot3 = mysqli_num_rows($q_mysql3);
                                if($q_cot3 > 0)
                                {
                                    while($q_cot_row3=mysqli_fetch_array($q_mysql3))
                                    {
                                        if($q_cot_row3['pub']=='1'){$pubdata = "<span class='label label-primary'>Publish</span>";}
                                        else{$pubdata = "<span class='label label-default'>Unpublish</span>";}

                                        if($q_cot_row3['oacc']=='1'){$online = "<span class='label label-success'>Active</span>";}
                                        else{$online = "<span class='label label-default'>Disable</span>";}

                                        $q_mysql32 = mysqli_query($db_com,"SELECT * FROM `designation` WHERE `pub`='1' and `did`='$q_cot_row3[emp_deg]' limit 1");
                                        $q_cot_row32=mysqli_fetch_array($q_mysql32);
                                        
                                        $q_mysql34 = mysqli_query($db_com,"SELECT * FROM `level` WHERE `lsc`='$q_cot_row3[utype]' limit 1");
                                        $q_cot_row34=mysqli_fetch_array($q_mysql34);
										
										$q_mysql36 = mysqli_query($db_com,"SELECT * FROM `section` WHERE `sid`='$q_cot_row3[section]' limit 1");
										$q_cot_row36=mysqli_fetch_array($q_mysql36);

                                        echo"
                                            <div class='row'>
                                                <div class='col-md-4'>
                                                    <img src='$q_cot_row3[emp_photo]' ";?> onerror="this.onerror=null;this.src='userimg/noimg.jpg';"<?php echo "alt='$q_cot_row3[emp_name]' class='pull-left' style='margin: 0 20px 20px 0;'/>
                                                </div>
                                                <div class='col-md-8'>                                                    
                                                    <div class='table-responsive'>
                                                        <table class='table table-condensed'>
                                                            <h3><strong>$q_cot_row3[emp_name]</strong></h3>
                                                            <tbody>
															<tr>
                                                                <td>বাংলাদেশ পুলিশ পরিচিতি নম্বর</td>
                                                                <td><a>$q_cot_row3[idn]</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>কেএমপি পরিচিতি নম্বর</td>
                                                                <td><a>$q_cot_row3[kidn]</a></td>
                                                            </tr>
															<tr>
                                                                <td>সিস্টেম অটোমেটিক আইডি</td>
                                                                <td><a>$q_cot_row3[emp_pid]</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>নাম</td>
                                                                <td>$q_cot_row3[emp_name]</td>
                                                            </tr>
                                                            <tr>
                                                                <td>পদবী</td>
                                                                <td>$q_cot_row32[dname]</td>
                                                            </tr>
															<tr>
                                                                <td>শাখা/বিভাগ</td>
                                                                <td>$q_cot_row36[sname]</td>
                                                            </tr>
															<tr>
                                                                <td>জেলা</td>
                                                                <td>$q_cot_row3[zila]</td>
                                                            </tr>
                                                            <tr>
                                                                <td>মোবাইল</td>
                                                                <td><a>$q_cot_row3[cell_off]</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>ই-মেইল</td>
                                                                <td><a>$q_cot_row3[email]</a></td>
                                                            </tr>
															<tr>
                                                                <td>বর্তমান ঠিকানা</td>
                                                                <td><a>$q_cot_row3[pre]</a></td>
                                                            </tr>
															<tr>
                                                                <td>স্থায়ী ঠিকানা</td>
                                                                <td><a>$q_cot_row3[per]</a></td>
                                                            </tr>
															<tr>
                                                                <td>পুরস্কার</td>
                                                                <td><a>$q_cot_row3[award]</a></td>
                                                            </tr>
															<tr>
                                                                <td>তিরস্কার</td>
                                                                <td><a>$q_cot_row3[reproach]</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Profile Status</td>
                                                                <td>$pubdata</td>
                                                            </tr>
                                                            <tr>
                                                                <td>User Level</td>
                                                                <td><a>$q_cot_row34[lname]</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Online Access</td>
                                                                <td>$online</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
													<div class='table-responsive'>
                                                        <table class='table table-condensed'>
                                                            <h5><strong>ছুটির তথ্যাদি</strong></h5>
                                                            <tbody>
                                                            <tr style='background-color:#DDD;'>
																<th>#</th>
																<th>ছুটির প্রকারভেদ/ধরন</th>
																<th>ভোগকৃত ছুটি - $year</th>
															</tr>
                                                           ";
														   $ssll = 0;

															$q_mysql35 = mysqli_query($db_com,"SELECT * FROM `leavetype` WHERE `pub`='1' ORDER BY `lid` ASC") or die(mysqli_error());
															$q_cot35 = mysqli_num_rows($q_mysql35);
															if($q_cot35 > 0)
															{
																$cl = 20; $handcl = 0; $totalleave=0; $thicount = 0;
																while($q_cot_row35=mysqli_fetch_array($q_mysql35))
																{	
																	$ssll = $ssll+1;
																	$q_mysql36 = mysqli_query($db_com,"SELECT * FROM `application` WHERE `lyear`='$year' and `sleave`='$q_cot_row35[lid]' and `empid`='$q_cot_row3[emp_pid]' and `status1`='1'");
																	$q_cot36 = mysqli_num_rows($q_mysql36);
																	if($q_cot36 > 0){
																		while($q_cot_row36=mysqli_fetch_array($q_mysql36)){
																			$thicount = $thicount + $q_cot_row36['wdate'];
																			$totalleave = $totalleave + $q_cot_row36['wdate'];
																		}
																	}else{ $thicount = 0;}
																	echo"
																			<tr class='gradeA'>
																				<td class='text-center'>$ssll</td>
																				<td>$q_cot_row35[lname]</td>
																				<td>$thicount</td>
																			</tr>
																		";
																}
															}
															$handcl = $cl - $totalleave;
															echo"														   
                                                            <tr style='background-color:#FFC;'>
                                                                <td>প্রাপ্ত ছুটিঃ $cl</td>
                                                                <th>মোট ভোগকৃত ছুটিঃ $totalleave</th>
																<th>অবশিষ্ঠ ছুটিঃ $handcl</th>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>                                                
                                            </div>
                                        ";
										?>
									<div class='row'><br/>
										<div class="panel-title ">&nbsp;&nbsp; প্রোফাইলের পাসওয়ার্ড পরিবর্তন<br/><br/></div>
										<form action="" method="POST" enctype="multipart/form-data">
											<div class='col-md-3'>
												<div class="form-group">
													<label for="h-input">নতুন পাসওয়ার্ড</label>
													<div class="input-group">
													  <input type="password" id="npass" name="npass" placeholder="New Password" class="form-control" onkeyup='pcheck();' required>
													</div>
												</div>
											</div>
											<div class='col-md-3'>
												<div class="form-group">
													<label for="h-input">পাসওয়ার্ড নিশ্চিত করুন</label>
													<div class="input-group">
													  <input type="password" id="cpass" name="cpass" placeholder="Confirm Password" class="form-control" onkeyup='pcheck();' required>
													</div>
													<span id='pmess'></span>
												</div>
											</div>
											<div class='col-md-3'>																							
												<div class="action"><br/>
														<input class="btn btn-success signup" name="pchan" type="submit" value="Change">
												</div>
												
											</div>
										</form>
									</div>
								<?php
                                    }
                                }else{
                                    echo"
                                        <div class='row'>
                                            <div class='col-md-12'>
                                               <h1>Profile Not Found!</h1>
                                            </div>
                                        </div>
                                    ";
                                }
                                ?>
		  	</div>
		  </div>
		</div>
    </div>
	<br /><br /><br />
<script>
      var pcheck = function() {
            if (document.getElementById('npass').value ==
              document.getElementById('cpass').value) {
              document.getElementById('pmess').style.color = 'green';
              document.getElementById('pmess').innerHTML = 'Password Match';
            } else {
              document.getElementById('pmess').style.color = 'red';
              document.getElementById('pmess').innerHTML = 'Password Not Matching';
            }
          }
    </script>
<?php include('foot.php'); ?>