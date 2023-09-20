<?php $__env->startSection('title', 'Currency'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-10-12 push-1-12">
    <div class="tabs">
        <div class="tab active col-3-12" data-tab="1">
            Exchange
        </div>
        <div class="tab col-3-12" data-tab="2">
            Transactions
        </div>
        <div class="tab col-3-12" data-tab="3">
            Items on sale
        </div>
        <div class="tab col-3-12" id="buyrequests" data-tab="4">
            Buy requests
        </div>
        <div class="tab-holder" style="box-shadow:none;">
            <div class="tab-body active" data-tab="1" style="text-align:center;">
                <form method="POST" action="<?php echo e(route('transferCurrency')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="block">
                        <select name="type" class="select mb2">
                            <option value="to-bits">To bits</option>
                            <option value="to-bucks">To bucks</option>
                        </select>
                        <input type="number" placeholder="0" min="0" name="amount" style="margin-bottom:10px;">
                    </div>
                    <button type="submit" class="blue smaller-text">CONVERT</button>
                </form>
            </div>
            <div class="tab-body" data-tab="2" id="transactions">
                <transactions id="transactions-v"></transactions>
            </div>
            <div class="tab-body" data-tab="3">
                <?php if($items_on_sale->count() > 0): ?>
                <table style="width: 100%;">
                    <?php $__currentLoopData = $items_on_sale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th>
                            <a href="<?php echo e(route('itemPage', [ 'item' => $item->item_id ])); ?>" class="agray-text">
                                <img src="<?php echo e($item->item->thumbnail); ?>" alt="<?php echo e($item->item->name); ?>" style="height: 56px;">
                                <div><?php echo e($item->item->name); ?></div>
                            </a>
                        </th>
                        <th><span class="bucks-text"><?php echo e(number_format($item->bucks)); ?> BUCKS</span></th>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
                <?php else: ?>
                <p>You have no items on sale.</p>
                <?php endif; ?>
            </div>
            <div class="tab-body" data-tab="4">
                <?php if($buy_requests->count() > 0): ?>
                <table style="width: 100%;">
                    <?php $__currentLoopData = $buy_requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th>
                            <a href="<?php echo e(route('itemPage', [ 'item' => $request->item_id ])); ?>" class="agray-text">
                                <img src="<?php echo e($request->item->thumbnail); ?>" alt="<?php echo e($request->item->name); ?>" style="height: 56px;">
                                <div><?php echo e($request->item->name); ?></div>
                            </a>
                        </th>
                        <th><span class="bucks-text"><?php echo e(number_format($request->bucks)); ?> BUCKS</span></th>
                        <td>Posted <?php echo e(Carbon\Carbon::parse($request->updated_at)->diffForHumans()); ?></td>
                        <td>
                            <form method="POST" action="<?php echo e(route('cancelBuyRequest')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($request->id); ?>">
                                <button class="button red" style="margin-right:10px" type="submit">Cancel</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
                <?php else: ?>
                <p>You have no buy requests.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/user/currency.blade.php ENDPATH**/ ?>