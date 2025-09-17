<?php $__env->startSection('title','Money Escort'); ?>


<?php $__env->startSection('content'); ?>

	
	<!-- Money Escort Start -->
	<section class="money_escort">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<span class="service_tittle">
						<i class="fa fa-check-square-o" aria-hidden="true"></i>Our Service :
					</span>

					<?php echo $__env->make('front.left_side_our_service', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				</div>

				
				<div class="col-lg-9">
					<div class="history_tittle">
						<h2 class="white_color">Money Escort:</h2>
					</div>
					<div>
					<img style="margin-top: 10px;" src="<?php echo e(asset('kmp/images/money.jpg')); ?>">
					</div>
					<div class="money_escort_area mt-15">

						<?php echo $money_escort->service_content; ?>

						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Money Escort End -->
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\KMP-Development-final\resources\views/front/money_escort.blade.php ENDPATH**/ ?>