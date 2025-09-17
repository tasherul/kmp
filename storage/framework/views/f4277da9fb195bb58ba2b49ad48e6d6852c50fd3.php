<?php $__env->startSection('title','Staff'); ?>


<?php $__env->startSection('content'); ?>
<!-- Khulna Sadar -->
<section class="area_range">
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
				<div class="history_tittle">
					<h2 class="white_color"><?php echo e($range->range); ?></h2>
				</div>
				<div class="range_intro">
					<img src="<?php echo e(asset('public/upload/').$range->range_image); ?>" />
				<p><?php echo e($range->history); ?></p>
				</div>
				<div class="range_contact">
					<div class="range_staff_tittle">
						<h3>Range Staff Information:</h3>
					</div>

					<?php if(isset($rangeunits[0])): ?>

						<table class="range_info_table" style="width: 100%;">
							<tr>
							<th>Sl No.</th>
							<th>Name</th>
							<th>Designation</th>
							<th>Contact</th>
							<th>Picture</th>
							</tr>
									
							<?php $__currentLoopData = $rangeunits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Key=> $rangeunit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
								<td><?php echo e($Key+1); ?></td>
								<td><?php echo e($rangeunit->staff_name); ?></td>
								<td><?php echo e($rangeunit->staff_designation); ?></td>
								<td><?php echo e($rangeunit->staff_contact); ?></td>
								<td><img src="<?php echo e(asset('public/upload/').$rangeunit->range_unit_staff_image); ?>"/></td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</table>

					<?php else: ?>
						
					No Data Found
					
					<?php endif; ?>
					
				</div>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\01-KMP-Development-final\resources\views/front/range-units.blade.php ENDPATH**/ ?>