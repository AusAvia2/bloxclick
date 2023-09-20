<?php $__env->startSection('title', 'Awards'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-10-12 push-1-12">
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card">
        <div class="top <?php echo e($colors[$name]); ?>">
            <?php echo e($name); ?>

        </div>
        <div class="content">
            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $award): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="award-card">
                <img src="<?php echo e(asset("images/awards/" . $award['id'] . ".png")); ?>">
                <div class="data">
                    <div class="very-bold"><?php echo e($award['name']); ?></div>
                    <div style="padding:1px;"></div>
                    <span><?php echo e($award['description']); ?></span>
                </div>
            </div>
            <?php if(!$loop->last): ?>
            <hr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/awards.blade.php ENDPATH**/ ?>