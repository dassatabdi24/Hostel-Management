<div class="modal fade" id="create-notice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title ml-auto" id="exampleModalCenterTitle">Notification</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo e(Form::open(['route' => 'admin.notifycreate', 'method' => 'POST', 'class' => 'create-hostel'])); ?>

				
				<div class=" form-group">
					<label for="title" class="col-form-label font-weight-bold">Title: 
					</label>
					<?php echo e(Form::text('title', null, ['class' => 'form-control'])); ?>

				</div>
				
				<div class="form-group">
					<label for="message-text" class="col-form-label font-weight-bold">Notification: 
					</label>
					<textarea class="form-control" id="notice" rows="3" name="notice"></textarea>
				</div>
				
				<div class=" form-group row">
					<div class="col">
						<select name="hostel_id" id="hostel" class="form-control">
							<option value="">Select Hostel</option>
							<?php $__currentLoopData = $hostels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hostel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>		
							<option value="<?php echo e($hostel->id); ?>"><?php echo e($hostel->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
				</div>
				<input type="hidden" value="<?php echo e(Auth::user()->name); ?>" name = "name">
			</div>
			<div class="create-hostel-footer d-flex">
				<div class="col">
					<?php echo e(Form::submit('Send Notice', ['class' => 'btn btn-block btn-success'])); ?>

					<?php echo e(Form::close()); ?>

				</div>
				<div class="col">
					<button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</div>
			
		</div>
	</div>
</div>