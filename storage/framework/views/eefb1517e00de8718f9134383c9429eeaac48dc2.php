<?php $__env->startSection('title','Contact Us'); ?>


<?php $__env->startSection('content'); ?>

<!-- KMP Contact Start -->
<section class="kmp_contact_us mb-30">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 mb-30">
				<div class="history_tittle">
					<h2 class="white_color">Contact With Us:</h2>
				</div>
			</div>
			<div class="col-lg-8 mb-30">
				<div class="kmp_contacts_area">
					<img src="<?php echo e(asset('public/upload/').$contacts->contract_banner); ?>" alt="Khulna Metropolitan Police" />
				</div>
			</div>
			<div class="col-lg-4 mb-30">
				<div class="kmp_contacts_area">
					<span><strong>Contact for Information::</strong></span>
					<ul>
						<li><?php echo e($contacts->control_room_kmp_address); ?></li>
						<li>Mobile: <?php echo e($contacts->control_room_mobile_no); ?></li>
						<li>Phone: <?php echo e($contacts->control_room_phone_no); ?></li>
						<li>Fax: <?php echo e($contacts->control_room_fax); ?></li>
						<li>Email: <?php echo e($contacts->control_room_email); ?></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-12">
				<div class="apa_list">

					<button class="accordions"><b>KMP New Mobile Number </b></button>
					<div class="panel">
						<img src="<?php echo e(asset('public/upload/').$contacts->cont_num_1); ?>" />
						<img src="<?php echo e(asset('public/upload/').$contacts->cont_num_2); ?>" />

					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- KMP Contact End -->



<?php $__env->stopSection(); ?>

<script>
	var acc = document.getElementsByClassName("accordions");
	var i;

	for (i = 0; i < acc.length; i++) {
		acc[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var panel = this.nextElementSibling;
			if (panel.style.maxHeight) {
				panel.style.maxHeight = null;
			} else {
				panel.style.maxHeight = panel.scrollHeight + "px";
			}
		});
	}
</script>
<?php echo $__env->make('front.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\01-KMP-Development-final\resources\views/front/contact_us.blade.php ENDPATH**/ ?>