<?php include('head.php');

if ($_SESSION['TXuty'] !== 'L0' && $_SESSION['TXuty'] !== 'L1') {
    echo "<script>document.location = 'desk.php?m=NPAD';</script>";
}

if (isset($_POST['OK']) == 'Apply' && !empty($_POST['empid'])) {
    $scodeee = md5($date);
    $isql = mysqli_query($db_com, "INSERT INTO `ri_approve`(`ri_code`, `section`, `approverstage`, `empid`) VALUES ('$scodeee', '$_POST[section]', '$_POST[approverstage]', '$_POST[empid]')");
    echo "<script>document.location = '?m=OK';</script>";
}

if (isset($_POST['EOK']) == 'Change' && !empty($_POST['empid']) && !empty($_POST['ri_code'])) {
    $isql2 = mysqli_query($db_com, "UPDATE `ri_approve` SET `section`='$_POST[section]', `approverstage`='$_POST[approverstage]', `empid`='$_POST[empid]' WHERE `ri_code`='$_POST[ri_code]'");
    echo "<script>document.location = '?m=OK';</script>";
}

if (isset($_GET['del']) && !empty($_GET['del'])) {
    $isql4 = mysqli_query($db_com, "DELETE FROM `ri_approve` WHERE `ri_code`='$_GET[del]'");
    echo "<script>document.location = '?m=OK';</script>";
}

?>

