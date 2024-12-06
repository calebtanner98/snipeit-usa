<!-- Location -->
<div id="location_id" class="form-group<?php echo e($errors->has('location_id') ? ' has-error' : ''); ?>"<?php echo (isset($style)) ? ' style="'.e($style).'"' : ''; ?>>

    <?php echo e(Form::label('location_id', $translated_name, array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-7">
        <select class="js-data-ajax" data-endpoint="locations" data-placeholder="<?php echo e(trans('general.select_location')); ?>" name="location_id" style="width: 100%" id="location_id_location_select" aria-label="location_id">
            <?php if($location_id = old('location_id', (isset($user)) ? $user->location_id : '')): ?>
                <option value="<?php echo e($location_id); ?>" selected="selected" role="option" aria-selected="true"  role="option">
                    <?php echo e((\App\Models\Location::find($location_id)) ? \App\Models\Location::find($location_id)->name : ''); ?>

                </option>
            <?php else: ?>
                <option value=""  role="option"><?php echo e(trans('general.select_location')); ?></option>
            <?php endif; ?>
        </select>
    </div>

    <?php echo $errors->first('location_id', '<div class="col-md-8 col-md-offset-3"><span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span></div>'); ?>


</div>



<?php /**PATH /var/www/html/test-deploy/resources/views/partials/forms/edit/location-profile-select.blade.php ENDPATH**/ ?>