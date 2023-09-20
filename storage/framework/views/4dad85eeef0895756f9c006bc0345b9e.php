<?php $__env->startSection('title', 'Create Set'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-10-12 push-1-12">
    <div class="card">
        <div class="top blue">
            Create Set
        </div>
        <div class="content" style="position:relative">
            <form method="POST" action="<?php echo e(route('createSetPost')); ?>">
                <?php echo csrf_field(); ?>
                <?php
                if(substr(auth()->user()->username, -1) == 's') {
                    $title = auth()->user()->username."' Set";
                } else {
                    $title = auth()->user()->username."'s Set";
                }
                ?>
                <input class="upload-input" type="text" name="name" placeholder="Title" required value="<?php echo e((old('name')) ?? $title); ?>">
                <textarea class="upload-input" name="description" placeholder="Description" style="width:320px;height:100px;"><?php echo e(old('description')); ?></textarea>
                <input class="button blue upload-submit" type="submit" value="Create">
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\newdy\Downloads\var\html\www\resources\views/pages/sets/create.blade.php ENDPATH**/ ?>