<div class="page-content">
    <div class="row">
        <?php include_once('smenu.php'); ?>
        <div class="col-md-10">
            <div class="content-box-header panel-heading">
                <div class="panel-title">Application Approver</div>
            </div>
            <div class="content-box-large box-with-header">
                <?php include("dismass.php"); ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <?php if (isset($_GET['edi']) && !empty($_GET['edi'])) {
                            $q_mysql43 = mysqli_query($db_com, "SELECT * FROM `ri_approve` WHERE `ri_code`='$_GET[edi]' limit 1") or die(mysqli_error());
                            $q_cot43 = mysqli_num_rows($q_mysql43);
                            if ($q_cot43 > 0) {
                                while ($q_cot_row43 = mysqli_fetch_array($q_mysql43)) {
                        ?>
                                    <div class="col-md-4"><br /><br /><br />
                                        <p style="color: red; text-align: center;">* যুক্ত ফিল্ড অবশ্যই পূরণ করতে হবে...</p>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">শাখা/বিভাগ <span style="color: red;">*</span></label>
                                                <select id="section" name="section" class="form-control" required>
                                                    <option value="">Select শাখা/বিভাগ</option>
                                                    <?php
                                                    $q_mysql36 = mysqli_query($db_com, "SELECT * FROM `section` WHERE `pub`='1' ORDER BY `sid` ASC") or die(mysqli_error());
                                                    $q_cot36 = mysqli_num_rows($q_mysql36);
                                                    if ($q_cot36 > 0) {
                                                        while ($q_cot_row36 = mysqli_fetch_array($q_mysql36)) {
                                                            if ($q_cot_row36['sid'] == $q_cot_row43['section']) {
                                                                echo "<option value='$q_cot_row36[sid]' selected>$q_cot_row36[sname]</option>";
                                                            } else {
                                                                echo "<option value='$q_cot_row36[sid]'>$q_cot_row36[sname]</option>";
                                                            }
                                                        }
                                                    } else {
                                                        echo "<option>Section No Found!</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="h-input">Approver Stage</label>
                                                <select id="approverstage" name="approverstage" class="form-control" required>
                                                    <option value="1" <?php if ($q_cot_row43['approverstage'] == 1) {
                                                                            echo "selected";
                                                                        } ?>>1st Approver</option>
                                                    <option value="2" <?php if ($q_cot_row43['approverstage'] == 2) {
                                                                            echo "selected";
                                                                        } ?>>2nd Approver</option>
                                                    <option value="3" <?php if ($q_cot_row43['approverstage'] == 3) {
                                                                            echo "selected";
                                                                        } ?>>Final Approver</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="h-input">সিস্টেম অটোমেটিক আইডি নং</label>
                                                <div class="input-group">
                                                    <input type="number" name="empid" value="<?php echo $q_cot_row43['empid']; ?>" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2" style="float: right; margin-right: 140px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="hidden" id="ri_code" name="ri_code" value="<?php echo $q_cot_row43['ri_code']; ?>" required>
                                                    <input type="submit" name="EOK" value="Change" class="form-control btn-success">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            <?php  }
                            } else {
                                echo "<script>document.location = '?m=STIW';</script>";
                            }
                        } else { ?>
                            <div class="col-md-4"><br /><br /><br />
                                <p style="color: red; text-align: center;">* যুক্ত ফিল্ড অবশ্যই পূরণ করতে হবে...</p>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="control-label">শাখা/বিভাগ <span style="color: red;">*</span></label>
                                        <select id="section" name="section" class="form-control" required>
                                            <option value="">Select শাখা/বিভাগ</option>
                                            <?php
                                            $q_mysql36 = mysqli_query($db_com, "SELECT * FROM `section` WHERE `pub`='1' ORDER BY `sid` ASC") or die(mysqli_error());
                                            $q_cot36 = mysqli_num_rows($q_mysql36);
                                            if ($q_cot36 > 0) {
                                                while ($q_cot_row36 = mysqli_fetch_array($q_mysql36)) {
                                                    echo "<option value='$q_cot_row36[sid]'>$q_cot_row36[sname]</option>";
                                                }
                                            } else {
                                                echo "<option>Section No Found!</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="h-input">Approver Stage</label>
                                        <select id="approverstage" name="approverstage" class="form-control" required>
                                            <option value="1">1st Approver</option>
                                            <option value="2">2nd Approver</option>
                                            <option value="3">Final Approver</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="h-input">সিস্টেম অটোমেটিক আইডি নং</label>
                                        <div class="input-group">
                                            <input type="number" name="empid" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2" style="float: right; margin-right: 140px;">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="submit" name="OK" value="Apply" class="form-control btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="col-md-8">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Section</th>
                                        <th>Approver Stage</th>
                                        <th>ID & Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sl = 0;

                                    $q_mysql3 = mysqli_query($db_com, "SELECT * FROM `ri_approve` ORDER BY `id` DESC") or die(mysqli_error());
                                    $q_cot3 = mysqli_num_rows($q_mysql3);
                                    if ($q_cot3 > 0) {
                                        while ($q_cot_row3 = mysqli_fetch_array($q_mysql3)) {
                                            $sl = $sl + 1;
                                            $q_mysql36 = mysqli_query($db_com, "SELECT * FROM `section` WHERE `sid`='$q_cot_row3[section]' ORDER BY `sid` ASC") or die(mysqli_error());
                                            while ($q_cot_row36 = mysqli_fetch_array($q_mysql36)) {
                                                $dsection = "$q_cot_row36[sname]";
                                            }
                                            if ($q_cot_row3['approverstage'] == 1) {
                                                $appstage = "1st Approver";
                                            } elseif ($q_cot_row3['approverstage'] == 2) {
                                                $appstage = "2nd Approver";
                                            } else {
                                                $appstage = "Final Approver";
                                            }

                                            $q_mysql40 = mysqli_query($db_com, "SELECT * FROM `emp_info` WHERE `emp_pid`='$q_cot_row3[empid]' limit 1") or die(mysqli_error());
                                            $q_cot40 = mysqli_num_rows($q_mysql40);
                                            if ($q_cot40 > 0) {
                                                while ($q_cot_row40 = mysqli_fetch_array($q_mysql40)) {
                                                    $q_mysql30 = mysqli_query($db_com, "SELECT * FROM `designation` WHERE `did`='$q_cot_row40[emp_deg]' limit 1");
                                                    $q_cot_row30 = mysqli_fetch_array($q_mysql30);
                                                    $deg = " ($q_cot_row30[dname])";
                                                    $name = $q_cot_row40['emp_name'];
                                                    $ep_code = $q_cot_row40['ep_code'];
                                                }
                                            } else {
                                                $deg = "";
                                                $ep_code = "";
                                                $name = "Not Found";
                                            }

                                            echo "
											<tr class='gradeA'>
												<td class='text-center'>$sl</td>
                                                <td>$dsection</td>
                                                <td>$appstage</td>
                                                <td><a href='empprofile.php?vpo=$ep_code'>$q_cot_row3[empid] :: $name</a> $deg</td>												
												<td>
                                                    <a href='?edi=$q_cot_row3[ri_code]' title='Edit'><i class='glyphicon glyphicon-edit'></i></a> ||
                                                
                                                    <a href='?del=$q_cot_row3[ri_code]' onclick='return confirmD(this);' title='Delete'><i class='glyphicon glyphicon-trash'></i></a>
                                                </td>
											</tr>
										";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('foot.php'); ?>