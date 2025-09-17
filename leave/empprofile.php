<?php include('head.php'); 

if ($_SESSION['TXuty'] !== 'L0' && $_SESSION['TXuty'] !== 'L1' && $_SESSION['TXuty'] !== 'L2'){echo "<script>document.location = 'desk.php?m=NPAD';</script>";}

if(isset($_POST['pchan']) == 'Apply' && !empty($_POST['npass']) && !empty($_POST['cpass']) && !empty($_POST['type'])){
	$newpass = md5($_POST['npass']);
    $isql2 = mysqli_query($db_com,"UPDATE `emp_info` SET `oacc`='1', `utype`='$_POST[type]', `emp_pass`='$newpass', `mby`='$_SESSION[TXuser]' WHERE `ep_code`='$_GET[vpo]' limit 1") or die(mysqli_error());
    echo "<script>document.location = '?vpo=$_GET[vpo]&m=OK';</script>";
}
 
if(isset($_POST['sign_ok']) == 'Change' && !empty($_FILES['sign_pic'])){
	
	$permited  = array('jpg', 'jpeg', 'png', 'gif');

    $file_name = $_FILES['sign_pic']['name'];
    $file_size = $_FILES['sign_pic']['size'];
    $file_temp = $_FILES['sign_pic']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "signimg/".$unique_image;

        if ($file_size >1048567) {
			echo "<span class='error'>Image Size should be less then 1MB!</span>";
        }
		elseif(in_array($file_ext, $permited) === false) {
			echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
        }
		else{
			move_uploaded_file($file_temp, $uploaded_image);
			$isql2 = mysqli_query($db_com,"UPDATE `emp_info` SET `sign_pic`='$uploaded_image', `mby`='$_SESSION[TXuser]' WHERE `ep_code`='$_GET[vpo]' limit 1") or die(mysqli_error());
			echo "<script>document.location = '?vpo=$_GET[vpo]&m=OK';</script>";
        }
}

if(isset($_POST['cphoto']) == 'Change' && !empty($_FILES['cphoo'])){
	
	$permited  = array('jpg', 'jpeg', 'png', 'gif');

    $file_name = $_FILES['cphoo']['name'];
    $file_size = $_FILES['cphoo']['size'];
    $file_temp = $_FILES['cphoo']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "userimg/".$unique_image;

        if ($file_size >1048567) {
			echo "<span class='error'>Image Size should be less then 1MB!</span>";
        }
		elseif(in_array($file_ext, $permited) === false) {
			echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
        }
		else{
			move_uploaded_file($file_temp, $uploaded_image);
			$isql2 = mysqli_query($db_com,"UPDATE `emp_info` SET `emp_photo`='$uploaded_image', `mby`='$_SESSION[TXuser]' WHERE `ep_code`='$_GET[vpo]' limit 1") or die(mysqli_error());
			echo "<script>document.location = '?vpo=$_GET[vpo]&m=OK';</script>";
        }
}


if(isset($_POST['EOK']) == 'Apply'){

      $isql = mysqli_query($db_com,"UPDATE `emp_info` SET `section`='$_POST[section]', `kidn`='$_POST[kidn]', `emp_name`='$_POST[name]', `emp_deg`='$_POST[rank]', `salary`='$_POST[salary]', `idn`='$_POST[idn]', `zila`='$_POST[hdis]', `pre`='$_POST[pre]', `per`='$_POST[per]', `award`='$_POST[award]', `reproach`='$_POST[reproach]', `email`='$_POST[email]', `cell_off`='$_POST[cell]', `mby`='$_SESSION[TXuser]' WHERE `ep_code`='$_GET[vpo]' limit 1") or die(mysqli_error());
      echo "<script>document.location = '?vpo=$_GET[vpo]&m=OK';</script>";        
			
	 }


