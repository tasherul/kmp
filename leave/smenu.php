<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <li><a href="myprofile.php"><img src="<?php echo $_SESSION['TXimg']; ?>" onerror="this.onerror=null;this.src='userimg/noimg.jpg';" alt="Profile Photo" /></a></li>
            <li style="background:#428BCA;" <?php if ($pagename == "desk.php") {
                                                echo "class='active current'";
                                            } ?>><a href="desk.php"><i class="glyphicon glyphicon-home"></i> ড্যাশবোর্ড</a></li>
            <!-- My Leave App-->
            <li style="background:#428BCA;" <?php if ($pagename == "leaveapp.php") {
                                                echo "class='active current'";
                                            } ?>><a href="leaveapp.php"><i class="glyphicon glyphicon-tasks"></i> আমার ছুটির আবেদন</a></li>
            <li style="background:#428BCA;" <?php if ($pagename == "myview.php") {
                                                echo "class='active current'";
                                            } ?>><a href="myview.php"><i class="glyphicon glyphicon-tasks"></i> আমার ছুটির তালিকা</a></li>

            <!-- Approver--->
            <?php if ($_SESSION['TXuty'] == 'L0' or $_SESSION['TXuty'] == 'L3') { ?>
                <li>- - - - - - - - - - - - - - - - - - - - - - -</li>
                <li style="background:#000;" <?php if ($pagename == "approveview.php") {
                                                    echo "class='active current'";
                                                } ?>><a href="approveview.php"><i class="glyphicon glyphicon-list"></i>অনুমোদনের অপেক্ষায় ছুটির আবেদন</a></li>
            <?php
            } ?>

            <!-- Operator L2-->
            <?php if ($_SESSION['TXuty'] == 'L0' or $_SESSION['TXuty'] == 'L1' or $_SESSION['TXuty'] == 'L2') { ?>
                <li>- - - - - - - - - - - - - - - - - - - - - - -</li>
                <li style="background:#D9534F;" <?php if ($pagename == "application.php") {
                                                    echo "class='active current'";
                                                } ?>><a href="application.php"><i class="glyphicon glyphicon-plus"></i> নতুন ছুটির আবেদন</a></li>
                <li style="background:#D9534F;" <?php if ($pagename == "view.php") {
                                                    echo "class='active current'";
                                                } ?>><a href="view.php"><i class="glyphicon glyphicon-list"></i> ছুটির আবেদনের তালিকা</a></li>
                <li style="background:#FC6A03;" <?php if ($pagename == "add_emp.php") {
                                                    echo "class='active current'";
                                                } ?>><a href="add_emp.php"><i class="glyphicon glyphicon-user"></i> নতুন কর্মচারী যুক্ত করুন</a></li>
                <li style="background:#FC6A03;" <?php if ($pagename == "view_emp.php") {
                                                    echo "class='active current'";
                                                } ?>><a href="view_emp.php"><i class="glyphicon glyphicon-list"></i> কর্মচারী তালিকা দেখুন</a></li>
                <li>- - - - - - - - - - - - - - - - - - - - - - -</li>
                <li style="background:#F0AD4E;" <?php if ($pagename == "add_riapp.php") {
                                                    echo "class='active current'";
                                                } ?>><a href="add_riapp.php"><i class="glyphicon glyphicon-list"></i> Application Approver</a></li>
            <?php } ?>

            <!-- SuperAdmin L0-->
            <?php if ($_SESSION['TXuty'] == 'L0') { ?>
                <li>- - - - - - - - - - - - - - - - - - - - - - -</li>
                <li style="background:#F0AD4E;" <?php if ($pagename == "add_appto.php") {
                                                    echo "class='active current'";
                                                } ?>><a href="add_appto.php"><i class="glyphicon glyphicon-list"></i> Application To</a></li>
                <li style="background:#F0AD4E;" <?php if ($pagename == "add_section.php") {
                                                    echo "class='active current'";
                                                } ?>><a href="add_section.php"><i class="glyphicon glyphicon-list"></i> Section</a></li>
                <li style="background:#F0AD4E;" <?php if ($pagename == "add_empdeg.php") {
                                                    echo "class='active current'";
                                                } ?>><a href="add_empdeg.php"><i class="glyphicon glyphicon-list"></i> Designation</a></li>
                <li style="background:#F0AD4E;" <?php if ($pagename == "add_levtypes.php") {
                                                    echo "class='active current'";
                                                } ?>><a href="add_levtypes.php"><i class="glyphicon glyphicon-list"></i> Leave Types</a></li>
                <li style="background:#F0AD4E;" <?php if ($pagename == "add_utype.php") {
                                                    echo "class='active current'";
                                                } ?>><a href="add_utype.php"><i class="glyphicon glyphicon-list"></i> User Level</a></li>
            <?php } ?>
        </ul>
    </div>
</div>