<?php $__env->startSection('title', 'Staff'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-10-12 push-1-12 new-theme">
    <div>
        <div class="content">
            <div class="header">Staff</div>
            <div class="col-1-1" style="padding-right:0;">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="/user/<?php echo e($user['id']); ?>" class="mb-10">
                        <div class="search-user-card flex">
                            <img src="<?php echo e($user->avatar_thumbnail); ?>">
                            <div class="width-100 data ellipsis" style="margin-left:10px;height:100%">
                                <div>
                                    <b><?php echo e($user['username']); ?></b>
                                    <span style="float:right;" class="status-dot <?php if($user->is_online): ?>online <?php endif; ?>"></span>
                                </div>
                                <p class="data mt-2 description"><?php echo nl2br(e($user['description'])); ?></p>
                            </div>
                        </div>
                        <div class="divider mb-20"></div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="pages">
                <?php if(isset($pages['pages'])): ?>
                    <?php $__currentLoopData = $pages['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pageNum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="page <?php echo e(($pages['current'] == $pageNum) ? 'active' : ''); ?>" href="/staff/<?php echo e($pageNum); ?>"><?php echo e($pageNum); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/staff.blade.php ENDPATH**/ ?>