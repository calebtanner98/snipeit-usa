<?php $__env->startSection('title'); ?>
    <?php echo e(trans('general.audit')); ?>

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
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-default">

                <?php echo e(Form::open([
                  'method' => 'POST',
                  'route' => ['asset.audit.store', $asset->id],
                  'files' => true,
                  'class' => 'form-horizontal' ])); ?>


                    <div class="box-header with-border">
                        <h2 class="box-title"> <?php echo e(trans('admin/hardware/form.tag')); ?> <?php echo e($asset->asset_tag); ?></h2>
                    </div>
                    <div class="box-body">
                    <?php echo e(csrf_field()); ?>


                        <!-- Asset model -->
                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <label class="col-sm-3 control-label">
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'warning']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-sm-3 control-label">
                                <?php echo e(trans('general.name')); ?>

                            </label>
                            <div class="col-md-8">
                                <p class="form-control-static"><?php echo e($asset->name); ?></p>
                            </div>
                        </div>

                        <!-- Locations -->
                    <?php echo $__env->make('partials.forms.edit.location-select', ['translated_name' => trans('general.location'), 'fieldname' => 'location_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!-- Update location -->
                        <div class="form-group">

                            <div class="col-md-8 col-md-offset-3">
                                <label class="form-control">
                                    <input type="checkbox" value="1" name="update_location" <?php echo e(old('update_location') == '1' ? ' checked="checked"' : ''); ?>> <?php echo e(trans('admin/hardware/form.asset_location')); ?>

                                </label>
                                <p class="help-block"><?php echo trans('help.audit_help'); ?></p>
                            </div>

                        </div>


                        <!-- Show last audit date -->
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                <?php echo e(trans('general.last_audit')); ?>

                            </label>
                            <div class="col-md-8">

                                <p class="form-control-static">
                                    <?php if($asset->last_audit_date): ?>
                                        <?php echo e(Helper::getFormattedDateObject($asset->last_audit_date, 'datetime', false)); ?>

                                    <?php else: ?>
                                        <?php echo e(trans('admin/settings/general.none')); ?>

                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>


                        <!-- Next Audit -->
                        <div class="form-group<?php echo e($errors->has('next_audit_date') ? ' has-error' : ''); ?>">
                            <label for="next_audit_date" class="col-sm-3 control-label">
                                <?php echo e(trans('general.next_audit_date')); ?>

                            </label>
                            <div class="col-md-8">
                                <div class="input-group date col-md-5" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-clear-btn="true">
                                    <input type="text" class="form-control" placeholder="<?php echo e(trans('general.next_audit_date')); ?>" name="next_audit_date" id="next_audit_date" value="<?php echo e(old('next_audit_date', $next_audit_date)); ?>">
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
                                <?php echo $errors->first('next_audit_date', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                                 <p class="help-block"><?php echo trans('general.next_audit_date_help'); ?></p>
                            </div>
                        </div>


                        <!-- Note -->
                        <div class="form-group<?php echo e($errors->has('note') ? ' has-error' : ''); ?>">
                            <label for="note" class="col-sm-3 control-label">
                                <?php echo e(trans('general.notes')); ?>

                            </label>
                            <div class="col-md-8">
                                <textarea class="col-md-6 form-control" id="note" name="note"><?php echo e(old('note', $asset->note)); ?></textarea>
                                <?php echo $errors->first('note', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                            </div>
                        </div>

                        <!-- Audit Image -->
                        <?php echo $__env->make('partials.forms.edit.image-upload', ['help_text' => trans('general.audit_images_help')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                    </div> <!--/.box-body-->
                    <div class="box-footer">
                        <a class="btn btn-link" href="<?php echo e(URL::previous()); ?>"> <?php echo e(trans('button.cancel')); ?></a>
                        <button type="submit" class="btn btn-success pull-right<?php echo e((!$asset->model ? ' disabled' : '')); ?>"<?php echo (!$asset->model ? ' data-tooltip="true" title="'.trans('admin/hardware/general.model_invalid_fix').'" disabled' : ''); ?>>
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
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
<?php endif; ?>
                            <?php echo e(trans('general.audit')); ?>

                        </button>
                    </div>
                </form>
            </div>
        </div> <!--/.col-md-7-->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/hardware/audit.blade.php ENDPATH**/ ?>