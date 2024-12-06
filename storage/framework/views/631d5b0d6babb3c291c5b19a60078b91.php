<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin/components/general.checkout')); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<meta name="user-id" content="<?php echo e($checkoutRequest->user->id); ?>">

    <div class="row">
        <div class="col-md-8">
            <form class="form-horizontal" id="checkout_form" method="post" action="" autocomplete="off">
                <!-- CSRF Token -->
                <?php echo e(csrf_field()); ?>


                <div class="box box-default">
                    <?php if($component->id): ?>
                        <div class="box-header with-border">
                            <div class="box-heading">
                                <h2 class="box-title"><?php echo e($component->name); ?> (<?php echo e($component->numRemaining()); ?>

                                    <?php echo e(trans('admin/components/general.remaining')); ?>)</h2>
                            </div>
                        </div><!-- /.box-header -->
                    <?php endif; ?>

                    <div class="box-body">
                        <?php
                        $fieldname = 'asset_id';
                        $translated_name = "Select Asset";
                        ?>

                        <!-- Asset -->
                        <div id="assigned_asset" class="form-group<?php echo e($errors->has($fieldname) ? ' has-error' : ''); ?>"<?php echo (isset($style)) ? ' style="'.e($style).'"' : ''; ?>>
                            <?php echo e(Form::label($fieldname, $translated_name, array('class' => 'col-md-3 control-label'))); ?>

                            <div class="col-md-8<?php echo e(((isset($required) && ($required =='true'))) ?  ' required' : ''); ?>">
                                <select class="js-data-ajax select2" data-endpoint="hardware" data-placeholder="<?php echo e(trans('general.select_asset')); ?>"
                                aria-label="<?php echo e($fieldname); ?>" name="<?php echo e($fieldname); ?>" style="width: 100%" id="assigned_asset_select">
                        </select>
                            </div>
                            <?php echo $errors->first($fieldname, '<div class="col-md-8 col-md-offset-3"><span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span></div>'); ?>

                        </div>

                        <div class="form-group <?php echo e($errors->has('assigned_qty') ? ' has-error' : ''); ?>">
                            <label for="assigned_qty" class="col-md-3 control-label">
                                <?php echo e(trans('general.qty')); ?>

                            </label>
                            <div class="col-md-2 col-sm-5 col-xs-5">
                                <input class="form-control required col-md-12" type="text" name="assigned_qty"
                                    id="assigned_qty" value="<?php echo e(old('assigned_qty') ?? 1); ?>" />
                            </div>
                            <?php if($errors->first('assigned_qty')): ?>
                                <div class="col-md-9 col-md-offset-3">
                                    <?php echo $errors->first(
                                        'assigned_qty',
                                        '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>',
                                    ); ?>

                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Note -->
                        <div class="form-group<?php echo e($errors->has('note') ? ' error' : ''); ?>">
                            <label for="note"
                                class="col-md-3 control-label"><?php echo e(trans('admin/hardware/form.notes')); ?></label>
                            <div class="col-md-7">
                                <textarea class="col-md-6 form-control" id="note" name="note"><?php echo e(old('note', $component->note)); ?></textarea>
                                <?php echo $errors->first(
                                    'note',
                                    '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>',
                                ); ?>

                            </div>
                        </div>


                    </div> <!-- .BOX-BODY-->
                    <?php if (isset($component)) { $__componentOriginal897bfaf5cfb025541cae5f511fed1c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal897bfaf5cfb025541cae5f511fed1c5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::redirect_submit_options','data' => ['indexRoute' => 'components.index','buttonLabel' => trans('general.checkout'),'options' => [
                        'index' => trans('admin/hardware/form.redirect_to_all', [
                            'type' => trans('general.components'),
                        ]),
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
                        'index' => trans('admin/hardware/form.redirect_to_all', [
                            'type' => trans('general.components'),
                        ]),
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
    <script>
        $(document).ready(function () {
            // Get the authenticated user ID from the meta tag
            const userId = $('meta[name="user-id"]').attr('content');
    
            // Initialize select2 with AJAX loading
            $('#assigned_asset_select').select2({
                ajax: {
                    url: '/api/assets', // Change to your API endpoint
                    dataType: 'json',
                    processResults: function (data) {
                        // Filter the data based on the user ID
                        const filteredAssets = data.filter(asset => asset.user_id == userId);
    
                        // Return the filtered data in a format select2 understands
                        return {
                            results: filteredAssets.map(asset => ({
                                id: asset.id,
                                text: asset.name
                            }))
                        };
                    }
                },
                placeholder: '<?php echo e(trans('general.select_asset')); ?>',
                minimumInputLength: 1
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/components/checkout-request.blade.php ENDPATH**/ ?>