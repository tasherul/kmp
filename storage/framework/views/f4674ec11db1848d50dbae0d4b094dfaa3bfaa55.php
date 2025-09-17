<?php if(count($errors)>0): ?>
<div class="alert alert-danger">
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($errors); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>

<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>


<?php if(session('message')): ?>
    <div class="alert alert-success">
        <?php echo e(session('message')); ?>

    </div>
<?php endif; ?>


<?php if(session('delete_message')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('delete_message')); ?>

    </div>
<?php endif; ?>

<?php /**PATH C:\xampp2\htdocs\KMP-Development\resources\views/inc/messages.blade.php ENDPATH**/ ?>