<?php $__env->startComponent('mail::message'); ?>
# <?php echo e(trans('mail.hello')); ?>,

<?php echo e($intro_text); ?>.

<?php if(($snipeSettings->show_images_in_email =='1') && $item->getImageUrl()): ?>
<center><img src="<?php echo e($item->getImageUrl()); ?>" alt="Asset" style="max-width: 570px;"></center>
<?php endif; ?>

<?php $__env->startComponent('mail::table'); ?>
|        |          |
| ------------- | ------------- |
<?php if(isset($qty)): ?>
| **<?php echo e(trans('general.qty')); ?>** | <?php echo e($qty); ?>

<?php endif; ?>
| **<?php echo e(trans('mail.user')); ?>** | [<?php echo e($requested_by->present()->fullName()); ?>](<?php echo e(route('users.show', $requested_by->id)); ?>) |
| **<?php echo e(trans('general.requested')); ?>** | <?php echo e($requested_date); ?> |
<?php if((isset($item->asset_tag)) && ($item->asset_tag!='')): ?>
| **<?php echo e(trans('mail.asset_tag')); ?>** | <?php echo e($item->asset_tag); ?> |
<?php endif; ?>
<?php if((isset($item->name)) && ($item->name!='')): ?>
| **<?php echo e(trans('mail.asset_name')); ?>** | <?php echo e($item->name); ?> |
<?php endif; ?>
<?php if(isset($item->assetstatus)): ?>
| **<?php echo e(trans('general.status')); ?>** | <?php echo e($item->assetstatus->name); ?>

<?php endif; ?>
<?php if($item->assignedTo): ?>
| **<?php echo e(trans('general.checked_out_to')); ?>** | <?php echo $item->assignedTo->present()->nameUrl(); ?> (<?php echo e($item->present()->statusMeta); ?>)
<?php endif; ?>
<?php if(isset($item->manufacturer)): ?>
| **<?php echo e(trans('general.manufacturer')); ?>** | <?php echo e($item->manufacturer->name); ?> |
<?php endif; ?>
<?php if(isset($item->model)): ?>
| **<?php echo e(trans('general.asset_model')); ?>** | <?php echo e($item->model->name); ?> |
<?php endif; ?>
<?php if(isset($item->model_no)): ?>
| **<?php echo e(trans('general.model_no')); ?>** | <?php echo e($item->model_no); ?> |
<?php endif; ?>
<?php if(isset($item->serial)): ?>
| **<?php echo e(trans('mail.serial')); ?>** | <?php echo e($item->serial); ?> |
<?php endif; ?>
<?php if((isset($last_checkout)) && ($last_checkout!='')): ?>
| **<?php echo e(trans('general.last_checkout')); ?>** | <?php echo e($last_checkout); ?> |
<?php endif; ?>
<?php if((isset($expected_checkin)) && ($expected_checkin!='')): ?>
| **<?php echo e(trans('mail.expecting_checkin_date')); ?>** | <?php echo e($expected_checkin); ?> |
<?php endif; ?>
<?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(($item->{ $field->db_column_name() }!='') && ($field->show_in_email) && ($field->field_encrypted=='0')): ?>
| **<?php echo e($field->name); ?>** | <?php echo e($item->{ $field->db_column_name() }); ?> |
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if($note): ?>
| **<?php echo e(trans('mail.additional_notes')); ?>** | <?php echo e($note); ?> |
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

<?php echo e(trans('mail.best_regards')); ?>


<?php echo e($snipeSettings->site_name); ?>


<?php echo $__env->renderComponent(); ?>
<?php /**PATH /var/www/html/snipeit/resources/views/notifications/markdown/asset-requested.blade.php ENDPATH**/ ?>