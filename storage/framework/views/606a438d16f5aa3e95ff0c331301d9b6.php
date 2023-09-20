<?php $__env->startSection('title', 'Trades'); ?>

<?php $__env->startSection('content'); ?>
<view-trades id="viewtrades-v" user="<?php echo e(auth()->id()); ?>"></view-trades>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/user/trade/trades.blade.php ENDPATH**/ ?>