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
          <!-- Asset -->
            <?php echo $__env->make('partials.forms.edit.asset-select', ['translated_name' => trans('general.select_asset'), 'fieldname' => 'asset_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="form-group <?php echo e($errors->has('assigned_qty') ? ' has-error' : ''); ?>">
              <label for="assigned_qty" class="col-md-3 control-label">
                <?php echo e(trans('general.qty')); ?>

              </label>
              <div class="col-md-2 col-sm-5 col-xs-5">
                <input class="form-control required col-md-12" type="text" name="assigned_qty" id="assigned_qty" value="<?php echo e(old('assigned_qty') ?? 1); ?>" />
              </div>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '0bc333070fe8fbc263fd4a4e307b8773::redirect_submit_options','data' => ['indexRoute' => 'components.index','buttonLabel' => trans('general.checkout'),'options' => [
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

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/test-deploy/resources/views/components/checkout.blade.php ENDPATH**/ ?>