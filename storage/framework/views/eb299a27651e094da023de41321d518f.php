<?php $__env->startSection('title', $clan['title']); ?>

<?php $__env->startSection('content'); ?>
<div class="col-10-12 push-1-12">
    <div class="card">
        <div class="top" style="position:relative;">
            <?php if(auth()->guard()->check()): ?>
            <dropdown id="dropdown-v" class="dropdown" style="right:7.5px;">
                <ul>
                    <?php if($isUserInClan): ?>
                    <?php if($isUserOwner || $userRank->perm_editClan || $userRank->perm_editDesc || $userRank->perm_addDelRank || $userRank->perm_changeRank || $userRank->perm_inviteDecline || $userRank->perm_allyEnemy): ?>
                    <li>
                        <a href="/clan/<?php echo e($clan['id']); ?>/edit">Edit</a>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>
                    <li>
                        <a href="/report/clan/<?php echo e($clan['id']); ?>/">Report</a>
                    </li>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('scrub clans')): ?>
                    <li>
                        <form method="POST" action="/clan/<?php echo e($clan->id); ?>/scrubImage" style="padding:0;">
                            <?php echo csrf_field(); ?>
                            <a onclick="$(this).parent().submit()">Scrub Image</a>
                        </form>
                    </li>
                    <li>
                        <form method="POST" action="/clan/<?php echo e($clan->id); ?>/scrubName" style="padding:0;">
                            <?php echo csrf_field(); ?>
                            <a onclick="$(this).parent().submit()">Scrub Name</a>
                        </form>
                    </li>
                    <li>
                        <form method="POST" action="/clan/<?php echo e($clan->id); ?>/scrubDesc" style="padding:0;">
                            <?php echo csrf_field(); ?>
                            <a onclick="$(this).parent().submit()">Scrub Description</a>
                        </form>
                    </li>
                    <li>
                        <form method="POST" action="/clan/<?php echo e($clan->id); ?>/scrubTag" style="padding:0;">
                            <?php echo csrf_field(); ?>
                            <a onclick="$(this).parent().submit()">Scrub Tag</a>
                        </form>
                    </li>
                    <?php endif; ?>
                </ul>
            </dropdown>
            <?php endif; ?>
            <span class="clan-title"><?php echo e($clan['title']); ?></span><b>[<?php echo e($clan['tag']); ?>]</b>
        </div>
        <div class="content" style="position:relative;">
            <div class="col-3-12">
                <div class="clan-img-holder mb1">
                    <img class="width-100" src="<?php echo e($clan->thumbnail); ?>">
                </div>
                <div class="dark-gray-text bold">
                    <div>
                        Owned by 
                            <?php if($clan['ownership'] == 'none'): ?>
                                Nobody 
                            <?php elseif($clan['ownership'] == 'user'): ?>
                                <b>
                                    <a href="/user/<?php echo e($owner['id']); ?>/" class="black-text"><?php echo e($owner['username']); ?></a>
                                </b>
                            <?php else: ?>
                                <b>
                                    <a href="/clan/<?php echo e($owner['id']); ?>/" class="black-text"><?php echo e($owner['title']); ?></a>
                                </b>
                            <?php endif; ?>
                    </div>
                    <div><?php echo e(number_format($members)); ?> <?php echo e(str_plural('Member', $members)); ?></div>
                </div>
                <?php if(auth()->guard()->check()): ?>
                
                <?php if($isUserInClan && ($clan['ownership'] != 'user' || $clan['owner_id'] != Auth::id())): ?>
                <form method="POST" action="<?php echo e(route('joinClan')); ?>" style="display:inline-block">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="clan_id" value="<?php echo e($clan['id']); ?>">
                    <input type="hidden" name="type" value="leave">
                    <button class="red" style="font-size:12px;" type="submit">LEAVE</button>
                </form>
                <?php endif; ?>
                
                <?php if($clan['ownership'] == 'none'): ?>
                <form method="POST" action="<?php echo e(route('joinClan')); ?>" style="display:inline-block">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="clan_id" value="<?php echo e($clan['id']); ?>">
                    <input type="hidden" name="type" value="claim">
                    <button class="green" style="font-size:12px;width:140px;padding-left:5px;padding-right:5px;" type="submit">CLAIM OWNERSHIP</button>
                </form>
                <?php endif; ?>
                
                <?php if(!$isUserInClan): ?>
                
                <?php if($userMember && $userMember['status'] == 'pending'): ?>
                <button class="gray" type="submit">JOIN PENDING</button>
                <?php else: ?>
                <form method="POST" action="<?php echo e(route('joinClan')); ?>" class="inline">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="clan_id" value="<?php echo e($clan['id']); ?>">
                    <button class="green" style="font-size:12px;" type="submit">JOIN</button>
                </form>
                <?php endif; ?>
                
                <?php elseif(Auth::user()->primary_clan_id != $clan['id']): ?>
                <form method="POST" action="<?php echo e(route('makePrimary')); ?>" class="inline">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="clan_id" value="<?php echo e($clan['id']); ?>">
                    <button class="green" style="font-size:12px;width:120px;padding-left:5px;padding-right:5px;" type="submit">MAKE PRIMARY</button>
                </form>
                <?php elseif(Auth::user()->primary_clan_id == $clan['id']): ?>
                <form method="POST" action="<?php echo e(route('makePrimary')); ?>" class="inline">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="clan_id" value="<?php echo e($clan['id']); ?>">
                    <button class="red" style="font-size:12px;width:130px;padding-left:5px;padding-right:5px;" type="submit">REMOVE PRIMARY</button>
                </form>
                <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="col-9-12">
                <div class="clan-description darkest-gray-text bold">
                    <span><?php echo nl2br(e($clan['description'])); ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-1-1 tab-buttons">
        <button class="tab-button blue w600" data-tab="1">MEMBERS</button>
        <button class="tab-button transparent w600" data-tab="2">RELATIONS</button>
        
    </div>
    <div class="col-1-1">
        <div class="button-tabs">
            <div class="button-tab active" data-tab="1">
                <div class="col-1-1">
                    <div class="card">
                        <div class="top blue">
                            Members
                        </div>
                        <div class="content" style="min-height:250px;">
                            <div class="mb1 overflow-auto">
                                <?php if($isUserInClan): ?>
                                <span class="dark-gray-text">Your rank: <b class="black-text"><?php echo e($userRank['name']); ?></b></span>
                                <?php endif; ?>
                                <div class="rank-select" style="width:150px;float:right;">
                                    <select class="push-right select">
                                        <?php $__currentLoopData = $ranks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($rank['rank_id']); ?>"><?php echo e($rank['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="member-holder overflow-auto unselectable">
                                </div>
                                <div class="member-pages pages blue unselectable">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-tab" data-tab="2">
                <div class="col-1-1">
                    <div class="card">
                        <div class="top">
                            Relations
                        </div>
                        <div class="content">
                            <div>
                                <fieldset class="fieldset green mb1">
                                    <legend>Allies</legend>
                                    <div class="p1 overflow-auto">
                                        <?php if(count($allyRelations) == 0): ?>
                                        <div class="text-center bold agray-text">This clan has no allies</div>
                                        <?php endif; ?>
                                        <?php $__currentLoopData = $allyRelations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        if($relation['from_clan'] == $clan['id']) {
                                            $type = 'tclan';
                                        } else {
                                            $type = 'fclan';
                                        }
                                        ?>
                                        <a href="/clan/<?php echo e($relation[$type]['id']); ?>/">
                                            <div class="profile-card">
                                                <img src="<?php echo e($relation[$type]->thumbnail); ?>">
                                                <span class="ellipsis"><?php echo e($relation[$type]['title']); ?></span>
                                            </div>
                                        </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </fieldset>
                                <fieldset class="fieldset red">
                                    <legend>Enemies</legend>
                                    <div class="p1 overflow-auto">
                                        <?php if(count($enemyRelations) == 0): ?>
                                        <div class="text-center bold agray-text">This clan has no enemies</div>
                                        <?php endif; ?>
                                        <?php $__currentLoopData = $enemyRelations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        if($relation['from_clan'] == $clan['id']) {
                                            $type = 'tclan';
                                        } else {
                                            $type = 'fclan';
                                        }
                                        ?>
                                        <a href="/clan/<?php echo e($relation[$type]['id']); ?>/">
                                            <div class="profile-card">
                                                <img src="<?php echo e($relation[$type]->thumbnail); ?>">
                                                <span class="ellipsis"><?php echo e($relation[$type]['title']); ?></span>
                                            </div>
                                        </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-tab" data-tab="3">
                <div class="col-1-1">
                    <div class="card">
                        <div class="top red">
                            Store
                        </div>
                        <div class="content">
                            Feature coming soon
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function loadMembers(rank = '', page = 1) {
            if(rank == '')
                rank = $('.rank-select option').first().val()
            $.getJSON(`/api/clans/members/<?php echo e($clan['id']); ?>/${rank}/${page}`, (data) => {
                $('.member-holder').html();
                let html = '';
                for(let i in data.data) {
                    let user = data.data[i].user
                    html += `<a href="/user/${user.id}/">
                                <div class="col-1-5 mobile-col-1-2">
                                    <img style="width:145px;height:145px;" src="${BH.avatarImg(user.id)}">
                                    <div class="ellipsis">${user.username}</div>
                                </div>
                            </a>`
                }
                $('.member-pages').html();
                let pagehtml = '';
                for(let i of data.pages.pages) {
                    pagehtml += `<a class="page${i == page ? ' active' : ''}">${i}</a>`
                }
                $('.member-pages').html(pagehtml)
                $('.member-holder').html(html)
            })
        }
        $('.rank-select select').on('change', (e) => {
            loadMembers($('option:selected', e.target).val())
        })
        $(document).on('click', '.member-pages a', function() {
            loadMembers($('.rank-select select option:selected').val(), $(this).text())
        })
        loadMembers(1)
    </script>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/clans/clan.blade.php ENDPATH**/ ?>