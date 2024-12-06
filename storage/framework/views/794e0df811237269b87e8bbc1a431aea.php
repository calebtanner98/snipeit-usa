<?php $__env->startSection('title'); ?>
 <?php echo e(trans('admin/components/general.checkout')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-8">
    <form class="form-horizontal" id="checkout_form" method="post" action="" autocomplete="off">
      <!-- CSRF Token -->
      <?php echo e(csrf_field()); ?>


      <div class="box box-default">
        <?php if($component->id): ?>
        <div class="box-header with-border">
          <div class="box-heading">
            <h2 class="box-title"><?php echo e($component->name); ?>  (<?php echo e($component->numRemaining()); ?>  <?php echo e(trans('admin/components/general.remaining')); ?>)</h2>
          </div>
        </div><!-- /.box-header -->
        <?php endif; ?>

        <div class="box-body">
          <?php if($requestId): ?>
            <!-- Asset -->
            <div id="assigned_asset" class="form-group<?php echo e($errors->has($fieldname ?? 'asset_id') ? ' has-error' : ''); ?>" <?php echo (isset($style)) ? ' style="'.e($style).'"' : ''; ?>>
              <?php echo e(Form::label($fieldname ?? 'asset_id', $translated_name ?? trans('general.select_asset'), ['class' => 'col-md-3 control-label'])); ?>

              <div class="col-md-8<?php echo e(isset($required) && $required == 'true' ? ' required' : ''); ?>">
                  <select name="<?php echo e($fieldname ?? 'asset_id'); ?>" id="assigned_asset_select" class="form-control" style="width: 100%">

                      <!-- Default Option -->
                      <option value=""><?php echo e(trans('general.select_asset')); ?></option>

                      <!-- Populate with assets -->
                      <?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($asset->id); ?>" <?php echo e(old($fieldname ?? 'asset_id') == $asset->id ? 'selected' : ''); ?>>
                              <?php echo e($asset->present()->fullName ?? $asset->name); ?>

                          </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </select>
              </div>
              <?php echo $errors->first($fieldname ?? 'asset_id', '<div class="col-md-8 col-md-offset-3"><span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span></div>'); ?>

            </div>

          <?php else: ?> 
            <!-- Asset -->
            <div id="assigned_asset" class="form-group<?php echo e($errors->has($fieldname) ? ' has-error' : ''); ?>"<?php echo (isset($style)) ? ' style="'.e($style).'"' : ''; ?>>
              <?php echo e(Form::label($fieldname, $translated_name, array('class' => 'col-md-3 control-label'))); ?>

              <div class="col-md-8<?php echo e(((isset($required) && ($required =='true'))) ?  ' required' : ''); ?>">
                  <select class="js-data-ajax select2" data-endpoint="hardware" data-placeholder="<?php echo e(trans('general.select_asset')); ?>" aria-label="<?php echo e($fieldname); ?>" name="<?php echo e($fieldname); ?>" style="width: 100%" id="<?php echo e((isset($select_id)) ? $select_id : 'assigned_asset_select'); ?>"<?php echo e((isset($multiple)) ? ' multiple' : ''); ?><?php echo (!empty($asset_status_type)) ? ' data-asset-status-type="' . $asset_status_type . '"' : ''; ?>>

                      <?php if((!isset($unselect)) && ($asset_id = old($fieldname, (isset($asset) ? $asset->id  : (isset($item) ? $item->{$fieldname} : ''))))): ?>
                          <option value="<?php echo e($asset_id); ?>" selected="selected" role="option" aria-selected="true"  role="option">
                              <?php echo e((\App\Models\Asset::find($asset_id)) ? \App\Models\Asset::find($asset_id)->present()->fullName : ''); ?>

                          </option>
                      <?php else: ?>
                          <?php if(!isset($multiple)): ?>
                              <option value=""  role="option"><?php echo e(trans('general.select_asset')); ?></option>
                          <?php endif; ?>
                      <?php endif; ?>
                  </select>
              </div>
              <?php echo $errors->first($fieldname, '<div class="col-md-8 col-md-offset-3"><span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span></div>'); ?>


            </div>
          <?php endif; ?>

            <div class="form-group <?php echo e($errors->has('assigned_qty') ? ' has-error' : ''); ?>">
              <label for="assigned_qty" class="col-md-3 control-label">
                <?php echo e(trans('general.qty')); ?>

              </label>
              <?php if($requestId): ?>
                <div class="col-md-2 col-sm-5 col-xs-5">
                  <input class="form-control required col-md-12" type="text" name="assigned_qty" id="assigned_qty" value="<?php echo e($checkoutRequest->quantity); ?>" readonly />
                </div>
              <?php else: ?>
                <div class="col-md-2 col-sm-5 col-xs-5">
                  <input class="form-control required col-md-12" type="text" name="assigned_qty" id="assigned_qty" value="<?php echo e(old('assigned_qty') ?? 1); ?>" />
                </div>
              <?php endif; ?>
              <?php if($errors->first('assigned_qty')): ?>
                <div class="col-md-9 col-md-offset-3">
                  <?php echo $errors->first('assigned_qty', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                </div>
              <?php endif; ?>
            </div>
            <!-- Note -->
            <div class="form-group<?php echo e($errors->has('note') ? ' error' : ''); ?>">
              <label for="note" class="col-md-3 control-label"><?php echo e(trans('admin/hardware/form.notes')); ?></label>
              <div class="col-md-7">
                <textarea class="col-md-6 form-control" id="note" name="note"><?php echo e(old('note', $component->note)); ?></textarea>
                <?php echo $errors->first('note', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

              </div>
            </div>


        </div> <!-- .BOX-BODY-->
          <?php if (isset($component)) { $__componentOriginal897bfaf5cfb025541cae5f511fed1c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal897bfaf5cfb025541cae5f511fed1c5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::redirect_submit_options','data' => ['indexRoute' => 'components.index','buttonLabel' => trans('general.checkout'),'options' => [
                                'index' => trans('admin/hardware/form.redirect_to_all', ['type' => trans('general.components')]),
                                'item' => trans('admin/hardware/form.redirect_to_type', ['type' => trans('general.component')]),
                                'target' => trans('admin/hardware/form.redirect_to_checked_out_to'),

                               ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('redirect_submit_options'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['index_route' => 'components.index','button_label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('general.checkout')),'options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                                'index' => trans('admin/hardware/form.redirect_to_all', ['type' => trans('general.components')]),
                                'item' => trans('admin/hardware/form.redirect_to_type', ['type' => trans('general.component')]),
                                'target' => trans('admin/hardware/form.redirect_to_checked_out_to'),

                               ])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal897bfaf5cfb025541cae5f511fed1c5f)): ?>
<?php $attributes = $__attributesOriginal897bfaf5cfb025541cae5f511fed1c5f; ?>
<?php unset($__attributesOriginal897bfaf5cfb025541cae5f511fed1c5f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal897bfaf5cfb025541cae5f511fed1c5f)): ?>
<?php $component = $__componentOriginal897bfaf5cfb025541cae5f511fed1c5f; ?>
<?php unset($__componentOriginal897bfaf5cfb025541cae5f511fed1c5f); ?>
<?php endif; ?>
      </div> <!-- .box-default-->
    </form>
  </div> <!-- .col-md-9-->
</div> <!-- .row -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/components/checkout.blade.php ENDPATH**/ ?>