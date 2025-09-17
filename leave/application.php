<?php include('head.php');
if ($_SESSION['TXuty'] !== 'L0' && $_SESSION['TXuty'] !== 'L1' && $_SESSION['TXuty'] !== 'L2') {
  echo "<script>document.location = 'desk.php?m=NPAD';</script>";
}

if (isset($_POST['OK']) == 'Apply' && !empty($_POST['emp_pid'])) {
  $emp_pid  = $_POST['emp_pid'];
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

?>

<div class="page-content">
  <div class="row">
    <?php include_once('smenu.php'); ?>
    <div class="col-md-10">
      <div class="content-box-header panel-heading">
        <div class="panel-title">নতুন ছুটির আবেদন</div>
      </div>
      <div class="content-box-large box-with-header">
        <?php include("dismass.php"); ?>
        <form action="" method="POST" enctype="multipart/form-data">
          <?php if (isset($_POST['AU']) == 'Search' && !empty($_POST['id'])) {
            $q_mysql43 = mysqli_query($db_com, "SELECT * FROM `emp_info` WHERE `pub` = '1' and `idn`='$_POST[id]' or `kidn`='$_POST[id]' or `emp_pid`='$_POST[id]' limit 1") or die(mysqli_error());
            $q_cot43 = mysqli_num_rows($q_mysql43);
            if ($q_cot43 > 0) {
              while ($q_cot_row43 = mysqli_fetch_array($q_mysql43)) {
                $q_mysql33 = mysqli_query($db_com, "SELECT * FROM `designation` WHERE `did`='$q_cot_row43[emp_deg]' limit 1");
                $q_cot_row33 = mysqli_fetch_array($q_mysql33);

                $q_mysql35 = mysqli_query($db_com, "SELECT * FROM `section` WHERE `sid`='$q_cot_row43[section]' limit 1");
                $q_cot_row35 = mysqli_fetch_array($q_mysql35);
          ?>
                <p style="color: red; text-align: center;">* যুক্ত ফিল্ড অবশ্যই পূরণ করতে হবে...</p>
                <div class="row">
                  <div class="col-md-6">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label"> কেএমপি পরিচিতি নম্বর </label>
                        <input type="text" class="form-control" value="<?php echo $q_cot_row43['kidn']; ?>" disabled />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">র‌্যাংক/পদবী</label>
                        <input type="text" class="form-control" value="<?php echo $q_cot_row33['dname']; ?>" disabled />
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label class="control-label"> নাম</label>
                        <input type="text" class="form-control" value="<?php echo $q_cot_row43['emp_name']; ?>" disabled />
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="control-label" style="font-size:0.75em;"> বাংলাদেশ পুলিশ পরিচিতি নম্বর</label>
                        <input type="text" class="form-control" value="<?php echo $q_cot_row43['idn']; ?>" disabled /><br />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">শাখা/বিভাগ</label>
                        <input type="text" class="form-control" value="<?php echo $q_cot_row35['sname']; ?>" disabled />
                        <input type="hidden" id="section" name="section" value="<?php echo $q_cot_row43['section']; ?>" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label"> নিজ জেলা</label>
                        <input type="text" class="form-control" value="<?php echo $q_cot_row43['zila']; ?>" disabled />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <?php
                      $q_mysql413 = mysqli_query($db_com, "SELECT * FROM `application` WHERE `empid`='$q_cot_row43[emp_pid]' and `status1`='3' order by Id DESC limit 1") or die(mysqli_error());
                      $q_cot413 = mysqli_num_rows($q_mysql413);
                      if ($q_cot413 > 0) {
                        while ($q_cot_row413 = mysqli_fetch_array($q_mysql413)) {
                          $q_mysql314 = mysqli_query($db_com, "SELECT * FROM `leavetype` WHERE `lid`='$q_cot_row413[sleave]' limit 1");
                          $q_cot_row314 = mysqli_fetch_array($q_mysql314);
                      ?>
                          <div class="form-group" style='background:#FFC; padding:20px; font-size:1.3em;'>
                            <label for="h-input">সর্বশেষ ছুটির তথ্য</label><br />
                            ছুটির প্রকারভেদ/ধরনঃ <?php echo $q_cot_row314['lname']; ?><br />
                            ছুটি ভোগের তারিখ ও সময়ঃ <?php echo $q_cot_row413['sdate']; ?><br />
                            সর্বশেষ ছুটি ভোগের তারিখঃ <?php echo $q_cot_row413['edate']; ?><br />
                            মোট ছুটি ভোগ কালীন সময়ঃ <?php echo $q_cot_row413['wdate']; ?>
                            <br />ছুটি ভোগের কারণঃ <?php echo $q_cot_row413['comment']; ?>
                            <br /><br />
                            <?php
                            if (empty($q_cot_row413['approver_by1'])) {
                            } else {
                              echo "আরআই মন্তব্যঃ $q_cot_row413[approver_rem1]<br /><br />";
                            }
                            if (empty($q_cot_row413['approver_by2'])) {
                            } else {
                              echo "এসি মন্তব্যঃ $q_cot_row413[approver_rem2]<br /><br />";
                            }
                            if (empty($q_cot_row413['approver_by3'])) {
                            } else {
                              echo "চুড়ান্ত মন্তব্যঃ $q_cot_row413[approver_rem3]";
                            }
                            ?>

                          </div>
                        <?php }
                      } else { ?>
                        <div class="form-group" style='background:#FFC; padding:20px; font-size:1.3em;'>
                          <label for="h-input" style='color:red;'>কোন ছুটির তথ্য পাওয়া যায়নি</label>
                        </div>
                      <?php
                      }
                      ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="col-md-6">
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
                    <div class="col-md-6">
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
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label"> ছুটি ভোগের শুরুর তারিখ ও সময় (সম্ভাব্য)<span style="color: red;">*</span></label>
                        <input type="datetime-local" class="form-control" name="sdate" id="sdate" onChange="findDiff();" required />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">ছুটি ভোগের শেষের তারিখ ও সময় (সম্ভাব্য) <span style="color: red;">*</span></label>
                        <input type="datetime-local" class="form-control" name="edate" id="edate" onChange="findDiff();" required />
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label"> মোট ছুটি ভোগকালীন দিন <span style="color: red;">*</span></label>
                        <input type="number" class="form-control" id="wdate" name="wdate" required />
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <label class="control-label"> ছুটি ভোগের কারণ</label>
                        <textarea class="form-control" placeholder="ছুটি ভোগের কারণ" rows="3" name="comment"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="input-group" style='float:right;'>
                          <input type="hidden" id="emp_pid" name="emp_pid" value="<?php echo $q_cot_row43['emp_pid']; ?>" required>
                          <input type="submit" name="OK" value="Apply" class="form-control btn-primary">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php  }
            } else {
              echo "<script>document.location = '?m=STIW';</script>";
            }
          } else { ?>
            <div class="row">
              <div class="col-md-6"><br />
                <p style="color: red;">বাংলাদেশ পুলিশ পরিচিতি নম্বর/ কেএমপি পরিচিতি নম্বর / সিস্টেম অটোমেটিক আইডি <br /> দিয়ে সার্চ করুন পরবর্তী ধাপে যাওয়ান জণ্য...
                </p>
              </div>
              <div class="col-md-6"></div>
            </div>
            <div class="row">

              <div class="col-md-4">
                <div class="form-group">
                  <div class="input-group" style="width:100%">
                    <input type="number" name="id" class="form-control" required size="50">
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <div class="input-group" style="margin-top:32px">
                    <input type="submit" name="AU" value="Search" class="form-control btn-primary">
                  </div>
                </div>
              </div>
            </div>
      </div>
    <?php } ?>
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