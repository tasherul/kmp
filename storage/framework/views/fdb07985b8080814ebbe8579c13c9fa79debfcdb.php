<?php $__env->startSection('title','Staff'); ?>


<?php $__env->startSection('content'); ?>

<!-- KMP Staff -->
<section class="kmp_staff">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="history_tittle">
					<h2 class="white_color">Senior Officer Directory</h2>
				</div>
			</div>
<?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-lg-12">
					<div class="staff_intro_area">
						<div class="row">
							<div class="col-lg-4">
								<div class="staff_imj">
									<img src="<?php echo e(asset('public/upload/').$staff->staff_image); ?>"/>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="staff_intro">									
									<h3><?php echo e($staff->staff_name); ?></h3>
									<ul>
									    <li><span>Rank:</span> <?php echo e($staff->designation); ?></li>
										<li><span>BP No:</span> <?php echo e($staff->bp_no); ?></li>
										<li><span>Mobile Number:</span><?php echo e($staff->mobile); ?></li>
										<li><span>Email:</span> <?php echo e($staff->email); ?></li>
										
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


				<!-- pagination-->
				

		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\01-KMP-Development-final\resources\views/front/staff.blade.php ENDPATH**/ ?>