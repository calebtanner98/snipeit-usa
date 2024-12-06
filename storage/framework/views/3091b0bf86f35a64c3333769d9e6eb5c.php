<!-- Min QTY -->
<div class="form-group<?php echo e($errors->has('min_amt') ? ' has-error' : ''); ?>">
    <label for="min_amt" class="col-md-3 control-label"><?php echo e(trans('general.min_amt')); ?></label>
    <div class="col-md-9<?php echo e((Helper::checkIfRequired($item, 'min_amt')) ? ' required' : ''); ?>">
        <div class="col-md-2" style="padding-left:0px">
            <input class="form-control col-md-3" maxlength="5" type="number" name="min_amt" id="min_amt" 
                aria-label="min_amt" 
                value="<?php echo e(old('min_amt', $item->min_amt)); ?>" 
                min="0" 
                <?php echo (Helper::checkIfRequired($item, 'min_amt')) ? ' required ' : ''; ?> />
        </div>
        <div class="col-md-7" style="margin-left: -15px;">
            <a href="#" data-tooltip="true" title="<?php echo e(trans('general.min_amt_help')); ?>">
                <i class="fas fa-info-circle" aria-hidden="true"></i>
                <span class="sr-only"><?php echo e(trans('general.min_amt_help')); ?></span>
            </a>
        </div>
        <div class="col-md-12">
            <?php echo $errors->first('min_amt', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

        </div>
    </div>
</div>
<?php /**PATH /var/www/html/snipeit/resources/views/partials/forms/edit/minimum_quantity.blade.php ENDPATH**/ ?>