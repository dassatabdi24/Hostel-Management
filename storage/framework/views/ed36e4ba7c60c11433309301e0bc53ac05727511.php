<nav class="navbar navbar-expand-md navbar-dark navbar-laravel user mb-4">
	<div class="container">
		<a class="navbar-brand" href="<?php echo e(url('/home')); ?>">
			<?php echo e(config('app.name', 'Laravel')); ?>

		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!-- Left Side Of Navbar -->
			<ul class="navbar-nav mr-auto">
				
			</ul>
			
			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ml-auto">
				<!-- Authentication Links -->
				<?php if(auth()->guard()->guest()): ?>
				<li><a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a></li>
				<li><a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a></li>
				<?php else: ?>
				<a href="<?php echo e(route('stdmsg.show',Auth::user()->id)); ?>" class="nav-link">Messages <span class="badge badge-pill badge-danger">1</span></a>
				<a href="<?php echo e(route('profile.show',Auth::user()->id)); ?>" class="nav-link">Your Profile</a>
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						Hello <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
					</a>
					
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a href="" class="dropdown-item">Change Password</a>
						<a class="dropdown-item" href="<?php echo e(route('user.logout')); ?>"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
						<?php echo e(__('Logout')); ?>

					</a>
					<form id="logout-form" action="<?php echo e(route('user.logout')); ?>" method="GET" style="display: none;">
						<?php echo csrf_field(); ?>
					</form>
				</div>
			</li>
			<?php endif; ?>
		</ul>
	</div>
</div>
</nav>