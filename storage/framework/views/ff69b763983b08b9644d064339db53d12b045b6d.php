<?php $__env->startSection('title','Missing'); ?>


<?php $__env->startSection('content'); ?>
	<!-- Missing Start -->
	<section class="kmp_missing">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 mb-30">
					<div class="history_tittle">
						<h2 class="white_color">Missing Person</h2>
					</div>
				</div>

				<?php if(isset($missings[0])): ?>
					<?php $__currentLoopData = $missings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $missing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

					<div class="col-lg-3 mb-30">
						<div class="kmp_missing_area">
							<a href="<?php echo e(asset('public/upload/').$missing->image); ?>" data-fancybox="images" data-caption="My caption">
								<img src="<?php echo e(asset('public/upload/').$missing->image); ?>" alt="" />
							</a>
							<div class="missing_information mt-15">
								<ul>
									<li><strong>Name: <?php echo e($missing->name); ?></strong></li>
									<li>Details: <?php echo e($missing->wanted_or_missing_details); ?></li>
									
								</ul>
							</div>
						</div>
					</div>
					
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					<!-- pagination-->
					<div class="ts-pagination text-center mb-20">

						<?php echo e($missings->links()); ?>

	
					</div>
					<!-- pagination end-->

				<?php else: ?>

				No data Found
					
				<?php endif; ?>
	
			</div>
		</div>
	</section>
	<!-- Missing End -->
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\KMP-Development-final\resources\views/front/missing.blade.php ENDPATH**/ ?>