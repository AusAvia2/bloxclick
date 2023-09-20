<?php $__env->startSection('title', $thread['title']); ?>

<?php $__env->startSection('content'); ?>
<?php if($thread->deleted): ?>
<div class="col-10-12 push-1-12">
    <div class="alert error">
        This thread has been deleted and can only be viewed by administrators.
    </div>
</div>
<?php endif; ?>
<?php if($thread->hidden): ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage forum')): ?>
<div class="col-10-12 push-1-12">
    <div class="alert warning">
        This thread has been hidden and can only be viewed by administrators or the creator of the thread.
    </div>
</div>
<?php endif; ?>
<?php endif; ?>
<?php if(auth()->guard()->check()): ?>
<div class="col-10-12 push-1-12">
    <?php echo $__env->make('includes.forumbar', ['bookmarks' => $bookmarks], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php endif; ?>
<div class="col-10-12 push-1-12">
    <div class="forum-bar mb2 ellipsis">
        <div class="inline mt2">
        <a href="/forum/">Forum</a>
        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        <a href="/forum/<?php echo e($thread->board->id); ?>/">
            <?php echo e($thread->board->name); ?>

        </a>
        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        <a href="/forum/thread/<?php echo e($thread->id); ?>/">
            <span class="very-bold">
                <?php echo e($thread->title); ?>

            </span>
        </a>
        </div>
        <?php if(auth()->guard()->check()): ?>
        <div class="push-right">
            <a class="button small <?php echo e($thread->board->category->color); ?>" href="/forum/<?php echo e($thread->board->id); ?>/create/">CREATE</a>
        </div>
        <?php endif; ?>
    </div>
    <div class="card">
        <div class="top <?php echo e($thread->board->category->color); ?>">
            <?php if($thread->pinned): ?>
            <span class="thread-label <?php echo e($thread->board->category->color); ?>">Pinned</span>
            <?php endif; ?>
            <?php if($thread->locked): ?>
            <span class="thread-label <?php echo e($thread->board->category->color); ?>">Locked</span>
            <?php endif; ?>
            <?php echo e($thread->title); ?>

            <?php if(auth()->guard()->check()): ?>
            <div style="float:right">
            <form method="POST" action="<?php echo e(route('bookmark', $thread->id)); ?>" id="bookmark-submit">
                <?php echo csrf_field(); ?>
                <label class="hover-cursor" for="bookmarkSubmit"><i class="<?php echo e(($bookmarked) ? 'fas' : 'far'); ?> fa-bookmark"></i></label>
                <input type="submit" id="bookmarkSubmit" style="display:none;">
            </form>
            </div>
            <?php endif; ?>
        </div>
        <div class="content">
            <?php if($pages['current'] <= 1): ?>
            <div class="thread-row" style="position:relative;">
                <div class="overflow-auto">
                    <div class="col-3-12 center-text ellipsis">
                        <a href="/user/<?php echo e($thread->author->id); ?>/">
                            <img src="<?php echo e($thread->author->avatar_thumbnail); ?>" style="width:150px;">
                        </a>
                        <br>
                        <?php if(!is_null($thread->author->primaryClan?->tag)): ?>
                        <a href="/clan/<?php echo e($thread->author->primary_clan_id); ?>/" class="light-gray-text">
                            <?php echo e('['.$thread->author->primaryClan->tag.'] '); ?>

                        </a>
                        <?php endif; ?>
                        <a href="/user/<?php echo e($thread->author->id); ?>/">
                            <?php echo e($thread->author->username); ?>

                        </a>
                        <br>
                        <span class="light-gray-text">
                            Joined <?php echo e(Carbon\Carbon::parse($thread->author->created_at)->format('d/m/Y')); ?>

                        </span>
                        <br>
                        <span class="light-gray-text">
                            Posts <?php echo e(number_format($thread->author->post_count)); ?>

                        </span>
                        <?php if($thread->author->power > \App\Constants\AdminPower::FORUM_TAG_ADMIN): ?>
                        <div class="red-text"><i class="fas fa-gavel"></i>Administrator</div>
                        <?php elseif($thread->author->power > \App\Constants\AdminPower::FORUM_TAG_MOD): ?>
                        <div style="color:#0f0fa2;"><i class="fas fa-gavel"></i>Moderator</div>
                        <?php endif; ?>
                    </div>
                    <div class="col-9-12">
                        <div class="weight600 light-gray-text text-right mobile-center-text" style="text-align:right;">
                            <?php echo e(\Carbon\Carbon::parse($thread->created_at)->format('h:i A d/m/Y')); ?>

                        </div>
                        <div class="p">
                            <?php echo nl2br(Helper::bbcode_to_html(e($thread->body), e($thread->author->power), e($thread->board->category->color))); ?>

                        </div>
                    </div>
                </div>
                <?php if(auth()->guard()->check()): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage forum')): ?>
                <div class="col-1-2 weight600 forum-options admin-forum-options" data-post-id="<?php echo e($thread->id); ?>">
                    <form method="POST" action="/forum/thread/<?php echo e($thread->id); ?>/scrub">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="toggle" value="<?php echo e((int)!$thread->scrubbed); ?>">
                        <button class="report" type="submit"><?php if($thread->scrubbed): ?>UNSCRUB <?php else: ?> SCRUB <?php endif; ?></button>
                    </form>
                    <form method="POST"  action="/forum/thread/<?php echo e($thread->id); ?>/delete">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="toggle" value="<?php echo e((int)!$thread->deleted); ?>">
                        <button class="report" type="submit"><?php if($thread->deleted): ?>UNDELETE <?php else: ?> DELETE <?php endif; ?></button>
                    </form>
                    <a class="report" href="/user/<?php echo e($thread->author->id); ?>/ban/forumthread/<?php echo e($thread->id); ?>">BAN</a>
                    <button class="report" id="move-thread">MOVE</button>
                    <form method="POST" action="/forum/thread/<?php echo e($thread->id); ?>/lock">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="toggle" value="<?php echo e((int)!$thread->locked); ?>">
                        <button class="forum-reply" type="submit"><?php if($thread->locked): ?>UNLOCK <?php else: ?> LOCK <?php endif; ?></button>
                    </form>
                    <form method="POST" action="/forum/thread/<?php echo e($thread->id); ?>/pin">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="toggle" value="<?php echo e((int)!$thread->pinned); ?>">
                        <button class="forum-quote" type="submit"><?php if($thread->pinned): ?>UNPIN <?php else: ?> PIN <?php endif; ?></button>
                    </form>
                    <form method="POST" action="/forum/thread/<?php echo e($thread->id); ?>/hide">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="toggle" value="<?php echo e((int)!$thread->hidden); ?>">
                        <button class="forum-quote" type="submit"><?php if($thread->hidden): ?>UNHIDE <?php else: ?> HIDE <?php endif; ?></button>
                    </form>
                </div>
                <?php endif; ?>
                <div
                    class="<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage forum')): ?> col-1-2 <?php else: ?> col-1-1 <?php endif; ?> weight600 dark-grey-text forum-options"
                    style="text-align:right;"
                    data-post-id="<?php echo e($thread->id); ?>"
                >
                    <a class="forum-reply mr4" href="/forum/reply/<?php echo e($thread->id); ?>/">REPLY</a>
                    <a class="report" href="/report/forumthread/<?php echo e($thread->id); ?>/">REPORT</a>
                </div>
                <?php endif; ?>
            </div>
            <hr>
            <?php endif; ?>
            <?php if(count($replies) > 0): ?>
                <?php $__currentLoopData = $replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="thread-row" style="position:relative;" id="post<?php echo e($reply->id); ?>">
                    <div class="overflow-auto">
                        <div class="col-3-12 center-text ellipsis">
                            <a href="/user/<?php echo e($reply->author->id); ?>/">
                                <img src="<?php echo e($reply->author->avatar_thumbnail); ?>" style="width:150px;">
                            </a>
                            <br>
                            <?php if(!is_null($reply->author->primaryClan?->tag)): ?>
                            <a href="/clan/<?php echo e($reply->author->primary_clan_id); ?>/" class="light-gray-text">
                                <?php echo e('['.$reply->author->primaryClan->tag.'] '); ?>

                            </a>
                            <?php endif; ?>
                            <a href="/user/<?php echo e($reply->author->id); ?>/">
                                <?php echo e($reply->author->username); ?>

                            </a>
                            <br>
                            <span class="light-gray-text">
                                Joined <?php echo e(Carbon\Carbon::parse($reply->author->created_at)->format('d/m/Y')); ?>

                            </span>
                            <br>
                            <span class="light-gray-text">
                                Posts <?php echo e(number_format($reply->author->post_count)); ?>

                            </span>
                            <?php if($reply->author->power > \App\Constants\AdminPower::FORUM_TAG_ADMIN): ?>
                            <div class="red-text"><i class="fas fa-gavel"></i>Administrator</div>
                            <?php elseif($reply->author->power > \App\Constants\AdminPower::FORUM_TAG_MOD): ?>
                            <div style='color:#0f0fa2;'><i class="fas fa-gavel"></i>Moderator</div>
                            <?php endif; ?>
                        </div>
                        <div class="col-9-12">
                            <div class="weight600 light-gray-text mobile-center-text" style="text-align:right;">
                                <?php echo e(Carbon\Carbon::parse($reply->created_at)->format('h:i A d/m/Y')); ?>

                            </div>
                            <div class="p">
                                <?php if($reply->quote_id && count($reply->quotes) > 0): ?>
                                <?php $__currentLoopData = $reply->quotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <blockquote class="<?php echo e($thread->board->category->color); ?>">
                                        <em>Quote from
                                            <a href="https://www.brick-hill.com/user/<?php echo e($quote->author->id); ?>">
                                                <?php echo e($quote->author->username); ?>

                                            </a>, <?php echo e(Carbon\Carbon::parse($quote->created_at)->format('h:i A d/m/Y')); ?>

                                        </em>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = array_reverse($reply->quotes); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <br>
                                        <?php echo nl2br(Helper::bbcode_to_html(e($quote->body), e($quote->author->power), e($thread->board->category->color))); ?>

                                    </blockquote>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <?php echo nl2br(Helper::bbcode_to_html(e($reply->body), e($reply->author->power), e($thread->board->category->color))); ?>

                            </div>
                        </div>
                    </div>
                    <?php if(auth()->guard()->check()): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage forum')): ?>
                    <div class="col-1-2 weight600 forum-options admin-forum-options" data-post-id="<?php echo e($reply->id); ?>">
                        <form method="POST" action="/forum/post/<?php echo e($reply->id); ?>/scrub">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="toggle" value="<?php echo e((int)!$reply->scrubbed); ?>">
                            <button class="report" type="submit" name="type" value="scrub"><?php if($reply->scrubbed): ?>UNSCRUB <?php else: ?> SCRUB <?php endif; ?></button>
                        </form>
                        <a class="report" href="/user/<?php echo e($reply->author->id); ?>/ban/forumpost/<?php echo e($reply->id); ?>">BAN</a>
                    </div>
                    <?php endif; ?>
                    <div class="<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage forum')): ?> col-1-2 <?php else: ?> col-1-1 <?php endif; ?> weight600 dark-grey-text forum-options" style="text-align:right;" data-post-id="<?php echo e($reply['id']); ?>">
                        <a class="forum-quote mr4" href="/forum/reply/<?php echo e($thread->id); ?>/quote/<?php echo e($reply->id); ?>/">QUOTE</a>
                        <a class="forum-reply mr4" href="/forum/reply/<?php echo e($thread->id); ?>/">REPLY</a>
                        <a class="report" href="/report/forumpost/<?php echo e($reply->id); ?>/">REPORT</a>
                    </div>
                    <?php endif; ?>
                </div>
                <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="center-text">
            <?php if(isset($pages['pages'])): ?>
                <div class="pages mb2">
                <?php $__currentLoopData = $pages['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pageNum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="page <?php echo e(($pages['current'] == $pageNum) ? 'active' : ''); ?>" href="/forum/thread/<?php echo e($thread->id); ?>/<?php echo e($pageNum); ?>"><?php echo e($pageNum); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <?php if(auth()->guard()->check()): ?>
            <?php if($thread->locked): ?>
            <a class="button no-click">REPLY</a>
            <?php else: ?>
            <a class="button <?php echo e($thread->board->category->color); ?>" href="/forum/reply/<?php echo e($thread->id); ?>/">REPLY</a>
            <?php endif; ?>
            <?php endif; ?>
        </div>
        <?php if($pages['current'] <= 1): ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage forum')): ?>
        <dropdown id="dropdown-v" class="dropdown" activator="move-thread">
            <ul>
                <form method="POST" action="/forum/thread/<?php echo e($thread->id); ?>/move" style="width:100%;padding:0;" id="move-form">
                    <li style="background-color:#fff;border-radius:5px;">
                        <?php echo csrf_field(); ?>
                        <select name="location">
                            <?php $__currentLoopData = $boards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $board): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($board->id); ?>" <?php if($board->id == $thread->board->id): ?>selected <?php endif; ?>><?php echo e($board->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </li>
                    <li style="background-color:#fff;border-radius:5px;">
                        <a>Warn? <input style="display: inline-block;" type="checkbox" name="warn"></a>
                    </li>
                </form>
                <li style="background-color:#fff;border-radius:5px;">
                    <a onclick="$('#move-form').submit();">MOVE</a>
                </li>
            </ul>
        </dropdown>
        <?php endif; ?>
        <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/forum/thread.blade.php ENDPATH**/ ?>