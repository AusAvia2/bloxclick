<?php $__env->startSection('title', 'Create Message'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-10-12 push-1-12">
    <div class="card">
        <div class="top blue">
            Send Message to <?php echo e($user['username']); ?>

        </div>
        <div class="content" style="padding:15px;">
            <form method="POST" action="<?php echo e(route('message')); ?>">
                <?php echo csrf_field(); ?>
                <input name="title" placeholder="Title" style="width:100%;margin-bottom:10px;box-sizing:border-box;">
                <input type="hidden" name="recipient" value="<?php echo e($user->id); ?>">
                <textarea name="reply" style="width:100%;height:250px;box-sizing:border-box;" placeholder="Hey <?php echo e($user->username); ?>"><?php echo e(old('reply')); ?></textarea>
                <button class="forum-button blue" style="margin: 10px auto 10px auto;display:block;" type="submit">SEND</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/user/messages/newmessage.blade.php ENDPATH**/ ?>