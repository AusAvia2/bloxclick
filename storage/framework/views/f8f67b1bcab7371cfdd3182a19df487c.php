<?php $__env->startSection('title', $message->title); ?>

<?php $__env->startSection('content'); ?>
<div class="col-10-12 push-1-12">
    <div class="card">
        <div class="top blue">
            <?php echo e($message->title); ?>

        </div>
        <div class="content" style="position:relative;">
            <div class="user-info" style="width:250px;overflow:hidden;display:inline-block;float:left;">
                <a href="/user/<?php echo e($message->sender->id); ?>/">
                    <img src="<?php echo e($message->sender->avatar_thumbnail); ?>" style="width:200px;display:block;">
                    <span style="white-space:nowrap;"><?php echo e($message->sender->username); ?></span>
                </a>
            </div>
            <div style="padding-left:250px;padding-bottom:10px;">
                <?php if($message->author_id == config('site.main_account_id') && $message->message == '[bhstartmsg]'): ?>
                Hello there, <?php echo e(Auth::user()->username); ?>!
                <br><br>
                Welcome to Brick Hill, we're glad to have you here. We hope you have a wonderful time, but to make sure you can make the most here, we ask that you brush up on a few of our guidelines.
                <br><br>
                <a style="color:#444" href="/rules">Here</a> are some <a style="color:#444" href="/forum/thread/1/">basic rules</a> to get you settled in with the crowd! If you're unsure about anything then you can always take a look at our <a style="color:#444" href="/terms">Terms of Service</a>, which will always be situated at the footer of each page!
                <br><br>
                Thanks for stopping by,<br>
                Brick Hill
                <?php else: ?>
                <?php echo nl2br(e($message->message)); ?>

                <?php endif; ?>
            </div>
            <div class="admin-forum-options" style="position:absolute;bottom:0;right:2px;padding-bottom:5px;">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('scrub users')): ?>
                <form method="POST" action="/message/<?php echo e($message->id); ?>/scrub">
                    <?php echo csrf_field(); ?>
                    <button type="submit" name="type" value="scrub">Scrub</button>
                </form>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ban')): ?>
                <a href="/user/<?php echo e($message->sender->id); ?>}/ban/message/<?php echo e($message->id); ?>" class="dark-gray-text cap-text">Ban</a>
                <?php endif; ?>
                <a href="/report/message/<?php echo e($message->id); ?>" class="dark-gray-text cap-text">Report</a>
            </div>
        </div>
    </div>
    <?php if(auth()->id() == $message['recipient_id']): ?>
    <div class="card reply-card" style="display:none;">
        <div class="content" style="padding:15px;">
            <form method="POST" action="<?php echo e(route('message')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="msgId" value="<?php echo e($message->id); ?>">
                <input type="hidden" name="title" value="<?php echo e($message->title); ?>">
                <textarea name="reply" style="width:100%;height:250px;box-sizing:border-box;"><?php echo e(old('reply')); ?></textarea>
                <button class="forum-button blue" style="margin: 10px auto 10px auto;display:block;" type="submit">SEND</button>
            </form>
        </div>
    </div>
    <div class="center-text">
        <a class="button blue inline" style="margin: 10px auto 10px auto;">REPLY</a>
    </div>
    <script>
        $('.button.blue.inline').on('click touchstart', () => {
            $('.card.reply-card').css('display', 'block');
            $('.button.blue.inline').remove();
        })
    </script>
    <?php endif; ?>
    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/user/messages/message.blade.php ENDPATH**/ ?>