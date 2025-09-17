<?php $__env->startSection('title','Biography'); ?>


<?php $__env->startSection('content'); ?>

<section class="kmp_apa mb-30">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<span class="service_tittle">
						<i class="fa fa-check-square-o" aria-hidden="true"></i>Our Service :
					</span>
							
					<?php echo $__env->make('front.left_side_our_service', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				</div>
				<div class="col-lg-9">
					<div class="kmp_apa_area">
						<div class="history_tittle">
							<h2 class="white_color">Beat Policing</h2>
						</div>
						<div class="apa_list">
							<button class="accordions">বিট পুলিশিং সংক্রান্ত তথ্যাদি  </button>
                                <div class="panel">
                                  <embed src= "<?php echo e(asset('public/upload/').$beat_policing->beat_policing); ?>" width= "100%" height= "600">
                                </div>
 						</div>
					</div>
				</div>
			</div>
		</div>
</section>







<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\KMP-Development-final\resources\views/front/beat_policing.blade.php ENDPATH**/ ?>