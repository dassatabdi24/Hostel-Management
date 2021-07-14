<?php $__env->startSection('content'); ?>

<div class="row justify-content-between">
	<div class="col-md-6 bg-white msg-card pb-3">
		<div class="row head-color">
			<div class="col-2 mt-3 mb-2">
				<img src="<?php echo e(asset('image/logo.png')); ?>" alt="logo" class="img-logo">
			</div>
			<div class="col-9 line mb-2">
				<h3 class=" text-center h3 text-shadow mt-4">SUST Ladies' Hall Management</h3>
			</div>
		</div>
		<div>
			<h6 class="font-weight-bold text-danger">Welcome to  SUST Ladies' Hall Management portal. For new applicatants take the steps listed below.</h6>
			<ul>
				<li>Click Register and put in your Details.</li>
				<li>Select from the available hostel, floor, and bed spaces</li>	
				<li>Manage all your hostel work here!.</li>
			</ul>
		</div>
		<h6 class="text-danger text-center font-weight-bold">Already Registered ?, Login instead</h6>
		<div class="row">
			<div class="col-2">
				<a href="<?php echo e(route('register')); ?>" class="btn btn-primary d-block">Register</a>
			</div>
		</div>
		<h6 class="text-danger text-center font-weight-bold">Are you an Administrator?</h6>
		<h6>           </h6>

		<div class="row">
			<div class="col-12">
				<a href="/admin" class="btn btn-shadow btn-primary d-block">Administrator Log In</a>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card card-shadow">
			<div class="card-header">
				<h3 class="deep-grey-text text-center">Log in</h3>
			</div>
			
			<div class="card-body">
				<form method="POST" action="<?php echo e(route('login')); ?>">
					<?php echo csrf_field(); ?>
					
					<div class="form-group row">
						<label for="regno" class="col-sm-4 col-form-label text-md-right"><?php echo e(__('Reg. Number')); ?></label>
						
						<div class="col-md-6">
							<input placeholder="Your Registration Number" id="regno" type="number" class="form-control<?php echo e($errors->has('regno') ? ' is-invalid' : ''); ?>" name="regno" value="<?php echo e(old('regno')); ?>" required autofocus>
							
							<?php if($errors->has('regno')): ?>
							<span class="invalid-feedback">
								<strong><?php echo e($errors->first('regno')); ?></strong>
							</span>
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>
						
						<div class="col-md-6">
							<input placeholder = "Your Password" id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
							
							<?php if($errors->has('password')): ?>
							<span class="invalid-feedback">
								<strong><?php echo e($errors->first('password')); ?></strong>
							</span>
							<?php endif; ?>
						</div>
					</div>
					
					<div class="form-group row">
						<div class="col-md-6 offset-md-4">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <?php echo e(__('Remember Me')); ?>

								</label>
							</div>
						</div>
					</div>
					
					<div class="form-group row mb-0">
						<div class="col-md-8 offset-md-4">
							<div class="row">
								<div class="col-12">
									<button type="submit" class="btn-shadow btn btn-block btn-success">
										<?php echo e(__('Login')); ?>

									</button>
								</div>
								<div class="col-12 mr-3">
									<a class="btn btn-link text-danger" href="<?php echo e(route('password.request')); ?>">
										<?php echo e(__('Forgot Your Password?')); ?>

									</a>
								</div>
								<!--
								<div class="col-12 mr-3">
									<H3>
									<a class="btn btn-link text-danger" href="/admin">
										<?php echo e(__('Administrator Log In')); ?>

									</a>
									</H3>
								</div>
								-->
								
							</div>							
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>