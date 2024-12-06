<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin/settings/general.oauth_title')); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
    <a href="<?php echo e(route('settings.index')); ?>" class="btn btn-default pull-right"><?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php if(!config('app.lock_passwords')): ?>
        <div id="app">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('oauth-clients', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2401734529-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    <?php else: ?>
        <p class="text-warning"><i class="fas fa-lock" aria-hidden="true"></i> <?php echo e(trans('general.feature_disabled')); ?></p>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/settings/api.blade.php ENDPATH**/ ?>