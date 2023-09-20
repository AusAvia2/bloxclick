<?php $__env->startSection('title', 'Friends'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-10-12 push-1-12">
    <div class="card">
        <div class="top blue">
            Friends
        </div>
        <div class="content text-center">
            <?php if(count($friends) == 0): ?>
            <span>You don't have any friend requests</span>
            <?php endif; ?>
            <ul class="friends-list">
                <?php $__currentLoopData = $friends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $friend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="col-1-5 mobile-col-1-1">
                    <div class="friend-card">
                        <a href="/user/<?php echo e($friend->fromUser->id); ?>/">
                            <img src="<?php echo e($friend->fromUser->avatar_thumbnail); ?>">
                            <div class="ellipsis"><?php echo e($friend->fromUser->username); ?></div>
                        </a>
                        <form method="POST" action="<?php echo e(route('friend')); ?>" class="accept">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="userId" value="<?php echo e($friend->fromUser->id); ?>">
                            <input type="hidden" name="type" value="accept">
                        </form>
                        <form method="POST" action="<?php echo e(route('friend')); ?>" class="decline">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="userId" value="<?php echo e($friend->fromUser->id); ?>">
                            <input type="hidden" name="type" value="decline">
                        </form>
                        <button class="button small green inline" style="left:10px;font-size:10px;" onclick="$('form.accept', $(this).parent()).submit()">ACCEPT</button>
                        <button class="button small red inline" style="right:10px;font-size:10px;" onclick="$('form.decline', $(this).parent()).submit()">DECLINE</button>
                    </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
    <div class="pages">
        <?php if(isset($page['pages'])): ?>
            <?php $__currentLoopData = $page['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pageNum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="page <?php if($page['current'] == $pageNum): ?> active <?php endif; ?>" href="/friends/<?php echo e($pageNum); ?>"><?php echo e($pageNum); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/user/friends.blade.php ENDPATH**/ ?>