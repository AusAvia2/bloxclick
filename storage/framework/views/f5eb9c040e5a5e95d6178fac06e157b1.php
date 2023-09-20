<?php $__env->startSection('title', 'Forum'); ?>

<?php $__env->startSection('content'); ?>
<?php if(auth()->guard()->check()): ?>
    <?php echo $__env->make('includes.forumbar', ['bookmarks' => $bookmarks], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<div class="col-8-12">
    <?php $__currentLoopData = $boards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card">
        <div class="top <?php echo e($category[0]->category->color); ?>">
            <div class="col-7-12"><?php echo e($category[0]->category->title); ?></div>
            <div class="no-mobile overflow-auto topic text-center">
                <div class="col-3-12 stat">Threads</div>
                <div class="col-3-12 stat">Replies</div>
                <div class="col-6-12"></div>
            </div>
        </div>
        <div class="content">
        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $board): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="board-info mb1">
                <div class="col-7-12 board">
                    <div><a class="label dark" href="/forum/<?php echo e($board->id); ?>"><?php echo e($board->name); ?></a></div>
                    <span class="label small"><?php echo e($board->description); ?></span>
                </div>
                <div class="no-mobile overflow-auto board ellipsis" style="overflow:hidden;">
                    <div class="col-3-12 stat">
                        <span class="title"><?php echo e($board->thread_count_cached); ?></span>
                    </div>
                    <div class="col-3-12 stat">
                        <span class="title"><?php echo e($board->post_count_cached); ?></span>
                    </div>
                    <div class="col-6-12 text-right ellipsis pt2" style="max-width:180px;">
                        <a href="/forum/thread/<?php echo e($board->latestThread?->id); ?>/" class="label dark"><?php echo e($board->latestThread?->title); ?></a><br>
                        <span class="label small"><?php echo e(Helper::time_elapsed_string($board->latestThread?->updated_at)); ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="col-4-12">
    <div class="card">
        <div class="top">
            Recent Topics
        </div>
        <div class="content">
            <?php $__currentLoopData = $recent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="thread">
                <div class="col-10-12 ellipsis">
                    <div class="ellipsis mb1">
                        <a class="label dark" href="/forum/thread/<?php echo e($thread->id); ?>/"><?php echo e($thread->title); ?></a>
                    </div>
                    <div class="label small ellipsis">
                        by <a href="/user/<?php echo e($thread->author->id); ?>/" class="dark-gray-text"><?php echo e($thread->author->username); ?></a> in <a class="dark-gray-text" href="/forum/<?php echo e($thread->board->id); ?>/"><?php echo e($thread->board->name); ?></a>
                    </div>
                </div>
                <div class="col-2-12">
                    <div class="forum-tag"><?php echo e($thread->posts_count); ?></div>
                </div>
            </div>
            <?php if(!$loop->last): ?>
            <hr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="card">
        <div class="top">
            Popular Topics
        </div>
        <div class="content">
            <?php $__currentLoopData = $popular; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="thread">
                    <div class="col-10-12 ellipsis">
                        <div class="ellipsis mb1">
                        <a class="label dark" href="/forum/thread/<?php echo e($thread->id); ?>/"><?php echo e($thread->title); ?></a>
                        </div>
                        <div class="label small ellipsis">
                        by <a href="/user/<?php echo e($thread->author->id); ?>/" class="dark-gray-text"><?php echo e($thread->author->username); ?></a> in <a class="dark-gray-text" href="/forum/<?php echo e($thread->board->id); ?>/"><?php echo e($thread->board->name); ?></a>
                        </div>
                    </div>
                    <div class="col-2-12">
                        <div class="forum-tag"><?php echo e($thread->posts_count); ?></div>
                    </div>
                </div>
                <?php if(!$loop->last): ?>
                <hr>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/forum/forum.blade.php ENDPATH**/ ?>