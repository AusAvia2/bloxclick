<?php $__env->startSection('title', $user->username); ?>

<?php $__env->startSection('content'); ?>
<div class="col-10-12 push-1-12">
    <?php if($banned): ?>
    <div class="alert error">
        User is banned
    </div>
    <?php endif; ?>
    <?php if($status): ?>
    <div class="col-1-1" style="padding-right:0;">
        <div class="card">
            <div class="content" style="border-radius:5px;position:relative;word-break:break-word">
                <div class="small-text very-bold light-gray-text">What's on my mind:</div>
                <?php if(auth()->guard()->check()): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user)): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('scrub users')): ?>
                    <form method="POST" action="/user/<?php echo e($user->id); ?>/scrubStatus">
                        <?php echo csrf_field(); ?>
                        <a onclick="$(this).parent().submit()" class="dark-gray-text" style="position:absolute;top:5px;right:5px;font-size:13px;">Scrub</a>
                    </form>
                    <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
                <?php echo e($status['body']); ?>

            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="col-6-12">
        <div class="card">
            <div class="content text-center bold medium-text relative ellipsis">
                <span class="status-dot <?php if($user->is_online): ?>online <?php endif; ?>"></span>
                <?php if(!is_null($user->primaryClan?->tag)): ?>
                    <a href="/clan/<?php echo e($user->primary_clan_id); ?>"><span class="mr1" style="color:#999999;">[<?php echo e($user->primaryClan?->tag); ?>]</span></a>
                <?php endif; ?>
                <span class="ellipsis"><?php echo e($user->username); ?></span>
                <br>
                <img src="<?php echo e($user->avatar_thumbnail); ?>" style="height:350px;">
                <div class="user-description-box closed">
                    <div class="toggle-user-desc gray-text">
                        <div class="user-desc p2 darker-grey-text" style="font-size:16px;line-height:17px;">
                            <?php echo nl2br(e($user->description)); ?>

                            <?php if($user->pastUsernames->count() > 0): ?>
                            <p><hr></p>
                            Previously known as: <i><?php echo e($user->pastUsernames->pluck('old_username')->implode(', ')); ?></i>
                            <?php endif; ?>
                        </div>
                        <a class="darker-grey-text read-more-desc" style="font-size:16px;">Read More</a>
                    </div>
                </div>
                <?php if(auth()->guard()->check()): ?>
                <profile-dropdown id="profiledropdown-v" 
                    :for_user="<?php echo e($user->id); ?>" 
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $user)): ?> :can_view="true" <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user)): ?> :can_update="true" <?php endif; ?>
                ></profile-dropdown>
                <?php if($user->id !== auth()->id()): ?>
                <div style="text-align:center;">
                    <a class="button small blue inline" style="font-size:14px;" href="<?php echo e(route('sendMessage', ['id' => $user->id])); ?>">MESSAGE</a>
                    <a class="button small blue inline" href="<?php echo e(route('sendTrade', ['id' => $user->id])); ?>" style="font-size:14px;">TRADE</a>
                    <a class="button small inline <?php echo e($friended[1]); ?>" style="font-size:14px;" onclick="$('.friend-form').submit();"><?php echo e($friended[2]); ?></a>
                    <form method="POST" action="<?php echo e(route('friend')); ?>" class="friend-form" class="inline">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="userId" value="<?php echo e($user->id); ?>">
                        <input type="hidden" name="sender" value="profile">
                        <input type="hidden" name="type" value="<?php echo e($friended[0]); ?>">
                    </form>
                </div>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
        <?php if(count($awards) > 0): ?>
        <div class="card">
            <div class="top green">
                Awards
            </div>
            <div class="content" style="text-align:center;">
                <?php $__currentLoopData = $awards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $award): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="/awards/">
                    <div class="profile-card award">
                        <img src="<?php echo e(asset("images/awards/" . $award['award']['id'] . ".png")); ?>">
                        <span class="ellipsis"><?php echo e($award['award']['name']); ?></span>
                    </div>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="col-6-12" style="padding-right:0;">
        <sets id="sets-v" user_id="<?php echo e($user->id); ?>" class="set-slider" style="position: relative"></sets>
        <?php if (\Illuminate\Support\Facades\Blade::check('ads')): ?>
        <div id="100128-19">
            <script src="//ads.themoneytizer.com/s/gen.js?type=19"></script>
            <script src="//ads.themoneytizer.com/s/requestform.js?siteId=100128&formatId=19"></script>
        </div>
        <?php endif; ?>
    </div>
    <div class="col-1-1 tab-buttons">
        <button class="tab-button blue" data-tab="1">CRATE</button>
        <button class="tab-button transparent" data-tab="2">SOCIAL</button>
        <button class="tab-button transparent" data-tab="3">STATS</button>
    </div>
    <div class="col-1-1" id="tabs">
        <div class="button-tabs">
            <div class="button-tab active" data-tab="1">
                <div class="col-1-1">
                    <div class="card">
                        <div class="top red">
                            Crate
                        </div>
                        <div class="content">
                            <crate id="crate-v" user="<?php echo e($user->id); ?>"></crate>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-tab" data-tab="2">
                <div class="row" style="padding-right:0.1px;">
                    <div class="col-6-12">
                        <div class="card">
                            <div class="top orange" style="position:relative;">
                                Clans
                                <a class="button orange" href="/user/<?php echo e($user->id); ?>/clans" style="position:absolute;right:5px;top:4px;padding:5px;">SEE ALL</a>
                            </div>
                            <div class="content" style="text-align:center;min-height:330.86px;">
                                <?php if(count($clans) > 0): ?>
                                <?php $__currentLoopData = $clans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="col-1-3" href="/clan/<?php echo e($clan->clan->id); ?>/" style="padding-right:5px;padding-left:5px;">
                                    <div class="profile-card">
                                        <img src="<?php echo e($clan->clan->thumbnail); ?>">
                                        <span class="ellipsis"><?php echo e($clan->clan->title); ?></span>
                                    </div>
                                </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php else: ?>
                                <div class="center-text">
                                    <span>This user is not in any clans</span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6-12">
                        <div class="card">
                            <div class="top red" style="position:relative;">
                                Friends
                                <a class="button red" href="/user/<?php echo e($user->id); ?>/friends/1" style="position:absolute;right:5px;top:4px;padding:5px;">SEE ALL</a>
                            </div>
                            <div class="content" style="text-align:center;min-height:330.86px;">
                                <?php if(count($friends) > 0): ?>
                                <?php $__currentLoopData = $friends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $friend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                // use to_id or from_id
                                if($friend['to_id'] == $user->id)
                                    $id = 'fromUser';
                                else
                                    $id = 'toUser';
                                $friend = $friend[$id];
                                ?>
                                <a class="col-1-3" href="/user/<?php echo e($friend->id); ?>/" style="padding-right:5px;padding-left:5px;">
                                    <div class="profile-card user">
                                        <img src="<?php echo e($friend->avatar_thumbnail); ?>">
                                        <span class="ellipsis"><?php echo e($friend->username); ?></span>
                                    </div>
                                </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <span>This user does not have any friends :(</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-tab" data-tab="3">
                <div class="col-1-1">
                    <div class="card">
                        <div class="top red">
                            Statistics
                        </div>
                        <div class="content" style="min-height:330.86px;">
                            <table class="stats-table">
                                <?php
                                $statsTable = [
                                    'Join Date' => Carbon\Carbon::parse($user->created_at)->format('d/m/Y'),
                                    'Last Online' => Helper::time_elapsed_string($user->last_online, true),
                                    'Game Visits' => number_format($totalVisits),
                                    'Forum Posts' => number_format($user->post_count),
                                    'Friends' => number_format($user->friends()->isAccepted()->count())
                                ];
                                ?>
                                <?php $__currentLoopData = $statsTable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <b><?php echo e(title_case($stat)); ?>:</b>
                                    </td>
                                    <td id="<?php echo e(str_replace(' ', '-', strtolower($stat))); ?>">
                                        <?php echo e($val); ?>

                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    if($('.user-description-box .user-desc').height() <= 80) {
        $('.read-more-desc').css('display', 'none');
        $('.toggle-user-desc').addClass('open');
    }
    $(document).on('click', '.read-more-desc', function () {
        $(this).parent().parent().toggleClass('closed');
        if($(this).text() == 'Read More') {
            $(this).text('Show Less');
            $('.user-description-box .content').css('min-height', $('.user-description-box .content').height() + 33)
        } else {
            $(this).text('Read More');
            $('.user-description-box .content').css('min-height', $('.user-description-box .content').height() - 33)
        }
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/user/profile.blade.php ENDPATH**/ ?>