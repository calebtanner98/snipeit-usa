<!-- begin redirect submit options -->
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'index_route',
    'button_label',
    'disabled_select' => false,
    'options' => [],
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'index_route',
    'button_label',
    'disabled_select' => false,
    'options' => [],
]); ?>
<?php foreach (array_filter(([
    'index_route',
    'button_label',
    'disabled_select' => false,
    'options' => [],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="box-footer">
    <div class="row">

        <div class="col-md-3">
            <a class="btn btn-link" href="<?php echo e($index_route ? route($index_route) : url()->previous()); ?>"><?php echo e(trans('button.cancel')); ?></a>
        </div>

        <div class="col-md-9 text-right">
            <div class="btn-group text-left">

                <?php if(($options) && (count($options) > 0)): ?>
                <select class="redirect-options form-control select2" data-minimum-results-for-search="Infinity" name="redirect_option" style="min-width: 250px"<?php echo e(($disabled_select ? ' disabled' : '')); ?>>
                    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"<?php echo e(Session::get('redirect_option') == $key ? ' selected' : ''); ?>>
                            <?php echo e($value); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php endif; ?>

                <button type="submit" class="btn btn-primary pull-right<?php echo e(($disabled_select ? ' disabled' : '')); ?>" style="margin-left:5px; border-radius: 3px;"<?php echo ($disabled_select ? ' data-tooltip="true" title="'.trans('admin/hardware/general.edit').'" disabled' : ''); ?>>
                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '0bc333070fe8fbc263fd4a4e307b8773::icon','data' => ['type' => 'checkmark']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php endif; ?>
                    <?php echo e($button_label); ?>

                </button>

            </div><!-- /.btn-group -->
        </div><!-- /.col-md-9 -->
    </div><!-- /.row -->
</div> <!-- /.box-footer -->
<!-- end redirect submit options --><?php /**PATH /var/www/html/test-deploy/app/Providers/../../resources/views/blade/redirect_submit_options.blade.php ENDPATH**/ ?>