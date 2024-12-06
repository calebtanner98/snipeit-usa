<?php $__env->startSection('title'); ?>
<?php echo e(trans('general.changepassword')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


<div class="row">
    <div class="col-md-9">
    <?php echo e(Form::open(['method' => 'POST', 'files' => true, 'class' => 'form-horizontal', 'autocomplete' => 'off'])); ?>

    <!-- CSRF Token -->
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
        <div class="box box-default">
            <div class="box-body">


    <!-- Old Password -->
    <div class="form-group <?php echo e($errors->has('current_password') ? ' has-error' : ''); ?>">
        <label for="current_password" class="col-md-3 control-label"> <?php echo e(trans('general.current_password')); ?> </label>
        </label>
        <div class="col-md-5 required">
            <input class="form-control" type="password" name="current_password" id="current_password" <?php echo e((config('app.lock_passwords') ? ' disabled' : '')); ?>>
            <?php echo $errors->first('current_password', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

            <?php if(config('app.lock_passwords')===true): ?>
                <p class="text-warning"><i class="fas fa-lock"></i> <?php echo e(trans('general.feature_disabled')); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
        <label for="password" class="col-md-3 control-label"><?php echo e(trans('general.new_password')); ?></label>
        <div class="col-md-5 required">
            <input class="form-control" type="password" name="password" id="password" <?php echo e((config('app.lock_passwords') ? ' disabled' : '')); ?>>
            <?php echo $errors->first('password', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

            <?php if(config('app.lock_passwords')===true): ?>
                <p class="text-warning"><i class="fas fa-lock"></i> <?php echo e(trans('general.feature_disabled')); ?></p>
            <?php endif; ?>
        </div>
    </div>


    <div class="form-group <?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
        <label for="password_confirmation" class="col-md-3 control-label"><?php echo e(trans('general.new_password')); ?></label>
        <div class="col-md-5 required">
            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation"  <?php echo e((config('app.lock_passwords') ? ' disabled' : '')); ?> aria-label="password_confirmation">
            <?php echo $errors->first('password_confirmation', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

            <?php if(config('app.lock_passwords')===true): ?>
                <p class="text-warning"><i class="fas fa-lock"></i> <?php echo e(trans('general.feature_disabled')); ?></p>
            <?php endif; ?>
        </div>
    </div>



            </div> <!-- .box-body -->
            <div class="box-footer text-right">
                <a class="btn btn-link" href="<?php echo e(URL::previous()); ?>"><?php echo e(trans('button.cancel')); ?></a>
                <button type="submit" class="btn btn-primary"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'checkmark']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkmark']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> <?php echo e(trans('general.save')); ?></button>
            </div>

        </div> <!-- .box-default -->
        <?php echo e(Form::close()); ?>

    </div> <!-- .col-md-9 -->
</div> <!-- .row-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/account/change-password.blade.php ENDPATH**/ ?>