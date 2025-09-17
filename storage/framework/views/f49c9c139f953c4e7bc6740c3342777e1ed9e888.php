<?php $__env->startSection('title','Document'); ?>

<?php $__env->startSection('content'); ?>

	<!-- Document Section Start -->
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
							<div class="history_tittle">
								<h2 class="white_color">Document</h2>
							</div>
		
		
							<?php if(isset($documents[0])): ?>
		
								<?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		
								<ul class="caarer_post">
									<li><a href="<?php echo e(asset('public/upload/').$document->document_pdf_doc); ?>" target="_blank"> <?php echo e($document->document_tittle); ?><span class="float-right"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span></a></li>
								</ul>
									
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								
							
								<!-- pagination-->
								<div class="row justify-content-md-center">
		
									<?php echo e($documents->links()); ?>

				
								</div>
								<!-- pagination end-->
		
							<?php else: ?>
		
								No Data Found
								
							<?php endif; ?>
		
						</div>
					</div>
				</div>
	</section>
	<!-- Document Section End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\KMP-Development-final\resources\views/front/document.blade.php ENDPATH**/ ?>