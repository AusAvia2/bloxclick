<?php $__env->startSection('title', 'Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-10-12 push-1-12" style="margin-bottom:5px;">
    Admin points: <?php echo e(number_format(auth()->user()->admin_points)); ?>

</div>
<div class="col-10-12 push-1-12">
    <admin-panel id="adminpanel-v"></admin-panel>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/admin/index.blade.php ENDPATH**/ ?>