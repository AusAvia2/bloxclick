<?php $__env->startSection('title', 'New Trade'); ?>

<?php $__env->startSection('content'); ?>
<div class="new-theme">
    <p class="large-text bold" style="text-align: left; margin: 0;">Trade with <?php echo e($user->username); ?></p>
    <trade id="trade-v" receiver="<?php echo e($user->id); ?>"  sender="<?php echo e(Auth::id()); ?>"></trade>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/user/trade/newtrade.blade.php ENDPATH**/ ?>