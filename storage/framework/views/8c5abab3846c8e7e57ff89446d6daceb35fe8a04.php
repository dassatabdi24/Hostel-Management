<!-- create hostel -->
<div class="modal fade" id="create-hostel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title ml-auto" id="exampleModalCenterTitle">Create New Hostel</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div>
					<?php echo e(Form::open(['route' => 'hostels.store', 'method' => 'POST', 'class' => 'create-hostel'])); ?>

					<div class=" form-group row">
						<?php echo e(Form::label('name', 'Name:', ['class' => 'col-md-4 col-form-label text-md-left'])); ?>

						<div class="col">
							<?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?>

						</div>
					</div>
					
					<div class=" form-group row">
						<?php echo e(Form::label('campus', 'Campus:', ['class' => 'col-md-4 col-form-label text-md-left'])); ?>

						<div class="col">
							<select name="campus" id="campus" class="form-control">
								<option value="">Select Main Hall</option>
								<?php $__currentLoopData = $campuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>		
								<option value="<?php echo e($campus->id); ?>"><?php echo e($campus->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>
					
					<div class=" form-group row">
						<?php echo e(Form::label('type', 'Type:', ['class' => 'col-md-4 col-form-label text-md-left'])); ?>

						<div class="col">
							<select name="type" id="type" class="form-control">
								<option value="">Select Type</option>	
								
								<option value="2">Female</option>
							</select>
						</div>
						
					</div>
				</div>
			</div>
			<div class="create-hostel-footer d-flex">
				<div class="col">
					<?php echo e(Form::submit('Create Hostel', ['class' => 'btn btn-block btn-success'])); ?>

					<?php echo e(Form::close()); ?>

				</div>
				<div class="col">
					<button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>
</div>

