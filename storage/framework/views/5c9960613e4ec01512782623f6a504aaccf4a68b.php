<?php $__env->startSection('nav'); ?>
<?php echo $__env->make('inc.nav-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('inc.create-notice-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row justify-content-between py-3">
		<div class="col">
			<h4 class="text-center m-0 text-danger">All Notifications</h4>
		</div>
		<div class="col-3">
			<button class="btn btn-block btn-warning font-weight-bold" data-toggle="modal" data-target="#create-notice" >Create a New Notification</button>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<table class="table table-bordered hover">
				<thead class="std-thead">
					<th>Notice</th>
					<th>Hall Name</th>
					<th>Uploaded By</th>
					<th>Created On</th>
					
				</thead>
				<tbody>
					<?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($notice->notice); ?></td>
						<td><?php echo e($notice->hostel->name); ?></td>
						<td><?php echo e($notice->administrator); ?></td>
						<td><?php echo e(date('M j, Y h:ia ',strtotime($notice->created_at))); ?></td>
						<!--
						<td>
							
							<form action="<?php echo e(route('admin.notifydelete', $notice->id)); ?>" method="DELETE">
								<?php echo csrf_field(); ?>
								<button type="submit" class="btn btn-sm btn-danger">Delete</button>
							</form>
						
						</td>
						-->
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>