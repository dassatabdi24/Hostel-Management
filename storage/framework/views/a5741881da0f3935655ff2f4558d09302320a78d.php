<?php $__env->startSection('nav'); ?>
<?php echo $__env->make('inc.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('inc.msg-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-lg-3 col-md-3">
		<div class="my-4">
			<button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#message">Make new Complain</button>
		</div>
	</div>
	
	<div class="col-lg-9 order-lg-2">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a href="" data-target="#sent" data-toggle="tab" class="nav-link active">Sent Complains</a>
			</li>
			<li class="nav-item">
				<a href="" data-target="#recieved" data-toggle="tab" class="nav-link">Replies</a>
			</li>
		</ul>
		<div class="tab-content py-4">
			<div class="tab-pane active" id="sent">
				<table class="table table-striped">
					<tbody class="sent">
						<?php if(count($sentmsg)): ?>
						<?php $__currentLoopData = $sentmsg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class=" p-0 px-3">
								<input type="hidden" name="id" value = "<?php echo e($msg->id); ?>">
								<div class="row">
									<div class="col-1 p-0 text-center align-self-center">
										<a href="#" class="btn-sm btn text-danger sentdel"><i class="fas fa-trash"></i></a>
									</div>
									<div class="col p-2">
										<?php echo e($msg->message); ?>

										<span class="float-right font-weight-bold text-danger"><?php echo e(date('M j, h:ia ',strtotime($msg->created_at))); ?></span>
									</div>
								</div>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php else: ?>
						<tr class="holder">
							<td class="text-danger font-weight-bold">
								The complains you made will show up here.
							</td>
						</tr>
						<?php endif; ?>
						
					</tbody> 
				</table>
				<?php echo e($sentmsg->links()); ?>

			</div>
			<div class="tab-pane" id="recieved">
				<table class="table table-striped">
					<tbody class="recieve">
						<?php if(count($recmsg)): ?>
						<?php $__currentLoopData = $recmsg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="notify-parent p-0 px-3">
								<?php if($msg->stdview == 0): ?>
								<span class="badge badge-pill badge-danger notify-std">!</span>
								<?php endif; ?>
								<input type="hidden" name="id" value = "<?php echo e($msg->id); ?>">
								
								<div class="row">
									<div class="col-1 p-0 text-center align-self-center">
										<a href="#" class="btn-sm btn text-danger recdel"><i class="fas fa-trash"></i></a>
									</div>
									<div class="col p-2">
										<?php if($msg->stdview == 1): ?>
										<?php echo e($msg->message); ?>

										<?php else: ?>
										<?php echo e($msg->message); ?> <button  class="btn btn-sm btn-success ml-3 read">Mark as Read</button>
										<?php endif; ?>					
										<span class="float-right font-weight-bold text-danger"><?php echo e(date('M j, h:ia ',strtotime($msg->created_at))); ?></span>
									</div>
								</div>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php else: ?>
						<tr>
							<td class="text-danger font-weight-bold">
								Replies to your complains will show up here.
							</td>
						</tr>
						<?php endif; ?>
					</tbody> 
				</table>
				<?php echo e($recmsg->links()); ?>

			</div>
		</div>
	</div>
</div>
<script>
	$(function(){
		let token = "<?php echo e(Session::token()); ?>";
		
		$('#message-text').keydown(function(){
			let value =  $('#message-text').val();
			let remain = 140 - value.length;
			$('.count').html(remain);
		});
		
		
		$('#msg').submit(function(e){
			let msgval = $('#message-text').val();;
			e.preventDefault();
			$('#message').modal('toggle');
			let url = "<?php echo e(route('stdmsg.store')); ?>";
			
			if(msgval.length > 140){
				alert('Message too long');
				return false;
			}
			
			let data = $('#msg').serialize();
			$('#message-text').val('');
			
			$.ajax({
				method: 'POST',
				url:url,
				data:data,
				success: function(data){
					if($('.holder').length == 1){
						$('.holder').remove();
					}
					deleteNew(data);
				},
				error: function(){
					console.log('Error Occured');
				}
			});
		});
		
		$('.read').click(function(e){
			let readbtn = $(this);
			let alert = readbtn.parents('.row').siblings('span');
			let id = readbtn.parents('.row').siblings('input').val();
			let uri = "<?php echo e(route('stdmsg.read')); ?>";
			
			let dat = {
				id:id,
				_token: token,
			};
			
			$.ajax({
				method:'POST',
				url:uri,
				data:dat,
				success: function(data){
					readbtn.remove();
					alert.remove();
				},
				error:function(){
					alert('An error Ocurred');
				}
			});
		});
		
		$('.sentdel').click(function(e){
			e.preventDefault();
			
			let uri = "<?php echo e(route('stdmsg.sentdel')); ?>";
			let parents = $(this).parents('tr');
			let id = $(this).parents('.row').siblings('input').val();
			let dat = {
				id:id,
				_token: token,
			}
			
			$.ajax({
				method: 'POST',
				url:uri,
				data:dat,
				success: function(data){
					parents.remove();
					if($('.sent').children().length == 0){
						$('.sent').html("<tr><td class='text-danger font-weight-bold'>The complains you made will show up here.</td></tr>");
					}
				},
				error: function(){
					alert('An error Occurred');
				}
			});
		});
		
		$('.recdel').click(function(e){
			e.preventDefault();
			let parents = $(this).parents('tr');
			let id = $(this).parents('.row').siblings('input').val();
			let dat = {
				id:id,
				_token: token,
			}
			
			let uri = "<?php echo e(route('stdmsg.recdel')); ?>";
			$.ajax({
				method: 'POST',
				url:uri,
				data:dat,
				success: function(data){
					parents.remove();
					if($('.recieve').children().length == 0){
						$('.recieve').html("<tr><td class='text-danger font-weight-bold'>Replies to your complains will show up here.</td></tr>");
					}
				},
				error: function(){
					alert('An error Occurred');
				}
			});
		});
		
		function deleteNew(data){
			$('.sent').prepend("<tr><td class='p-0 px-3'><div class='row'><div class='col-1 p-0 text-center align-self-center'><a href='' class='btn-sm btn text-danger delnew'><i class='fas fa-trash'></i></a></div><div class='col p-2'>"+data.message+"<span class='float-right font-weight-bold text-success'>Just Now</span></div></div></td></tr>");
			
			$('.delnew').click(function(e){
				e.preventDefault();
				let uri = "<?php echo e(route('stdmsg.sentdel')); ?>";
				let parents = $(this).parents('tr');

				let dat = {
					id:data.id,
					_token: token,
				}
				
				$.ajax({
					method: 'POST',
					url:uri,
					data:dat,
					success: function(data){
						parents.remove();
						if($('.sent').children().length == 0){
							$('.sent').html("<tr><td class='text-danger font-weight-bold'>The complains you made will show up here.</td></tr>");
						}
					},
					error: function(){
						alert('An error Occurred');
					}
				});
			});
		}
		
	});
	
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>