<?php $__env->startSection('inputFields'); ?>
<?php echo $__env->make('partials.forms.edit.name', ['translated_name' => trans('general.name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/edit-form', [
    'createText' =>  trans('admin/kits/general.create'),
    'updateText' => trans('admin/kits/general.update'),
    'formAction' => (isset($item->id)) ? route('kits.update', ['kit' => $item->id]) : route('kits.store'),
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/kits/create.blade.php ENDPATH**/ ?>