<?php $__env->startSection('nav'); ?>
<?php echo $__env->make('inc.nav-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row my-5">
	<div class="col-lg-4 col-md-4">
		<div class="card mb-3 pt-3 overview-card">
			<div class="show-pic-parent">
				<img src="<?php echo e(asset('/storage/passport/'.$new->allocate->user->passport)); ?>" alt="<?php echo e($new->allocate->user->surname); ?>" class="show-pic">
			</div>
			<div class="text-center">
				<p class="font-weight-bold"> <?php echo e($new->allocate->user->name); ?> <?php echo e($new->allocate->user->surname); ?> </p>
				<a href="<?php echo e(route('admin.student.show', $new->user_id)); ?>" class="btn btn-primary">View Full Profile</a>
			</div>
			<div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item "><span class="mr-4"><i class="fas fa-user-alt"></i></span><span class="text-danger font-weight-bold"><?php echo e($new->allocate->user->regno); ?></span></li>
					<li class="list-group-item "><span class="mr-4"><i class="fas fa-school"></i></span><span class="text-danger font-weight-bold"><?php echo e($new->allocate->campus->name); ?></span> </li>
					<li class="list-group-item "><span class="mr-4"><i class="fas fa-home"></i></span><span class="text-danger font-weight-bold"><?php echo e($new->allocate->hostel->name); ?></span></li>
					<li class="list-group-item "><span class="mr-4"><i class="fas fa-list-ol"></span></i><span class="text-danger font-weight-bold">Room number <?php echo e($new->allocate->room_no); ?></span></li>
					<li class="list-group-item "><span class="mr-4"><i class="fas fa-warehouse"></i></span><span class="text-danger font-weight-bold"><?php echo e($new->allocate->bed); ?> Bed</span></li>
				</ul>
			</div>
		</div>
	</div>
	<?php if($new->admin): ?>
	<div class="col-lg-8 order-lg-2 col-sm-12 col-xs-12 mt-5">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title text-center">Send a New Message</h5>
				<?php echo e(Form::open(['route' => ['adminmsg.send'], 'method' => 'POST'])); ?>

				<div class="form-group">
					<input type="hidden" name="user_id" value="<?php echo e($new->user_id); ?>">
					<textarea name="message" id="message" rows="5" class="form-control" placeholder="Send Message"></textarea>
				</div>
				<div class="form-group">
					<input type="submit" value="Send Message" class="btn btn-success float-right">
				</div>
				<?php echo e(Form::close()); ?>

			</div>
		</div>
	</div>
	<?php else: ?>
	<div class="col-lg-8 order-lg-2 col-sm-12 col-xs-12 mt-5">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title text-center">Reply Message</h5><hr>
				<p class="card-text"><?php echo e($new->message); ?></p><hr>
				<?php echo e(Form::open(['route' => ['adminmsg.reply'], 'method' => 'POST'])); ?>

				<div class="form-group">
					<input type="hidden" name="user_id" value="<?php echo e($new->user_id); ?>">
					<input type="hidden" name="id" value="<?php echo e($new->id); ?>">
					<textarea name="message" id="message" rows="5" class="form-control" placeholder="Write a Reply"></textarea>
				</div>
				<div class="form-group">
					<input type="submit" value="Send Reply" class="btn btn-success float-right">
				</div>
				<?php echo e(Form::close()); ?>

			</div>
		</div>
	</div>
	<?php endif; ?>
	
</div>
<div class="row pt-3">
	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 m-auto p-3 msg-show-body">
		<h5 class="text-center">Conversation</h5><hr class="m-0 mb-2">
		<?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $old): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php if(empty($old[1])): ?>
		<div>
			<div class="d-flex justify-content-start">
				<div class="p-2 m-0 msg-show-tab bg-show-1">
					<p class="m-0 p-2"><?php echo e($old[0]->message); ?></p>
					<p class="font-weight-bold mt-3 m-0 pb-2 text-left"> <?php echo e(date('M j, h:ia',strtotime($old[0]->created_at))); ?></p>
				</div>
			</div>		
			<hr>
		</div>
		<?php elseif(empty($old[0])): ?>
		<div>
			<div class="d-flex justify-content-end">
				<div class=" p-2 m-0 msg-show-tab bg-show-2">
					<p class="m-0 p-2"><?php echo e($old[1]->message); ?></p>
					<p class="font-weight-bold mt-3 m-0 pb-2 pl-2 text-right"> <?php echo e(date('M j, h:ia',strtotime($old[1]->created_at))); ?></p>
				</div>
			</div>		
			<hr>
		</div>
		<?php else: ?>
		<div>
			<div class="d-flex justify-content-start">
				<div class="p-2 m-0 msg-show-tab bg-show-1">
					<p class="m-0 p-2"><?php echo e($old[0]->message); ?></p>
					<p class="font-weight-bold mt-3 m-0 pb-2 text-left"> <?php echo e(date('M j, h:ia',strtotime($old[0]->created_at))); ?></p>
				</div>
			</div>		
			<div class="d-flex justify-content-end">
				<div class=" p-2 m-0 msg-show-tab bg-show-2">
					<p class="m-0 p-2"><?php echo e($old[1]->message); ?></p>
					<p class="font-weight-bold mt-3 m-0 pb-2 pl-2 text-right"> <?php echo e(date('M j, h:ia',strtotime($old[1]->created_at))); ?></p>
				</div>
			</div>
			<hr>
		</div>
		<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>