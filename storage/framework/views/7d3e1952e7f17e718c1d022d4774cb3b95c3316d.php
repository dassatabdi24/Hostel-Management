<?php $__env->startSection('nav'); ?>
<?php echo $__env->make('inc.nav-alloc', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-12 text-center">
		<h4 class="text-center m-0 text-danger">Hostel and Bed Space Selection</h4>
	</div>
</div>
<div class="row mt-5">
	<div class="col parent">
		<div class="toggle h-10 w-100">
			<div class="h-100 w-100 ">
				<a href="/home2" id="first" class="bed d-inline-block h-25 w-25 m-3">
					<p class="text-center"><i class="fas fa-bed alloc-test"></i></p>
					<h3 class="text-center">First</h3>
				</a>
				<a href="/home" id="second" class="bed d-inline-block h-25 w-25 m-3">
					<p class="text-center"><i class="fas fa-bed alloc-test"></i></p>
					<h3 class="text-center">Second</h3>
				</a>
				<a href="/home" id="third" class="bed d-inline-block  h-25 w-25 m-3">
					<p class="text-center"><i class="fas fa-bed alloc-test"></i></p>
					<h3 class="text-center">Third</h3>
				</a>
				<a href="/home" id="fourth" class="bed d-inline-block h-25 w-25 m-3">
					<p class="text-center"><i class="fas fa-bed alloc-test"></i></p>
					<h3 class="text-center">Fourth</h3>
				</a>
			</div>
		</div>
	</div>

	<div class="col-md-5">
		<div class="card">
			<div class="card-header text-center">
				Choose Hostel
			</div>
			<div class="card-body justify-content-center">
				<?php echo e(Form::open(['id' => 'allocform'])); ?>

				<div class=" form-group row">
					<?php echo e(Form::label('campus_id', 'Campus:', ['class' => 'col-3 col-form-label text-md-left'])); ?>

					<div class="col">
						<select name="campus_id" id="campus_id" class="form-control" readonly>
							<option value="<?php echo e($student->campus->id); ?>"><?php echo e($student->campus->name); ?></option>
						</select>
					</div>
				</div>

				<div class=" form-group row">
					<?php echo e(Form::label('type', 'Type:', ['class' => 'col-3 col-form-label text-md-left'])); ?>

					<div class="col">
						<select name="type" id="type" class="form-control" readonly>
							<option value="<?php echo e($student->gender); ?>">
								<?= ($student->gender == 1)? 'Female' : 'Female' ?>
							</option>
						</select>
					</div>
				</div>

				<div class=" form-group row">
					<?php echo e(Form::label('hostel_id', 'Hostel:', ['class' => 'col-3 col-form-label text-md-left'])); ?>

					<div class="col">
						<select name="hostel_id" id="hostel_id" class="form-control">
							<option value="">Select Hostel</option>
							<?php $__currentLoopData = $availables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $available): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($available->hostel_id); ?>"><?php echo e($available->hostel->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
				</div>

				<div class=" form-group row">
					<?php echo e(Form::label('floor', 'Floor:', ['class' => 'col-3 col-form-label text-md-left'])); ?>

					<div class="col">
						<select name="floor" id="floor" class="form-control" disabled>
							<option value="x">Select Floor</option>
							<option value="1">First</option>
							<option value="2">Second</option>
							<option value="3">Third</option>
						</select>
					</div>
				</div>

				<div class=" form-group row">
					<?php echo e(Form::label('room_no', 'Room No.:', ['class' => 'col-3 col-form-label text-md-left'])); ?>

					<div class="col">
						<select name="room_no" id="room_no" class="form-control" disabled>
							<option value="">Select Room Number</option>
						</select>
					</div>
				</div>

				<div class="form-group row mt-5">
					<div class="col-3"></div>
					<div class="col">
						<input type="submit" value="Show Available Bed Space" class="btn btn-block btn-shadow btn-success" disabled>
					</div>
				</div>
				<?php echo e(Form::close()); ?>

			</div>
		</div>
	</div>
