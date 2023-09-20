<?php $__env->startSection('title', 'Edit Clan'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-10-12 push-1-12">
    <div class="tabs">
        <meta name="clan_id" content="<?php echo e($clan['id']); ?>">
        <div class="tab <?php if(session('tab') != 'member'): ?>active <?php endif; ?> col-1-2" data-tab="1">
            Edit
        </div>
        <?php if($rank->perm_changeRank || $rank->perm_allyEnemy || $rank->inviteDecline): ?>
        <div class="tab <?php if(session('tab') == 'member'): ?>active <?php endif; ?> col-1-2" data-tab="2">
            Members & Relations
        </div>
        <?php endif; ?>
        <div class="tab-holder">
            <div class="tab-body <?php if(session('tab') != 'member'): ?>active <?php endif; ?>" data-tab="1">
                    <div class="content p2">
                        <h1 style="font-size:23px;margin-top:0;">Edit <?php echo e($clan['title']); ?></h1>
                        <?php if($rank->perm_editDesc || $rank->perm_editClan): ?>
                        <div class="flex-container">
                            <div class="clan-edit-icon clan-edit col-3-12">
                                <div class="bold">Change Icon</div>
                                <img src="<?php echo e($clan->thumbnail); ?>" style="width:150px;height:150px;">
                                <form method="POST" action="/clan/<?php echo e($clan->id); ?>/thumbnail" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <input class="upload-input" type="file" name="image" style="border:0;padding-left:0;" required>
                                    <input class="button blue upload-submit" type="submit" value="UPLOAD">
                                </form>
                            </div>
                            <div class="clan-edit-description clan-edit col-9-12">
                                <div class="bold">Update Description</div>
                                <form method="POST" action="<?php echo e(route('editClanPost')); ?>" style="height:65%;">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="type" value="description">
                                    <input type="hidden" name="clan_id" value="<?php echo e($clan['id']); ?>">
                                    <textarea class="upload-input" name="description" style="width:90%;height:100%;"><?php echo e(!is_null(old('description')) ? old('description') : $clan['description']); ?></textarea>
                                    <input class="button blue upload-submit" type="submit" value="SAVE">
                                </form>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if($rank->perm_editClan): ?>
                        <hr>
                        <div class="overflow-auto">
                            <div class="bold">Join Type</div>
                            <form method="POST" action="<?php echo e(route('editClanPost')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="type" value="join_type">
                                <input type="hidden" name="clan_id" value="<?php echo e($clan['id']); ?>">
                                <select name="value" class="select">
                                    <option value="open" <?php if($clan['type'] !== 'private'): ?>selected <?php endif; ?>>Open to all</option>
                                    <option value="request" <?php if($clan['type'] == 'private'): ?>selected <?php endif; ?>>Request to join</option>
                                </select>
                                <div></div>
                                <input class="button blue upload-submit" type="submit" value="SAVE">
                            </form>
                        </div>
                        <hr>
                        <?php endif; ?>
                        <?php if($rank->perm_addDelRank): ?>
                        <div class="clan-edit-ranks overflow-auto">
                            <div class="bold">Edit Ranks</div>
                            <form method="POST" action="<?php echo e(route('editClanPost')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="type" value="edit_ranks">
                                <input type="hidden" name="clan_id" value="<?php echo e($clan['id']); ?>">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h5>Power</h5>
                                            </td>
                                            <td>
                                                <h5>Name</h5>
                                            </td>
                                            <?php
                                            $checkArr = [
                                                'perm_postWall' => 'Let these users post to the wall',
                                                'perm_modWall' => 'Let these users moderate the wall',
                                                'perm_inviteDecline' => 'Let these users invite/reject users',
                                                'perm_allyEnemy' => 'Let these users ally/enemy other clans',
                                                'perm_changeRank' => 'Let these users rank other users',
                                                'perm_addDelRank' => 'Let these users add/delete ranks',
                                                'perm_editDesc' => 'Let these users edit the clan description',
                                                'perm_shoutBox' => 'Let these users use the shoutout box',
                                                'perm_addFunds' => 'Let these users add funds to the clan',
                                                'perm_takeFunds' => 'Let these users take funds from the clan',
                                                'perm_editClan' => 'Let these users edit the clan'
                                            ];
                                            ?>
                                            <?php $__currentLoopData = $checkArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $check): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td>
                                                <h5 class="text-center"><i class="fa fa-info-circle" title="<?php echo e($check); ?>"></i></h5>
                                            </td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tr>
                                        <?php $__currentLoopData = $ranks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clanRank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php if($clanRank['rank_id'] == 100 || $clanRank['rank_id'] >= $rank['rank_id']): ?>
                                                <input disabled type="number" name="rank<?php echo e($clanRank['rank_id']); ?>power" value="<?php echo e($clanRank['rank_id']); ?>" style="width:65px;">
                                                <?php else: ?>
                                                <input min="1" max="99" type="number" name="rank<?php echo e($clanRank['rank_id']); ?>power" value="<?php echo e($clanRank['rank_id']); ?>">
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <input <?php if($clanRank['rank_id'] >= $rank['rank_id'] && $rank['rank_id'] !== 100): ?>disabled <?php endif; ?> type="text" name="rank<?php echo e($clanRank['rank_id']); ?>name" value="<?php echo e($clanRank['name']); ?>">
                                            </td>
                                            <?php $__currentLoopData = $checkArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perm => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td>
                                                <input type="checkbox" name="rank<?php echo e($clanRank['rank_id']); ?><?php echo e($perm); ?>" <?php if($clanRank[$perm]): ?> checked <?php endif; ?> <?php if($clanRank['rank_id'] == 100 || $clanRank['rank_id'] >= $rank['rank_id']): ?> disabled <?php endif; ?>>
                                            </td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <input class="button blue upload-submit" type="submit" value="SAVE">
                            </form>
                        </div>
                        <hr>
                        <div class="clan-new-rank clan-edit overflow-auto">
                            <div class="bold">New Rank</div>
                            <form method="POST" action="<?php echo e(route('editClanPost')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="type" value="new_rank">
                                <input type="hidden" name="clan_id" value="<?php echo e($clan['id']); ?>">
                                <input type="text" name="new_rank_name" placeholder="Rank name">
                                <div class="bucks-text bold">This will cost <span class="bucks-icon"></span>6</div>
                                <input class="button blue upload-submit" type="submit" value="CREATE" style="display: block;">
                            </form>
                        </div>
                        <hr>
                        <?php endif; ?>
                        <?php if($clan['ownership'] == 'user' && $clan['owner_id'] == Auth::id()): ?>
                        <div class="clan-change-owner overflow-auto clan-edit">
                            <div class="bold">Ownership</div>
                            <form method="POST" action="<?php echo e(route('editClanPost')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="type" value="ownership">
                                <input type="hidden" name="clan_id" value="<?php echo e($clan['id']); ?>">
                                <input type="text" name="username" placeholder="Username">
                                <div class="red-text bold">User must be in clan to be given ownership</div>
                                <input class="button blue upload-submit" type="submit" value="TRANSFER">
                            </form>
                        </div>
                        <hr>
                        <div class="clan-change-owner clan-edit">
                            <div class="bold">Abandon</div>
                            <form class="overflow-auto" method="POST" action="<?php echo e(route('editClanPost')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="type" value="abandon">
                                <input type="hidden" name="clan_id" value="<?php echo e($clan['id']); ?>">
                                <input class="button red upload-submit" type="submit" value="ABANDON">
                            </form>
                            <div class="red-text bold">THIS CANNOT BE UNDONE</div>
                        </div>
                        <?php endif; ?>
                    </div>
            </div>
            <?php if($rank->perm_changeRank || $rank->perm_allyEnemy || $rank->inviteDecline): ?>
            <div class="tab-body <?php if(session('tab') == 'member'): ?>active <?php endif; ?>" data-tab="2">
                <div class="p1">
                    <div class="content">
                        <?php if($rank->perm_changeRank): ?>
                        <h1 style="font-size:23px;margin-top:0;">Members & Relations</h1>
                        <div class="clan-change-ranks clan-edit rank-select">
                            <div class="bold">Members</div>
                            <select class="select" style="width:150px;" id="member-rank" onchange="loadEditMembers()">
                                <?php $__currentLoopData = $ranks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($rank['rank_id']); ?>"><?php echo e($rank['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="overflow-auto edit-holder unselectable">
                            </div>
                            <div class="pages unselectable">
                            </div>
                        </div>
                        <script>
                            $(document).on('change', 'select[data-user]', function() {
                                let select = $(this);
                                let user = select.data('user');
                                $.post(`<?php echo e(route('editClanPost')); ?>`, {
                                    _token: $('meta[name="csrf-token"]').attr('content'),
                                    user_id: user,
                                    clan_id: <?php echo e($clan['id']); ?>,
                                    type: 'change_rank',
                                    new_rank: $(':selected', select).val()
                                }, () => {loadEditMembers($('.member-pages .forumPage.blue').text() || 1)})
                                .fail((data) => {
                                    $('.col-10-12.push-1-12').prepend(`
                                        <div class="error-notification">
                                            ${data.responseJSON.error}
                                        </div>
                                    `);
                                });
                            })
                            $(document).on('click', '#clan-search', searchRelationClans);
                            $(document).on('keyup', '#clan-search-bar', searchRelationClans);
                            loadEditMembers();
                        </script>
                        <hr>
                        <?php endif; ?>
                        <?php if($rank->perm_inviteDecline): ?>
                        <?php if($clan['type'] == 'private' || count($pendingMembers)  > 0): ?>
                        <div class="clan-pending-members clan-edit">
                            <div class="bold">Pending Members</div>
                            <div class="pending-holder" style="padding-top:5px;">
                                <?php if(count($pendingMembers) == 0): ?>
                                You have no pending members
                                <?php else: ?>
                                <?php $__currentLoopData = $pendingMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="/user/<?php echo e($member['user']['id']); ?>/">
                                    <div class="profile-card" style="width:170px;padding-top:5px;padding-bottom:5px;">
                                        <img src="<?php echo e($member->user->avatar_thumbnail); ?>" style="width:115px;height:115px;">
                                        <span class="ellipsis"><?php echo e($member['user']['username']); ?></span>
                                        <form method="POST" action="<?php echo e(route('editClanPost')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="type" value="pending_member">
                                            <input type="hidden" name="user_id" value="<?php echo e($member['user_id']); ?>">
                                            <input type="hidden" name="clan_id" value="<?php echo e($clan['id']); ?>">
                                            <button class="button small green" name="accept" value="accept">ACCEPT</button>
                                            <button class="button small red" name="decline" value="decline">DECLINE</button>
                                        </form>
                                    </div>
                                </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <hr>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php if($rank->perm_allyEnemy): ?>
                        <div class="clan-ally-enemy clan-edit">
                            <div class="bold">Allies and Enemies</div>
                            <input type="text" name="clan-search" placeholder="Search clans" id="clan-search-bar">
                            <button class="button small blue smaller-text small" id="clan-search">SEARCH</button>
                            <div class="relation-holder" style="padding-top:5px;">
                            </div>
                            <hr>
                            <div class="bold">Pending Allies</div>
                            <div class="pending-allies <?php if(count($pendingAllies) != 0): ?> 'text-center' <?php endif; ?>">
                                <?php if(count($pendingAllies) == 0): ?>
                                You have no pending allies
                                <?php else: ?>
                                <?php $__currentLoopData = $pendingAllies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="/clan/<?php echo e($relation['fclan']['id']); ?>/">
                                    <div class="profile-card" style="width:170px;padding-top:5px;padding-bottom:5px;">
                                        <img src="<?php echo e($relation['fclan']->thumbnail); ?>">
                                        <span class="ellipsis"><?php echo e($relation['fclan']['title']); ?></span>
                                        <form method="POST" action="<?php echo e(route('editClanPost')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="type" value="pending_ally">
                                            <input type="hidden" name="from_clan" value="<?php echo e($relation['fclan']['id']); ?>">
                                            <input type="hidden" name="clan_id" value="<?php echo e($clan['id']); ?>">
                                            <button class="button small green" name="accept" value="accept">ACCEPT</button>
                                            <button class="button small red" name="decline" value="decline">DECLINE</button>
                                        </form>
                                    </div>
                                </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                            <span style="font-weight:600;display:block;">Pending enemies</span>
                            <div class="pending-enemies"<?php if(count($pendingEnemies) != 0): ?>style="text-align:center;"<?php endif; ?>>
                                <?php if(count($pendingEnemies) == 0): ?>
                                You have no pending enemies
                                <?php else: ?>
                                <?php $__currentLoopData = $pendingEnemies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="/clan/<?php echo e($relation['fclan']['id']); ?>/">
                                    <div class="profile-card" style="width:170px;padding-top:5px;padding-bottom:5px;">
                                        <img src="<?php echo e($relation['fclan']->thumbnail); ?>">
                                        <span class="ellipsis"><?php echo e($relation['fclan']['title']); ?></span>
                                        <form method="POST" action="<?php echo e(route('editClanPost')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="type" value="pending_ally">
                                            <input type="hidden" name="from_clan" value="<?php echo e($relation['fclan']['id']); ?>">
                                            <input type="hidden" name="clan_id" value="<?php echo e($clan['id']); ?>">
                                            <button class="button small green" name="accept" value="accept">ACCEPT</button>
                                            <button class="button small red" name="decline" value="decline">DECLINE</button>
                                        </form>
                                    </div>
                                </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/clans/edit.blade.php ENDPATH**/ ?>