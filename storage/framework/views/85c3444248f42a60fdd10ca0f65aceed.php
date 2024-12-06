<?php $__env->startSection('title'); ?>
<?php echo e(trans('general.setup_migrations')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="col-lg-12" style="padding-top: 20px;">
    <?php if(trim($output)=='Nothing to migrate.'): ?>
    <div class="col-md-12">
        <div class="alert alert-warning">
            <i class="fas fa-exclamation-triangle"></i>
            <?php echo e(trans('general.setup_no_migrations')); ?>

        </div>
    </div>
    <?php else: ?>
    <div class="col-md-12">
        <div class="alert alert-success">
            <i class="fas fa-check"></i>
            <?php echo e(trans('general.setup_successful_migrations')); ?>

        </div>
    </div>

    <?php endif; ?>

    <p><?php echo e(trans('general.setup_migration_output')); ?> </p>
    <pre><?php echo e($output); ?></pre>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('button'); ?>
  <form action="<?php echo e(route('setup.user')); ?>" method="GET">
    <button class="btn btn-primary"><?php echo e(trans('general.setup_migration_create_user')); ?></button>
  </form>
<?php echo \Illuminate\View\Factory::parentPlaceholder('button'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/setup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/test-deploy/resources/views/setup/migrate.blade.php ENDPATH**/ ?>