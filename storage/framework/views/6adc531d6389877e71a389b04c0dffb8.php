<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<?php if(request()->has('paymentCompleted')): ?>
<legacy-notification id="notification-v" class="notification" msg="Thank you for your purchase! Please allow 24 hours for the purchase to process." type="success"></legacy-notification>
<?php endif; ?>
<?php if(request()->has('clientCompleted')): ?>
<legacy-notification id="notification-v" class="notification" msg="Thank you for purchasing client access! You can now download the installer on the downloads page." type="success"></legacy-notification>
<?php endif; ?>

<div class="new-theme dashboard">
    <div class="col-3-10">
        <div class="card border-bottom no-rounded no-shadow">
            <div class="rounded center-text">
                <img class="avatar-thumbnail" src="<?php echo e(auth()->user()->avatar_thumbnail); ?>" style="width:100%;">
                <?php if(!is_null(auth()->user()->primaryClan?->tag)): ?>
                    <a href="/clan/<?php echo e(auth()->user()->primary_clan_id); ?>"><span class="bold medium-text light-text">[<?php echo e(auth()->user()->primaryClan?->tag); ?>]</span></a>
                <?php endif; ?>
                <span style="margin: 5px;" class="bold medium-text"><?php echo e(auth()->user()->username); ?></span>
                <div class="dashboard-info flex flex-column flex-items-center">
                    <div class="flex dash-info vmargin-6">
                        <?php if(auth()->user()->membership?->active): ?>
                        <div class="flex streak-info ml-20">
                        <?php switch(auth()->user()->membership->membership):
                            case (4): ?>
                                <svg-sprite id="svgsprite-v" svg="user/dashboard/royal_streak_col" square="23" class="svgsprite mr-10"></svg-sprite>
                                <?php break; ?>
                            <?php case (3): ?>
                                <svg-sprite id="svgsprite-v" svg="user/dashboard/ace_streak_col" square="23" class="svgsprite mr-10"></svg-sprite>
                                <?php break; ?>
                            <?php case (2): ?>
                                <svg-sprite id="svgsprite-v" svg="user/dashboard/mint_streak_col" square="23" class="svgsprite mr-10"></svg-sprite>
                                <?php break; ?>
                            <?php default: ?>
                        <?php endswitch; ?>
                        <p class="smedium-text"><?php echo e($streak); ?></p>
                        </div>
                        <?php endif; ?>

                        <div class="flex streak-info dash-info ml-20 mr-10 flex-items-center">
                            <svg-sprite id="svgsprite-v" svg="user/trade/value/value" square="23" class="svgsprite svg-black mr-10"></svg-sprite>
                            <?php if($value = auth()->user()->tradeValues()->first()): ?>
                                <p class="smedium-text mr-20" title="<?php echo e($value->value); ?>"><?php echo e(Helper::numAbbr($value->value)); ?></p>
                                
                                <?php if($value->direction >= 0): ?> 
                                <svg-sprite id="svgsprite-v" svg="user/trade/arrow_value_up" square="15" class="svgsprite ml-10 value-svg"></svg-sprite>
                                <?php else: ?>
                                <svg-sprite id="svgsprite-v" svg="user/trade/arrow_value_down" square="15" class="svgsprite ml-10 value-svg"></svg-sprite>
                                <?php endif; ?>
                            <?php else: ?>
                            <p class="smedium-text mr-20"><?php echo e(0); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if(auth()->user()->isAdmin): ?>
                    <span class="very-bold red-text administrator small-text mb-10">ADMINISTRATOR</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div>
            <div class="flex flex-items-center flex-horiz-center">
                <p class="very-bold smedium-text mr-10"><?php echo e($friend_count); ?></p>
                <p class="bold small-text gray-text"><?php echo e(\Illuminate\Support\Str::plural('FRIEND', $friend_count)); ?></p>
            </div>
        </div>
        
        <div class="card no-rounded no-shadow">
            <?php $__currentLoopData = $friends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $friend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                if($friend['to_id'] == auth()->user()->id)
                    $id = 'fromUser';
                else
                    $id = 'toUser';
                $friend = $friend[$id];
            ?>
            <div class="status">
                <a href="/user/<?php echo e($friend->id); ?>">
                    <img src="<?php echo e($friend->avatar_thumbnail); ?>">
                </a>
                <div class="ellipsis ml-5">
                    <div class="mb-12 smedium-text relative ellipsis flex">
                        <span href="/user/<?php echo e($friend->id); ?>" class="ellipsis"><?php echo e($friend->username); ?> </span>
                        <span class="status-dot status-dashboard <?php if($friend->is_online): ?>online <?php endif; ?>"></span>
                    </div>
                    <a class="mb-12 bold small-text very-bold" href="/message/<?php echo e($friend->id); ?>/send">MESSAGE</a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($friend_count > 0): ?>
            <a class="small-text bold" href="/user/<?php echo e(auth()->user()->id); ?>/friends/1">VIEW ALL</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-8-12">
        <blog-card id="blogcard-v" class="blogcard"></blog-card>
        <div class="card border-bottom no-shadow no-rounded">
            <div class="smedium-text mb-16 bold">
                What's New?
            </div>
            <div>
                <form style="width:100%;" class="pb3" method="POST" action="<?php echo e(route('status')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="flex flex-column">
                        <textarea class="post-input border mb-16" name="status" placeholder="Right now I'm..." type="text"></textarea>
                        <button class="post-button button small smaller-text blue">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card no-shadow">
            <div class="smedium-text mb-16 bold">
                Your Feed
            </div>
            <div>
                <?php if(count($feed) == 0): ?>
                    <p class="gray-text">Your feed is empty! Follow some users to fill this area.</p>
                <?php endif; ?>

                <?php $__currentLoopData = $feed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!empty($status->body)): ?>
                <div class="status border-bottom mb-12 flex">
                    <?php if($status['type'] == 'clan'): ?>
                    <a href="/clan/<?php echo e($status->clan_id); ?>">
                        <img src="<?php echo e($status['clan']->thumbnail); ?>">
                    </a>
                    <?php else: ?>
                    <a href="/user/<?php echo e($status->owner_id); ?>">
                        <img src="<?php echo e($status->user->avatar_thumbnail); ?>">
                    </a>
                    <?php endif; ?>
                    <div class="ml-5 mb-10">
                        <div class="flex">
                            <?php if($status['type'] == 'clan'): ?>
                            <a href="/clan/<?php echo e($status->clan_id); ?>" class="very-bold mr-5"><?php echo e($status->clan['title']); ?> </a>
                            <?php else: ?>
                            <a href="/user/<?php echo e($status->owner_id); ?>" class="very-bold mr-5"><?php echo e($status->user['username']); ?> </a>
                            <?php endif; ?>
                            <span class="mr-5">&#183;</span>
                            <span class="dark-gray-text mb-12 small-text" title="<?php echo e(Carbon\Carbon::parse($status->date)->format('d/m/Y h:i A')); ?>"><?php echo e(Carbon\Carbon::parse($status->date)->diffForHumans()); ?></span>
                        </div>
                        <div><?php echo e($status->body); ?></div>
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/user/dashboard.blade.php ENDPATH**/ ?>