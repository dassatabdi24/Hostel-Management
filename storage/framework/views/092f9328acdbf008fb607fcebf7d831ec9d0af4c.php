<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- CSRF Token -->
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	
	<title><?php echo e(config('app.name', 'Laravel')); ?></title>
	
	<!-- Fonts -->
	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
	
	<!-- Styles -->
	<link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/toastr.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/datatables.min.css')); ?>" rel="stylesheet">
	<!-- scripts -->
	<script src="<?php echo e(asset('js/app.js')); ?>"></script>
	<script src="<?php echo e(asset('js/main.js')); ?>"></script>
	<script src="<?php echo e(asset('js/toastr.min.js')); ?>"></script>
	<script defer src="<?php echo e(asset('js/fontawesome-all.min.js')); ?>"></script>
	
</head>