<?php include('head.php');

if ($_SESSION['TXuty'] !== 'L0' && $_SESSION['TXuty'] !== 'L1' && $_SESSION['TXuty'] !== 'L2'){echo "<script>document.location = 'desk.php?m=NPAD';</script>";}


if(isset($_POST['EOK']) == 'Apply' && !empty($_POST['lestart']) && !empty($_POST['lejoiny']) && !empty($_POST['ljy'])){

    $isql2 = mysqli_query($db_com,"UPDATE `application` SET `status2`='2', `latedate`='$_POST[lestart]', `letjoin`='$_POST[lejoiny]', `oleave`='$_POST[oleave]', `remark`='$_POST[remark]', `mby`='$by' WHERE `lacode`='$_POST[ljy]'") or die(mysqli_error());

    echo "<script>document.location = 'view.php?m=OK';</script>";
}

if(isset($_POST['COK']) == 'Conform' && $_SESSION['TXuty'] == 'L1' OR $_SESSION['TXuty'] == 'L0' && !empty($_POST['ljc'])){

    $isql2 = mysqli_query($db_com,"UPDATE `application` SET `status1`='1', `status2`='1', `mby`='$by' WHERE `lacode`='$_POST[ljc]'") or die(mysqli_error());

    echo "<script>document.location = 'view.php?m=OK';</script>";
}

