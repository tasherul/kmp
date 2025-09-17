
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
        <meta content="Themesdesign" name="author" />
        <link rel="shortcut icon" href="<?php echo e(asset('kmp_dash')); ?>/assets/images/favicon.ico">

        <link href="<?php echo e(asset('kmp_dash')); ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo e(asset('kmp_dash')); ?>/assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo e(asset('kmp_dash')); ?>/assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo e(asset('kmp_dash')); ?>/assets/css/style.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="home-btn d-none d-sm-block">
            <a href="<?php echo e(Route('home')); ?>" class="text-white"><i class="fas fa-home h2"></i></a>
        </div>

        
        <?php echo $__env->yieldContent('content'); ?>

        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="<?php echo e(asset('kmp_dash')); ?>/assets/js/jquery.min.js"></script>
        <script src="<?php echo e(asset('kmp_dash')); ?>/assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo e(asset('kmp_dash')); ?>/assets/js/metismenu.min.js"></script>
        <script src="<?php echo e(asset('kmp_dash')); ?>/assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo e(asset('kmp_dash')); ?>/assets/js/waves.min.js"></script>

        <!-- App js -->
        <script src="<?php echo e(asset('kmp_dash')); ?>/assets/js/app.js"></script>
        
    </body>


<!-- Mirrored from themesdesign.in/stexo/layouts/vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Oct 2019 18:17:46 GMT -->
</html><?php /**PATH C:\xampp2\htdocs\KMP-Development-final\resources\views/admin/auth/master.blade.php ENDPATH**/ ?>