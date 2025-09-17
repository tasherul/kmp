<?php include('head.php');

if ($_SESSION['TXuty'] !== 'L0' && $_SESSION['TXuty'] !== 'L3') {
    echo "<script>document.location = 'desk.php?m=NPAD';</script>";
}


if (isset($_POST['EOK1']) == 'Apply' && !empty($_POST['req_app']) && !empty($_POST['sdate']) && !empty($_POST['edate']) && !empty($_POST['wdate']) && !empty($_POST['lacode'])) {
    if ($_POST['req_app'] == '2') {
        $appdate = "`app_stage`='0', `status1`='2',";
    } else {
        $appdate = "`app_stage`='3', `status1`='1',";
    }
    if ($_POST['sp'] == 'Yes') {
        $appdate = "`app_stage`='2', `status1`='1',";
    }
    $isql2 = mysqli_query($db_com, "UPDATE `application` SET $appdate `sdate`='$_POST[sdate]', `edate`='$_POST[edate]', `wdate`='$_POST[wdate]', `approver_rem1`='$_POST[ri_rem]', `approver_by1`='$by', `approver_date1`='$date', `mby`='$by' WHERE `lacode`='$_POST[lacode]'") or die(mysqli_error());

    echo "<script>document.location = 'approveview.php?m=OK';</script>";
}

if (isset($_POST['EOK2']) == 'Apply' && !empty($_POST['req_app']) && !empty($_POST['sdate']) && !empty($_POST['edate']) && !empty($_POST['wdate']) && !empty($_POST['lacode'])) {
    if ($_POST['req_app'] == '2') {
        $appdate = "`app_stage`='0', `status1`='2',";
    } else {
        $appdate = "`app_stage`='3', `status1`='1',";
    }
    $isql2 = mysqli_query($db_com, "UPDATE `application` SET $appdate `sdate`='$_POST[sdate]', `edate`='$_POST[edate]', `wdate`='$_POST[wdate]', `approver_rem2`='$_POST[ri_rem]', `approver_by2`='$by', `approver_date2`='$date', `mby`='$by' WHERE `lacode`='$_POST[lacode]'") or die(mysqli_error());

    echo "<script>document.location = 'approveview.php?m=OK';</script>";
}

if (isset($_POST['EOK3']) == 'Apply' && !empty($_POST['req_app']) && !empty($_POST['sdate']) && !empty($_POST['edate']) && !empty($_POST['wdate']) && !empty($_POST['lacode'])) {
    if ($_POST['req_app'] == '2') {
        $appdate = "`app_stage`='0', `status1`='2',";
    } else {
        $appdate = "`app_stage`='4', `status1`='4',";
        $cell = $_POST['cell'];
        $mess = "আপনার ছুটি $_POST[wdate] দিন পাস করা হয়েছে...";
        
        //API Url
        $url = 'https://gpcmp.grameenphone.com/ecmapigw/webresources/ecmapigw.v2';
         
        //Initiate cURL.
        $ch = curl_init($url);
         
        //The JSON data.
        $jsonData = array(
            'username' => 'BDPAdmin_4500',
            'password' => 'BDPAdmin_4500',
            'apicode' => '1',
            'msisdn' => $cell,
            'countrycode' => '880',
            'cli' => 'KMP LEAVE',
            'messagetype' => '3',
            'message' => $mess,
            'messageid' => '0'
        );
         
         
         
        //Encode the array into JSON.
        $jsonDataEncoded = json_encode($jsonData);
         
        //Tell cURL that we want to send a POST request.
        curl_setopt($ch, CURLOPT_POST, 1);
         
        //Attach our encoded JSON string to the POST fields.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
         
        //Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
         
        //Execute the request
        $result = curl_exec($ch);
    }
    $isql2 = mysqli_query($db_com, "UPDATE `application` SET $appdate `sdate`='$_POST[sdate]', `edate`='$_POST[edate]', `wdate`='$_POST[wdate]', `approver_rem3`='$_POST[ri_rem]', `approver_by3`='$by', `approver_date3`='$date', `mby`='$by' WHERE `lacode`='$_POST[lacode]'") or die(mysqli_error());
    
    
    
    echo "<script>document.location = 'approveview.php?m=OK';</script>";
}

