<?php $__env->startSection('title', 'Report'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-10-12 push-1-12">
	<div class="card">
		<div class="top blue">
			Report
		</div>
		<div class="content">
			<span class="darker-grey-text bold block">Tell us how you think this <?php echo e(request()->type); ?> is breaking the Brick Hill rules.</span>
			<form method="POST" action="/report/send">
				<?php echo csrf_field(); ?>
				<input type="hidden" name="reportable_type" value="<?php echo e($report_type); ?>">
				<input type="hidden" name="reportable_id" value="<?php echo e(request()->id); ?>">
				<select name="reason">
					<?php $__currentLoopData = $reasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($reason->id); ?>"><?php echo e($reason->reason); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
				<textarea name="note" style="width:100%;box-sizing:border-box;margin-top:10px;height:100px;" placeholder="Explain more (optional)"><?php echo e(old('note')); ?></textarea>
				<button type="submit" class="blue">SUBMIT</button>
			</form>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/admin/report.blade.php ENDPATH**/ ?>