<?php $__env->startSection('title', $board->name); ?>

<?php $__env->startSection('content'); ?>
<?php if(auth()->guard()->check()): ?>
<div class="col-10-12 push-1-12">
    <?php echo $__env->make('includes.forumbar', ['bookmarks' => $bookmarks], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php endif; ?>
<div class="col-10-12 push-1-12">
    
    <?php if(auth()->check() && ($board->power ?? INF) <= (auth()->user()->power ?? 0)): ?>
    <div class="push-right mobile-col-1-1 pr0">
        <a class="button small <?php echo e($board->category->color); ?>" href="/forum/<?php echo e($board->id); ?>/create/">CREATE</a>
    </div>
    <?php endif; ?>
    <div class="forum-bar weight600" style="padding:10px 5px 10px 0;">
        <a href="/forum/">Forum</a> <i class="fa fa-angle-double-right" style="font-size:1rem;" aria-hidden="true"></i> <a href="/forum/<?php echo e($board->id); ?>/"><?php echo e($board->name); ?></a>
    </div>
    <div class="card">
        <div class="top <?php echo e($board->category->color); ?>">
            <div class="col-7-12"><?php echo e($board->name); ?></div>
            <div class="no-mobile overflow-auto topic text-center">
                <div class="col-3-12 stat">Replies</div>
                <div class="col-3-12 stat">Views</div>
                <div class="col-5-12"></div>
            </div>
        </div>
        <div class="content" style="padding: 0px">
            <?php $__currentLoopData = $threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="hover-card m0 thread-card <?php echo e(($thread->viewed && Auth::check()) ? 'viewed' : ''); ?>">
                <div class="col-7-12 topic ellipsis">
                    <?php if($thread->pinned): ?>
                    <span class="thread-label <?php echo e($board->category->color); ?>">Pinned</span>
                    <?php endif; ?>
                    <?php if($thread->locked): ?>
                    <span class="thread-label <?php echo e($board->category->color); ?>">Locked</span>
                    <?php endif; ?>
                    <?php if($thread->deleted): ?>
                    <span class="thread-label red">Deleted</span>
                    <?php endif; ?>
                    <?php if($thread->hidden): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage forum')): ?>
                    <span class="thread-label red">Hidden</span>
                    <?php endif; ?>
                    <?php endif; ?>
                    <a href="/forum/thread/<?php echo e($thread->id); ?>/"><span class="small-text label dark"><?php echo e($thread->title); ?></span></a><br>
                    <span class="label smaller-text">By <a href="/user/<?php echo e($thread->author->id); ?>/" class="darkest-gray-text"><?php echo e($thread->author->username); ?></a></span>
                </div>
                <div class="no-mobile overflow-auto topic">
                    <div class="col-3-12 pt2 stat center-text">
                        <span class="title"><?php echo e($thread->posts_count); ?></span>
                    </div>
                    <div class="col-3-12 pt2 stat center-text">
                        <span class="title"><?php echo e($thread->views); ?></span>
                    </div>
                    <div class="col-6-12 post ellipsis text-right">
                        <span class="label dark small-text"><?php echo e(Helper::time_elapsed_string($thread->updated_at)); ?></span><br>
                        <span class="label dark-gray-text smaller-text">By
                            <a class='darkest-gray-text' href="/user/<?php echo e($thread->latestPost->author->id ?? $thread->author->id); ?>/">
                                <?php echo e($thread->latestPost->author->username ?? $thread->author->username); ?>

                            </a>
                        </span>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if(count($threads) == 0): ?>
            <div style="text-align:center;padding:10px;">
                Nothing here :(
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="pages <?php echo e($board->category->color); ?>">
        <?php if(isset($pages['pages'])): ?>
            <?php $__currentLoopData = $pages['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pageNum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="page <?php echo e(($pages['current'] == $pageNum) ? 'active' : ''); ?>" href="/forum/<?php echo e($board->id); ?>/<?php echo e($pageNum); ?>"><?php echo e($pageNum); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php elseif(is_numeric($pages)): ?>
            <?php
            if(!request()->page)
                request()->request->set('page', 1);
            ?>
            <?php if(request()->page > 1): ?>
                <a class="page" href="/forum/<?php echo e($board->id); ?>/<?php echo e(request()->page - 1); ?>"><?php echo e(request()->page - 1); ?></a>
            <?php endif; ?>
            <a class="page active" href="/forum/<?php echo e($board->id); ?>/<?php echo e(request()->page); ?>"><?php echo e(request()->page); ?></a>
            <?php if(count($threads) == $pages): ?>
                <a class="page" href="/forum/<?php echo e($board->id); ?>/<?php echo e(request()->page + 1); ?>"><?php echo e(request()->page + 1); ?></a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/forum/board.blade.php ENDPATH**/ ?>