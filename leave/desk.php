<?php include('head.php'); ?>

<div class="page-content">
	<div class="row">
		<?php include_once('smenu.php'); ?>
		<div class="col-md-10">
			<div class="content-box-header panel-heading">
				<div class="panel-title ">Welcome, <i><strong><?php echo $_SESSION['TXename']; ?></strong></i></div>
				<span style="float: right;">Today: <?php echo $todate; ?></span>
			</div>
			<div class="content-box-large box-with-header">
				<div class="row">
					<?php include("dismass.php"); ?>

					<div class="col-md-10">
						<h2 style="text-align:center; color:#040158; font-size:80px; font-weight:700; text-shadow:2px 1px 2px #EB1C24; ">
							<marquee direction="right" scrollamount="+10">Working For Peace</marquee>
						</h2>
					</div>

					<div class="col-md-2">
						<img src='images/police.png' class='img-responsive' alt='Police' style="margin-top:-18px;" />
					</div>

					<?php if ($_SESSION['TXuty'] !== 'L7') { ?>
						<div class="col-md-5">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
								<thead>
									<tr style='background-color:#FFC;'>
										<th>ক্রঃ নং</th>
										<th>ছুটির প্রকারভেদ/ধরন</th>
										<th>ছুটিতে আছে - <?php echo $year; ?></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sl = 0;

									$q_mysql3 = mysqli_query($db_com, "SELECT * FROM `leavetype` WHERE `pub`='1' ORDER BY `lid` ASC") or die(mysqli_error());
									$q_cot3 = mysqli_num_rows($q_mysql3);
									if ($q_cot3 > 0) {
										$tot = 0;
										while ($q_cot_row3 = mysqli_fetch_array($q_mysql3)) {
											$sl = $sl + 1;
											$q_mysql32 = mysqli_query($db_com, "SELECT * FROM `application` WHERE `lyear`='$year' and `sleave`='$q_cot_row3[lid]' and `status1`='4'");
											$q_cot32 = mysqli_num_rows($q_mysql32);
											$tot = $tot + $q_cot32;
											echo "
												<tr class='gradeA'>
													<td class='text-center'>$sl</td>
													<td>$q_cot_row3[lname]</td>
													<td>$q_cot32 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='vleaveprint.php?lvt=$q_cot_row3[lid]&yea=$year' target='_blank'>View</a></td>
												</tr>
											";
										}
										echo "
										<tr style='background-color:#FFC;'>
                                            <td colspan='2'> মোট ছুটিতে আছে</th>
											<th>$tot</th>
                                        </tr>
									
									";
									}
									?>
								</tbody>
							</table>
						</div>
						<div class="col-md-1"></div>
						<div class="col-md-5">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
								<thead>
									<tr style='background-color:#FFC;'>
										<th>ক্রঃ নং</th>
										<th>শাখা/বিভাগ</th>
										<th>জনবল সংখ্যা</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sl2 = 0;

									$q_mysql33 = mysqli_query($db_com, "SELECT * FROM `section` ORDER BY `sid` ASC") or die(mysqli_error());
									$q_cot33 = mysqli_num_rows($q_mysql33);
									if ($q_cot33 > 0) {
										$tot2 = 0;
										while ($q_cot_row33 = mysqli_fetch_array($q_mysql33)) {
											$sl2 = $sl2 + 1;
											$q_mysql323 = mysqli_query($db_com, "SELECT * FROM `emp_info` WHERE `pub`='1' and `section`='$q_cot_row33[sid]'");
											$q_cot323 = mysqli_num_rows($q_mysql323);
											$tot2 = $tot2 + $q_cot323;
											echo "
												<tr class='gradeA'>
													<td class='text-center'>$sl2</td>
													<td>$q_cot_row33[sname]</td>
													<td>$q_cot323</td>
												</tr>
											";
										}
										echo "
										<tr style='background-color:#FFC;'>
                                            <td colspan='2'> মোট জনবল </th>
											<th>$tot2</th>
                                        </tr>
									
									";
									}
									?>
								</tbody>
							</table>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<br /><br /><br />

<?php include('foot.php'); ?>