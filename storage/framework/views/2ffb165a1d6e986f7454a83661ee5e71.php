<?php $__env->startSection('title', 'Settings'); ?>

<?php $__env->startSection('content'); ?>
<?php if(request()->get('email_sent') && session('denied_email')): ?>
<div class="col-10-12 push-1-12">
    <div class="alert error">
        You need to verify your email!
        <a href="<?php echo e(route('sendEmail')); ?>" class="button red forum-create-button" style="margin-right:15px;margin-left:10px;">Send Email</a>
    </div>
</div>
<?php endif; ?>
<div class="col-10-12 push-1-12">
    <settings id="settings-v"></settings>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/user/settings.blade.php ENDPATH**/ ?>