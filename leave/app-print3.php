<?php
include("session.php");
include('bdconn.php');
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Application Print</title>


    <style>
        @font-face {
            font-family: 'Nikosh';
            src: url('css/Nikosh.ttf');
            src: url('css/Nikosh.ttf') format('truetype');
            font-weight: 100;
            font-style: normal;
        }

        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            font-size: 14pt;
            font-family: 'Nikosh';
            line-height: 1.3em;
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .page {
            width: 210mm;
            min-height: 356mm;
            padding: 30mm 15mm 20mm 25mm;
            margin: 10mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 356mm;
            outline: 2cm #FFEAEA solid;
        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 356mm;
            }

            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                page-break-after: always;
            }
        }

        th {
            vertical-align: center;
            text-align: center;
        }

        td {
            vertical-align: top;
            text-align: center;
        }

        th span {
            -ms-writing-mode: tb-rl;
            -webkit-writing-mode: vertical-rl;
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <center>
        <div class='book'>
            <?php


            if (isset($_GET['aptcc'])) {
                $sid = $_GET['aptcc'];

                if (!empty($sid)) {
                    $q_mysql53 = mysqli_query($db_com, "SELECT * FROM `application` WHERE `lacode`='$sid' limit 1") or die(mysql_error());
                    $q_cot53 = mysqli_num_rows($q_mysql53);
                    if ($q_cot53 > 0) {
                        while ($q_cot_row53 = mysqli_fetch_array($q_mysql53)) {
                            $apcode = $q_cot_row53['lacode'];
                            $empid = $q_cot_row53['empid'];
                            $wdate = $q_cot_row53['wdate'];
                            $lreson = $q_cot_row53['comment'];

                            $q_mysql72 = mysqli_query($db_com, "SELECT * FROM `appto` WHERE `aid`='$q_cot_row53[appto]' limit 1") or die(mysqli_error());
                            $q_cot72 = mysqli_num_rows($q_mysql72);
                            if ($q_cot72 > 0) {
                                while ($q_cot_row72 = mysqli_fetch_array($q_mysql72)) {
                                    $appto = $q_cot_row72['apptoname'];
                                }
                            } else {
                                $appto = "Not Apply!</option>";
                            }


                            $approver_rem1 = $q_cot_row53['approver_rem1'];
							$approver_by1 = $q_cot_row53['approver_by1'];
							$app_date1 = date("d/m/Y", strtotime($q_cot_row53['approver_date1']));
							$q_mysql3221 = mysqli_query($db_com, "SELECT * FROM `emp_info` WHERE `emp_pid`='$approver_by1' limit 1");
							$q_cot_row3221 = mysqli_fetch_array($q_mysql3221);
							$app_name1 = $q_cot_row3221['emp_name'];
							$app_bp1 = $q_cot_row3221['idn'];
							$sign_pic1 = $q_cot_row3221['sign_pic'];

							$approver_rem2 = $q_cot_row53['approver_rem2'];
							$approver_by2 = $q_cot_row53['approver_by2'];
							$app_date2 = date("d/m/Y", strtotime($q_cot_row53['approver_date2']));
							$q_mysql3222 = mysqli_query($db_com, "SELECT * FROM `emp_info` WHERE `emp_pid`='$approver_by2' limit 1");
							$q_cot_row3222 = mysqli_fetch_array($q_mysql3222);
							$app_name2 = $q_cot_row3222['emp_name'];
							$app_bp2 = $q_cot_row3222['idn'];
							$sign_pic2 = $q_cot_row3222['sign_pic'];

							$approver_rem3 = $q_cot_row53['approver_rem3'];
							$approver_by3 = $q_cot_row53['approver_by3'];
							$app_date3 = date("d/m/Y", strtotime($q_cot_row53['approver_date3']));
							$q_mysql3223 = mysqli_query($db_com, "SELECT * FROM `emp_info` WHERE `emp_pid`='$approver_by3' limit 1");
							$q_cot_row3223 = mysqli_fetch_array($q_mysql3223);
							$app_name3 = $q_cot_row3223['emp_name'];
							$app_bp3 = $q_cot_row3223['idn'];
							$sign_pic3 = $q_cot_row3223['sign_pic'];

                            $appdate = date("d/m/Y", strtotime($q_cot_row53['cdate']));
                            $sdate = date("d/m/Y", strtotime($q_cot_row53['sdate']));
                            $edate = date("d/m/Y", strtotime($q_cot_row53['edate']));
                            $date = date("d/m/Y", strtotime($q_cot_row53['cdate']));

                            $q_mysql32 = mysqli_query($db_com, "SELECT * FROM `emp_info` WHERE `emp_pid`='$q_cot_row53[empid]' limit 1");
                            $q_cot_row32 = mysqli_fetch_array($q_mysql32);
                            $emp_name = $q_cot_row32['emp_name'];
                            $kidn = $q_cot_row32['kidn'];
                            $idn = $q_cot_row32['idn'];
                            $add_present = $q_cot_row32['pre'];
                            $add_permanent = $q_cot_row32['per'];
                            $mobile = $q_cot_row32['cell_off'];


                            $q_mysql33 = mysqli_query($db_com, "SELECT * FROM `designation` WHERE `did`='$q_cot_row32[emp_deg]' limit 1");
                            $q_cot_row33 = mysqli_fetch_array($q_mysql33);
                            $dname = $q_cot_row33['dname'];

                            $q_mysql35 = mysqli_query($db_com, "SELECT * FROM `section` WHERE `sid`='$q_cot_row32[section]' limit 1");
                            $q_cot_row35 = mysqli_fetch_array($q_mysql35);
                            $ksection = $q_cot_row35['sname'];

                            $q_mysql34 = mysqli_query($db_com, "SELECT * FROM `leavetype` WHERE `lid`='$q_cot_row53[sleave]' limit 1");
                            $q_cot_row34 = mysqli_fetch_array($q_mysql34);
                            $lname = $q_cot_row34['lname'];
                        }
                    }



                   include('numbangla.php');
                    echo "	 

				<div class='page'>						
					<table width='100%' border='0'>
						<tr>
							<td style='text-align: justify'>								
								বরাবর<br/>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $appto<br/>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; খুলনা মেট্রোপলিটন পুলিশ<br/>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; খুলনা।<br/><br/>
								মাধ্যমঃ  যথাযথ কর্তৃপক্ষ।<br/><br/>
								বিষয়ঃ <strong>$lname</strong>র আবেদন প্রসঙ্গে।<br/><br/>
							</td>
							<td width='280px'>
                                                        <table style='width: 280px; font-size:0.75em; line-height: 1em; margin-top:-30px;'>
															<tr>
																<th colspan='2'>ছুটির তথ্যাদি</th>
															</tr>														
                                                            <tr style='background-color:#DDD;'>
																<th>ছুটির প্রকারভেদ/ধরন</th>
																<th>ভোগকৃত ছুটি - ";
                    echo bfn($year);
                    echo "</th>
															</tr>
                                                           ";
                    $ssll = 0;

					$q_mysql35 = mysqli_query($db_com, "SELECT * FROM `leavetype` WHERE `pub`='1' ORDER BY `lid` ASC") or die(mysqli_error());
					$q_cot35 = mysqli_num_rows($q_mysql35);
					if ($q_cot35 > 0) {
						$cl = 20;
						$handcl = 0;
						$totalleave = 0;
						$cltotalleave = 0;
						$thicount = 0;
						while ($q_cot_row35 = mysqli_fetch_array($q_mysql35)) {
							$ssll = $ssll + 1;
							$q_mysql36 = mysqli_query($db_com, "SELECT * FROM `application` WHERE `lyear`='$year' and `sleave`='$q_cot_row35[lid]' and `empid`='$empid' and `status1`='3'");
							$q_cot36 = mysqli_num_rows($q_mysql36);
							if ($q_cot36 > 0) {
								while ($q_cot_row36 = mysqli_fetch_array($q_mysql36)) {
									$thicount = $thicount + $q_cot_row36['wdate'];
									$totalleave = $totalleave + $q_cot_row36['wdate'];
									if($q_cot_row36['sleave'] == 1){
									    $cltotalleave = $cltotalleave + $q_cot_row36['wdate'];
									}
								}
							} else {
								$thicount = 0;
							}
							echo "
																			<tr class='gradeA'>
																				<td style='text-align: left;'>$q_cot_row35[lname]</td>
																				<th>";
							echo bfn($thicount);
							echo "</th>
																			</tr>
																		";
						}
					}
					$handcl = $cl - $cltotalleave;
					echo
						"														   
                                                            <tr style='background-color:#FFC;'>
                                                                <td>মোট ভোগকৃত ছুটিঃ ";
					echo bfn($totalleave); echo" (";echo num2bangla($totalleave);
					echo ") দিন</td>
																<td>অবশিষ্ঠ ছুটিঃ ";
					echo bfn($handcl); echo" (";echo num2bangla($handcl);
					echo ") দিন</td>
                                                            </tr>
                                                        </table>
							</td>
						</tr>
						<tr>
							<td colspan='2' style='text-align: justify'>
								জনাব<br/>
								যথাবিহিত সম্মান প্রদর্শন পূর্বক বিনীত নিবেদন এই যে, আমি $dname/";
										echo bfn($kidn);echo"
										<strong>$emp_name</strong>,
								আপনার অধীনস্থ একজন কর্মকর্তা। বর্তমানে আমি <strong>$ksection</strong>, কেএমপি, খুলনায় কর্মরত আছি। 
								 এমতাবস্থায়, আগামী <strong>";
					echo bfn($sdate);
					echo "</strong> থেকে  <strong>";
					echo bfn($edate);
					echo "</strong> পর্যন্ত<strong>, ";
					echo bfn($wdate); 
					echo "</strong>"; echo" (";echo num2bangla($wdate); echo") দিন <strong>$lname</strong> যাওয়া একান্ত প্রয়োজন।

								 <br/><br/>অতএব, মহোদায় সমীপে আমার আকুল আবেদন এই যে, আমি যাতে উল্লেখিত ছুটি যেতে পারি তার অনুমতি ও সুব্যবস্থা দানে আপনার সদয় মর্জি হয়।
										<br/><br/><br/>
                            <table>
                                            <tr>
                                                <td width='400px' style='text-align: left;'>
                                               তারিখঃ ";
                    echo bfn($appdate);
                    echo "ইং<br/><br/>
                                                ছুটি পাওনাঃ-  ";
					echo bfn($handcl); echo" (";echo num2bangla($handcl);
					echo ") দিন<br/>
									ছুটি চাইঃ- ";
					echo bfn($wdate); echo" (";echo num2bangla($wdate);
					echo ") দিন<br/>
									ছুটিতে যাওয়ার তারিখঃ- ";
					echo bfn($sdate);
					echo " ইং
                        <br/><br/>
                        <strong>ছুটি ভোগের কারণঃ $lreson</strong>
                        <br/><br/>
										<strong><u>ছুটি ভোগের ঠিকানাঃ</u></strong><br/>
										নামঃ $emp_name<br/>
                                        $add_permanent<br/>
                                        মোবাইল নং-";
										echo bfn($mobile);echo" 
                    </td>
												<td style='font-size: 0.9em;'>
													বিনীত নিবেদক<br/><br/><br/><br/>
													<strong>$emp_name</strong><br/>
													$dname<br/>
													বিপিঃ ";
										echo bfn($idn);echo"<br/>
													কেএমপি পরিচিতি নম্বরঃ ";
										echo bfn($kidn);echo"<br/>
													$ksection, খুলনা মেট্রোপলিটন পুলিশ<br/>
													খুলনা।
												</td>
											</tr>
                                        </table>
                                        <br/><br/><br/>
                                        <table width='100%'>
                                            </tr>
                                                <td style='font-size: 0.9em;'><strong><u>আর আই ($ksection) মন্তব্য</u></strong> <br/>$approver_rem1 <br/><img src='$sign_pic1'/><br/><small>$app_name1 (বিপি নং-"; echo bfn($app_bp1); echo ")<br/>"; echo bfn($app_date1); echo "</small></td>
                                                ";
                                                if ($q_cot_row32['emp_deg'] == 10 or $q_cot_row32['emp_deg'] == 11 or $q_cot_row32['emp_deg'] == 12) {
                                                echo"
                                                <td style='font-size: 0.9em;'><strong><u>এসি (ফোর্স) মন্তব্য</u></strong><br/>$approver_rem2 <br/><img src='$sign_pic2'/><br/><small>$app_name2 (বিপি নং-"; echo bfn($app_bp2); echo ")<br/>"; echo bfn($app_date2); echo "</small></td>
                                                ";
                                                }
                                                echo"
                                                <td style='font-size: 0.9em;'><strong><u>চূড়ান্ত আদেশ</u></strong><br/>$approver_rem3 <br/><img src='$sign_pic3'/><br/><small>$app_name3 (বিপি নং-"; echo bfn($app_bp3); echo ")<br/>"; echo bfn($app_date3); echo "</small></td>
                                            </tr>								
							            </table>
                                        
							</td>
						</tr>
					</table>
					
				</div>    
			";
                } else {
                    echo "<script>window.close();</script>";
                }
            } else {
                echo "<script>window.close();</script>";
            }
            ?>

        </div>
    </center>
</body>

</script>

</html>