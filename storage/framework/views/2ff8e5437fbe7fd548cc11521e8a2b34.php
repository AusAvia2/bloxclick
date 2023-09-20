<?php config(['site.no_ads' => true]) ?>

<?php $__env->startSection('title', 'Internal Server Error'); ?>

<?php $__env->startSection('content'); ?>
<div style="text-align:center;padding-top:50px;">
    <span style="font-weight:600;font-size:3rem;display:block;">Error 500: Internal Server Error</span>
    <span style="font-weight:500;font-size:2rem;display:block;padding-bottom:20px;">Looks like something went wrong :(</span>
    <span style="font-weight:500;font-size:1.2rem;">If this keeps happening email us at <a href="mailto:help@brick-hill.com" style="color:#444;">help@brick-hill.com</a></span>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/errors/500.blade.php ENDPATH**/ ?>