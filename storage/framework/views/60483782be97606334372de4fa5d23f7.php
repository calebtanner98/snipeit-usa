<?php $__env->startSection('title'); ?>
     <?php echo e(trans('admin/licenses/general.checkin')); ?>

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
            <form class="form-horizontal" method="post" action="<?php echo e(route('licenses.checkin.save', ['licenseId'=>$licenseSeat->id, 'backTo'=>$backto] )); ?>" autocomplete="off">
                <?php echo e(csrf_field()); ?>


                <div class="box box-default">
                    <div class="box-header with-border">
                        <h2 class="box-title"> <?php echo e($licenseSeat->license->name); ?></h2>
                    </div>
                    <div class="box-body">

            <!-- license name -->
            <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo e(trans('admin/hardware/form.name')); ?></label>
                <div class="col-md-6">
                    <p class="form-control-static"><?php echo e($licenseSeat->license->name); ?></p>
                </div>
            </div>

            <!-- Serial -->
            <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo e(trans('admin/licenses/form.license_key')); ?></label>
                <div class="col-md-6">
                    <p class="form-control-static">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewKeys', $licenseSeat->license)): ?>
                            <?php echo e($licenseSeat->license->serial); ?>

                        <?php else: ?>
                            ------------
                        <?php endif; ?>
                        </p>
                </div>
            </div>

            <!-- Note -->
            <div class="form-group <?php echo e($errors->has('notes') ? 'error' : ''); ?>">
                <label for="note" class="col-md-2 control-label"><?php echo e(trans('admin/hardware/form.notes')); ?></label>
                <div class="col-md-7">
                    <textarea class="col-md-6 form-control" id="notes" name="notes"></textarea>
                    <?php echo $errors->first('notes', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                </div>
            </div>
                        <?php if (isset($component)) { $__componentOriginal897bfaf5cfb025541cae5f511fed1c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal897bfaf5cfb025541cae5f511fed1c5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '0bc333070fe8fbc263fd4a4e307b8773::redirect_submit_options','data' => ['indexRoute' => 'licenses.index','buttonLabel' => trans('general.checkin'),'options' => [
                                'index' => trans('admin/hardware/form.redirect_to_all', ['type' => trans('general.licenses')]),
                                'item' => trans('admin/hardware/form.redirect_to_type', ['type' => trans('general.license')]),
                               ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('redirect_submit_options'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['index_route' => 'licenses.index','button_label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('general.checkin')),'options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                                'index' => trans('admin/hardware/form.redirect_to_all', ['type' => trans('general.licenses')]),
                                'item' => trans('admin/hardware/form.redirect_to_type', ['type' => trans('general.license')]),
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

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/test-deploy/resources/views/licenses/checkin.blade.php ENDPATH**/ ?>