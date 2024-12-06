<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin/components/general.checkin')); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header_right'); ?>
    <a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary pull-right">
        <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- left column -->
        <div class="col-md-7">
            <form class="form-horizontal" method="post" action="<?php echo e(route('components.checkin.store', [$component_assets->id, 'backto' => 'asset'])); ?>" autocomplete="off">
                <?php echo e(csrf_field()); ?>


                <div class="box box-default">
                    <div class="box-header with-border">
                        <h2 class="box-title"> <?php echo e($component->name); ?></h2>
                    </div>
                    <div class="box-body">

                        <!-- Checked out to -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><?php echo e(trans('general.checkin_from')); ?></label>
                            <div class="col-md-6">
                                <p class="form-control-static"><?php echo e($asset->present()->fullName); ?></p>
                            </div>
                        </div>


                        <!-- Qty -->
                        <div class="form-group <?php echo e($errors->has('checkin_qty') ? 'error' : ''); ?>">
                            <label for="checkin_qty" class="col-md-2 control-label"><?php echo e(trans('general.qty')); ?></label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="checkin_qty" aria-label="checkin_qty" value="<?php echo e(old('assigned_qty', $component_assets->assigned_qty)); ?>">
                            </div>
                            <div class="col-md-9 col-md-offset-2">
                            <p class="help-block"><?php echo e(trans('admin/components/general.checkin_limit', ['assigned_qty' => $component_assets->assigned_qty])); ?></p>
                            <?php echo $errors->first('checkin_qty', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i>
                            :message</span>'); ?>

                            </div>
                        </div>

                        <!-- Note -->
                        <div class="form-group <?php echo e($errors->has('note') ? 'error' : ''); ?>">
                            <label for="note" class="col-md-2 control-label"><?php echo e(trans('admin/hardware/form.notes')); ?></label>
                            <div class="col-md-7">
                                <textarea class="col-md-6 form-control" id="note" name="note"><?php echo e(old('note', $component->note)); ?></textarea>
                                <?php echo $errors->first('note', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                            </div>
                        </div>
                        <?php if (isset($component)) { $__componentOriginal897bfaf5cfb025541cae5f511fed1c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal897bfaf5cfb025541cae5f511fed1c5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::redirect_submit_options','data' => ['indexRoute' => 'components.index','buttonLabel' => trans('general.checkin'),'options' => [
                                'index' => trans('admin/hardware/form.redirect_to_all', ['type' => trans('general.components')]),
                                'item' => trans('admin/hardware/form.redirect_to_type', ['type' => trans('general.component')]),
                               ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('redirect_submit_options'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['index_route' => 'components.index','button_label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('general.checkin')),'options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                                'index' => trans('admin/hardware/form.redirect_to_all', ['type' => trans('general.components')]),
                                'item' => trans('admin/hardware/form.redirect_to_type', ['type' => trans('general.component')]),
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
                    </div> <!-- /.box-->
            </form>
        </div> <!-- /.col-md-7-->
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/components/checkin.blade.php ENDPATH**/ ?>