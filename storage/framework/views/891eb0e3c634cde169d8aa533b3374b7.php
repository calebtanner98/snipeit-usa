

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'type' => '',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'type' => '',
]); ?>
<?php foreach (array_filter(([
    'type' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<i <?php echo e($attributes->merge(['class' => Icon::icon($type)])); ?> aria-hidden="true"></i><?php /**PATH /var/www/html/test-deploy/app/Providers/../../resources/views/blade/icon.blade.php ENDPATH**/ ?>