</div>
</div>
<div>
	<div data-u="loading" class="jssorl-009-spin spin paystackspin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.5);">
		<img style="margin-top:-15px;position:relative;top:35%;width:38px;height:38px;" src="<?php echo e(asset('image/spin.svg')); ?>" />
	</div>
</div>
<script>
	$(function () {
		let name = "<?php echo e($student->name.' '.$student->surname); ?>",
			email = "<?php echo e($student->email); ?>",
			campus = "<?php echo e($student->campus->name); ?>",
			phone = "<?php echo e($student->phone); ?>",
			reg = "<?php echo e($student->regno); ?>",
			depart = "<?php echo e($student->department); ?>",
			token = "<?php echo e(Session::token()); ?>";

		//select box manipulation
		let campus_id = $('#campus_id'),
			type = $('#type'),
			hostel = $('#hostel_id'),
			floor = $('#floor'),
			room = $('#room_no'),
			selected = $("#floor option[value='x']"),
			submit = $("input[type='submit']"),
			first = $('#first'),
			second = $('#second'),
			third = $('#third'),
			fourth = $('#fourth'),
			toggle = $('.toggle').detach(),
			disabled,
			hostelText,
			enabled,
			Space;

		toggle.css('display', 'block');

		function toggleBed() {
			if (toggle == null || toggle.length == 0) {
				toggle = $('.toggle').detach();
			}
		}

		hostel.change(function () {
			toggleBed();
			//reset the following
			selected.attr('selected', '');
			room.html("<option value = ''>Select Room Number</option>").attr('disabled', '');

			submit.attr('disabled', '');
			if (hostel.val()) {
				floor.removeAttr('disabled');
			} else {
				//reset room_no and floor
				floor.attr('disabled', '');
				room.html("<option value = ''>Select Room</option>").attr('disabled', '');
			}
			//clear the selected attr for reselection
			selected.removeAttr('selected');
			hostelText = $('option:selected', this).text();
		});

		floor.change(function () {
			toggleBed();
			let url = "<?php echo e(route('allocate.getrooms')); ?>";
			submit.attr('disabled', '');
			room.html("<option value = ''>Select Room Number</option>").attr('disabled', '');

			let data = {
				campus_id: campus_id.val(),
				type: type.val(),
				hostel_id: hostel.val(),
				floor: floor.val()
			}


			$.ajax({
				method: 'GET',
				url: url,
				data: data,
				success: function (data) {
					room.removeAttr('disabled');
					$.each(data, function (key, value) {
						room.append('<option value = ' + value + '>' + value + '</option>');
					});
				}
			});
		});

		room.change(function () {
			toggleBed();

			if (room.val()) {
				submit.removeAttr('disabled');
			} else {
				submit.attr('disabled', '');
			}

		});

		//generate bed-spaces
		$('#allocform').submit(function (e) {
			e.preventDefault();

			let uri = "<?php echo e(route('allocate.getBed')); ?>";

			let data = {
				campus_id: campus_id.val(),
				type: type.val(),
				hostel_id: hostel.val(),
				floor: floor.val(),
				room_no: room.val()
			}


			$.ajax({
				method: 'GET',
				url: uri,
				data: data,
				success: function (data) {
					if (toggle != null) {
						toggle.appendTo($('.parent'));
					}
					toggle = null;
					$('.bed').off('click');

					if (data.first > 0) {
						first.addClass('disabled');
						first.removeClass('text-available');
					} else {
						first.removeClass('disabled');
						first.addClass('text-available');
					}
					if (data.second > 0) {
						second.addClass('disabled');
						second.removeClass('text-available');
					} else {
						second.removeClass('disabled');
						second.addClass('text-available');
					}
					if (data.third > 0) {
						third.addClass('disabled');
						third.removeClass('text-available');
					} else {
						third.removeClass('disabled');
						third.addClass('text-available');
					}
					if (data.fourth > 0) {
						fourth.addClass('disabled');
						fourth.removeClass('text-available');
					} else {
						fourth.removeClass('disabled');
						fourth.addClass('text-available');
					}
					disabled = $('.disabled');
					enabled = $('a.bed:not(.disabled)');

					clickHandler();

				}
			});
		});

		//disable click on .disableds


		function clickHandler() {
			disabled.click(function (e) {
				e.preventDefault();
			});

			enabled.click(function (e) {
				e.preventDefault();
				let urii = "<?php echo e(route('allocate.check')); ?>";
				//gets the space selected
				space = $(this).attr('id');
				let da = {
					campus_id: campus_id.val(),
					type: type.val(),
					hostel_id: hostel.val(),
					floor: floor.val(),
					room_no: room.val(),
					space: space
				}
				//checks the room is stil available
				$.ajax({
					method: 'GET',
					url: urii,
					data: da,
					success: function (data) {
						if (data > 0) {
							//error
							toastr.error("That Space has already been taken.");
						} else if (data == 0) {
							//add loading effects
							/*
							$(".paystackspin").css({
								display: "block"
							})
							*/
							//paystack
							payWithPaystack();
							
							//y();
						}
					},
					error: function () {
						toastr.error("Poor Newtwork Connection.");
					}
				});
			});
		}
		
		function y() {
					let urll = "<?php echo e(route('allocate.allocate')); ?>";
					let dat = {
						campus_id: campus_id.val(),
						hostel_id: hostel.val(),
						type: type.val(),
						floor: floor.val(),
						room_no: room.val(),
						space: space,
						//receipt: response.reference,
						_token: token
					}
					$.ajax({
						method: 'POST',
						url: urll,
						data: dat,
						success: function (data) {
							toastr.success("Bedspace asigned successfully.");
							$(".paystackspin").css({
								display: "none"
							});
							location.href = "<?php echo e(route('home')); ?>"
						},
						error: function () {
						toastr.error("Poor Newtworkkk Connection.");
					}

					})
				}

		function payWithPaystack() {
			var handler = PaystackPop.setup({
				key: 'pk_test_81e179b9b83f22f85a2c30c038cd957dbc21b369',
				email: email,
				amount: 4000000,
				ref: '' + Math.floor((Math.random() * 1000000000) + 1),
				metadata: {
					custom_fields: [{
							display_name: "Full Name",
							variable_name: "full_name",
							value: name
						}, {
							display_name: "Campus",
							variable_name: "campus",
							value: campus
						}, {
							display_name: "Hostel",
							variable_name: "hostel",
							value: hostelText
						}, {
							display_name: "Department",
							variable_name: "department",
							value: depart
						},
						{
							display_name: "Registration Number",
							variable_name: "reg_no",
							value: reg
						}, {
							display_name: "Phone Number",
							variable_name: "phone_no",
							value: phone
						}
					]
				},
				callback: function (response) {
					let urll = "<?php echo e(route('allocate.allocate')); ?>";
					let dat = {
						campus_id: campus_id.val(),
						hostel_id: hostel.val(),
						type: type.val(),
						floor: floor.val(),
						room_no: room.val(),
						space: space,
						receipt: response.reference,
						_token: token
					}
					$.ajax({
						method: 'POST',
						url: urll,
						data: dat,
						success: function (data) {
							toastr.success("Bedspace asigned successfully.");
							$(".paystackspin").css({
								display: "none"
							});
							location.href = "<?php echo e(route('home')); ?>"
						},
						error: function () {
						toastr.success("Bedspace asigned successfully.");
							$(".paystackspin").css({
								display: "none"
							});
							location.href = "/home2"
						//toastr.error("Poor Newtworkkk Connection.");
					}
					})
				},
				error: function () {
					toastr.error("Poor Newtwork Connection,Try Again.");
				},
				onClose: function () {
					$(".paystackspin").css({
						display: "none"
					});
				}
			});
			handler.openIframe();
		}
	});
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>