?>

<div class="page-content">
    <div class="row">
        <?php include_once('smenu.php'); ?>
        <div class="col-md-10">
            <div class="content-box-header panel-heading">
                <div class="panel-title">ছুটির তথ্যাবলী</div>
            </div>
            <div class="content-box-large box-with-header">
                <?php include("dismass.php"); ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <?php if (isset($_GET['ala1']) && !empty($_GET['ala1'])) {
                            $q_mysql43 = mysqli_query($db_com, "SELECT * FROM `application` WHERE `lacode`='$_GET[ala1]' limit 1") or die(mysqli_error());
                            $q_cot43 = mysqli_num_rows($q_mysql43);
                            if ($q_cot43 > 0) {
                                while ($q_cot_row43 = mysqli_fetch_array($q_mysql43)) {
                                    $q_mysql32 = mysqli_query($db_com, "SELECT * FROM `emp_info` WHERE `emp_pid`='$q_cot_row43[empid]' limit 1");
                                    $q_cot_row32 = mysqli_fetch_array($q_mysql32);
                                    $q_mysql34 = mysqli_query($db_com, "SELECT * FROM `leavetype` WHERE `lid`='$q_cot_row43[sleave]' limit 1");
                                    $q_cot_row34 = mysqli_fetch_array($q_mysql34);
                        ?>
                                    <div class="col-md-4"><br />
                                        <h4 style="color: green; text-align: center;"><?php echo "$q_cot_row43[empid] : $q_cot_row32[emp_name]"; ?></h4>
                                        <div class="col-md-12">
                                            <div class="form-group"><br /><br />
                                                <label for="h-input">ছুটির তথ্য</label><br /><br />
                                                ছুটির প্রকারভেদ/ধরনঃ <?php echo $q_cot_row34['lname']; ?><br /><br />
                                                ছুটি ভোগের তারিখ ও সময়ঃ <?php echo $q_cot_row43['sdate']; ?><br /><br />
                                                সর্বশেষ ছুটি ভোগের তারিখঃ <?php echo $q_cot_row43['edate']; ?><br /><br />
                                                মোট ছুটি ভোগ কালীন সময়ঃ <?php echo $q_cot_row43['wdate']; ?><br /><br />
                                                ছুটি ভোগের কারণঃ <?php echo $q_cot_row43['comment']; ?><br />
                                            </div>
                                            <div class="form-group"><br />
                                                <?php if (!empty($_GET['sp']) && $_GET['sp'] == 'Yes') { ?>
                                                    <input type="hidden" id="sp" name="sp" value="Yes" class="form-control" required>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4"><br />
                                        <p style="color: red; text-align: center;">RI Approver<br />* যুক্ত ফিল্ড অবশ্যই পূরণ করতে হবে...</p>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="h-input">ছুটি শুরুর তারিখ ও সময়</label><br /><br />
                                                <input type="text" id="sdate" value='<?php echo $q_cot_row43['sdate']; ?>' name="sdate" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="h-input">যোগদানের তারিখ ও সময়</label><br /><br />
                                                <input type="text" id="edate" value='<?php echo $q_cot_row43['edate']; ?>' name="edate" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="h-input">মোট ছুটি ভোগ কালীন সময়ঃ</label><br /><br />
                                                <input type="number" id="wdate" name="wdate" value='<?php echo $q_cot_row43['wdate']; ?>' class="form-control" required>
                                                <input type="hidden" id="lacode" name="lacode" value="<?php echo $q_cot_row43['lacode']; ?>" class="form-control" required>
                                                <input type="hidden" id="cell" name="cell" value="<?php echo $q_cot_row32['cell_off']; ?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">আরআই মন্তব্য</label>
                                                <textarea class="form-control" placeholder="মন্তব্য" rows="3" name="ri_rem" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <select id="req_app" name="req_app" class="form-control" required>
                                                        <option value='1'>Approve</option>
                                                        <option value='2'>Reject</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2" style="float: right; margin-right: 40px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="submit" name="EOK1" value="Apply" class="form-control btn-success">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                        <?php  }
                            } else {
                                echo "<script>document.location = 'approveview.php?m=STIW';</script>";
                            }
                        }
                        ?>

                        <?php if (isset($_GET['ala2']) && !empty($_GET['ala2'])) {
                            $q_mysql43 = mysqli_query($db_com, "SELECT * FROM `application` WHERE `lacode`='$_GET[ala2]' limit 1") or die(mysqli_error());
                            $q_cot43 = mysqli_num_rows($q_mysql43);
                            if ($q_cot43 > 0) {
                                while ($q_cot_row43 = mysqli_fetch_array($q_mysql43)) {
                                    $q_mysql32 = mysqli_query($db_com, "SELECT * FROM `emp_info` WHERE `emp_pid`='$q_cot_row43[empid]' limit 1");
                                    $q_cot_row32 = mysqli_fetch_array($q_mysql32);
                                    $q_mysql34 = mysqli_query($db_com, "SELECT * FROM `leavetype` WHERE `lid`='$q_cot_row43[sleave]' limit 1");
                                    $q_cot_row34 = mysqli_fetch_array($q_mysql34);
                        ?>
                                    <div class="col-md-4"><br />
                                        <h4 style="color: green; text-align: center;"><?php echo "$q_cot_row43[empid] : $q_cot_row32[emp_name]"; ?></h4>
                                        <div class="col-md-12">
                                            <div class="form-group"><br /><br />
                                                <label for="h-input">ছুটির তথ্য</label><br /><br />
                                                ছুটির প্রকারভেদ/ধরনঃ <?php echo $q_cot_row34['lname']; ?><br /><br />
                                                ছুটি ভোগের তারিখ ও সময়ঃ <?php echo $q_cot_row43['sdate']; ?><br /><br />
                                                সর্বশেষ ছুটি ভোগের তারিখঃ <?php echo $q_cot_row43['edate']; ?><br /><br />
                                                মোট ছুটি ভোগ কালীন সময়ঃ <?php echo $q_cot_row43['wdate']; ?><br /><br />
                                                ছুটি ভোগের কারণঃ <?php echo $q_cot_row43['comment']; ?><br />
                                            </div>
                                            <div class="form-group"><br />
                                                <?php
                                                if (empty($q_cot_row43['approver_by1'])) {
                                                } else {
                                                    echo "আরআই মন্তব্যঃ $q_cot_row43[approver_rem1]<br />";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4"><br />
                                        <p style="color: red; text-align: center;">AC Approver<br />* যুক্ত ফিল্ড অবশ্যই পূরণ করতে হবে...</p>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="h-input">ছুটি শুরুর তারিখ ও সময়</label><br /><br />
                                                <input type="text" id="sdate" value='<?php echo $q_cot_row43['sdate']; ?>' name="sdate" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="h-input">যোগদানের তারিখ ও সময়</label><br /><br />
                                                <input type="text" id="edate" value='<?php echo $q_cot_row43['edate']; ?>' name="edate" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="h-input">মোট ছুটি ভোগ কালীন সময়ঃ</label><br /><br />
                                                <input type="number" id="wdate" name="wdate" value='<?php echo $q_cot_row43['wdate']; ?>' class="form-control" required>
                                                <input type="hidden" id="lacode" name="lacode" value="<?php echo $q_cot_row43['lacode']; ?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">এসি মন্তব্য</label>
                                                <textarea class="form-control" placeholder="মন্তব্য" rows="3" name="ri_rem" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <select id="req_app" name="req_app" class="form-control" required>
                                                        <option value='1'>Approve</option>
                                                        <option value='2'>Reject</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2" style="float: right; margin-right: 40px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="submit" name="EOK2" value="Apply" class="form-control btn-success">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                        <?php  }
                            } else {
                                echo "<script>document.location = 'approveview.php?m=STIW';</script>";
                            }
                        }
                        ?>

                        <?php if (isset($_GET['ala3']) && !empty($_GET['ala3'])) {
                            $q_mysql43 = mysqli_query($db_com, "SELECT * FROM `application` WHERE `lacode`='$_GET[ala3]' limit 1") or die(mysqli_error());
                            $q_cot43 = mysqli_num_rows($q_mysql43);
                            if ($q_cot43 > 0) {
                                while ($q_cot_row43 = mysqli_fetch_array($q_mysql43)) {
                                    $q_mysql32 = mysqli_query($db_com, "SELECT * FROM `emp_info` WHERE `emp_pid`='$q_cot_row43[empid]' limit 1");
                                    $q_cot_row32 = mysqli_fetch_array($q_mysql32);
                                    $q_mysql34 = mysqli_query($db_com, "SELECT * FROM `leavetype` WHERE `lid`='$q_cot_row43[sleave]' limit 1");
                                    $q_cot_row34 = mysqli_fetch_array($q_mysql34);
                        ?>
                                    <div class="col-md-4"><br />
                                        <h4 style="color: green; text-align: center;"><?php echo "$q_cot_row43[empid] : $q_cot_row32[emp_name]"; ?></h4>
                                        <div class="col-md-12">
                                            <div class="form-group"><br /><br />
                                                <label for="h-input">ছুটির তথ্য</label><br /><br />
                                                ছুটির প্রকারভেদ/ধরনঃ <?php echo $q_cot_row34['lname']; ?><br /><br />
                                                ছুটি ভোগের তারিখ ও সময়ঃ <?php echo $q_cot_row43['sdate']; ?><br /><br />
                                                সর্বশেষ ছুটি ভোগের তারিখঃ <?php echo $q_cot_row43['edate']; ?><br /><br />
                                                মোট ছুটি ভোগ কালীন সময়ঃ <?php echo $q_cot_row43['wdate']; ?><br /><br />
                                                ছুটি ভোগের কারণঃ <?php echo $q_cot_row43['comment']; ?><br />
                                            </div>
                                            <div class="form-group"><br />
                                                <?php
                                                if (empty($q_cot_row43['approver_by1'])) {
                                                } else {
                                                    echo "আরআই মন্তব্যঃ $q_cot_row43[approver_rem1]<br /><br />";
                                                }
                                                if (empty($q_cot_row43['approver_by2'])) {
                                                } else {
                                                    echo "এসি মন্তব্যঃ $q_cot_row43[approver_rem2]";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4"><br />
                                        <p style="color: red; text-align: center;">Final Approver<br />* যুক্ত ফিল্ড অবশ্যই পূরণ করতে হবে...</p>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="h-input">ছুটি শুরুর তারিখ ও সময়</label><br /><br />
                                                <input type="text" id="sdate" value='<?php echo $q_cot_row43['sdate']; ?>' name="sdate" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="h-input">যোগদানের তারিখ ও সময়</label><br /><br />
                                                <input type="text" id="edate" value='<?php echo $q_cot_row43['edate']; ?>' name="edate" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="h-input">মোট ছুটি ভোগ কালীন সময়ঃ</label><br /><br />
                                                <input type="number" id="wdate" name="wdate" value='<?php echo $q_cot_row43['wdate']; ?>' class="form-control" required>
                                                <input type="hidden" id="lacode" name="lacode" value="<?php echo $q_cot_row43['lacode']; ?>" class="form-control" required>
                                                <input type="hidden" name="cell" value="<?php echo $q_cot_row32['cell_off']; ?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">চুড়ান্ত মন্তব্য</label>
                                                <textarea class="form-control" placeholder="মন্তব্য" rows="3" name="ri_rem" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <select id="req_app" name="req_app" class="form-control" required>
                                                        <option value='1'>Approve</option>
                                                        <option value='2'>Reject</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2" style="float: right; margin-right: 40px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="submit" name="EOK3" value="Apply" class="form-control btn-success">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                        <?php  }
                            } else {
                                echo "<script>document.location = 'approveview.php?m=STIW';</script>";
                            }
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('foot.php'); ?>