<?php $__env->startSection('nav'); ?>
<?php echo $__env->make('inc.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div style="text-align:center ">
			<h3>Welcome to SUST Hall Management System!!</h3>
		</div>
<div class="container">
	<div class="row" style="text-align:center ">
		<div class="col-12 align-center">
			<h3 class="h3 text-danger">Notice Board</h3>
		</div>
	</div>
	

	<div class="row mt-1 justify-content-center ">
		<div class="col-7 py-2 bg-white notice msg-card dl">
			<div class="row px-2">

				<?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-12  line-notice">
					<h6 class="font-weight-bold text-danger"><?php echo e($notice->title); ?></h6>
					<div class="row ">
						<div class="col-10">
							<p class="m-0 d-flex py-1 "><?php echo e($notice->notice); ?></p>
						</div>
						<div class="col-2 p-0 d-flex align-items-end">
							<span class=" text-faint"><?php echo e(date('M j, h:ia ',strtotime($notice->created_at))); ?> </span>
						</div>
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>