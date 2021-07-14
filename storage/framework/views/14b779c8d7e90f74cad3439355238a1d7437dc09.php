<?php $__env->startSection('nav'); ?>
<?php echo $__env->make('inc.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php
$floor = '';
if($student->floor == 1){
	$floor = 'First';
}elseif($student->floor == 2){
	$floor = 'Second';
}else{
	$floor = 'Third';
}

?>
<?php $__env->startSection('content'); ?>
<div class="row my-2">
	<div class="col-lg-8 order-lg-2">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a href="" data-target="#personal" data-toggle="tab" class="nav-link active">Personal Profile</a>
			</li>
			<li class="nav-item">
				<a href="" data-target="#school" data-toggle="tab" class="nav-link">School Profile</a>
			</li>
			<li class="nav-item">
				<a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
			</li>
		</ul>
		<div class="tab-content py-4">
			<div class="tab-pane active" id="personal">
				<div class="row">
					<div class="col-md-6 col-lg-8">
						<h6 class = "font-weight-font-weight- text-danger ">Full Name</h6>
						<p class="bg-secondary text-white p-1 pl-2 rounded "><?php echo e($student->user->name); ?> <?php echo e($student->user->surname); ?></p>
						<h6 class = "font-weight-bold  text-danger">Email</h6>
						<p class="bg-secondary text-white p-1 pl-2 rounded email"><?php echo e($student->user->email); ?></p>
						<h6 class = "font-weight-bold  text-danger">Gender</h6>
						<p class="bg-secondary text-white p-1 pl-2 rounded "><?= ($student->user->gender == 1) ? 'Male':'Female'?></p>
						<h6 class = "font-weight-bold  text-danger">Phone Number</h6>
						<p class="bg-secondary text-white p-1 pl-2 rounded "><?php echo e($student->user->phone); ?></p>
						<h6 class = "font-weight-bold  text-danger">Address</h6>
						<p class="bg-secondary text-white p-1 pl-2 rounded "><?php echo e($student->user->address); ?></p>
						<h6 class = "font-weight-bold  text-danger">City</h6>
						<p class="bg-secondary text-white p-1 pl-2 rounded "><?php echo e($student->user->state); ?></p>
						<h6 class = "font-weight-bold  text-danger">Gurdian's Name</h6>
						<p class="bg-secondary text-white p-1 pl-2 rounded "><?php echo e($student->user->nok); ?></p>
						<h6 class = "font-weight-bold  text-danger">Guardian's Number</h6>
						<p class="bg-secondary text-white p-1 pl-2 rounded "><?php echo e($student->user->nokno); ?></p>
						<h6 class = "font-weight-bold  text-danger">Account Created on</h6>
						<p class="bg-secondary text-white p-1 pl-2 rounded "><?php echo e(date('M j, Y h:ia',strtotime($student->user->created_at))); ?></p>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="school">
				<div class="row">
					<div class="col-md-6 col-lg-8">
						<h6 class = "font-weight-bold  text-danger">Department</h6>
						<p class="bg-secondary text-white p-1 pl-2 rounded "><?php echo e($student->user->department); ?></p>
						<h6 class = "font-weight-bold  text-danger">Registration Number</h6>
						<p class="bg-secondary text-white p-1 pl-2 rounded "><?php echo e($student->user->regno); ?></p>
						<h6 class = "font-weight-bold  text-danger">Main Hall</h6>
						<p class="bg-secondary text-white p-1 pl-2 rounded "><?php echo e($student->campus->name); ?></p>
						<h6 class = "font-weight-bold  text-danger">Hostel</h6>
						<p class="bg-secondary text-white p-1 pl-2 rounded "><?php echo e($student->hostel->name); ?></p>
						<h6 class = "font-weight-bold  text-danger">Floor</h6>
						<p class="bg-secondary text-white p-1 pl-2 rounded "><?php echo e($floor); ?></p>
						<h6 class = "font-weight-bold  text-danger">Room Number</h6>
						<p class="bg-secondary text-white p-1 pl-2 rounded "><?php echo e($student->room_no); ?></p>
						<h6 class = "font-weight-bold  text-danger">Bed Location</h6>
						<p class="bg-secondary text-white p-1 pl-2 rounded "><?php echo e($student->bed); ?></p>
												<h6 class = "font-weight-bold  text-danger">Receipt</h6>
						<p class="bg-secondary text-white p-1 pl-2 rounded "><?php echo e($student->receipt); ?></p>
						<h6 class = "font-weight-bold  text-danger">Room Allocated on</h6>
						<p class="bg-secondary text-white p-1 pl-2 rounded "><?php echo e(date('M j, Y h:ia ',strtotime($student->created_at))); ?></p>
					</div>
				</div>
			</div>				
			<div class="tab-pane" id="edit">
				<div class="row">
					<div class="col-md-6 col-lg-8">
						<?php echo Form::open(['action' => ['RoomController@update', $student->user->id], 'method' => 'PUT'] ); ?>

						<div class="form-group row">
							<label class="col-lg-3 col-form-label form-control-label">First name</label>
							<div class="col-lg-9">
								<input class="form-control" type="text" value="<?php echo e($student->user->name); ?>" name="name">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label form-control-label">Last name</label>
							<div class="col-lg-9">
								<input class="form-control" type="text" value="<?php echo e($student->user->surname); ?>" name="surname">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label form-control-label">Email</label>
							<div class="col-lg-9">
								<input class="form-control" type="email" value="<?php echo e($student->user->email); ?>" name="email">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label form-control-label">Department</label>
							<div class="col-lg-9">
								<input class="form-control" type="text" value="<?php echo e($student->user->department); ?>" name="department">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label form-control-label">Registration Number</label>
							<div class="col-lg-9">
								<input class="form-control" type="number" value="<?php echo e($student->user->regno); ?>" name="regno">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label form-control-label">Phone Number</label>
							<div class="col-lg-9">
								<input class="form-control" type="text" value="<?php echo e($student->user->phone); ?>" name="phone">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label form-control-label">Address</label>
							<div class="col-lg-9">
								<input class="form-control" type="text" value="<?php echo e($student->user->address); ?>" name="address">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label form-control-label">City</label>
							<div class="col-lg-9">
								<input class="form-control" type="text" value="<?php echo e($student->user->state); ?>" name="state">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label form-control-label">Guardian's Name</label>
							<div class="col-lg-9">
								<input class="form-control" type="text" value="<?php echo e($student->user->nok); ?>" name="nok"> 
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label form-control-label">Guardian's Number</label>
							<div class="col-lg-9">
								<input class="form-control" type="text" value="<?php echo e($student->user->nokno); ?>" name="nokno">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label form-control-label"></label>
							<div class="col-lg-9">
								<?php echo e(Form::submit('Save Changes',['class' =>'btn btn-warning font-weight-bold btn-block'])); ?>

								<?php echo Form::close(); ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 order-lg-1 text-center py-3">
		<img src="/storage/passport/<?php echo e($student->user->passport); ?>" class="mx-auto img-fluid img-circle d-block" alt="avatar">
		<h6 class="mt-2">Upload a different photo</h6>
		<?php echo Form::open(['action' => ['RoomController@updatephoto', $student->user->id],'method' => 'PUT','enctype' => 'multipart/form-data'] ); ?>

		<label class="custom-file">
			<input type="file" id="file" class="custom-file-input" name="passport">
			<span class="custom-file-control">Choose file</span>
		</label>
		<?php echo e(Form::submit('Save Photo',['class' =>'btn btn-info font-weight-bold btn-block mt-2'])); ?>

		<?php echo Form::close(); ?>

	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>