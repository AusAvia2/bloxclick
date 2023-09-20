<?php $__env->startSection('title', $item->name); ?>

<?php $__env->startPush('meta'); ?>
<meta property="og:title" content="<?php echo e($item->name); ?>"/>
<meta property="og:image" content="<?php echo e($item->thumbnail); ?>"/>
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="512">
<meta property="og:image:height" content="512">
<meta property="twitter:title" content="<?php echo e($item->name); ?>"/>
<meta property="twitter:creator" content="@hill_of_bricks"/>
<meta property="twitter:image1" content="<?php echo e($item->thumbnail); ?>"/>
<meta name="twitter:card" content="summary_large_image">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-10-12 push-1-12">
    <item-page 
        id="itempage-v"

        item-name="<?php echo e($item->name); ?>"
        :item-id="<?php echo e($item->id); ?>"
        sold="<?php echo e($item->sold); ?>"
        :owns="<?php echo e($owns ? "true" : "false"); ?>"

        <?php if($item->product): ?>
        :product-id="<?php echo e($item->product->id); ?>"
        <?php endif; ?>

        :is-official="<?php echo e($is_official ? "true" : "false"); ?>"

        :has-buy-request="<?php echo e($has_buy_requests); ?>"

        :serials="<?php echo e($serials); ?>"
        
        on-load-favorites="<?php echo e($favorite_count ?? 0); ?>"
        :on-load-favorited="<?php echo e($has_favorited ? "true" : "false"); ?>"
        :on-load-wishlisted="<?php echo e($has_wishlisted ? "true" : "false"); ?>"
    />
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/shop/item.blade.php ENDPATH**/ ?>