<?php $__env->startSection('title'); ?>
     <?php echo e(trans('admin/hardware/general.bulk_checkout')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<style>
  .input-group {
    padding-left: 0px !important;
  }
</style>


<div class="row">
  <!-- left column -->
  <div class="col-md-7">
    <div class="box box-default">
      <div class="box-header with-border">
        <h2 class="box-title"> <?php echo e(trans('admin/hardware/form.tag')); ?> </h2>
      </div>
      <div class="box-body">
        <form class="form-horizontal" method="post" action="" autocomplete="off">
          <?php echo e(csrf_field()); ?>


          <!-- Checkout selector -->
          <?php echo $__env->make('partials.forms.checkout-selector', ['user_select' => 'true','asset_select' => 'true', 'location_select' => 'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <?php echo $__env->make('partials.forms.edit.user-select', ['translated_name' => trans('general.user'), 'fieldname' => 'assigned_user', 'required'=>'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php echo $__env->make('partials.forms.edit.asset-select', ['translated_name' => trans('general.asset'), 'fieldname' => 'assigned_asset', 'unselect' => 'true', 'style' => 'display:none;', 'required'=>'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php echo $__env->make('partials.forms.edit.location-select', ['translated_name' => trans('general.location'), 'fieldname' => 'assigned_location', 'style' => 'display:none;', 'required'=>'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <!-- Checkout/Checkin Date -->
              <div class="form-group <?php echo e($errors->has('checkout_at') ? 'error' : ''); ?>">
                  <label for="checkout_at" class="col-sm-3 control-label">
                      <?php echo e(trans('admin/hardware/form.checkout_date')); ?>

                  </label>
                  <div class="col-md-8">
                      <div class="input-group date col-md-5" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-end-date="0d" data-date-clear-btn="true">
                          <input type="text" class="form-control" placeholder="<?php echo e(trans('general.select_date')); ?>" name="checkout_at" id="checkout_at" value="<?php echo e(old('checkout_at')); ?>">
                          <span class="input-group-addon"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '0bc333070fe8fbc263fd4a4e307b8773::icon','data' => ['type' => 'calendar']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                      <?php echo $errors->first('checkout_at', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                  </div>
              </div>

              <!-- Expected Checkin Date -->
              <div class="form-group <?php echo e($errors->has('expected_checkin') ? 'error' : ''); ?>">
                  <label for="expected_checkin" class="col-sm-3 control-label">
                      <?php echo e(trans('admin/hardware/form.expected_checkin')); ?>

                  </label>
                  <div class="col-md-8">
                      <div class="input-group date col-md-5" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-start-date="0d" data-date-clear-btn="true">
                          <input type="text" class="form-control" placeholder="<?php echo e(trans('general.select_date')); ?>" name="expected_checkin" id="expected_checkin" value="<?php echo e(old('expected_checkin')); ?>">
                          <span class="input-group-addon"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '0bc333070fe8fbc263fd4a4e307b8773::icon','data' => ['type' => 'calendar']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
              </div>


          <!-- Note -->
          <div class="form-group <?php echo e($errors->has('note') ? 'error' : ''); ?>">
              <label for="note" class="col-sm-3 control-label">
                  <?php echo e(trans('general.notes')); ?>

              </label>
            <div class="col-md-8">
              <textarea class="col-md-6 form-control" id="note" name="note"><?php echo e(old('note')); ?></textarea>
              <?php echo $errors->first('note', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

            </div>
          </div>

          <?php echo $__env->make('partials.forms.edit.asset-select', [
            'translated_name' => trans('general.assets'),
            'fieldname' => 'selected_assets[]',
            'multiple' => true,
            'asset_status_type' => 'RTD',
            'select_id' => 'assigned_assets_select',
          ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


      </div> <!--./box-body-->
      <div class="box-footer">
        <a class="btn btn-link" href="<?php echo e(URL::previous()); ?>"> <?php echo e(trans('button.cancel')); ?></a>
        <button type="submit" class="btn btn-primary pull-right"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
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
<?php endif; ?> <?php echo e(trans('general.checkout')); ?></button>
      </div>
    </div>
      </form>
  </div> <!--/.col-md-7-->

  <!-- right column -->
  <div class="col-md-5" id="current_assets_box" style="display:none;">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h2 class="box-title"><?php echo e(trans('admin/users/general.current_assets')); ?></h2>
      </div>
      <div class="box-body">
        <div id="current_assets_content">
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials/assets-assigned', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/test-deploy/resources/views/hardware/bulk-checkout.blade.php ENDPATH**/ ?>