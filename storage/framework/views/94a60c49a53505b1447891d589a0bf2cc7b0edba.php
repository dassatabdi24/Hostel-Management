<?php $__env->startSection('nav'); ?>
<?php echo $__env->make('inc.create-admin-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('inc.nav-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row justify-content-between py-3">
		<div class="col">
			<h4 class="text-center m-0 text-danger">All Hostel Administrators</h4>
		</div>
		<div class="col-3">
			<button class="btn btn-block btn-warning font-weight-bold" data-toggle="modal" data-target="#create-admin" >Create New Administrator</button>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<table id ="adm" class="table table-bordered table-hover table-striped">
				<thead class="std-thead ">
					<th>Full Name</th>
					<th>Role</th>
					<th>Email</th>
					<th>Operations</th>
					<th>Created On</th>
				</thead>
				<tbody>
					<?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr class="admin">
						<td><?php echo e($admin->name); ?></td>
						<td><?php echo e($admin->job_title); ?></td>
						<td><?php echo e($admin->email); ?></td>
						<td class="d-flex justify-content-between">
							
							<!--<?php if(Auth()->user()->id != $admin->id): ?>
							<a href="#" class="btn btn-sm btn-danger">Remove Admin</a>	
							<?php endif; ?>
							-->
							<a href="#" class="btn btn-sm btn-info">View Profile</a>					
						</td>
						<td><?php echo e(date('M j, h:ia ',strtotime($admin->created_at))); ?></td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(function(){
		$('#adm').DataTable();
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>