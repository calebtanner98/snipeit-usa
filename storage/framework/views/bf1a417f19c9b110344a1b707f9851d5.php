<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin/hardware/general.checkin')); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <style>

        .input-group {
            padding-left: 0px !important;
        }
    </style>


    <div class="row"><!-- .row -->
        <!-- left column -->
        <div class="col-md-7 col-sm-11 col-xs-12 col-md-offset-2">
            <div class="box box-default"><!-- .box-default -->
                <div class="box-header with-border"><!-- .box-header -->
                    <h2 class="box-title">
                        <?php echo e(trans('admin/hardware/form.tag')); ?>

                        <?php echo e($asset->asset_tag); ?>

                    </h2>
                </div><!-- /.box-header -->

                <div class="box-body"><!-- .box-body -->
                    <div class="col-md-12"><!-- .col-md-12 -->

                        <?php if($backto == 'user'): ?>
                            <form class="form-horizontal" method="post"
                                  action="<?php echo e(route('hardware.checkin.store', array('assetId'=> $asset->id, 'backto'=>'user'))); ?>"
                                  autocomplete="off">
                                <?php else: ?>
                                    <form class="form-horizontal" method="post"
                                          action="<?php echo e(route('hardware.checkin.store', array('assetId'=> $asset->id))); ?>"
                                          autocomplete="off">
                                        <?php endif; ?>
                                        <?php echo e(csrf_field()); ?>


                                        <!-- AssetModel name -->
                                        <div class="form-group">
                                            <label for="model" class="col-sm-3 control-label">
                                                <?php echo e(trans('admin/hardware/form.model')); ?>

                                            </label>
                                            <div class="col-md-8">

                                                <p class="form-control-static">
                                                    <?php if(($asset->model) && ($asset->model->name)): ?>
                                                        <?php echo e($asset->model->name); ?>

                                                    <?php else: ?>
                                                        <span class="text-danger text-bold">
                              <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '0bc333070fe8fbc263fd4a4e307b8773::icon','data' => ['type' => 'warning']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'warning']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                              <?php echo e(trans('admin/hardware/general.model_invalid')); ?>

                            </span>
                                                        <?php echo e(trans('admin/hardware/general.model_invalid_fix')); ?>

                                                        <a href="<?php echo e(route('hardware.edit', $asset->id)); ?>">
                                                            <strong><?php echo e(trans('admin/hardware/general.edit')); ?></strong>
                                                        </a>
                                                    <?php endif; ?>
                                                </p>

                                            </div>
                                        </div>

                                        <!-- Asset Name -->
                                        <div class="form-group <?php echo e($errors->has('name') ? 'error' : ''); ?>">
                                            <label for="name" class="col-sm-3 control-label">
                                                <?php echo e(trans('general.name')); ?>

                                            </label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" name="name" aria-label="name"
                                                       id="name" value="<?php echo e(old('name', $asset->name)); ?>"/>
                                                <?php echo $errors->first('name', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                                            </div>
                                        </div>

                                        <!-- Status -->
                                        <div class="form-group <?php echo e($errors->has('status_id') ? 'error' : ''); ?>">
                                            <label for="status_id" class="col-sm-3 control-label">
                                                <?php echo e(trans('admin/hardware/form.status')); ?>

                                            </label>
                                            <div class="col-md-8 required">
                                                <?php echo e(Form::select('status_id', $statusLabel_list, '', array('class'=>'select2', 'style'=>'width:100%','id' =>'modal-statuslabel_types', 'aria-label'=>'status_id'))); ?>

                                                <?php echo $errors->first('status_id', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                                            </div>
                                        </div>

                                        <?php echo $__env->make('partials.forms.edit.location-select', ['translated_name' => trans('general.location'), 'fieldname' => 'location_id', 'help_text' => ($asset->defaultLoc) ? trans('general.checkin_to_diff_location', ['default_location' => $asset->defaultLoc->name]) : null, 'hide_location_radio' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                        <!-- Checkout/Checkin Date -->
                                        <div class="form-group<?php echo e($errors->has('checkin_at') ? ' has-error' : ''); ?>">
                                            <label for="checkin_at" class="col-sm-3 control-label">
                                                <?php echo e(trans('admin/hardware/form.checkin_date')); ?>

                                            </label>

                                            <div class="col-md-8">
                                                <div class="input-group col-md-5 required">
                                                    <div class="input-group date" data-provide="datepicker"
                                                         data-date-format="yyyy-mm-dd" data-autoclose="true">
                                                        <input type="text" class="form-control"
                                                               placeholder="<?php echo e(trans('general.select_date')); ?>"
                                                               name="checkin_at" id="checkin_at"
                                                               value="<?php echo e(old('checkin_at', date('Y-m-d'))); ?>">
                                                        <span class="input-group-addon"><i class="fas fa-calendar"
                                                                                           aria-hidden="true"></i></span>
                                                    </div>
                                                    <?php echo $errors->first('checkin_at', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- Note -->
                                        <div class="form-group <?php echo e($errors->has('note') ? 'error' : ''); ?>">
                                            <label for="note" class="col-sm-3 control-label">
                                                <?php echo e(trans('general.notes')); ?>

                                            </label>
                                            <div class="col-md-8">
                                                <textarea class="col-md-6 form-control" id="note"
                                                          name="note"><?php echo e(old('note', $asset->note)); ?></textarea>
                                                <?php echo $errors->first('note', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                                            </div>
                                        </div>
                    </div> <!--/.box-body-->
                </div> <!--/.box-body-->

                <?php if (isset($component)) { $__componentOriginal897bfaf5cfb025541cae5f511fed1c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal897bfaf5cfb025541cae5f511fed1c5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '0bc333070fe8fbc263fd4a4e307b8773::redirect_submit_options','data' => ['indexRoute' => 'hardware.index','buttonLabel' => trans('general.checkin'),'disabledSelect' => !$asset->model,'options' => [
                                'index' => trans('admin/hardware/form.redirect_to_all', ['type' => trans('general.assets')]),
                                'item' => trans('admin/hardware/form.redirect_to_type', ['type' => trans('general.asset')]),
                               ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('redirect_submit_options'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['index_route' => 'hardware.index','button_label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('general.checkin')),'disabled_select' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!$asset->model),'options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                                'index' => trans('admin/hardware/form.redirect_to_all', ['type' => trans('general.assets')]),
                                'item' => trans('admin/hardware/form.redirect_to_type', ['type' => trans('general.asset')]),
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
                </form>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/test-deploy/resources/views/hardware/checkin.blade.php ENDPATH**/ ?>