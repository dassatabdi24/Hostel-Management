<?php $__env->startSection('nav'); ?>
<?php echo $__env->make('inc.nav-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-3 order-lg-2">
		<div class="card mt-5">
			<div class="card-header">
				<h5 class="text-center m-0 p-0">Hostel Details</h5>
			</div>
			<div class="sticky-top">
				<ul class="list-group list-group-flush">
					<li class="list-group-item "><i class="fas fa-school"></i><span><?php echo e($details->campus->name); ?></span></li>
					<li class="list-group-item "><i class="fas fa-home"></i><span><?php echo e($details->name); ?></span></li>
					<li class="list-group-item ">
						
						<i class="fas fa-female"></i><span>Female</span>

					</li>
					<li class="list-group-item "><i class="fas fa-list-ol"></i> <?php echo e(count($students)); ?> Students Total</li>
					<li class="list-group-item "><i class="fas fa-registered"></i><span><?php echo e($rumno); ?> Rooms Total</span></li>
				</ul>
			</div>
			<li class="list-group-item "><a href="<?php echo e(route('report.report', $details->id)); ?>" class="btn btn-block btn-primary">View Full Hostel Details</a></li>
		</div>
	</div>
	<div class="col-md-9 order-lg-1">
	<h4 class="text-center text-danger mb-4">List of Students in <?php echo e($details->name); ?></h4>
		<table id = "students" class="table table-bordered table-striped table-hover">
			<thead class = "std-thead">
				<th>Name</th>
				<th>Reg. Number</th>
				<th>Receipt No.</th>
				<th>Room Number</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $std): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($std->user->name); ?> <?php echo e($std->user->surname); ?></td>
					<td><?php echo e($std->user->regno); ?></td>
					<td><?php echo e($std->receipt); ?></td>
					<td class="text-center"><?php echo e($std->room_no); ?></td>
					<td class="d-flex justify-content-between">
						<a href="<?php echo e(route('admin.student.show', $std->user_id)); ?>" class="btn btn-sm btn-info">View Profile</a>
						<!--
						<a href="#" class="btn btn-sm btn-danger">Delete</a>
					-->
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	</div>
</div>
<script>
	$(function(){
		$('#students').DataTable();
	});
	
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>