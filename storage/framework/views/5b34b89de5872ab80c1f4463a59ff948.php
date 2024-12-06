<?php $__env->startSection('inputFields'); ?>

<?php echo $__env->make('partials.forms.edit.company-select', ['translated_name' => trans('general.company'), 'fieldname' => 'company_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.name', ['translated_name' => trans('admin/accessories/general.accessory_name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.category-select', ['translated_name' => trans('general.category'), 'fieldname' => 'category_id', 'required' => 'true','category_type' => 'accessory'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.supplier-select', ['translated_name' => trans('general.supplier'), 'fieldname' => 'supplier_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.manufacturer-select', ['translated_name' => trans('general.manufacturer'), 'fieldname' => 'manufacturer_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.location-select', ['translated_name' => trans('general.location'), 'fieldname' => 'location_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.model_number', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.order_number', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.purchase_date', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.purchase_cost', ['currency_type' => $item->location->currency ?? null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.quantity', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.minimum_quantity', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.notes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Requestable -->
<div class="form-group <?php echo e($errors->has('requestable') ? ' has-error' : ''); ?>">
    <div class="col-md-3 control-label">
        <strong>Requestable</strong>
    </div>
    <div class="col-md-7">
        <label class="form-control">
            <?php echo e(Form::Checkbox('requestable', '1', old('requestable', $item->id ? $item->requestable : '1'), ['aria-label' => 'requestable'])); ?>

            <?php echo e(trans('general.yes')); ?>

        </label>
    </div>
</div>
<?php echo $__env->make('partials.forms.edit.image-upload', ['image_path' => app('accessories_upload_path')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/edit-form', [
    'createText' => trans('admin/accessories/general.create') ,
    'updateText' => trans('admin/accessories/general.update'),
    'helpPosition'  => 'right',
    'helpText' => trans('help.accessories'),
    'formAction' => (isset($item->id)) ? route('accessories.update', ['accessory' => $item->id]) : route('accessories.store'),
    'index_route' => 'accessories.index',
    'options' => [
                'index' => trans('admin/hardware/form.redirect_to_all', ['type' => 'accessories']),
                'item' => trans('admin/hardware/form.redirect_to_type', ['type' => trans('general.accessory')]),
               ]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/accessories/edit.blade.php ENDPATH**/ ?>