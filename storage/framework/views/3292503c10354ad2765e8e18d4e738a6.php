<?php $__env->startSection('title', 'Banned'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-10-12 push-1-12">
    <?php if(Auth::user()->stripeCustomer()->exists()): ?>
    <div class="card">
        <div class="top blue">
            Billing
        </div>
        <div class="content">
            <?php if(Auth::user()->subscription?->active): ?>
            <div style="margin-bottom:10px;">
                Your subscription will automatically renew on
                <?php echo e(Carbon\Carbon::parse(Auth::user()->subscription?->expected_bill)->format('M d Y')); ?>

            </div>
            <?php endif; ?>
            <banned-billing
                id="bannedbilling-v"
                :has-active-membership="<?php echo e(Auth::user()->subscription?->active ? "true" : "false"); ?>"
            ></banned-billing>
        </div>
    </div>
    <?php endif; ?>
    <div class="card">
        <div class="top red">
            Your account has been suspended
        </div>
        <div class="content">
            <span class="dark-gray-text sbold">We have deemed that your account has violated our Terms of Service, and as such a punishment has been applied to your account. Further incompetence or violations to our Terms of Service will result in a termination of your account.</span>
            <div style="padding-left:20px;margin-top:20px;">
                <div class="block" style="margin-bottom:20px;">
                    <b class="dark-gray-text">Ban Length:</b>
                    <span class="light-gray-text">
                        <?php echo e(($ban->length == 0) ? 'Warning' : 
                            (($ban->length > 530000) ? 'Terminated' : 
                            Carbon\Carbon::parse($ban->created_at)->addMinutes($ban->length)->diffForHumans($ban->created_at, true))); ?>

                    </span>
                </div>
                <div class="block" style="margin-bottom:20px;">
                    <b class="dark-gray-text">Ban Reason:</b>
                    <span class="light-gray-text"><?php echo e($ban->banType->name ?? 'None'); ?></span>
                </div>
                <?php if($ban->length <= 530000): ?>
                <div class="block" style="margin-bottom:20px;">
                    <b class="dark-gray-text">Reactivation Time:</b>
                    <span class="light-gray-text"><?php echo e(Carbon\Carbon::parse($ban->created_at)->addMinutes($ban->length)->format('d/m/Y h:i A')); ?> UTC</span>
                </div>
                <?php endif; ?>
            </div>
            <?php if($ban->content): ?>
            <div class="border" style="padding:20px;border-radius:7px;">
                <b class="dark-gray-text block">Ban Content:</b>
                <span class="light-gray-text" style="word-wrap:break-word;"><?php echo e($ban->content); ?></span>
            </div>
            <?php endif; ?>
            <div style="padding-left:20px;margin-top:20px;">
                <div class="block" style="margin-bottom:20px;">
                    <b class="dark-gray-text">Moderator Note:</b>
                    <span class="light-gray-text"><?php echo e($ban->note); ?></span>
                </div>
            </div>
            <span class="dark-gray-text" style="font-size:16px;">Please make sure that you have read our <a class="darker-gray-text bold" href="/terms" target="_blank">Terms of Service</a> before returning to make sure you and others have the best experience on Brick Hill.</span>
            <hr>
            <div style="margin-bottom:10px;">
                <span class="dark-gray-text" style="font-size:16px;">If you wish to appeal, contact <a class="darkest-gray-text" href="mailto:help@brick-hill.com">help@brick-hill.com</a>.
            </div>
            <?php if($past): ?>
            <form method="POST" action="<?php echo e(route('postBanned')); ?>">
                <?php echo csrf_field(); ?>
                <button class="blue" type="submit">REACTIVATE ACCOUNT</button>
            </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/user/banned.blade.php ENDPATH**/ ?>