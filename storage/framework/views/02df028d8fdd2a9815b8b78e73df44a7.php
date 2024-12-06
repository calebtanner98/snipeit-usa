<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin/hardware/form.update')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(URL::previous()); ?>" class="btn btn-sm btn-primary pull-right">
  <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-8 col-md-offset-2">

    <p><?php echo e(trans('admin/hardware/form.bulk_update_help')); ?></p>



    <form class="form-horizontal" method="post" action="<?php echo e(route('hardware/bulksave')); ?>" autocomplete="off" role="form">
      <?php echo e(csrf_field()); ?>


      <div class="box box-default">
        <div class="box-body">

          <div class="callout callout-warning">
            <i class="fas fa-exclamation-triangle"></i> <?php echo e(trans_choice('admin/hardware/form.bulk_update_warn', count($assets), ['asset_count' => count($assets)])); ?>


            <?php if(count($models) > 0): ?>
              <?php echo e(trans_choice('admin/hardware/form.bulk_update_with_custom_field', count($models), ['asset_model_count' => count($models)])); ?>

            <?php endif; ?>
          </div>

          <!-- Name -->
          <div class="form-group <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
            <label for="name" class="col-md-3 control-label">
              <?php echo e(trans('admin/hardware/form.name')); ?>

            </label>
            <div class="col-md-4">
                <input type="text" class="form-control" name="name" id="name" value="<?php echo e(old('name')); ?>" maxlength="100" style="width:100%">
              <?php echo $errors->first('name', '<span class="alert-msg" aria-hidden="true">
                <i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

            </div>
            <div class="col-md-5">
              <label class="form-control">
                <?php echo e(Form::checkbox('null_name', '1', false)); ?>

                <?php echo e(trans_choice('general.set_to_null', count($assets), ['selection_count' => count($assets)])); ?>

              </label>
            </div>
          </div>


          <!-- Purchase Date -->
          <div class="form-group <?php echo e($errors->has('purchase_date') ? ' has-error' : ''); ?>">
            <label for="purchase_date" class="col-md-3 control-label"><?php echo e(trans('admin/hardware/form.date')); ?></label>
            <div class="col-md-4">
              <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd"  data-autoclose="true">
                <input type="text" class="form-control" placeholder="<?php echo e(trans('general.select_date')); ?>" name="purchase_date" id="purchase_date" value="<?php echo e(old('purchase_date')); ?>">
                <span class="input-group-addon"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'calendar']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'calendar']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?></span>
              </div>
              <?php echo $errors->first('purchase_date', '<span class="alert-msg"><i class="fas fa-times"></i> :message</span>'); ?>

            </div>
            <div class="col-md-5">
              <label class="form-control">
                <?php echo e(Form::checkbox('null_purchase_date', '1', false)); ?>

                <?php echo e(trans_choice('general.set_to_null', count($assets),['selection_count' => count($assets)])); ?>

              </label>
            </div>
          </div>

          <!-- Expected Checkin Date -->
          <div class="form-group <?php echo e($errors->has('expected_checkin') ? ' has-error' : ''); ?>">
             <label for="expected_checkin" class="col-md-3 control-label"><?php echo e(trans('admin/hardware/form.expected_checkin')); ?></label>
             <div class="col-md-4">
                  <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd"  data-autoclose="true">
                      <input type="text" class="form-control" placeholder="<?php echo e(trans('general.select_date')); ?>" name="expected_checkin" id="expected_checkin" value="<?php echo e(old('expected_checkin')); ?>">
                      <span class="input-group-addon"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'calendar']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'calendar']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?></span>
                 </div>

                 <?php echo $errors->first('expected_checkin', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

             </div>
              <div class="col-md-5">
                <label class="form-control">
                  <?php echo e(Form::checkbox('null_expected_checkin_date', '1', false)); ?>

                  <?php echo e(trans_choice('general.set_to_null', count($assets), ['selection_count' => count($assets)])); ?>

                </label>
              </div>
          </div>


          <!-- Status -->
          <div class="form-group <?php echo e($errors->has('status_id') ? ' has-error' : ''); ?>">
            <label for="status_id" class="col-md-3 control-label">
              <?php echo e(trans('admin/hardware/form.status')); ?>

            </label>
            <div class="col-md-7">
              <?php echo e(Form::select('status_id', $statuslabel_list , old('status_id'), array('class'=>'select2', 'style'=>'width:100%', 'aria-label'=>'status_id'))); ?>

              <p class="help-block"><?php echo e(trans('general.status_compatibility')); ?></p>
              <?php echo $errors->first('status_id', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

            </div>
          </div>

        <?php echo $__env->make('partials.forms.edit.model-select', ['translated_name' => trans('admin/hardware/form.model'), 'fieldname' => 'model_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <!-- Default Location -->
        <?php echo $__env->make('partials.forms.edit.location-select', ['translated_name' => trans('admin/hardware/form.default_location'), 'fieldname' => 'rtd_location_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Update actual location  -->
          <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                <label class="form-control">
                  <?php echo e(Form::radio('update_real_loc', '1', old('update_real_loc'), ['checked'=> 'checked', 'aria-label'=>'update_real_loc'])); ?>

                  <?php echo e(trans('admin/hardware/form.asset_location_update_default_current')); ?>

                </label>
              <label class="form-control">
                <?php echo e(Form::radio('update_real_loc', '0', old('update_real_loc'), ['aria-label'=>'update_default_loc'])); ?>

                <?php echo e(trans('admin/hardware/form.asset_location_update_default')); ?>

              </label>
                <label class="form-control">
                  <?php echo e(Form::radio('update_real_loc', '2', old('update_real_loc'), ['aria-label'=>'update_default_loc'])); ?>

                  <?php echo e(trans('admin/hardware/form.asset_location_update_actual')); ?>

                </label>

            </div>
          </div> <!--/form-group-->



          <!-- Purchase Cost -->
          <div class="form-group <?php echo e($errors->has('purchase_cost') ? ' has-error' : ''); ?>">
            <label for="purchase_cost" class="col-md-3 control-label">
              <?php echo e(trans('admin/hardware/form.cost')); ?>

            </label>
            <div class="input-group col-md-3">
              <span class="input-group-addon"><?php echo e($snipeSettings->default_currency); ?></span>
                <input type="text" class="form-control"  maxlength="10" placeholder="<?php echo e(trans('admin/hardware/form.cost')); ?>" name="purchase_cost" id="purchase_cost" value="<?php echo e(old('purchase_cost')); ?>">
                <?php echo $errors->first('purchase_cost', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

            </div>
          </div>

          <!-- Supplier -->
           <?php echo $__env->make('partials.forms.edit.supplier-select', ['translated_name' => trans('general.supplier'), 'fieldname' => 'supplier_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <!-- Company -->
          <?php echo $__env->make('partials.forms.edit.company-select', ['translated_name' => trans('general.company'), 'fieldname' => 'company_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <!-- Order Number -->
          <div class="form-group <?php echo e($errors->has('order_number') ? ' has-error' : ''); ?>">
            <label for="order_number" class="col-md-3 control-label">
              <?php echo e(trans('admin/hardware/form.order')); ?>

            </label>
            <div class="col-md-7">
              <input class="form-control" type="text" maxlength="200" name="order_number" id="order_number" value="<?php echo e(old('order_number')); ?>" />
              <?php echo $errors->first('order_number', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

            </div>
          </div>

          <!-- Warranty -->
          <div class="form-group <?php echo e($errors->has('warranty_months') ? ' has-error' : ''); ?>">
            <label for="warranty_months" class="col-md-3 control-label">
              <?php echo e(trans('admin/hardware/form.warranty')); ?>

            </label>
            <div class="col-md-3">
              <div class="input-group">
                <input class="col-md-3 form-control" maxlength="4" type="text" name="warranty_months" id="warranty_months" value="<?php echo e(old('warranty_months')); ?>" />
                <span class="input-group-addon"><?php echo e(trans('admin/hardware/form.months')); ?></span>
                <?php echo $errors->first('warranty_months', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

              </div>
            </div>
          </div>

          <!-- Next audit Date -->
          <div class="form-group <?php echo e($errors->has('next_audit_date') ? ' has-error' : ''); ?>">
            <label for="next_audit_date" class="col-md-3 control-label"><?php echo e(trans('general.next_audit_date')); ?></label>
            <div class="col-md-4">
              <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd"  data-autoclose="true">
                <input type="text" class="form-control" placeholder="<?php echo e(trans('general.select_date')); ?>" name="next_audit_date" id="next_audit_date" value="<?php echo e(old('next_audit_date')); ?>">
                <span class="input-group-addon"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'calendar']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'calendar']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?></span>
              </div>

              <?php echo $errors->first('next_audit_date', '<span class="alert-msg" aria-hidden="true">
                <i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>



            </div>
            <div class="col-md-5">
              <label class="form-control">
                <?php echo e(Form::checkbox('null_next_audit_date', '1', false)); ?>

                <?php echo e(trans_choice('general.set_to_null', count($assets), ['selection_count' => count($assets)])); ?>

              </label>
            </div>
            <div class="col-md-8 col-md-offset-3">
              <p class="help-block"><?php echo trans('general.next_audit_date_help'); ?></p>
            </div>
          </div>

          <!-- Requestable -->
          <div class="form-group <?php echo e($errors->has('requestable') ? ' has-error' : ''); ?>">
            <div class="control-label col-md-3">
              <strong><?php echo e(trans('admin/hardware/form.requestable')); ?></strong>
            </div>
            <div class="col-md-7">
              <label class="form-control">
                <input type="radio" name="requestable" value="1">
                <?php echo e(trans('general.yes')); ?>

              </label>
              <label class="form-control">
                <input type="radio" name="requestable" value="0">
                <?php echo e(trans('general.no')); ?>

              </label>
              <label class="form-control">
                <input type="radio" name="requestable" value="" checked>
                <?php echo e(trans('general.do_not_change')); ?>

              </label>
            </div>
          </div>

          <?php echo $__env->make("models/custom_fields_form_bulk_edit",["models" => $models], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" name="ids[]" value="<?php echo e($asset); ?>">
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div> <!--/.box-body-->

        <div class="text-right box-footer">
          <button type="submit" class="btn btn-success"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'checkmark']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php endif; ?> <?php echo e(trans('general.save')); ?></button>
        </div>
      </div> <!--/.box.box-default-->
    </form>
  </div> <!--/.col-md-8-->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/hardware/bulk.blade.php ENDPATH**/ ?>