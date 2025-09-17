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
            min-height: 297mm;
            padding: 15mm;
            margin: 10mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 210mm;
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
                height: 297mm;
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
                    <p style='text-align:left; font-size:0.8em'>বাংলাদেশ ফরম নং-২৩৯৫</p>
                    <p style='text-align:left; font-size:0.8em'>সিভিল সার্ভিস রেগুলেশন এর অনুচ্ছেদ........................... অথবা ফান্ডামেন্টাল রুলস এর বিধি............................. মোতাবেক ছুটির আবেদন।</p>
					<table border='1' cellpadding='3' cellspacing='0' style='width: 100%; font-size:0.9em; line-height: 1em;'>
						<tr style='height:100px;'>
                            <th>অফিসারের নাম ও পদবী</th>
                            <th>সর্বশেষ ভোগকৃত ছুটির ধরণ ও সময়কাল</th>
                            <th>প্রার্থিত ছুটির ধরণ, সময় ও তারিখ</th>
                            <th>নিয়ন্ত্রনকারী অফিসারের মন্তব্য</th>
                        </tr>
                        <tr>
                            <th>১</th>
                            <th>২</th>
                            <th>৩</th>
                            <th>৪</th>
                        </tr>
                        <tr>
                            <td><br><br>$emp_name <br>$dname<br> ($ksection, কেএমপি, খুলনা)।<br><br></td>
                            <td><br><br>"; 
                                $q_mysql413 = mysqli_query($db_com, "SELECT * FROM `application` WHERE `empid`='$empid' and `status1`='1' order by Id DESC limit 1") or die(mysqli_error());
                                $q_cot413 = mysqli_num_rows($q_mysql413);
                                if ($q_cot413 > 0) {
                                while ($q_cot_row413 = mysqli_fetch_array($q_mysql413)) {
                                    $q_mysql314 = mysqli_query($db_com, "SELECT * FROM `leavetype` WHERE `lid`='$q_cot_row413[sleave]' limit 1");
                                    $q_cot_row314 = mysqli_fetch_array($q_mysql314);
                                    $sw = date("d/m/Y", strtotime($q_cot_row413['sdate']));
                                    $ew = date("d/m/Y", strtotime($q_cot_row413['edate']));
                                    
                                echo $q_cot_row314['lname']; echo" ("; echo bfn($q_cot_row413['wdate']); echo "দিন)<br />";  
                                 echo bfn($sw); echo " থেকে<br>";  echo bfn($ew);   echo " ইং পর্যন্ত ";  }
                                } else { ?>
                                    <p style='color:red;'>কোন ছুটির তথ্য পাওয়া যায়নি</p>
                                <?php
                            }echo"                            
                            <br><br>
                            </td>
                            <td><br><br>$lname (";
                                echo bfn($wdate);
                                echo
                                    "দিন)<br/>
                                ";
                                echo bfn($sdate);
                                echo " থেকে<br>";
                                echo bfn($edate);
                                echo " ইং পর্যন্ত<br><br></td>
                            
                            <th><br><br>
                            <strong><u>আর আই ($ksection) মন্তব্য</u></strong> <br/>$approver_rem1 <br/><img src='$sign_pic1'/><br/><small>$app_name1 (বিপি নং-"; echo bfn($app_bp1); echo ")<br/>"; echo bfn($app_date1); echo "</small>
                            <br><br></th>
                        </tr>
                        <tr>
                            <td colspan='3'><br>
                            <p style='text-align:left; font-size:0.9em'>
                                বিঃদ্রঃ সিভিল সার্ভিস রেগুলেশন অথবা ফান্ডামেন্টাল রুলস-এর যে অনুচ্ছেদে বা বিধি মোতাবেগ ছুটি দাবী করা হইয়াছে উহা ৩নং কলামে সর্বদাই উল্লেখ করিতে হইবে।
                                <br/><br/>
                                সি,এস,আর-এর ৩২০নং অনুচ্ছেদে অথবা এফ,আর ৬৮নং বিধি মোতাবেক প্রার্থিত ছুটির পূর্বে বা পরে সরকারী ছুটি যোগ করিতে হইলে আবেদনের সময়ে মঞ্জুরকারী কর্তৃপক্ষের নিকট উহা উল্লেখ করিতে হইবে।
                            </p><br>
                            </td>
                            <td rowspan='2'><br/><br/><br/><br/><br/><br/><br/><br/>[ অঃ পৃঃ দ্রঃ ]</td>
                        </tr>
                        <tr>
                            <td><br/><br/><br/>আবেদনের তারিখঃ ";
                    echo bfn($appdate);
                    echo "ইং</td>
                            <td><br/><br/><br/>মোবাইল নং-  ";
										echo bfn($mobile);echo"</td>
                            <td><small><br/><br/><br/>আবেদনকারীর স্বাক্ষর</small><br/> বিপি নম্বরঃ ";
										echo bfn($idn);echo"</td>
                        </tr>
					</table>
					
                </div> 
                
                
                
                
                <div class='page'>
					<table border='1' cellpadding='3' cellspacing='0' style='width: 100%; font-size:0.9em; line-height: 1em;'>
                        <tr>
                            <td style='text-align: left; width: 50%;'>
                                মহাহিসাব রক্ষক বাংলাদেশ-এর প্রতিবেদন<br/><br/>
                                নম্বর ডিসিএ, খুলনা/২২১২/ছুটি/বিল-৩/...........তারিখ-..............খ্রিঃ।<br/><br/>
                                সংশ্লিষ্ট কর্মকর্তার প্রার্থিত ছুটির হিসাবে ছুটি পাওনা আছে।<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                                .......................................................সমীপে দাখিল করা হইলো।<br/><br/>

                                তারিখঃ................২০<br/><br/><br/><br/>
                                মহাহিসাব রক্ষক<br/>                       
                               <br/>$approver_rem2 <br/><img src='$sign_pic2' /><br/><small>$app_name2 (বিপি নং-"; echo bfn($app_bp2); echo ")<br/>"; echo bfn($app_date2); echo "</small>
                            </td>
                            <td style='text-align: left; width: 50%;'>
                                নং<br/><br/>
                                তারিখঃ................২০<br/><br/><br/><br/>
                                যথাযথ প্রতিবেদনসহ সরকারের নিকট পেশ করিবার জন্য মহাহিসাব রক্ষকের নিকট প্রেরণ করা হইলো।<br/><br/><br/><br/>
                                নিয়ন্ত্রনকারী অফিসার<br/>
                                <br/>$approver_rem3 <br/><img src='$sign_pic3' /><br/><small>$app_name3 (বিপি নং-"; echo bfn($app_bp3); echo ")<br/>"; echo bfn($app_date3); echo "</small>
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