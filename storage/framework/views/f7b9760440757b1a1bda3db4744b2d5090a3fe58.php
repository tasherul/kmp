<?php $__env->startSection('title','Video Gallery'); ?>


<?php $__env->startSection('content'); ?>
	
	<!-- Video Gallery Start -->
	<section class="kmp_video_gallery">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 mb-30">
					<div class="history_tittle">
						<h2 class="white_color">Our Video Gallery</h2>
					</div>
				</div>
				<?php if(isset($videos[0])): ?>

				<?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

					<div class="col-lg-3 mb-30">
						<a data-fancybox href="<?php echo e($video->video_link); ?>">
							<span class="kmp_video_ico">
								<img src="<?php echo e(asset('upload').$video->video_thumbnail); ?>" height="200px" alt="" />
								<i class="fa fa-play" aria-hidden="true"></i>
							</span>
						</a>			
					</div>

				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				

			</div>
			<!-- pagination-->
			<div class="ts-pagination text-center mb-20">

					<?php echo e($videos->links()); ?>


				</div>
				<!-- pagination end-->


				<?php else: ?>

					No Data Found

				<?php endif; ?>
		</div>
	</section>
	<!-- Video Gallery End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\KMP-Development-final\resources\views/front/video_gallery.blade.php ENDPATH**/ ?>