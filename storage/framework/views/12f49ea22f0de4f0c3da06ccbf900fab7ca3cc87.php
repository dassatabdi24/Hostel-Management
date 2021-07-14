<?php $__env->startSection('content'); ?>

<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header"><?php echo e(__('Register')); ?></div>
			
			<div class="card-body">
				<form method="POST" action="<?php echo e(route('register')); ?>" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
					
					<div class="form-group row">
						<label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('First Name')); ?></label>
						
						<div class="col-md-6">
							<input id="name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>"  autofocus>
							
							<?php if($errors->has('name')): ?>
							<span class="invalid-feedback">
								<strong><?php echo e($errors->first('name')); ?></strong>
							</span>
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="surname" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Surname')); ?></label>
						
						<div class="col-md-6">
							<input id="surname" type="text" class="form-control<?php echo e($errors->has('surname') ? ' is-invalid' : ''); ?>" name="surname" value="<?php echo e(old('surname')); ?>" >
							
							<?php if($errors->has('surname')): ?>
							<span class="invalid-feedback">
								<strong><?php echo e($errors->first('surname')); ?></strong>
							</span>
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>
						
						
						<div class="col-md-6">
							<input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" >
							
							<?php if($errors->has('email')): ?>
							<span class="invalid-feedback">
								<strong><?php echo e($errors->first('email')); ?></strong>
							</span>
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="regno" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Registration Number')); ?></label>
						
						<div class="col-md-6">
							<input id="regno" type="number" class="form-control<?php echo e($errors->has('regno') ? ' is-invalid' : ''); ?>" name="regno" value="<?php echo e(old('regno')); ?>" >
							
							<?php if($errors->has('regno')): ?>
							<span class="invalid-feedback">
								<strong><?php echo e($errors->first('regno')); ?></strong>
							</span>
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="gender" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Gender')); ?></label>
						
						<div class="col-md-6">
							<select class="form-control<?php echo e($errors->has('gender') ? ' is-invalid' : ''); ?>" id="gender" name="gender" value="<?php echo e(old('gender')); ?>"  }}> 
								<option value=" "></option>
						
								<option value="2">Female</option>
							</select>
							<?php if($errors->has('gender')): ?>
							<span class="invalid-feedback">
								<strong><?php echo e($errors->first('gender')); ?></strong>
							</span>
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="campus_id" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Campus')); ?></label>
						
						<div class="col-md-6">
							<select class="form-control<?php echo e($errors->has('campus_id') ? ' is-invalid' : ''); ?>" id="campus_id" name="campus_id" value="<?php echo e(old('campus_id')); ?>"  }}> 
								<option value=" "></option>
								<option value="1">1st Ladies Hall </option>
								<option value="2">2nd Ladies Hall</option>
							</select>
							<?php if($errors->has('campus_id')): ?>
							<span class="invalid-feedback">
								<strong><?php echo e($errors->first('campus_id')); ?></strong>
							</span>
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="department" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Department')); ?></label>
						
						<div class="col-md-6">
							<input id="department" type="text" class="form-control<?php echo e($errors->has('department') ? ' is-invalid' : ''); ?>" name="department" value="<?php echo e(old('department')); ?>" >
							
							<?php if($errors->has('department')): ?>
							<span class="invalid-feedback">
								<strong><?php echo e($errors->first('department')); ?></strong>
							</span>
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="phone" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Phone Number')); ?></label>
						
						<div class="col-md-6">
							<input id="phone" type="text" class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>" name="phone" value="<?php echo e(old('phone')); ?>" >
							
							<?php if($errors->has('phone')): ?>
							<span class="invalid-feedback">
								<strong><?php echo e($errors->first('phone')); ?></strong>
							</span>
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="state" class="col-md-4 col-form-label text-md-right"><?php echo e(__('City')); ?></label>
						
						<div class="col-md-6">
							<input id="state" type="text" class="form-control<?php echo e($errors->has('state') ? ' is-invalid' : ''); ?>" name="state" value="<?php echo e(old('state')); ?>" >
							
							<?php if($errors->has('state')): ?>
							<span class="invalid-feedback">
								<strong><?php echo e($errors->first('state')); ?></strong>
							</span>
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="address" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Home Address')); ?></label>
						
						<div class="col-md-6">
							<input id="address" type="text" class="form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>" name="address" value="<?php echo e(old('address')); ?>" >
							
							<?php if($errors->has('address')): ?>
							<span class="invalid-feedback">
								<strong><?php echo e($errors->first('address')); ?></strong>
							</span>
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="nok" class="col-md-4 col-form-label text-md-right"><?php echo e(__("Guardian's Name")); ?></label>
						
						<div class="col-md-6">
							<input id="nok" type="text" class="form-control<?php echo e($errors->has('nok') ? ' is-invalid' : ''); ?>" name="nok" value="<?php echo e(old('nok')); ?>" >
							
							<?php if($errors->has('nok')): ?>
							<span class="invalid-feedback">
								<strong><?php echo e($errors->first('nok')); ?></strong>
							</span>
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="nokno" class="col-md-4 col-form-label text-md-right"><?php echo e(__("Guardian's Phone Number")); ?></label>
						
						<div class="col-md-6">
							<input id="nokno" type="text" class="form-control<?php echo e($errors->has('nokno') ? ' is-invalid' : ''); ?>" name="nokno" value="<?php echo e(old('nokno')); ?>" >
							
							<?php if($errors->has('nokno')): ?>
							<span class="invalid-feedback">
								<strong><?php echo e($errors->first('nokno')); ?></strong>
							</span>
							<?php endif; ?>
						</div>
					</div>
					
					<div class="row form-group">
						
						<label for="passport" class="col-md-4 col-form-label text-md-right"><?php echo e(__("Photo")); ?></label>
						
						<div class="col-md-6">
							<input id="passport" type="file" class="form-control<?php echo e($errors->has('passport') ? ' is-invalid' : ''); ?>" name="passport" value="<?php echo e(old('passport')); ?>" >
							
							<?php if($errors->has('passport')): ?>
							<span class="invalid-feedback">
								<strong><?php echo e($errors->first('passport')); ?></strong>
							</span>
							<?php endif; ?>
						</div>
					</div>
					
					
					<div class="form-group row">
						<label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>
						
						<div class="col-md-6">
							<input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" >
							
							<?php if($errors->has('password')): ?>
							<span class="invalid-feedback">
								<strong><?php echo e($errors->first('password')); ?></strong>
							</span>
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirm Password')); ?></label>
						
						<div class="col-md-6">
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
						</div>
					</div>
					
					<div class="form-group row mb-0">
						<div class="col-md-6 offset-md-4">
							<button type="submit" class="btn btn-primary btn-block">
								<?php echo e(__('Register')); ?>

							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>