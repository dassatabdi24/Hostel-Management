<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<?php echo $__env->make('inc.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>
	<div id="app">
		<?php if(Route::getCurrentRoute()->uri() === '/'): ?>
		
		<?php echo $__env->make('inc.slide', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		
		<?php else: ?>
		
		<?php echo $__env->yieldContent('nav'); ?>
		
		<?php echo $__env->make('inc.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		
		<?php endif; ?>
		
		<div class="container mb-5">
			<div class="row result-parent">
			</div>
			<?php echo $__env->yieldContent('content'); ?>
			
		</div>
		
	</div>
</body>
</html>