?>

    <div class="page-content">
        <div class="row">
          <?php include_once('smenu.php'); ?>
          <div class="col-md-10">
            <div class="content-box-header panel-heading"><div class="panel-title">অতিবাসকাল অথ্যাবলী</div></div>
            <div class="content-box-large box-with-header">
                <?php include("dismass.php"); ?>
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <?php if(isset($_GET['ljy']) && !empty($_GET['ljy'])){
                        $q_mysql43 = mysqli_query($db_com,"SELECT * FROM `application` WHERE `lacode`='$_GET[ljy]' limit 1") or die(mysqli_error());
                        $q_cot43 = mysqli_num_rows($q_mysql43);
                        if($q_cot43 > 0)
                        {
                            while($q_cot_row43=mysqli_fetch_array($q_mysql43))
                            {
                                $q_mysql32 = mysqli_query($db_com,"SELECT * FROM `emp_info` WHERE `emp_pid`='$q_cot_row43[empid]' limit 1");
                                    $q_cot_row32=mysqli_fetch_array($q_mysql32);
                                $q_mysql34 = mysqli_query($db_com,"SELECT * FROM `leavetype` WHERE `lid`='$q_cot_row43[sleave]' limit 1");
                                    $q_cot_row34=mysqli_fetch_array($q_mysql34);
                        ?>
                            <div class="col-md-4"><br/>
                                    <h4 style="color: green; text-align: center;"><?php echo"$q_cot_row43[empid] : $q_cot_row32[emp_name]"; ?></h4>
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="h-input">ছুটির তথ্য</label><br/><br/>
													ছুটির প্রকারভেদ/ধরনঃ <?php echo $q_cot_row34['lname']; ?><br/><br/>
													ছুটি ভোগের তারিখ ও সময়ঃ <?php echo $q_cot_row43['sdate']; ?><br/><br/>
													সর্বশেষ ছুটি ভোগের তারিখঃ <?php echo $q_cot_row43['edate']; ?><br/><br/>
													মোট ছুটি ভোগ কালীন সময়ঃ <?php echo $q_cot_row43['wdate']; ?><br/>
                                            </div>
                                    </div>                                   
                            </div>
                            <div class="col-md-4"><br/>
                                <p style="color: red; text-align: center;">* যুক্ত ফিল্ড অবশ্যই পূরণ করতে হবে...</p>
                                <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="h-input">অতিবাসকাল শুরুর তারিখ ও সময়</label><br/><br/>
                                                <input type="datetime-local" id="lestart" name="lestart" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="h-input">যোগদানের তারিখ ও সময়</label><br/><br/>
                                                <input type="datetime-local" id="lejoiny" name="lejoiny" class="form-control" required>
                                            </div>
											<div class="form-group">
                                                <label for="h-input">অতিবাসকাল সময়</label><br/><br/>
                                                <input type="number" id="oleave" name="oleave" class="form-control" required>
												<input type="hidden" id="ljy" name="ljy" value="<?php echo $q_cot_row43['lacode'];?>" class="form-control" required>
                                            </div>
                                    </div>
                                 <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label"> মন্তব্য</label>                    
                                    <textarea class="form-control" placeholder="মন্তব্য" rows="3" name="remark"></textarea> 
                                  </div>
                                </div>   
                                 <div class="col-md-2" style="float: right; margin-right: 40px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                     <input type="submit" name="EOK" value="Apply" class="form-control btn-success">
                                                </div>
                                            </div>
                                    </div>
                            </div>

                     <?php  }
                        }else{echo "<script>document.location = 'view.php?m=STIW';</script>";}
                    }
                     ?>
					 <?php if(isset($_GET['ljc']) && !empty($_GET['ljc'])){
                        $q_mysql43 = mysqli_query($db_com,"SELECT * FROM `application` WHERE `status2`='2' and `lacode`='$_GET[ljc]' limit 1") or die(mysqli_error());
                        $q_cot43 = mysqli_num_rows($q_mysql43);
                        if($q_cot43 > 0)
                        {
                            while($q_cot_row43=mysqli_fetch_array($q_mysql43))
                            {
                                $q_mysql32 = mysqli_query($db_com,"SELECT * FROM `emp_info` WHERE `emp_pid`='$q_cot_row43[empid]' limit 1");
                                    $q_cot_row32=mysqli_fetch_array($q_mysql32);
                                $q_mysql34 = mysqli_query($db_com,"SELECT * FROM `leavetype` WHERE `lid`='$q_cot_row43[sleave]' limit 1");
                                    $q_cot_row34=mysqli_fetch_array($q_mysql34);
                        ?>
                            <div class="col-md-4"><br/>
                                    <h4 style="color: green; text-align: center;"><?php echo"$q_cot_row43[empid] : $q_cot_row32[emp_name]"; ?></h4>
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="h-input">ছুটির তথ্য</label><br/><br/>
													ছুটির প্রকারভেদ/ধরনঃ <?php echo $q_cot_row34['lname']; ?><br/><br/>
													ছুটি ভোগের তারিখ ও সময়ঃ <?php echo $q_cot_row43['sdate']; ?><br/><br/>
													সর্বশেষ ছুটি ভোগের তারিখঃ <?php echo $q_cot_row43['edate']; ?><br/><br/>
													মোট ছুটি ভোগ কালীন সময়ঃ <?php echo $q_cot_row43['wdate']; ?><br/>
													<label for="h-input"><br/>অতিবাসকাল ছুটির তথ্য</label><br/><br/>
													অতিবাসকাল শুরুর তারিখ ও সময় <?php echo $q_cot_row43['latedate']; ?><br/><br/>
													যোগদানের তারিখ ও সময় <?php echo $q_cot_row43['letjoin']; ?><br/><br/>
													অতিবাসকাল সময়<?php echo $q_cot_row43['oleave']; ?><br/><br/>
													মন্তব্য<?php echo $q_cot_row43['remark']; ?><br/>
                                            </div>
                                    </div>                                   
                            </div>
                            <div class="col-md-4"><br/>
                                <h4 style="color: red; text-align: center;">সকল তথ্য ঠিক থাকলে Conform বাটনে ক্লিক করলে উক্ত ব্যাক্তি Re-Join হবে...</h4>                                  
                                 <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="input-group">
                                                     <input type="submit" name="COK" value="Conform" class="form-control btn-success">
													 <input type="hidden" id="ljc" name="ljc" value="<?php echo $q_cot_row43['lacode'];?>" class="form-control" required>
                                                </div>
                                            </div>
                                    </div>
                            </div>

                     <?php  }
                        }else{echo "<script>document.location = 'view.php?m=STIW';</script>";}
                    }
                     ?>
                </div>
                </form>
            </div>
          </div>
        </div>
    </div>

<?php include('foot.php'); ?>