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
            padding: 30mm 15mm 20mm 15mm;
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
                            $salary = $q_cot_row32['salary'];


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
							<th colspan='3'>								
                                <small><sup>গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</sup></small><br/>
                                বাংলাদেশ পুলিশ বিভাগ<br/>
                                <small>অর্জিত ছুটির আবেদন পত্র <br/><sup>(নন-গেজেটেড অফিসারদের জন্য)</sup></small><br/>
                            </th>
                        </tr>
                        <tr>
                            <td colspan='2'><br/>
                                <table style='width: 480px; font-size:0.9em; line-height: 2.2em; text-align: left;'>
									<tr>
                                        <td style='text-align: right;' width='25px'>১।</td>
                                        <td style='text-align: left;'>আবেদন কারীর নাম</td>
                                        <td width='30px'>:</td>
                                        <td style='text-align: left;'>$dname/";
										echo bfn($kidn);echo"
										<strong>$emp_name</strong></td>
                                    </tr>
                                    <tr>
                                        <td style='text-align: right;'>২।</td>
                                        <td style='text-align: left;'>যে কাজের জন্য নিয়োজিত</td>
                                        <td>:</td>
                                        <td style='text-align: left;'>$ksection, কেএমপি, খুলনা)। </td>
                                    </tr>
                                    <tr>
                                        <td style='text-align: right;'>৩।</td>
                                        <td style='text-align: left;'>বেতন</td>
                                        <td>:</td>
                                        <td style='text-align: left;'>$salary</td>
                                    </tr>
                                    <tr>
                                        <td style='text-align: right;'>৪।</td>
                                        <td style='text-align: left;'>প্রার্থিত ছুটির ধরন ও সময়কাল</td>
                                        <td>:</td>
                                        <td style='text-align: left;'>$lname "; echo bfn($wdate);  echo" ("; echo num2bangla($wdate); echo") দিন <br/>";
					echo bfn($sdate);
					echo "থেকে";
					echo bfn($edate);
					echo " পর্যন্ত
                    </td>
                                    </tr>
                                    <tr>
                                        <td style='text-align: right;'>৫।</td>
                                        <td style='text-align: left;'>কি কারণে</td>
                                        <td>:</td>
                                        <td style='text-align: left;'>$lreson</td>
                                    </tr>
                                    <tr>
                                        <td style='text-align: right;'>৬।</td>
                                        <td style='text-align: left;'>ছুটিকালীন ঠিকানাঃ</td>
                                        <td>:</td>
                                        <td style='text-align: left;'>$add_permanent<br/></td>
									</tr>
                                </table>
                            </td>
							<td width='200px'><br/>
                                                        <table style='width: 200px; font-size:0.75em; line-height: 1.3em; margin-top:-50px;'>
															<tr>
																<th colspan='2'>ছুটির তথ্যাদি</th>
															</tr>														
                                                            <tr style='background-color:#DDD;'>
																<th>ছুটির প্রকারভেদ/ধরন</th>
																<th width='80px'>ভোগকৃত ছুটি - ";
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
                            <td><br/><br/><br/><br/>আবেদনের তারিখঃ ";
                    echo bfn($appdate);
                    echo "ইং</td>
                            <td><br/><br/><br/><br/>মোবাইল নং- ";
										echo bfn($mobile);echo" </td>
                            <td><br/><br/><br/><small>আবেদন কারীর স্বাক্ষর</small><br/> বিপি নম্বরঃ ";
										echo bfn($idn);echo"</td>
                        </tr>
                        
						<tr>
                            <td colspan='3' style='text-align: justify'>
                            <br/>
                                <table border='1' cellpadding='3' cellspacing='0' style='width: 100%; font-size:0.9em; line-height: 1em;'>
                                    <tr>
                                        <td colspan='10'>অফিসের প্রতিবেদন<br/>সর্বশেষ ছুটি হইতে প্রত্যাবর্তনের তারিখ</td>
                                        <td>অফিস প্রধানের সুপারিশ এবং অনুপস্থিতকালে তাহার কার্য সম্পাদনের ব্যবস্থা</td>
                                    </tr>
                                    <tr>
                                        <td rowspan='2' width='125px'>ছুটি</td>
                                        <td colspan='3' width='125px'>অদ্যবধি অর্জিত ছুটির পরিমান</td>
                                        <td colspan='3' width='125px' style='font-size:0.9em;'>অদ্যবধি ভোগকৃত ছুটির পরিমান</td>
                                        <td colspan='3' width='125px'>প্রাপ্য</td>
                                        <td rowspan='3'><strong><u>আর আই ($ksection) মন্তব্য</u></strong> <br/>$approver_rem1 <br/><img src='$sign_pic1'/><br/><small>$app_name1 (বিপি নং-"; echo bfn($app_bp1); echo ")<br/>"; echo bfn($app_date1); echo "</small></td>
                                    </tr>
                                    <tr>
                                        <td>বছর</td>
                                        <td>মাস</td>
                                        <td>দিন</td>
                                        <td>বছর</td>
                                        <td>মাস</td>
                                        <td>দিন</td>
                                        <td>বছর</td>
                                        <td>মাস</td>
                                        <td>দিন</td>
                                    </tr>
                                    <tr>
                                        <td style='text-align: left;'><br/>বিশেষ সুবিধা  <br/><br/> অল্পদিনের ছুটি  <br/><br/> ডাক্তারের প্রত্যায়ন পত্র  <br/><br/> গড় বেতন  <br/><br/> অর্ধগড় বেতন <br/><br/></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan='10' style='text-align: left;'>প্রত্যায়ন করা যাইতেছে যে, প্রার্থিত ছুটি সিভিল সার্ভিস রেগুলেশন/ফান্ডামেন্টাল রুলস এর ......... অনুচ্ছেদ/বিধি অনুযায়ী প্রাপ্য।<br/><br/><strong></u>এসি  (ফোর্স) মন্তব্য</u></strong><br/>$approver_rem2 <br/><img src='$sign_pic2' /><br/><small>$app_name2 (বিপি নং-"; echo bfn($app_bp2); echo ")<br/>"; echo bfn($app_date2); echo "</small></td>
                                        <td><strong><u>চূড়ান্ত আদেশ</u></strong><br/>$approver_rem3 <br/><img src='$sign_pic3''/><br/><small>$app_name3 (বিপি নং-"; echo bfn($app_bp3); echo ")<br/>"; echo bfn($app_date3); echo "</small></td>
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