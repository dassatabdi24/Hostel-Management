<?php $__env->startSection('nav'); ?>
<?php echo $__env->make('inc.nav-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('inc.create-hostel-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-between py-3">
	<div class="col">
		<h4 class="text-center m-0 text-danger">All Campuses and Hostels</h4>
	</div>
	<div class="col-3">
		<button class="btn btn-block btn-warning font-weight-bold" data-toggle="modal" data-target="#create-hostel" >Create a New Hostel</button>
	</div>
</div>
<div class="row">
	
	<div class="col">
		<table id = "hostel" class="table table-bordered table-striped table-hover">
			<thead class="std-thead">
				<th>Main Hall Name</th>
				<th>Hostel Name</th>
				<th>Type</th>
				<th>Room Count</th>
				<th>Operations</th>
			</thead>
			<tbody>
				<?php $__currentLoopData = $hostels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hostel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($hostel->campus->name); ?></td>
					<td><?php echo e($hostel->name); ?></td>
					<?php switch($hostel->type):
					case (1): ?>
					<td>Male</td>
					<?php break; ?>
					<?php case (2): ?>
					<td>Female</td>
					<?php break; ?>
					<?php default: ?>
					<?php endswitch; ?>
					<td><?php echo e(count($hostel->rooms)); ?></td>
					<td class="d-flex justify-content-around">
						<a href="<?php echo e(route('admin.student.all', $hostel->id)); ?>" class="btn btn-sm btn-info">View Students</a>	
						<a href="<?php echo e(route("hostels.show",$hostel->id)); ?>" class="btn btn-sm btn-primary">View Rooms</a>
						<a href="<?php echo e(route("report.report",$hostel->id)); ?>" class="btn btn-sm btn-danger">Hostel Statistics</a>					
					</td>
				</tr> 
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	</div>
	
</div>
<script>
	$(function(){
		$('#hostel').DataTable();
	}); 
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>