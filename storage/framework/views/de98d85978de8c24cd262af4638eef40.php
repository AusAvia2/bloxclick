<?php config(['site.no_ads' => true]) ?>

<?php $__env->startSection('title', 'Page Not Found'); ?>

<?php $__env->startSection('content'); ?>
<div style="text-align:center;padding-top:50px;">
	<span style="font-weight:600;font-size:3rem;display:block;">Error 404: Page Not Found</span>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/errors/404.blade.php ENDPATH**/ ?>