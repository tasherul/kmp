<?php include('head.php');

if ($_SESSION['TXuty'] !== 'L0'){echo "<script>document.location = 'desk.php?m=NPAD';</script>";}

if(isset($_POST['OK']) == 'Apply' && !empty($_POST['sname'])){
    $scodeee = md5($_POST[sname]);
    $isql = mysqli_query($db_com,"INSERT INTO `section`(`scode`, `sname`, `pub`) VALUES ('$scodeee', '$_POST[sname]', '1')");
    echo "<script>document.location = '?m=OK';</script>";
}

if(isset($_POST['EOK']) == 'Change' && !empty($_POST['sname']) && !empty($_POST['scode'])){
    $isql2 = mysqli_query($db_com,"UPDATE `section` SET `sname`='$_POST[sname]' WHERE `scode`='$_POST[scode]'");
    echo "<script>document.location = '?m=OK';</script>";
}

if(isset($_GET['pub']) && !empty($_GET['pub'])){
    $isql3 = mysqli_query($db_com,"UPDATE `section` SET `pub`='1' WHERE `scode`='$_GET[pub]'");
    echo "<script>document.location = '?m=OK';</script>";
}
if(isset($_GET['upub']) && !empty($_GET['upub'])){
    $isql4 = mysqli_query($db_com,"UPDATE `section` SET `pub`='0' WHERE `scode`='$_GET[upub]'");
    echo "<script>document.location = '?m=OK';</script>";
}

if(isset($_GET['del']) && !empty($_GET['del'])){
    $isql4 = mysqli_query($db_com,"DELETE FROM `section` WHERE `scode`='$_GET[del]'");
    echo "<script>document.location = '?m=OK';</script>";
}

?>

    <div class="page-content">
    	<div class="row">
		  <?php include_once('smenu.php'); ?>
		  <div class="col-md-10">
			<div class="content-box-header panel-heading"><div class="panel-title">শাখা/বিভাগ</div></div>
			<div class="content-box-large box-with-header">
				<?php include("dismass.php"); ?>
				<form action="" method="POST" enctype="multipart/form-data">
	  			<div class="row">
                    <?php if(isset($_GET['edi']) && !empty($_GET['edi'])){
                        $q_mysql43 = mysqli_query($db_com,"SELECT * FROM `section` WHERE `scode`='$_GET[edi]' limit 1") or die(mysqli_error());
                        $q_cot43 = mysqli_num_rows($q_mysql43);
                        if($q_cot43 > 0)
                        {
                            while($q_cot_row43=mysqli_fetch_array($q_mysql43))
                            {
                        ?>
                            <div class="col-md-4"><br/><br/><br/>
                                <p style="color: red; text-align: center;">* যুক্ত ফিল্ড অবশ্যই পূরণ করতে হবে...</p>
                                    <div class="col-md-12">
        									<div class="form-group">
        										<label for="h-input">শাখা/বিভাগ</label>
        										<div class="input-group">
        											<input type="text" name="sname" value="<?php echo $q_cot_row43['sname']; ?>" class="form-control" required>
        										</div>
        									</div>
                                    </div>
                                    <div class="col-md-2" style="float: right; margin-right: 140px;">
        									<div class="form-group">
        										<div class="input-group">
                                                    <input type="hidden" id="scode" name="scode" value="<?php echo $q_cot_row43['scode']; ?>" required>
                                                     <input type="submit" name="EOK" value="Change" class="form-control btn-success">
        										</div>
        									</div>
                                    </div>
                            </div>

                     <?php  }
                        }else{echo "<script>document.location = '?m=STIW';</script>";}
                    }else{ ?>
                            <div class="col-md-4"><br/><br/><br/>
                                <p style="color: red; text-align: center;">* যুক্ত ফিল্ড অবশ্যই পূরণ করতে হবে...</p>
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="h-input">শাখা/বিভাগ</label>
                                                <div class="input-group">
                                                    <input type="text" name="sname" class="form-control" required>
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
                                <th>শাখা/বিভাগ</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sl = 0;

                             $q_mysql3 = mysqli_query($db_com,"SELECT * FROM `section` ORDER BY `sid` DESC") or die(mysqli_error());
                            $q_cot3 = mysqli_num_rows($q_mysql3);
                            if($q_cot3 > 0)
                            {
                                while($q_cot_row3=mysqli_fetch_array($q_mysql3))
                                {
                                    $sl = $sl+1;
                                    if($q_cot_row3['pub']=='1'){
                                                $pubdata = "<span class='label label-primary'>Publish</span>";
                                                $eye = "<a href='?upub=$q_cot_row3[scode]' onclick='return confirmUp(this);' title='Unpublish'><i class='glyphicon glyphicon-eye-close'></i></a> ||";
                                            }
                                            else{
                                                $pubdata = "<span class='label label-default'>Unpublish</span>";
                                                $eye = "<a href='?pub=$q_cot_row3[scode]' onclick='return confirmP(this);' title='Publish'><i class='glyphicon glyphicon-eye-open'></i></a> ||";
                                            }
                                    echo"
											<tr class='gradeA'>
												<td class='text-center'>$sl</td>
												<td>$q_cot_row3[sname]</td>
                                                <td>$pubdata</td>															
												<td>
                                                    <a href='?edi=$q_cot_row3[scode]' title='Edit'><i class='glyphicon glyphicon-edit'></i></a> ||
                                                    $eye
                                                    <a href='?del=$q_cot_row3[scode]' onclick='return confirmD(this);' title='Delete'><i class='glyphicon glyphicon-trash'></i></a>
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