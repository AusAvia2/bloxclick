<?php config(['site.no_ads' => true]) ?>

<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://hcaptcha.com/1/api.js" async defer></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-1-3 push-1-3">
	<div class="card">
		<div class="top green">
			Login
		</div>
		<div class="content">
			<form method="POST" action="<?php echo e(route('login')); ?>">
				<?php echo csrf_field(); ?>
				<input id="username" type="username" name="username" value="<?php echo e(old('username')); ?>" placeholder="Username" required autofocus>
				<div style="height: 5px;"></div>
				<input style="display:block;" id="password" type="password" name="password" autocomplete="password" placeholder="Password" required>
				<a href="/password/forgot" style="font-size:15px;">Forgot password?</a>
				<div style="padding-top:5px;"></div>
				<div class="h-captcha" data-sitekey="<?php echo e(config('site.captcha.hcaptcha.key')); ?>"></div>
				<div style="padding-top:5px;"></div>
				<button type="submit" class="green">
					Login
				</button>
			</form>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/auth/login.blade.php ENDPATH**/ ?>