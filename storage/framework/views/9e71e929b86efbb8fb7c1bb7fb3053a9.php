<div class="form-group" id="assignto_selector"<?php echo (isset($style)) ? ' style="'.e($style).'"' : ''; ?>>
    <?php echo e(Form::label('checkout_to_type', trans('admin/hardware/form.checkout_to'), array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-8">
        <div class="btn-group" data-toggle="buttons">
            <?php if((isset($user_select)) && ($user_select!='false')): ?>
            <label class="btn btn-default active">
                <input name="checkout_to_type" value="user" aria-label="checkout_to_type" type="radio" checked="checked"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'user']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'user']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> <?php echo e(trans('general.user')); ?>

            </label>
            <?php endif; ?>
            <?php if((isset($asset_select)) && ($asset_select!='false')): ?>
            <label class="btn btn-default">
                <input name="checkout_to_type" value="asset" aria-label="checkout_to_type" type="radio"><i class="fas fa-barcode" aria-hidden="true"></i> <?php echo e(trans('general.asset')); ?>

            </label>
            <?php endif; ?>
            <?php if((isset($location_select)) && ($location_select!='false')): ?>
            <label class="btn btn-default">
                <input name="checkout_to_type" value="location" aria-label="checkout_to_type" class="active" type="radio"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <?php echo e(trans('general.location')); ?>

            </label>
            <?php endif; ?>

            <?php echo $errors->first('checkout_to_type', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

        </div>
    </div>
</div>
<?php /**PATH /var/www/html/snipeit/resources/views/partials/forms/checkout-selector.blade.php ENDPATH**/ ?>