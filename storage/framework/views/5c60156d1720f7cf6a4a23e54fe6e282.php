<?php config(['site.no_ads' => true]) ?>

<?php $__env->startSection('title', 'Forgot Password'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-1-3 push-1-3">
	<div class="card">
		<div class="top red">
			Forgot Password
		</div>
		<div class="content" style="text-align:center;">
			<form method="POST" action="<?php echo e(route('forgotPassword')); ?>">
				<?php echo csrf_field(); ?>
				<input type="email" name="email" placeholder="Email" required autofocus style="width:100%;box-sizing:border-box;">
				<?php if($errors->has('email')): ?>
					<span class="invalid-feedback" style="display:block;">
						<strong><?php echo e($errors->first('email')); ?></strong>
					</span>
				<?php endif; ?>
				<div style="height: 5px;"></div>
				<button type="submit" class="red">
					Reset Password
				</button>
			</form>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/auth/resetpass.blade.php ENDPATH**/ ?>