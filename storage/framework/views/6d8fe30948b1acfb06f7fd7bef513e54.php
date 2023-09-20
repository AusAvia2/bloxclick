<?php config(['site.no_ads' => true]) ?>
<?php config(['site.no_banner' => true]) ?>

<?php $__env->startSection('content-no-grid'); ?>
<style>
body {
    background-color: #222226;
}
</style>
<div class="new-theme landing-banner index-top-bar">
    <img class="landing-image-top" />
    <p class="title shadow white-text"> A growing community of <?php echo e(Helper::numAbbr($user_count)); ?> users with a focus on creativity and collaboration. </p>
    <a href="/register">
        <button class="button blue no-overflow">REGISTER NOW</button>
    </a>
    <p class="landing-subtext shadow white-text">
         OR <a class="landing-subtext" href="/login">LOG IN</a>
    </p>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="landing-content-section">
    <div class="section-content-left">
        <h1 class="section-content-title">BUILDING A COMMUNITY</h1>
        <p class="section-content-text">Bringing people from all over the world together to create, collaborate, and play together built on values that put the player first. Join our community and help shape its future and your place in it!</p>
    </div>
    <div class="section-content-right section-image">
        <img class="section-image sandcastle">
    </div>
</div>
<div class="landing-content-section" style="margin-bottom: 60px;">
    <div class="section-content-left section-image">
        <img class="section-image workshop">
    </div>
    <div class="section-content-right">
        <h1 class="section-content-title">A RISING PLATFORM</h1>
        <p class="section-content-text">The biggest up-and-coming platform fueled by its community and a commitment to provide the best quality for free. We're constantly pushing out new updates, new features, and growing our audience using creative and talented minds who believe in our platform.</p>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/index.blade.php ENDPATH**/ ?>