<?php $__env->startSection('title', 'Create Reply'); ?>

<?php $__env->startSection('content'); ?>
<?php if(auth()->guard()->check()): ?>
<div class="col-10-12 push-1-12">
    <?php echo $__env->make('includes.forumbar', ['bookmarks' => $bookmarks], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php endif; ?>
<div class="col-10-12 push-1-12">
    <div class="forum-bar weight600" style="padding:10px 5px 10px 0;">
        <a href="/forum/">Forum</a>
        <i class="fa fa-angle-double-right" style="font-size:1rem;" aria-hidden="true"></i>
        <a href="/forum/<?php echo e($board->id); ?>/"><?php echo e($board->name); ?></a>
        <i class="fa fa-angle-double-right" style="font-size:1rem;" aria-hidden="true"></i>
        <a href="/forum/thread/<?php echo e($thread->id); ?>/">
            <span class="weight700 very-bold">
                <?php echo e($thread->title); ?>

            </span>
        </a>
    </div>
    <div class="card">
        <div class="top <?php echo e($board->category->color); ?>">
            Reply to <?php echo e($thread->title); ?>

        </div>

        <div class="content">
            <form method="POST" id="post-form">
                <?php echo csrf_field(); ?>
                <textarea id="body" name="body" placeholder="Body (max 1,000 characters)" style="width:100%;min-height:200px;font-size:16px;box-sizing:border-box;margin-top:10px;" required><?php echo e(old('body')); ?></textarea>
                <div style="text-align:center;">
                    <button type="submit" class="button small-text <?php echo e($board->category->color); ?>">
                        Create Reply
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/forum/create/reply.blade.php ENDPATH**/ ?>