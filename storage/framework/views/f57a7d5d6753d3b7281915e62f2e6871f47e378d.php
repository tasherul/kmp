<?php $__env->startSection('title','History'); ?>


<?php $__env->startSection('content'); ?>
	<!-- History -->
	<section class="kmp_history">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<span class="service_tittle">
						<i class="fa fa-check-square-o" aria-hidden="true"></i>Our Service :
					</span>

					<?php echo $__env->make('front.left_side_our_service', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					
					<div class="ts-grid-box widgets ">
						<h2 class="ts-title">Range Units</h2>

							<?php echo $__env->make('front.laft_side_range_unit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						
					</div>
				</div>
				<div class="col-lg-9">
					<div class="kmp_history_area">
						<div class="history_tittle">
							<h2 class="white_color">Our History</h2>
						</div>
						<p><?php echo e($homepages->kmp_history); ?></p>
						<div class="history_tittle">
							<h3 class="white_color">KMP Range History</h3>
						</div>
						<div class="kmp_range_history">
							<h3>Khulna Sadar:</h3>
							<p><?php echo e($khulna_sadar->history); ?></p>							
						</div>
						<div class="kmp_range_history">
							<h3>Sonadangha:</h3>
							<p><?php echo e($sonadangha->history); ?></p>							
						</div>
						<div class="kmp_range_history">
							<h3>Khalishpur:</h3>
							<p><?php echo e($khalishpur->history); ?></p>							
						</div>
						<div class="kmp_range_history">
							<h3>Daulatpur:</h3>
							<p><?php echo e($daulatpur->history); ?></p>							
						</div>
						<div class="kmp_range_history">
							<h3>Khanjahan Ali:</h3>
							<p><?php echo e($khanjahan_ali->history); ?></p>							
						</div>
						<div class="kmp_range_history">
							<h3>Labanchora:</h3>
							<p><?php echo e($labanchora->history); ?></p>							
						</div>
						<div class="kmp_range_history">
							<h3>Horintana :</h3>
							<p><?php echo e($horintana->history); ?></p>							
						</div>
						<div class="kmp_range_history">
							<h3>Aranghata :</h3>
							<p><?php echo e($aranghata->history); ?></p>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\KMP-Development-final\resources\views/front/history.blade.php ENDPATH**/ ?>