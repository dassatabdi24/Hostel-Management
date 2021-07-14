<?php $__env->startSection('nav'); ?>
<?php echo $__env->make('inc.nav-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	
	<div class="col-12">
		<table id = "campus" class="table table-bordered table-striped ">
			<thead class="std-thead">
				<th>Name</th>
				<th>Hostels</th>
			</thead>
			<tbody>
				<?php $__currentLoopData = $campus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $camp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr class="rep-tr">
					<td class="text-center my-auto">
						<h5 class="mt-3 mb-0" ><?php echo e($camp->name); ?></h5>
					</td>
					<td>
						<?php $__currentLoopData = $camp->hostels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hostel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($hostel->name): ?>
						<div class="row justify-content-between px-3 rep-hostel">
							<h5 class="d-inline mt-3 mb-0 rep-h5"><?php echo e($hostel->name); ?></h5>
							<span class="d-inline-block mt-2">
								<a href="<?php echo e(route('report.report', $hostel->id)); ?>" class="btn btn-primary">View Reports</a>
							</span>
						</div>
						<?php else: ?>
						No hostels in this Campus 
						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</td>
				</tr>
				
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				
				
				
			</tbody>
		</table>
		
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>