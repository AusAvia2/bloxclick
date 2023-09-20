<?php $__env->startSection('title', 'Edit Item'); ?>

<?php $__env->startSection('content'); ?>
<edit-item 
    id="edititem-v" 
    init-name="<?php echo e($item->name); ?>" 
    init-description="<?php echo e($item->description); ?>"
    init-bucks="<?php echo e($item->bucks); ?>"
    init-bits="<?php echo e($item->bits); ?>"
    init-offsale="<?php echo e(($item->offsale || !$item->is_approved) ? "true" : "false"); ?>"
></edit-item>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/shop/edit.blade.php ENDPATH**/ ?>