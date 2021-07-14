<?php if(count($errors)): ?>
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="alert alert-danger alert-dismissable">
	<a class="panel-close close" data-dismiss="alert">×</a><?php echo e($error); ?>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(session('success')): ?>
<script>
	$(function(){
		var msg = "<?php echo e(session('success')); ?>";
		toastr.success(msg);
	});
</script>
<?php endif; ?>
<?php if(session('error')): ?>
<script>
	$(function(){
		var msg = "<?php echo e(session('error')); ?>";
		toastr.success(msg);
	});
</script>
<?php endif; ?>

