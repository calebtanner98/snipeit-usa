<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin/hardware/general.checkout')); ?>

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
                <form class="form-horizontal" method="post"
                    action="<?php echo e(route('hardware.checkout.store', ['assetId' => $asset->id, 'request_id' => $checkoutRequest ? $checkoutRequest->id : null])); ?>"
                    autocomplete="off">
                    <div class="box-header with-border">
                        <h2 class="box-title"> <?php echo e(trans('admin/hardware/form.tag')); ?> <?php echo e($asset->asset_tag); ?></h2>
                    </div>
                    <div class="box-body">
                        <?php echo e(csrf_field()); ?>

                        <?php if($asset->company && $asset->company->name): ?>
                            <div class="form-group">
                                <label for="company" class="col-md-3 control-label">
                                    <?php echo e(trans('general.company')); ?>

                                </label>
                                <div class="col-md-8">
                                    <p class="form-control-static">
                                        <?php echo e($asset->company->name); ?>

                                    </p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- AssetModel name -->
                        <div class="form-group">
                            <label for="model" class="col-md-3 control-label">
                                <?php echo e(trans('admin/hardware/form.model')); ?>

                            </label>
                            <div class="col-md-8">
                                <p class="form-control-static">
                                    <?php if($asset->model && $asset->model->name): ?>
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
                            <label for="name" class="col-md-3 control-label">
                                <?php echo e(trans('admin/hardware/form.name')); ?>

                            </label>

                            <div class="col-md-8">
                                <input class="form-control" type="text" name="name" id="name"
                                    value="<?php echo e(old('name', $asset->name)); ?>" tabindex="1">
                                <?php echo $errors->first(
                                    'name',
                                    '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>',
                                ); ?>

                            </div>
                        </div>

                        <!-- Status -->
                        <div class="form-group <?php echo e($errors->has('status_id') ? 'error' : ''); ?>">
                            <label for="status_id" class="col-md-3 control-label">
                                <?php echo e(trans('admin/hardware/form.status')); ?>

                            </label>
                            <div class="col-md-7 required">
                                <?php echo e(Form::select('status_id', $statusLabel_list, $asset->status_id, ['class' => 'select2', 'style' => 'width:100%', '', 'aria-label' => 'status_id'])); ?>

                                <?php echo $errors->first(
                                    'status_id',
                                    '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>',
                                ); ?>

                            </div>
                        </div>

                        <?php echo $__env->make('partials.forms.checkout-selector', [
                            'user_select' => 'true',
                            'asset_select' => 'true',
                            'location_select' => 'true',
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('partials.forms.edit.user-select', [
                            'translated_name' => trans('general.user'),
                            'fieldname' => 'assigned_user',
                            'required' => 'true',
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <!-- We have to pass unselect here so that we don't default to the asset that's being checked out. We want that asset to be pre-selected everywhere else. -->
                        <?php echo $__env->make('partials.forms.edit.asset-select', [
                            'translated_name' => trans('general.asset'),
                            'fieldname' => 'assigned_asset',
                            'unselect' => 'true',
                            'style' => 'display:none;',
                            'required' => 'true',
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('partials.forms.edit.location-select', [
                            'translated_name' => trans('general.location'),
                            'fieldname' => 'assigned_location',
                            'style' => 'display:none;',
                            'required' => 'true',
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                        <!-- Checkout/Checkin Date -->
                        <div class="form-group <?php echo e($errors->has('checkout_at') ? 'error' : ''); ?>">
                            <label for="checkout_at" class="col-md-3 control-label">
                                <?php echo e(trans('admin/hardware/form.checkout_date')); ?>

                            </label>
                            <div class="col-md-8">
                                <div class="input-group date col-md-7" data-provide="datepicker"
                                    data-date-format="yyyy-mm-dd" data-date-end-date="0d" data-date-clear-btn="true">
                                    <input type="text" class="form-control"
                                        placeholder="<?php echo e(trans('general.select_date')); ?>" name="checkout_at"
                                        id="checkout_at" value="<?php echo e(old('checkout_at', date('Y-m-d'))); ?>">
                                    <span class="input-group-addon">
                                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
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
                                <?php echo $errors->first(
                                    'checkout_at',
                                    '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>',
                                ); ?>

                            </div>
                        </div>

                        <!-- Expected Checkin Date -->
                        <div class="form-group <?php echo e($errors->has('expected_checkin') ? 'error' : ''); ?>">
                            <label for="expected_checkin" class="col-md-3 control-label">
                                <?php echo e(trans('admin/hardware/form.expected_checkin')); ?>

                            </label>

                            <div class="col-md-8">
                                <div class="input-group date col-md-7" data-provide="datepicker"
                                    data-date-format="yyyy-mm-dd" data-date-start-date="0d" data-date-clear-btn="true">
                                    <input type="text" class="form-control"
                                        placeholder="<?php echo e(trans('general.select_date')); ?>" name="expected_checkin"
                                        id="expected_checkin" value="<?php echo e(old('expected_checkin')); ?>">
                                    <span class="input-group-addon">
                                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
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
<?php endif; ?>
                                    </span>
                                </div>
                                <?php echo $errors->first(
                                    'expected_checkin',
                                    '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>',
                                ); ?>

                            </div>
                        </div>

                        <!-- Note -->
                        <div class="form-group <?php echo e($errors->has('note') ? 'error' : ''); ?>">
                            <label for="note" class="col-md-3 control-label">
                                <?php echo e(trans('general.notes')); ?>

                            </label>
                            <div class="col-md-8">
                                <textarea class="col-md-6 form-control" id="note" name="note"><?php echo e(old('note', $asset->note)); ?></textarea>
                                <?php echo $errors->first(
                                    'note',
                                    '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>',
                                ); ?>

                            </div>
                        </div>

                        <?php if($asset->requireAcceptance() || $asset->getEula() || $snipeSettings->webhook_endpoint != ''): ?>
                            <div class="form-group notification-callout">
                                <div class="col-md-8 col-md-offset-3">
                                    <div class="callout callout-info">

                                        <?php if($asset->requireAcceptance()): ?>
                                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '0bc333070fe8fbc263fd4a4e307b8773::icon','data' => ['type' => 'email']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'email']); ?>
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
                                            <?php echo e(trans('admin/categories/general.required_acceptance')); ?>

                                            <br>
                                        <?php endif; ?>

                                        <?php if($asset->getEula()): ?>
                                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '0bc333070fe8fbc263fd4a4e307b8773::icon','data' => ['type' => 'email']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'email']); ?>
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
                                            <?php echo e(trans('admin/categories/general.required_eula')); ?>

                                            <br>
                                        <?php endif; ?>

                                        <?php if($snipeSettings->webhook_endpoint != ''): ?>
                                            <i class="fab fa-slack" aria-hidden="true"></i>
                                            <?php echo e(trans('general.webhook_msg_note')); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div> <!--/.box-body-->

                    <?php if (isset($component)) { $__componentOriginal897bfaf5cfb025541cae5f511fed1c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal897bfaf5cfb025541cae5f511fed1c5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '0bc333070fe8fbc263fd4a4e307b8773::redirect_submit_options','data' => ['indexRoute' => 'hardware.index','buttonLabel' => trans('general.checkout'),'disabledSelect' => !$asset->model,'options' => [
                            'index' => trans('admin/hardware/form.redirect_to_all', [
                                'type' => trans('general.assets'),
                            ]),
                            'item' => trans('admin/hardware/form.redirect_to_type', ['type' => trans('general.asset')]),
                            'target' => trans('admin/hardware/form.redirect_to_checked_out_to'),
                        ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('redirect_submit_options'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['index_route' => 'hardware.index','button_label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('general.checkout')),'disabled_select' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!$asset->model),'options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                            'index' => trans('admin/hardware/form.redirect_to_all', [
                                'type' => trans('general.assets'),
                            ]),
                            'item' => trans('admin/hardware/form.redirect_to_type', ['type' => trans('general.asset')]),
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

                </form>
            </div>
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

    <script>
        //        $('#checkout_at').datepicker({
        //            clearBtn: true,
        //            todayHighlight: true,
        //            endDate: '0d',
        //            format: 'yyyy-mm-dd'
        //        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/test-deploy/resources/views/hardware/checkout.blade.php ENDPATH**/ ?>