<?php $__env->startSection('title'); ?>
     <?php echo e(trans('admin/accessories/general.checkout')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary pull-right">
  <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>


<div class="row">
  <div class="col-md-9">
    <form class="form-horizontal" id="checkout_form" method="post" action="" autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

    <div class="box box-default">
      <?php if($accessory->id): ?>
        <div class="box-header with-border">
          <h2 class="box-title"><?php echo e($accessory->name); ?></h2>
        </div><!-- /.box-header -->
      <?php endif; ?>

       <div class="box-body">
         <?php if($accessory->name): ?>
          <!-- accessory name -->
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo e(trans('admin/accessories/general.accessory_name')); ?></label>
            <div class="col-md-6">
              <p class="form-control-static"><?php echo e($accessory->name); ?></p>
            </div>
          </div>
          <?php endif; ?>

          <?php if($accessory->category): ?>
          <!-- accessory name -->
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo e(trans('admin/accessories/general.accessory_category')); ?></label>
            <div class="col-md-6">
              <p class="form-control-static"><?php echo e($accessory->category->name); ?></p>
            </div>
          </div>
          <?php endif; ?>

             <!-- total -->
             <div class="form-group">
                 <label class="col-sm-3 control-label"><?php echo e(trans('admin/components/general.total')); ?></label>
                 <div class="col-md-6">
                     <p class="form-control-static"><?php echo e($accessory->qty); ?></p>
                 </div>
             </div>

             <!-- remaining -->
             <div class="form-group">
                 <label class="col-sm-3 control-label"><?php echo e(trans('admin/components/general.remaining')); ?></label>
                 <div class="col-md-6">
                     <p class="form-control-static"><?php echo e($accessory->numRemaining()); ?></p>
                 </div>
             </div>
          <!-- User -->

          <?php echo $__env->make('partials.forms.edit.user-select', ['translated_name' => trans('general.select_user'), 'fieldname' => 'assigned_user', 'required'=> 'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


             <!-- Checkout QTY -->
             <div class="form-group <?php echo e($errors->has('checkout_qty') ? 'error' : ''); ?> ">
                 <label for="checkout_qty" class="col-md-3 control-label"><?php echo e(trans('general.qty')); ?></label>
                 <div class="col-md-7 col-sm-12 required">
                     <div class="col-md-2" style="padding-left:0px">
                         <input class="form-control" type="number" name="checkout_qty" id="checkout_qty" value="<?php echo e(old('checkout_qty', 1)); ?>" min="1" max="<?php echo e($accessory->numRemaining()); ?>" />
                     </div>
                 </div>
                 <?php echo $errors->first('checkout_qty', '<div class="col-md-8 col-md-offset-3"><span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span></div>'); ?>

             </div>


             <?php if($accessory->requireAcceptance() || $accessory->getEula() || ($snipeSettings->webhook_endpoint!='')): ?>
                 <div class="form-group notification-callout">
                     <div class="col-md-8 col-md-offset-3">
                         <div class="callout callout-info">

                             <?php if($accessory->requireAcceptance()): ?>
                                 <i class="far fa-envelope"></i>
                                 <?php echo e(trans('admin/categories/general.required_acceptance')); ?>

                                 <br>
                             <?php endif; ?>

                             <?php if($accessory->getEula()): ?>
                                 <i class="far fa-envelope"></i>
                                 <?php echo e(trans('admin/categories/general.required_eula')); ?>

                                 <br>
                             <?php endif; ?>

                             <?php if($snipeSettings->webhook_endpoint!=''): ?>
                                 <i class="fab fa-slack"></i>
                                 <?php echo e(trans('general.webhook_msg_note')); ?>

                             <?php endif; ?>
                         </div>
                     </div>
                 </div>
             <?php endif; ?>
          <!-- Note -->
          <div class="form-group <?php echo e($errors->has('note') ? 'error' : ''); ?>">
            <label for="note" class="col-md-3 control-label"><?php echo e(trans('admin/hardware/form.notes')); ?></label>
            <div class="col-md-7">
              <textarea class="col-md-6 form-control" id="note" name="note"><?php echo e(old('note', $accessory->note)); ?></textarea>
              <?php echo $errors->first('note', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

            </div>
          </div>
       </div>
       <?php if( $request_id ): ?>
        <?php if (isset($component)) { $__componentOriginal897bfaf5cfb025541cae5f511fed1c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal897bfaf5cfb025541cae5f511fed1c5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '0bc333070fe8fbc263fd4a4e307b8773::redirect_submit_options','data' => ['indexRoute' => 'assets.requested','buttonLabel' => trans('general.checkout')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('redirect_submit_options'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['index_route' => 'assets.requested','button_label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('general.checkout'))]); ?>
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
       <?php else: ?> 
        <?php if (isset($component)) { $__componentOriginal897bfaf5cfb025541cae5f511fed1c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal897bfaf5cfb025541cae5f511fed1c5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '0bc333070fe8fbc263fd4a4e307b8773::redirect_submit_options','data' => ['indexRoute' => 'accessories.index','buttonLabel' => trans('general.checkout'),'options' => [
              'index' => trans('admin/hardware/form.redirect_to_all', ['type' => trans('general.accessories')]),
              'item' => trans('admin/hardware/form.redirect_to_type', ['type' => trans('general.accessory')]),
              'target' => trans('admin/hardware/form.redirect_to_checked_out_to'),
 
              ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('redirect_submit_options'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['index_route' => 'accessories.index','button_label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('general.checkout')),'options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
              'index' => trans('admin/hardware/form.redirect_to_all', ['type' => trans('general.accessories')]),
              'item' => trans('admin/hardware/form.redirect_to_type', ['type' => trans('general.accessory')]),
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
       <?php endif; ?>
    </div> <!-- .box.box-default -->
  </form>
  </div> <!-- .col-md-9-->
</div> <!-- .row -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/test-deploy/resources/views/accessories/checkout.blade.php ENDPATH**/ ?>