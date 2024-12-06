<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin/settings/general.barcode_title')); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
    <a href="<?php echo e(route('settings.index')); ?>" class="btn btn-primary"> <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

    <style>
        .checkbox label {
            padding-right: 40px;
        }
    </style>


    <?php echo e(Form::open(['method' => 'POST', 'files' => false, 'autocomplete' => 'off', 'class' => 'form-horizontal', 'role' => 'form' ])); ?>

    <!-- CSRF Token -->
    <?php echo e(csrf_field()); ?>


    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">


            <div class="panel box box-default">
                <div class="box-header with-border">
                    <h2 class="box-title">
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'assets']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'assets']); ?>
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
                        <?php echo e(trans('admin/settings/general.barcodes')); ?>

                    </h2>
                </div>
                <div class="box-body">


                    <div class="col-md-11 col-md-offset-1">

                    <?php if($is_gd_installed): ?>
                        <!-- qr code -->
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <label class="form-control">
                                        <?php echo e(Form::checkbox('qr_code', '1', old('qr_code', $setting->qr_code),array('aria-label'=>'qr_code'))); ?>

                                        <?php echo e(trans('admin/settings/general.display_qr')); ?>

                                    </label>
                                </div>
                            </div>

                            <!-- square barcode type -->
                            <div class="form-group<?php echo e($errors->has('barcode_type') ? ' has-error' : ''); ?>">
                                <div class="col-md-3">
                                    <?php echo e(Form::label('barcode_type', trans('admin/settings/general.barcode_type'))); ?>

                                </div>
                                <div class="col-md-9">
                                    <?php echo Form::barcode_types('barcode_type', old('barcode_type', $setting->barcode_type), 'select2 col-md-4'); ?>

                                    <?php echo $errors->first('barcode_type', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                                </div>
                            </div>

                            <!-- barcode -->
                            <div class="form-group">

                                <div class="col-md-9 col-md-offset-3">
                                    <label class="form-control">
                                        <?php echo e(Form::checkbox('alt_barcode_enabled', '1', old('alt_barcode_enabled', $setting->alt_barcode_enabled),array( 'aria-label'=>'alt_barcode_enabled'))); ?>

                                        <?php echo e(trans('admin/settings/general.display_alt_barcode')); ?>

                                    </label>
                                </div>
                            </div>

                            <!-- barcode type -->
                            <div class="form-group<?php echo e($errors->has('alt_barcode') ? ' has-error' : ''); ?>">
                                <div class="col-md-3">
                                    <?php echo e(Form::label('alt_barcode', trans('admin/settings/general.alt_barcode_type'))); ?>

                                </div>
                                <div class="col-md-9">
                                    <?php echo Form::alt_barcode_types('alt_barcode', old('alt_barcode', $setting->alt_barcode), 'select2 col-md-4'); ?>

                                    <?php echo $errors->first('barcode_type', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                                </div>
                            </div>
                        <?php else: ?>
                            <span class="help-block col-md-offset-3 col-md-12">
                                <?php echo e(trans('admin/settings/general.php_gd_warning')); ?>

                                <br>
                                <?php echo e(trans('admin/settings/general.php_gd_info')); ?>

                  </span>
                    <?php endif; ?>

                    <!-- qr text -->
                        <div class="form-group <?php echo e($errors->has('qr_text') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('qr_text', trans('admin/settings/general.qr_text'))); ?>

                            </div>
                            <div class="col-md-9">
                                <?php if($setting->qr_code == 1): ?>
                                    <?php echo e(Form::text('qr_text', old('qr_text', $setting->qr_text), array('class' => 'form-control','placeholder' => 'Property of Your Company',
                                    'rel' => 'txtTooltip',
                                    'title' =>'Extra text that you would like to display on your labels. ',
                                    'data-toggle' =>'tooltip',
                                    'data-placement'=>'top'))); ?>

                                    <?php echo $errors->first('qr_text', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                                <?php else: ?>
                                    <?php echo e(Form::text('qr_text', old('qr_text', $setting->qr_text), array('class' => 'form-control', 'disabled'=>'disabled','placeholder' => 'Property of Your Company'))); ?>

                                    <p class="help-block"><?php echo e(trans('admin/settings/general.qr_help')); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Nuke barcode cache -->
                        <div class="form-group">
                            <div class="col-md-3">
                                <?php echo e(Form::label('purge_barcodes', 'Purge Barcodes')); ?>

                            </div>
                            <div class="col-md-9" id="purgebarcodesrow">
                                <a class="btn btn-default btn-sm pull-left" id="purgebarcodes" style="margin-right: 10px;">
                                    <?php echo e(trans('admin/settings/general.barcode_delete_cache')); ?></a>
                                <span id="purgebarcodesicon"></span>
                                <span id="purgebarcodesresult"></span>
                                <span id="purgebarcodesstatus"></span>
                            </div>
                            <div class="col-md-9 col-md-offset-3">
                                <div id="purgebarcodesstatus-error" class="text-danger"></div>
                            </div>
                            <div class="col-md-9 col-md-offset-3">
                                <p class="help-block"><?php echo e(trans('admin/settings/general.barcodes_help')); ?></p>
                            </div>

                        </div>


                    </div>

                </div> <!--/.box-body-->
                <div class="box-footer">
                    <div class="text-left col-md-6">
                        <a class="btn btn-link text-left" href="<?php echo e(route('settings.index')); ?>"><?php echo e(trans('button.cancel')); ?></a>
                    </div>
                    <div class="text-right col-md-6">
                        <button type="submit" class="btn btn-success"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
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
<?php endif; ?> <?php echo e(trans('general.save')); ?></button>
                    </div>

                </div>
            </div> <!-- /box -->
        </div> <!-- /.col-md-8-->
    </div> <!-- /.row-->

    <?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

    <script nonce="<?php echo e(csrf_token()); ?>">
        // Delete barcodes
        $("#purgebarcodes").click(function(){
            $("#purgebarcodesrow").removeClass('text-success');
            $("#purgebarcodesrow").removeClass('text-danger');
            $("#purgebarcodesicon").html('');
            $("#purgebarcodesstatus").html('');
            $('#purgebarcodesstatus-error').html('');
            $("#purgebarcodesicon").html('<i class="fas fa-spinner spin"></i> <?php echo e(trans('admin/settings/general.barcodes_spinner')); ?>');
            $.ajax({
                url: '<?php echo e(route('api.settings.purgebarcodes')); ?>',
                type: 'POST',
                headers: {
                    "X-Requested-With": 'XMLHttpRequest',
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                data: {},
                dataType: 'json',

                success: function (data) {
                    console.dir(data);
                    $("#purgebarcodesicon").html('');
                    $("#purgebarcodesstatus").html('');
                    $('#purgebarcodesstatus-error').html('');
                    $("#purgebarcodesstatus").removeClass('text-danger');
                    $("#purgebarcodesstatus").addClass('text-success');
                    if (data.message) {
                        $("#purgebarcodesstatus").html('<i class="fas fa-check text-success"></i> ' + data.message);
                    }
                },

                error: function (data) {

                    $("#purgebarcodesicon").html('');
                    $("#purgebarcodesstatus").html('');
                    $('#purgebarcodesstatus-error').html('');
                    $("#purgebarcodesstatus").removeClass('text-success');
                    $("#purgebarcodesstatus").addClass('text-danger');
                    $("#purgebarcodesicon").html('<i class="fas fa-exclamation-triangle text-danger"></i>');
                    $('#purgebarcodesstatus').html('Files could not be deleted.');
                    if (data.responseJSON) {
                        $('#purgebarcodesstatus-error').html('Error: ' + data.responseJSON.messages);
                    } else {
                        console.dir(data);
                    }

                }


            });
        });

    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/settings/barcodes.blade.php ENDPATH**/ ?>