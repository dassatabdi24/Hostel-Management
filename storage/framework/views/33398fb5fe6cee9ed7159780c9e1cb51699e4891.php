<?php $__env->startSection('nav'); ?>
<?php echo $__env->make('inc.nav-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-12 mb-4 mt-2">
		<h4 class="text-center text-danger">List of Students in the <?php echo e($details->name); ?> and Hostel Statistics</h4>
	</div>
	<div class="col-8">
		
		<table id = "students" class="table table-bordered table-striped table-hover">
			<thead class = "std-thead">
				<th>Name</th>
				<th>Reg. Number</th>
				<th>Room Number</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($student->user->name); ?> <?php echo e($student->user->surname); ?></td>
					<td><?php echo e($student->user->regno); ?></td>
					<td><?php echo e($student->room_no); ?></td>
					<td class="d-flex justify-content-between">
						<a href="<?php echo e(route('admin.student.show', $student->user_id)); ?>" class="btn btn-sm btn-info">View Profile</a>
						
						<a href="#" class="btn btn-sm btn-danger">Delete</a>

					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>				
			</tbody>
		</table>
	</div>
	
	<div class="col-4">
		<div class="card mt-3">
			<div class="card-header">
				<h5 class="text-center m-0 p-0">Hostel Details</h5>
			</div>
			<div class="sticky-top">
				<ul class="list-group list-group-flush">
					<li class="list-group-item d-flex justify-content-between"><h6>Campus Name</h6><h5><?php echo e($details->campus->name); ?></h5></li>
					<li class="list-group-item d-flex justify-content-between"><h6>Hostel Name</h6><h5><?php echo e($details->name); ?></h5></li>
					<li class="list-group-item d-flex justify-content-between">
						<h6>Type</h6>
						<?php if($details->type = 1): ?>
						<h5>Female</h5>
						<?php else: ?>
						<h5>Female</h5>
						<?php endif; ?>
					</li>
					<li class="list-group-item d-flex justify-content-between"><h6>Total No. of Students</h6><h5><?php echo e(count($students)); ?></h5></li>
					<li class="list-group-item d-flex justify-content-between"><h6>Total No. of Rooms</h6><h5><?php echo e($roomCount); ?></h5></li>
					<li class="list-group-item d-flex justify-content-between"><h6>Total No. of Rooms Available</h6><h5><?php echo e($room_avail); ?></h5></li>
					<li class="list-group-item d-flex justify-content-between"><h6>Fully Occupied Rooms</h6><h5><?php echo e($room_unavail); ?></h5></li>
					<li class="list-group-item d-flex justify-content-between"><h6>Total No. Available Bed space</h6><h5><?php echo e($bed_avail); ?></h5></li>
					<li class="list-group-item "><a href="<?php echo e(route('hostels.show', $details->id)); ?>" class=" font-weight-bold btn btn-block btn-warning">View Rooms</a></li>
				</ul>
			</div>
		</div>
	</div>
	
</div>
<script>
	$(function(){
		$('#students').DataTable();
	});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>