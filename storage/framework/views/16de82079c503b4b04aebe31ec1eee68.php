<?php $__env->startSection('title', 'Edit Set'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-10-12 push-1-12">
    <edit-set
        id="editset-v"
        set-name="<?php echo e($set->name); ?>"
        set-genre="<?php echo e($set->setGenre?->name); ?>"
        set-description="<?php echo e($set->description); ?>"
        set-thumbnail="<?php echo e(config('site.storage.domain') . $set->thumbnail); ?>"
        :set-id="<?php echo e($set->id); ?>"
        init-server-type="<?php echo e($set->is_dedicated ? 'dedicated' : 'nh'); ?>"
        who-can-join="<?php echo e($set->friends_only ? 'friends' : 'everyone'); ?>"
        :max-players="<?php echo e($set->max_players ?? 12); ?>"
        crash-report="<?php echo e($set->crash_report); ?>"
        can-use-dedicated="
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('updateDedicated', $set)): ?>
        1
        <?php endif; ?>
        "
    ></edit-set>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/sets/edit.blade.php ENDPATH**/ ?>