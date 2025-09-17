<?php include('head.php');
if ($_SESSION['TXuty'] !== 'L0' && $_SESSION['TXuty'] !== 'L1' && $_SESSION['TXuty'] !== 'L2'){echo "<script>document.location = 'desk.php?m=NPAD';</script>";}

	if(isset($_POST['OK']) == 'Apply'){
      $q_mysql32 = mysqli_query($db_com,"SELECT * FROM `emp_info` ORDER BY `epid` DESC limit 1");
      $q_cot_row32=mysqli_fetch_array($q_mysql32);
      $empid = $q_cot_row32['emp_pid'] + 1;

      $scodeee = md5($date);
      $isql = mysqli_query($db_com,"INSERT INTO `emp_info`(`ep_code`, `emp_pid`, `section`, `kidn`, `emp_name`, `emp_deg`, `salary`, `idn`, `zila`, `pre`, `per`, `award`, `reproach`, `email`, `cell_off`, `cby`, `pub`) VALUES ('$scodeee', '$empid', '$_POST[section]', '$_POST[kidn]', '$_POST[name]', '$_POST[rank]', '$_POST[salary]', '$_POST[idn]', '$_POST[hdis]', '$_POST[pre]', '$_POST[per]', '$_POST[award]', '$_POST[reproach]', '$_POST[email]', '$_POST[cell]', '$_SESSION[TXuser]', '1')") or die(mysqli_error());
      echo "<script>document.location = '?m=OK';</script>";        
			
	 }

?>

    <div class="page-content">
    	<div class="row">
		  <?php include_once('smenu.php'); ?>
		  <div class="col-md-10">
  			<div class="content-box-header panel-heading">
          <div class="panel-title">কর্মচারী যুক্ত করুন</div>
        </div>
  			<div class="content-box-large box-with-header">
				<?php include("dismass.php"); ?>
				  <form action="" method="POST" enctype="multipart/form-data">
            <p style="color: red; text-align: center;">* যুক্ত ফিল্ড গুলো অবশ্যই পূরণ করতে হবে...</p>
	  			  <div class="row">
				  <div class="col-md-2">
                  <div class="form-group">
                    <label class="control-label"> কেএমপি পরিচিতি নম্বর <span style="color: red;">*</span></label></label>
                    <input type="text" class="form-control" placeholder="কেএমপি পরিচিতি নম্বর" name="kidn"/>
                  </div>
                </div>
                <div class="col-md-5">
									<div class="form-group">
										<label class="control-label"> নাম <span style="color: red;">*</span></label>
										<input type="text" class="form-control" placeholder="নাম" name="name" required/>
								  </div>
                </div>
                <div class="col-md-3">
									<div class="form-group">
										<label class="control-label">র‌্যাংক/পদবী <span style="color: red;">*</span></label>
                    <select id="rank" name="rank" class="form-control" required>
                      <option value="">Select র‌্যাংক/পদবী</option>
                      <?php
                          $q_mysql32 = mysqli_query($db_com,"SELECT * FROM `designation` WHERE `pub`='1' ORDER BY `did` ASC") or die(mysqli_error());
                          $q_cot32 = mysqli_num_rows($q_mysql32);
                          if($q_cot32 > 0){
                            while($q_cot_row32=mysqli_fetch_array($q_mysql32)){
                              echo"<option value='$q_cot_row32[did]'>$q_cot_row32[dname]</option>";
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
                    <input type="text" class="form-control" placeholder="বাংলাদেশ পুলিশ পরিচিতি নম্বর" name="idn" /><br/>
                  </div>
                </div>
                <div class="col-md-2">
									<div class="form-group">
										<label class="control-label"> নিজ জেলা <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" placeholder="নিজ জেলা" name="hdis" required/>
									</div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="control-label"> মোবাইল নং <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" placeholder="মোবাইল নং" name="cell" required/>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="control-label"> ই-মেইল</label>
                    <input type="email" class="form-control" placeholder="ই-মেইল" name="email"/>
                  </div>
                </div>
				<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">শাখা/বিভাগ <span style="color: red;">*</span></label>
                    <select id="section" name="section" class="form-control" required>
                      <option value="">Select শাখা/বিভাগ</option>
                      <?php
                          $q_mysql36 = mysqli_query($db_com,"SELECT * FROM `section` WHERE `pub`='1' ORDER BY `sid` ASC") or die(mysqli_error());
                          $q_cot36 = mysqli_num_rows($q_mysql36);
                          if($q_cot36 > 0){
                            while($q_cot_row36=mysqli_fetch_array($q_mysql36)){
                              echo"<option value='$q_cot_row36[sid]'>$q_cot_row36[sname]</option>";
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
                    <textarea class="form-control" rows="5" name="pre"></textarea> 
									</div>
                </div>
				<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">স্থায়ী ঠিকানা</label>                    
                    <textarea class="form-control" rows="5" name="per"></textarea> 
									</div>
                </div>
				<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">পুরস্কার</label>                    
                    <textarea class="form-control" rows="5" name="award"></textarea> 
									</div>
                </div>
				<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">শাস্তি</label>                    
                    <textarea class="form-control" rows="5" name="reproach"></textarea> 
									</div>
                </div>
                <div class="col-md-4" style="float: right;">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label class="control-label"> বেতন </label>
                        <input type="number" class="form-control" name="salary"/>
                      </div>
                    </div>
            			<div class="form-group">
            				<div class="input-group"><br>
            					<input type="submit" name="OK" value="Apply" class="form-control btn-primary">
            				</div>
            			</div>
                </div>
  				    </div>
  				  </form>
  		  	</div>
		    </div>
		  </div>
    </div>

<?php include('foot.php'); ?>