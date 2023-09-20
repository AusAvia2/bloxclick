<?php $__env->startSection('title', $set->name); ?>

<?php $__env->startSection('content'); ?>
<div class="col-10-12 push-1-12">
    <set-page
        id="setpage-v"
        :set-id="<?php echo e($set->id); ?>"
        set-name="<?php echo e($set->name); ?>"
        set-thumbnail="<?php echo e(config('site.storage.domain') . $set->thumbnail); ?>"

        <?php if(!$set->is_dedicated): ?>
        set-ip="<?php echo e(($server && !\Carbon\Carbon::parse($server->last_post)->addMinutes(6)->isPast()) ? strrev(base64_encode($server->ip_address ?? "")) : ""); ?>"
        set-port="<?php echo e($server->port ?? ""); ?>"
        set-playable="<?php echo e($server && !\Carbon\Carbon::parse($server->last_post)->addMinutes(6)->isPast()); ?>"
        <?php else: ?>
        set-ip="<?php echo e(strrev(base64_encode($master_server->ip ?? ""))); ?>"
        set-port="42480"
        set-playable="1"
        <?php endif; ?>

        on-load-favorites="<?php echo e($favorite_count ?? 0); ?>"
        :on-load-favorited="<?php echo e($has_favorited ? "true" : "false"); ?>"

        <?php if(auth()->guard()->check()): ?>
            :on-load-rated="<?php echo e($rating !== null ? "true" : "false"); ?>"
            on-load-rating="<?php echo e($rating?->is_liked ?? 0); ?>"
        <?php endif; ?>
        on-load-down-ratings="<?php echo e($down_ratings ?? 0); ?>"
        on-load-up-ratings="<?php echo e($up_ratings ?? 0); ?>"
    ></set-page>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/sets/set.blade.php ENDPATH**/ ?>