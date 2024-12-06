<!-- QTY -->
<div class="form-group <?php echo e($errors->has('qty') ? ' has-error' : ''); ?>">
    <label for="qty" class="col-md-3 control-label"><?php echo e(trans('general.quantity')); ?></label>
    <div class="col-md-7<?php echo e((Helper::checkIfRequired($item, 'qty')) ? ' required' : ''); ?>">
        <div class="col-md-3" style="padding-left:0px">
            <input class="form-control" maxlength="5" type="number" name="qty" aria-label="qty" id="qty" 
                value="<?php echo e(old('qty', $item->qty)); ?>" 
                min="0" 
                <?php echo (Helper::checkIfRequired($item, 'qty')) ? ' required ' : ''; ?> />
        </div>
        <div class="col-md-12" style="padding-left:0px">
            <?php echo $errors->first('qty', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

        </div>
    </div>
</div>
<?php /**PATH /var/www/html/snipeit/resources/views/partials/forms/edit/quantity.blade.php ENDPATH**/ ?>