<?php $__env->startSection('title', 'Sets'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-10-12 push-1-12">
    <div class="large-text mb1">
        My Sets
        <?php if(count($sets) > 0): ?>
        <a class="button blue push-right small-text" href="<?php echo e(route('createSet')); ?>">CREATE SET</a>
        <?php endif; ?>
    </div>
    <?php if(count($sets) == 0): ?>
    <div class="center-text">
        <div class="medium-text mb2">You don't have any sets</div>
        <a class="button blue" href="<?php echo e(route('createSet')); ?>">CREATE SET</a>
    </div>
    <?php else: ?>
    <?php $__currentLoopData = $sets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $set): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-1-4 mobile-col-1-3 set">
        <div class="card ellipsis">
            <div class="thumbnail no-padding">
                <a href="/play/<?php echo e($set->id); ?>/">
                    <img class="round-top" src="<?php echo e(config('site.storage.domain')); ?><?php echo e($set->thumbnail); ?>">
                </a>
            </div>
            <div class="content">
                <div class="name game-name ellipsis">
                    <a href="/play/<?php echo e($set->id); ?>/"><?php echo e($set->name); ?></a>
                </div>
                <div class="creator ellipsis">
                    By <a href="/user/<?php echo e($set->creator_id); ?>/"><?php echo e(auth()->user()->username); ?></a>
                </div>
            </div>
            <div class="footer">
                <div class="playing"><?php echo e($set->playing); ?> Playing</div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/user/sets.blade.php ENDPATH**/ ?>