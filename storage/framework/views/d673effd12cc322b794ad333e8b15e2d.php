<?php $__env->startSection('title'); ?>
    <?php echo e(trans('account/general.personal_api_keys')); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="row">
            <div class="col-md-8">

                 <?php if(!config('app.lock_passwords')): ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('personal-access-tokens', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3586489383-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                 <?php else: ?>
                     <p class="help-block"><?php echo e(trans('general.feature_disabled')); ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <div class="alert alert-warning"><i class="fas fa-exclamation-triangle faa-pulse animated"></i>
                    <?php echo e(trans('account/general.api_key_warning')); ?>

                </div>

                <p><?php echo e(trans('account/general.api_base_url')); ?><br>
                    <code><?php echo e(url('/api/v1')); ?><?php echo trans('account/general.api_base_url_endpoint'); ?></code></p>

                <p><?php echo e(trans('account/general.api_token_expiration_time')); ?>

                    <strong><?php echo e(config('passport.expiration_years')); ?> <?php echo e(trans('general.years')); ?> </strong>.</p>


                <p><?php echo trans('account/general.api_reference'); ?></p>
            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/account/api.blade.php ENDPATH**/ ?>