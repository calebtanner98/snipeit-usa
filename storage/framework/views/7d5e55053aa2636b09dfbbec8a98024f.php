<!-- Status -->
<div class="form-group <?php echo e($errors->has('status_id') ? ' has-error' : ''); ?>">
    <label for="status_id" class="col-md-3 control-label"><?php echo e(trans('admin/hardware/form.status')); ?></label>
    <div class="col-md-7 col-sm-11<?php echo e((Helper::checkIfRequired($item, 'status_id')) ? ' required' : ''); ?>">
        <?php echo e(Form::select('status_id', $statuslabel_list , old('status_id', $item->status_id), array('class'=>'select2 status_id', 'style'=>'width:100%','id'=>'status_select_id', 'aria-label'=>'status_id', 'required' => 'required'))); ?>

        <?php echo $errors->first('status_id', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
    <div class="col-md-2 col-sm-2 text-left">

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\Statuslabel::class)): ?>
            <a href='<?php echo e(route('modal.show', 'statuslabel')); ?>' data-toggle="modal"  data-target="#createModal" data-select='status_select_id' class="btn btn-sm btn-primary"><?php echo e(trans('button.new')); ?></a>
        <?php endif; ?>

        <span class="status_spinner" style="padding-left: 10px; color: green; display:none; width: 30px;"><i class="fas fa-spinner fa-spin" aria-hidden="true"></i> </span>

    </div>

    <div class="col-md-7 col-sm-11 col-md-offset-3" id="status_helptext">
        <p id="selected_status_status" style="display:none;"></p>
    </div>

</div>
<?php /**PATH /var/www/html/test-deploy/resources/views/partials/forms/edit/status.blade.php ENDPATH**/ ?>