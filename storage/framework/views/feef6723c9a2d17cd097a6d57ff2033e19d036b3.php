<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title> <?php echo $__env->yieldContent('title'); ?> | KMP </title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="<?php echo e(asset('kmp_dash')); ?>/assets/images/favicon.ico">

    <!-- Dropzone css -->
    <link href="<?php echo e(asset('kmp_dash')); ?>/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">

    <!-- Dropzone js -->
    <script src="<?php echo e(asset('kmp_dash')); ?>/plugins/dropzone/dist/dropzone.js"></script>
    
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('kmp_dash')); ?>/plugins/morris/morris.css">

    <link href="<?php echo e(asset('kmp_dash')); ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('kmp_dash')); ?>/assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('kmp_dash')); ?>/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('kmp_dash')); ?>/assets/css/style.css" rel="stylesheet" type="text/css">

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <?php echo $__env->make('admin.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
         <?php echo $__env->make('admin.left_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Left Sidebar End -->


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="page-title-box"> 
                            <div class="d-flex justify-content-center"> 
                                <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                                <div class="row align-items-center">
                                    <div class="col-sm-6">
                                        <h4 class="page-title"><?php echo $__env->yieldContent('title'); ?> </h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-right">
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">KMP</a></li>
                                            <li class="breadcrumb-item active"><?php echo $__env->yieldContent('title'); ?> </li>
                                        </ol>
                                    </div>
                                </div>
                                <!-- end row -->
                        </div>
                        <!-- end page-title -->

                        <!-- Home Content Start -->

                        <?php echo $__env->yieldContent('content'); ?>      
                        
                        <!-- Home Content End -->

                    </div>
                    <!-- container-fluid -->
    
                </div>
                <!-- content -->
    
                <?php echo $__env->make('admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            
    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="<?php echo e(asset('kmp_dash')); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo e(asset('kmp_dash')); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('kmp_dash')); ?>/assets/js/metismenu.min.js"></script>
    <script src="<?php echo e(asset('kmp_dash')); ?>/assets/js/jquery.slimscroll.js"></script>
    <script src="<?php echo e(asset('kmp_dash')); ?>/assets/js/waves.min.js"></script>
   
    

    <!--Morris Chart-->
    <script src="<?php echo e(asset('kmp_dash')); ?>/plugins/morris/morris.min.js"></script>
    <script src="<?php echo e(asset('kmp_dash')); ?>/plugins/raphael/raphael.min.js"></script>

    <script src="<?php echo e(asset('kmp_dash')); ?>/assets/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="<?php echo e(asset('kmp_dash')); ?>/assets/js/app.js"></script>

</body>



</html><?php /**PATH D:\wamp64\www\KMP-Development\resources\views/admin/master.blade.php ENDPATH**/ ?>