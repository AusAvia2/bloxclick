<?php $__env->startSection('title', 'Clans'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-10-12 push-1-12">
    <?php if(auth()->guard()->check()): ?>
    <?php if(count($user_clans) > 0): ?>
    <div class="card">
        <div class="top blue">
            My Clans
        </div>
        <div class="content" style="text-align:center;">
            <div class="carousel clans">
                <div style="width:95%;margin-right:auto;margin-left:auto;overflow:hidden">
                    <ul style="max-height: 160px;">
                        <?php $__currentLoopData = $user_clans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="carousel li" data-iteration="<?php echo e($loop->iteration); ?>">
                            <a href="/clan/<?php echo e($clan['clan']['id']); ?>/">
                                <div class="profile-card">
                                    <img src="<?php echo e($clan['clan']->thumbnail); ?>">
                                    <span class="ellipsis"><?php echo e($clan['clan']['title']); ?></span>
                                </div>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                
                <?php if(count($user_clans) > 6): ?>
                <script>
                    $('.carousel ul').slick({
                        infinite: true,
                        slidesToShow: 6,
                        slidesToScroll: 1,
                        speed: 250,
                        prevArrow: '<a class="carousel-button left"><i class="fas fa-angle-left"></i></a>',
                        nextArrow: '<a class="carousel-button right"><i class="fas fa-angle-right"></i></a>'
                    });
                </script>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php endif; ?>
    <div class="card">
        <div class="top blue">
            Popular Clans
        </div>
        <div class="content">
            <div class="mb2 overflow-auto">
                <div class="col-9-12">
                    <input type="text" style="height:41px;" class="width-100 rigid" placeholder="Search">
                </div>
                <div class="col-3-12">
                    <div class="acc-1-2 np">
                        <button class="button blue width-100">Search</button>
                    </div>
                    <?php if(auth()->guard()->check()): ?>
                    <div class="acc-1-2 np">
                        <a href="/clans/create" class="button green width-100">Create</a>
                    </div>
                <?php endif; ?>
                </div>
            </div>
            <div class="col-1-1" style="padding-right:0;">
                <?php if(count($clans) == 0): ?>
                <div style="text-align:center">
                    <span>No clans found</span>
                </div>
                <?php endif; ?>
                <?php $__currentLoopData = $clans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="/clan/<?php echo e($clan['id']); ?>/">
                        <div class="hover-card clan">
                            <div class="clan-logo">
                                <img class="width-100" src="<?php echo e($clan->thumbnail); ?>">
                            </div>
                            <div class="data ellipsis">
                                <span class="clan-name bold mobile-col-1-2 ellipsis"><?php echo e($clan['title']); ?></span>
                                <span class="push-right"><?php echo e(number_format($clan['total'])); ?> <?php echo e(str_plural('Member', $clan['total'])); ?></span>
                            </div>
                            <div class="clan-description">
                                <?php echo nl2br(e($clan['description'])); ?>

                            </div>
                        </div>
                    </a>
                    <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="pages">
                <?php if(isset($pages['pages'])): ?>
                    <?php $__currentLoopData = $pages['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pageNum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="page <?php if($pages['current'] == $pageNum): ?> active <?php endif; ?>" <?php if($pages['current'] != $pageNum): ?> <?php endif; ?> href="/clans/<?php echo e($pageNum); ?>/<?php echo e($search); ?>"><?php echo e($pageNum); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '.blue.button', searchClans);
        $(document).on('keyup', '.rigid', searchClans);

        function searchClans(e) {
            if($(e.target).hasClass('button') || event.keyCode == 13) {
                let search = $('input.rigid').val()

                window.location = `<?php echo e(route('clanView', ['page' => 1])); ?>/${search}`;
            }
        }
    </script>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/clans/index.blade.php ENDPATH**/ ?>