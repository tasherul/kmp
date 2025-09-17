<?php include('head.php');

	if(isset($_POST['OK']) == 'Apply'){

        $emp_pid  = $_SESSION['TXuser'];
        $appto  = $_POST['appto'];
        $section  = $_POST['section'];
        $sleave  = $_POST['sleave'];
        $sdate  = $_POST['sdate'];
        $edate  = $_POST['edate'];
        $wdate  = $_POST['wdate'];
        $comment  = $_POST['comment'];
        
        $lcoed = md5($date);
      $isql = mysqli_query($db_com, "INSERT INTO `application`(`lacode`, `lyear`, `appto`, `section`, `empid`, `sleave`, `sdate`, `edate`, `wdate`, `comment`, `cby`, `pub`) VALUES('$lcoed', '$year', '$appto', '$section', '$emp_pid', '$sleave', '$sdate', '$edate', '$wdate', '$comment', '$_SESSION[TXuser]', '1')");
      echo "<script>document.location = '?m=OK';</script>";
    
      
	 }
	 
	 
	 

        $q_mysql43 = mysqli_query($db_com, "SELECT * FROM `emp_info` WHERE `emp_pid`='$_SESSION[TXuser]' limit 1") or die(mysqli_error());

              while ($q_cot_row43 = mysqli_fetch_array($q_mysql43)) {

                $q_mysql35 = mysqli_query($db_com, "SELECT * FROM `section` WHERE `sid`='$q_cot_row43[section]' limit 1");
                $q_cot_row35 = mysqli_fetch_array($q_mysql35);
                $sectionname = $q_cot_row35['sname']; $sectionid = $q_cot_row43['section'];
              }

?>

    <div class="page-content">
    	<div class="row">
		  <?php include_once('smenu.php'); ?>
		  <div class="col-md-10">
  			<div class="content-box-header panel-heading">
          <div class="panel-title">আমার ছুটির আবেদন</div>
        </div>
  			<div class="content-box-large box-with-header">
				<?php include("dismass.php"); ?>
				  <form action="" method="POST" enctype="multipart/form-data">
            <p style="color: red; text-align: center;">* যুক্ত ফিল্ড গুলো অবশ্যই পূরণ করতে হবে...</p>
	  			  <div class="row">
	  			      <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">বরাবর<span style="color: red;">*</span></label>
                        <select id="appto" name="appto" class="form-control" required>
                          <option value="">Select বরাবর</option>
                          <?php
                          $q_mysql72 = mysqli_query($db_com, "SELECT * FROM `appto` WHERE `pub`='1' ORDER BY `aid` ASC") or die(mysqli_error());
                          $q_cot72 = mysqli_num_rows($q_mysql72);
                          if ($q_cot72 > 0) {
                            while ($q_cot_row72 = mysqli_fetch_array($q_mysql72)) {
                              echo "<option value='$q_cot_row72[aid]'>$q_cot_row72[apptoname]</option>";
                            }
                          } else {
                            echo "<option>Application TO No Found!</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>                
                <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label"> ছুটির প্রকারভেদ/ধরন <span style="color: red;">*</span></label>
                        <select id="sleave" name="sleave" class="form-control" required>
                          <option value="">Select ছুটির প্রকারভেদ/ধরন</option>
                          <?php
                          $q_mysql32 = mysqli_query($db_com, "SELECT * FROM `leavetype` WHERE `pub`='1' and `lid`!='9' ORDER BY `lid` ASC") or die(mysqli_error());
                          $q_cot32 = mysqli_num_rows($q_mysql32);
                          if ($q_cot32 > 0) {
                            while ($q_cot_row32 = mysqli_fetch_array($q_mysql32)) {
                              echo "<option value='$q_cot_row32[lid]'>$q_cot_row32[lname]</option>";
                            }
                          } else {
                            echo "<option>Leave Types No Found!</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                <div class="col-md-3">
                  <div class="form-group">
                        <label class="control-label"> <small>ছুটি ভোগের শুরুর তারিখ ও সময় (সম্ভাব্য)</small><span style="color: red;">*</span></label>
                        <input type="datetime-local" class="form-control"  id="sdate" name="sdate" onChange="findDiff();" required />
                      </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                        <label class="control-label"><small>ছুটি ভোগের শেষের তারিখ ও সময় (সম্ভাব্য)</small> <span style="color: red;">*</span></label>
                        <input type="datetime-local" class="form-control"  id="edate" name="edate" onChange="findDiff();" required />
                      </div>
                </div>
                <div class="col-md-3">
          				<div class="form-group">
                        <label class="control-label"> মোট ছুটি ভোগকালীন দিন <span style="color: red;">*</span></label>
                        <input type="number" class="form-control" id="wdate" name="wdate" required />
                      </div>
                </div>
                <div class="col-md-2">
                      <div class="form-group">
                        <label class="control-label">শাখা/বিভাগ</label>
                        <input type="text" class="form-control" value="<?php echo $sectionname; ?>" disabled />
                        <input type="hidden" id="section" name="section" value="<?php echo $sectionid; ?>" />
                      </div>
                    </div>
                <div class="col-md-6">
									<div class="form-group">
										<label class="control-label">ছুটি ভোগের কারণ</label>                    
                    <textarea class="form-control" rows="1" name="comment"></textarea> 
									</div>
                </div>
                <div class="col-md-1">                  
            			<div class="form-group">
						<label class="control-label">---</label> 
            				<div class="input-group">
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
<script type="text/javascript">
  function findDiff() {
    var dob1 = document.getElementById("sdate").value;
    var dob2 = document.getElementById("edate").value;
    var date1 = new Date(dob1);
    var date2 = new Date(dob2);

    var ONE_DAY = 1000 * 60 * 60 * 24
    var d1 = date1.getTime()
    var d2 = date2.getTime()
    var diff = Math.abs(d1 - d2)
    document.getElementById("wdate").value = Math.round(diff / ONE_DAY);
  }
</script>
<?php include('foot.php'); ?>