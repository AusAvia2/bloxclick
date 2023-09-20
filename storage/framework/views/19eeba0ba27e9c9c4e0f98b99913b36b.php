<?php $__env->startSection('title', 'Membership'); ?>

<?php $__env->startSection('content'); ?>
<membership id="membership-v" :already-has-membership="<?php echo e(auth()->user()->membership()->exists() ? "true" : "false"); ?>"></membership>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/membership/membership.blade.php ENDPATH**/ ?>