?>
    <div class="page-content">
    	<div class="row">
		  <?php include_once('smenu.php'); ?>		  
		  <div class="col-md-10">
		  	<div class="content-box-header panel-heading">
				<div class="panel-title ">
				    <a class="btn btn-warning" style="margin:-7px 50px 0 0;" href="<?php if(isset($_GET['Edi'])){echo "?vpo=$_GET[vpo]";}else{echo "view_emp.php";} ?>">Back</a>
				    <?php if ($_SESSION['TXuty'] == 'L0' & !isset($_GET['Edi']) or $_SESSION['TXuty'] == 'L1'  & !isset($_GET['Edi']) or $_SESSION['TXuty'] == 'L2' & !isset($_GET['Edi'])){
				            echo "<a class='btn btn-danger' style='margin:-7px 50px 0 0;' href='?vpo=$_GET[vpo]&Edi'>Edit Profile</a>"; }
				    ?>
				View Profile of </div> 
			</div>
		  	<div class="content-box-large box-with-header">
				<?php include("dismass.php"); 
								
                                $q_mysql3 = mysqli_query($db_com,"SELECT * FROM `emp_info` WHERE `ep_code`='$_GET[vpo]' limit 1") or die(mysqli_error());
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
										
										if(isset($_GET['Edi'])){?>
										    <div class="content-box-large box-with-header">
                            				  <form action="" method="POST" enctype="multipart/form-data">
                                        <p style="color: red; text-align: center;">* যুক্ত ফিল্ড গুলো অবশ্যই পূরণ করতে হবে...</p>
                            	  			  <div class="row">
                            				  <div class="col-md-2">
                                              <div class="form-group">
                                                <label class="control-label"> কেএমপি পরিচিতি নম্বর <span style="color: red;">*</span></label></label>
                                                <input type="text" class="form-control" value="<?php echo "$q_cot_row3[kidn]"; ?>" placeholder="কেএমপি পরিচিতি নম্বর" name="kidn"/>
                                              </div>
                                            </div>
                                            <div class="col-md-5">
                            									<div class="form-group">
                            										<label class="control-label"> নাম <span style="color: red;">*</span></label>
                            										<input type="text" class="form-control" value="<?php echo "$q_cot_row3[emp_name]"; ?>" placeholder="নাম" name="name" required/>
                            								  </div>
                                            </div>
                                            <div class="col-md-3">
                            									<div class="form-group">
                            										<label class="control-label">র‌্যাংক/পদবী <span style="color: red;">*</span></label>
                                                <select id="rank" name="rank" class="form-control" required>
                                                  <option value="">Select র‌্যাংক/পদবী</option>
                                                  <?php
                                                      $q_mysql322 = mysqli_query($db_com,"SELECT * FROM `designation` WHERE `pub`='1' ORDER BY `did` ASC") or die(mysqli_error());
                                                      $q_cot322 = mysqli_num_rows($q_mysql322);
                                                      if($q_cot322 > 0){
                                                        while($q_cot_row322=mysqli_fetch_array($q_mysql322)){
                                                            if($q_cot_row322['did']==$q_cot_row3['emp_deg']){
                                                                echo"<option value='$q_cot_row322[did]' selected>$q_cot_row322[dname]</option>";
                                                            }else{
                                                                echo"<option value='$q_cot_row322[did]'>$q_cot_row322[dname]</option>";
                                                            }
                                                        }
                                                      }
                                                      else {echo"<option>Designation No Found!</option>";}
                                                  ?>
                                                </select>
                            									</div>
                                            </div>
                                            <div class="col-md-2">
                                              <div class="form-group">
                                                <label class="control-label" style="font-size:0.85em;"> বাংলাদেশ পুলিশ পরিচিতি নম্বর</label>
                                                <input type="text" class="form-control" value="<?php echo "$q_cot_row3[idn]"; ?>" placeholder="বাংলাদেশ পুলিশ পরিচিতি নম্বর" name="idn" /><br/>
                                              </div>
                                            </div>
                                            <div class="col-md-2">
                            									<div class="form-group">
                            										<label class="control-label"> নিজ জেলা <span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" value="<?php echo "$q_cot_row3[zila]"; ?>" placeholder="নিজ জেলা" name="hdis" required/>
                            									</div>
                                            </div>
                                            <div class="col-md-3">
                                              <div class="form-group">
                                                <label class="control-label"> মোবাইল নং <span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" value="<?php echo "$q_cot_row3[cell_off]"; ?>" placeholder="মোবাইল নং" name="cell" required/>
                                              </div>
                                            </div>
                                            <div class="col-md-3">
                                              <div class="form-group">
                                                <label class="control-label"> ই-মেইল</label>
                                                <input type="email" class="form-control" value="<?php echo "$q_cot_row3[email]"; ?>" placeholder="ই-মেইল" name="email"/>
                                              </div>
                                            </div>
                            				<div class="col-md-4">
                            									<div class="form-group">
                            										<label class="control-label">শাখা/বিভাগ <span style="color: red;">*</span></label>
                                                <select id="section" name="section" class="form-control" required>
                                                  <option value="">Select শাখা/বিভাগ</option>
                                                  <?php
                                                      $q_mysql366 = mysqli_query($db_com,"SELECT * FROM `section` WHERE `pub`='1' ORDER BY `sid` ASC") or die(mysqli_error());
                                                      $q_cot366 = mysqli_num_rows($q_mysql366);
                                                      if($q_cot366 > 0){
                                                        while($q_cot_row366=mysqli_fetch_array($q_mysql366)){
                                                            if($q_cot_row366['sid']==$q_cot_row3['section']){
                                                                echo"<option value='$q_cot_row366[sid]' selected>$q_cot_row366[sname]</option> ";
                                                            }else{
                                                                echo"<option value='$q_cot_row366[sid]'>$q_cot_row366[sname]</option>";
                                                            }
                                                        }
                                                      }
                                                      else {echo"<option>Section No Found!</option>";}
                                                  ?>
                                                </select>
                            									</div>
                                            </div>
                            				<div class="col-md-3">
                            									<div class="form-group">
                            										<label class="control-label">বর্তমান ঠিকানা</label>                    
                                                <textarea class="form-control" rows="5" name="pre"> <?php echo "$q_cot_row3[pre]";?></textarea> 
                            									</div>
                                            </div>
                            				<div class="col-md-3">
                            									<div class="form-group">
                            										<label class="control-label">স্থায়ী ঠিকানা</label>                    
                                                <textarea class="form-control" rows="5" name="per"><?php echo "$q_cot_row3[per]";?></textarea> 
                            									</div>
                                            </div>
                            				<div class="col-md-3">
                            									<div class="form-group">
                            										<label class="control-label">পুরস্কার</label>                    
                                                <textarea class="form-control" rows="5" name="award"><?php echo "$q_cot_row3[award]";?></textarea> 
                            									</div>
                                            </div>
                            				<div class="col-md-3">     
                            									<div class="form-group">
                            										<label class="control-label">শাস্তি</label>                    
                                                <textarea class="form-control" rows="5" name="reproach"><?php echo "$q_cot_row3[reproach]";?></textarea> 
                            									</div>
                                            </div>
                                            <div class="col-md-4" style="float: right;">
                                                <div class="col-md-8">
                                                  <div class="form-group">
                                                    <label class="control-label"> বেতন </label>
                                                    <input type="number" class="form-control" value="<?php echo "$q_cot_row3[salary]"; ?>" name="salary"/>
                                                  </div>
                                                </div>
                                        			<div class="form-group">
                                        				<div class="input-group"><br>
                                        					<input type="submit" name="EOK" value="Apply" class="form-control btn-primary">
                                        				</div>
                                        			</div>
                                            </div>
                              				    </div>
                              				  </form>
                              		  	</div>
                              		  	<?php
										}
										else{
										 echo"
                                            <div class='row'>
                                                <div class='col-md-4'>
                                                    <img src='$q_cot_row3[emp_photo]' ";?> onerror="this.onerror=null;this.src='userimg/noimg.jpg';"<?php echo "alt='$q_cot_row3[emp_name]' class='pull-left' style='margin: 0 20px 20px 0;'/>
													";
												if($q_cot_row3['utype']!=='L1' && $q_cot_row3['utype']!==$_SESSION['TXuty'] OR $_SESSION['TXuty']=='L0'){
													?>
													
													<div class="panel-title ">&nbsp;&nbsp;&nbsp; প্রোফাইলের ছবি পরিবর্তন <br/><br/></div>
													<form action="" method="POST" enctype="multipart/form-data">														
														<div class='col-md-8'>
															<div class="form-group">
																<div class="input-group">
																  <input type="file" id="cphoo" name="cphoo" class="form-control" required>
																  W-300px; H-330px;
																</div>
															</div>
														</div>
														<div class='col-md-1'>																							
															<div class="action">
																	<input class="btn btn-success signup" name="cphoto" type="submit" value="Change">
															</div>
															
														</div>
													</form>
													<img src='<?php echo "$q_cot_row3[sign_pic]"; ?>' onerror="this.onerror=null;this.src='signimg/noimg.png';"<?php echo "alt='$q_cot_row3[emp_name]' class='pull-left' style='margin: 20px;'/>"; ?>
													<br/><br/><br/>
													<form action="" method="POST" enctype="multipart/form-data">			
													
														<div class='col-md-8'>
														    <div class="panel-title ">&nbsp;&nbsp;&nbsp; স্বাক্ষার </div>
															<div class="form-group">
																<div class="input-group">
																  <input type="file" id="sign_pic" name="sign_pic" class="form-control" required>
																  W-150px; H-60px;
																</div>
															</div>
														</div>
														<div class='col-md-1'>																							
															<div class="action">
																	<input class="btn btn-success signup" name="sign_ok" type="submit" value="Change">
															</div>
															
														</div>
													</form>
												
												<?php	}												
													echo"
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
                                                                <td>বেতন </td>
                                                                <td>$q_cot_row3[salary]</td>
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
										if($q_cot_row3['utype']!=='L1' && $q_cot_row3['utype']!==$_SESSION['TXuty'] OR $_SESSION['TXuty']=='L0'){
										?>
										
									<div class='row'><br/>
										<div class="panel-title ">&nbsp;&nbsp; প্রোফাইলের অনলাইন একসেস ও  পাসওয়ার্ড <br/><br/></div>
										<form action="" method="POST" enctype="multipart/form-data">
											<div class='col-md-3'>
												<div class="form-group">
													<label class="control-label"> User Type <span style="color: red;">*</span></label>
													<select id="type" name="type" class="form-control" required>
													  <?php
														if($_SESSION['TXuty']=='L2'){ $uquee = "and `lsc`='L7'";}else{$uquee ="";}
														  $q_mysql32 = mysqli_query($db_com,"SELECT * FROM `level` WHERE `pub`='1' $uquee ORDER BY `lid` DESC") or die(mysqli_error());
														  $q_cot32 = mysqli_num_rows($q_mysql32);
														  if($q_cot32 > 0){
															while($q_cot_row32=mysqli_fetch_array($q_mysql32)){
																if($q_cot_row3[utype]==$q_cot_row32[lsc]){
																	echo"<option value='$q_cot_row32[lsc]' selected>$q_cot_row32[lname]</option>";
																}else{
																	echo"<option value='$q_cot_row32[lsc]'>$q_cot_row32[lname]</option>";
																}
															}
														  }
														  else {echo"<option>Level No Found!</option>";}
													  ?>
													</select>
												</div>
											</div>
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
														<input class="btn btn-success signup" name="pchan" type="submit" value="Apply">
												</div>
												
											</div>
										</form>
									</div>
								<?php
										    }   
										}
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