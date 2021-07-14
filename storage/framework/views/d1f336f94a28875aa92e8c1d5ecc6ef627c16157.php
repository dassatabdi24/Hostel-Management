<?php $__env->startSection('nav'); ?>
<?php echo $__env->make('inc.nav-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col mt-5 ">
		<?php $__currentLoopData = $msgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="row msg-card my-1 new">
			<div class="col-1  p-2 pr-0 notify-parent">
				<img src="<?php echo e(asset('/storage/passport/'.$msg->allocate->user->passport)); ?>" class="circle" alt="">
				<?php if(!$msg->admview): ?>
				<span class="badge badge-pill badge-danger notify">1</span>
				<?php endif; ?>
			</div>
			<div class="col py-2">
				<div>
					<h6 class="font-weight-bold">
						<?php echo e($msg->allocate->user->name); ?> <?php echo e($msg->allocate->user->surname); ?>

						<span class="badge badge-pill badge-primary"><?php echo e($msg->allocate->hostel->name); ?></span>
					</h6>
					<p class="msg-hint d-inline-block"><?php echo e(substr($msg->message, 0,100)); ?>...
						<?php if($msg->admview): ?>
						<i class="fas fa-check-circle text-success"></i>
						<?php endif; ?>
					</p>
				</div>
			</div>
			<div class="col-2 align-self-center">
				<a href="<?php echo e(route('adminmsg.show', [$msg->id, $msg->user_id])); ?>" class="btn btn-sm btn-primary">View</a>
				<!--<a href="<?php echo e(route('adminmsg.destroy', $msg->id)); ?>" class="btn btn-sm btn-danger">Delete</a>-->
			</div>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
	
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>