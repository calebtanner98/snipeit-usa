<?php $__env->startSection('title'); ?>
     <?php echo e(trans('admin/accessories/general.checkin')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
    <a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary pull-right">
        <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>



    <div class="row">
        <div class="col-md-7">
            <form class="form-horizontal" method="post" action="" autocomplete="off">
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

                <div class="box box-default">
                    <?php if($accessory->id): ?>
                        <div class="box-header with-border">
                            <h2 class="box-title"><?php echo e($accessory->name); ?></h2>
                        </div><!-- /.box-header -->
                    <?php endif; ?>

                            <div class="box-body">
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

                                    <?php if($accessory->name): ?>
                                    <!-- accessory name -->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">
                                            <?php echo e(trans('admin/hardware/form.name')); ?>

                                        </label>
                                        <div class="col-md-6">
                                          <p class="form-control-static"><?php echo e($accessory->name); ?></p>
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
                            <!-- Checkout/Checkin Date -->
                            <div class="form-group<?php echo e($errors->has('checkin_at') ? ' has-error' : ''); ?>">
                                <label for="checkin_at" class="col-md-3 control-label">
                                    <?php echo e(trans('admin/hardware/form.checkin_date')); ?>

                                </label>
                                <div class="col-md-7">
                                    <div class="input-group col-md-5 required" style="padding-left: 0px;">
                                        <div class="input-group date" data-date-clear-btn="true" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-end-date="0d" data-autoclose="true">
                                            <input type="text" class="form-control" placeholder="<?php echo e(trans('general.select_date')); ?>" name="checkin_at" id="checkin_at" value="<?php echo e(old('checkin_at', date('Y-m-d'))); ?>">
                                            <span class="input-group-addon"><i class="fas fa-calendar"></i></span>
                                        </div>
                                        <?php echo $errors->first('checkin_at', '<span class="alert-msg"><i class="fas fa-times"></i> :message</span>'); ?>

                                    </div>
                                </div>
                            </div>

                              </div>
                        <?php if (isset($component)) { $__componentOriginal897bfaf5cfb025541cae5f511fed1c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal897bfaf5cfb025541cae5f511fed1c5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '0bc333070fe8fbc263fd4a4e307b8773::redirect_submit_options','data' => ['indexRoute' => 'accessories.index','buttonLabel' => trans('general.checkin'),'options' => [
                                'index' => trans('admin/hardware/form.redirect_to_all', ['type' => trans('general.accessories')]),
                                'item' => trans('admin/hardware/form.redirect_to_type', ['type' => trans('general.accessory')]),

                               ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('redirect_submit_options'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['index_route' => 'accessories.index','button_label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('general.checkin')),'options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                                'index' => trans('admin/hardware/form.redirect_to_all', ['type' => trans('general.accessories')]),
                                'item' => trans('admin/hardware/form.redirect_to_type', ['type' => trans('general.accessory')]),

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


                </div> <!-- .box.box-default -->
            </form>
        </div> <!-- .col-md-9-->
    </div> <!-- .row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/test-deploy/resources/views/accessories/checkin.blade.php ENDPATH**/ ?>