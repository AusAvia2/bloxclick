<?php $__env->startSection('title', 'Outbox'); ?>

<?php $__env->startSection('content'); ?>

<div class="col-10-12 push-1-12">
    <div class="tabs">
        <a class="tab col-6-12" href="/messages">
            Inbox
        </a>
        <a class="tab active col-6-12" href="/messages/sent">
            Outbox
        </a>
        <div class="tab-holder" style="box-shadow:none;">
            <div class="tab-body active">
                <div class="content" style="padding:0px">
                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="/message/<?php echo e($message->id); ?>/">
                        <div class="hover-card thread-card m0">
                            <div class="col-7-12 topic">
                                <span class="small-text label dark"><?php echo e($message->title); ?></span><br>
                                <span class="label smaller-text" data-user-id="<?php echo e($message->receiver->id); ?>">To <span style="color:#565656"><?php echo e($message->receiver->username); ?></span></span>
                            </div>
                            <div class="no-mobile overflow-auto topic">
                                <div class="col-1-1 stat" style="text-align:right;">
                                    <span class="title" title="<?php echo e($message->updated_at); ?>"><?php echo e(Helper::time_elapsed_string($message->updated_at)); ?></span><br>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(count($messages) == 0): ?>
                    <div style="text-align:center;padding:10px;">
                        You don't have any messages!
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-10-12 push-1-12">
    <div class="pages">
        <?php if(isset($page['pages'])): ?>
            <?php $__currentLoopData = $page['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pageNum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="page <?php if($page['current'] == $pageNum): ?> blue weight600 <?php endif; ?>" href="/messages/sent/<?php echo e($pageNum); ?>"><?php echo e($pageNum); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div>
<script>
    $('span.label.smaller-text').on('click', (e) => {
        e.preventDefault();
        let userId = $(e.target).data('userId');
        if(typeof $(e.target).parent().data('userId') !== 'undefined')
            userId = $(e.target).parent().data('userId');
        window.location = `/user/${userId}/`
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/user/messages/outbox.blade.php ENDPATH**/ ?>