<?php $__env->startSection('title','List PC'); ?>


<?php $__env->startSection('content'); ?>
	
	<!-- List Of PC Start -->
	<section class="kmp_pc">
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
						<h2 class="white_color">List Of Police Comissoner:</h2>
					</div>

					<?php if(isset($listPcs[0])): ?>
					<div class="table-responsive">
						<table style="width:100%" class="kmp_pc_table">
						  <tr>
							<th rowspan="2">SL No:</th>
							<th rowspan="2">Name</th>
							<th rowspan="2">Designation</th>
							<th colspan="2">Period</th>
						  </tr>
						  <tr>
							<td><strong>From</strong></td>
							<td><strong>To</strong></td>
						  </tr>

						  <?php $__currentLoopData = $listPcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $listPc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
						  
						  <tr>
							<td><?php echo e($key+1); ?></td>
							<td><?php echo e($listPc->comissoner_name); ?></td>
							<td><?php echo e($listPc->comissoner_designation); ?></td>
							<td><?php echo e($listPc->comissoner_from_date); ?></td>
							<td><?php echo e($listPc->comissoner_to_date); ?></td>
						  </tr>

						  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</table>
					</div>

					<!-- Pagination -->
					<br>
					<div class="content_center">

						<?php echo e($listPcs->links()); ?>


					</div>
					
						
					<?php else: ?>

						No Data Found

					<?php endif; ?>


				</div>
			</div>
		</div>
	</section>
	<!-- List Of PC End -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\KMP-Development-final\resources\views/front/list_pc.blade.php ENDPATH**/ ?>