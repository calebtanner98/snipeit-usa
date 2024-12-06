<?php $__env->startSection('title'); ?>
    <?php echo e(trans('general.quickscan_checkin')); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <style>

        .input-group {
            padding-left: 0px !important;
        }
    </style>

    

    <div class="row">
    <?php echo e(Form::open(['method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'checkin-form' ])); ?>

        <!-- left column -->
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h2 class="box-title"> <?php echo e(trans('admin/hardware/general.bulk_checkin')); ?> </h2>
                </div>
                <div class="box-body">
                    <?php echo e(csrf_field()); ?>


                    <!-- Asset Tag -->
                    <div class="form-group <?php echo e($errors->has('asset_tag') ? 'error' : ''); ?>">
                        <?php echo e(Form::label('asset_tag', trans('general.asset_tag'), array('class' => 'col-md-3 control-label', 'id' => 'checkin_tag'))); ?>

                        <div class="col-md-9">
                            <div class="input-group col-md-11 required">
                                <input type="text" class="form-control" name="asset_tag" id="asset_tag" value="<?php echo e(old('asset_tag')); ?>" required>

                            </div>
                            <?php echo $errors->first('asset_tag', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                        </div>
                    </div>

                    <!-- Status -->
                    <div class="form-group <?php echo e($errors->has('status_id') ? 'error' : ''); ?>">
                        <label for="status_id" class="col-md-3 control-label">
                            <?php echo e(trans('admin/hardware/form.status')); ?>

                        </label>
                        <div class="col-md-7">
                            <?php echo e(Form::select('status_id', $statusLabel_list, '', array('class'=>'select2', 'style'=>'width:100%','', 'aria-label'=>'status_id'))); ?>

                            <?php echo $errors->first('status_id', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                        </div>
                    </div>

                    <!-- Locations -->
                    <?php echo $__env->make('partials.forms.edit.location-select', ['translated_name' => trans('general.location'), 'fieldname' => 'location_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!-- Note -->
                        <div class="form-group <?php echo e($errors->has('note') ? 'error' : ''); ?>">
                            <?php echo e(Form::label('note', trans('admin/hardware/form.notes'), array('class' => 'col-md-3 control-label'))); ?>

                            <div class="col-md-8">
                                <textarea class="col-md-6 form-control" id="note" name="note"><?php echo e(old('note')); ?></textarea>
                                <?php echo $errors->first('note', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                            </div>
                        </div>
    
    

                </div> <!--/.box-body-->
                <div class="box-footer">
                    <a class="btn btn-link" href="<?php echo e(route('hardware.index')); ?>"> <?php echo e(trans('button.cancel')); ?></a>
                    <button type="submit" id="checkin_button" class="btn btn-success pull-right"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
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
<?php endif; ?> <?php echo e(trans('general.checkin')); ?></button>
                </div>



            </div>



            <?php echo e(Form::close()); ?>

        </div> <!--/.col-md-6-->

        <div class="col-md-6">
            <div class="box box-default" id="checkedin-div" style="display: none">
                <div class="box-header with-border">
                    <h2 class="box-title"> <?php echo e(trans('general.quickscan_checkin_status')); ?> (<span id="checkin-counter">0</span> <?php echo e(trans('general.assets_checked_in_count')); ?>) </h2>
                </div>
                <div class="box-body">
    
                    <table id="checkedin" class="table table-striped snipe-table">
                        <thead>
                        <tr>
                            <th><?php echo e(trans('general.asset_tag')); ?></th>
                            <th><?php echo e(trans('general.asset_model')); ?></th>
                            <th><?php echo e(trans('general.model_no')); ?></th>
                            <th><?php echo e(trans('general.quickscan_checkin_status')); ?></th>
                            <th></th>
                        </tr>
                        <tr id="checkin-loader" style="display: none;">
                            <td colspan="3">
                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'spinner']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'spinner']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>  <?php echo e(trans('general.processing')); ?>...
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('moar_scripts'); ?>
    <script nonce="<?php echo e(csrf_token()); ?>">

        $("#checkin-form").submit(function (event) {
            $('#checkedin-div').show();
            $('#checkin-loader').show();

            event.preventDefault();

            var form = $("#checkin-form").get(0);
            var formData = $('#checkin-form').serializeArray();

            $.ajax({
                url: "<?php echo e(route('api.asset.checkinbytag')); ?>",
                type : 'POST',
                headers: {
                    "X-Requested-With": 'XMLHttpRequest',
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                dataType : 'json',
                data : formData,
                success : function (data) {
                    if (data.status == 'success') {
                        $('#checkedin tbody').prepend("<tr class='success'><td>" + data.payload.asset_tag + "</td><td>" + data.payload.model + "</td><td>" + data.payload.model_number + "</td><td>" + data.messages + "</td><td><i class='fas fa-check text-success'></i></td></tr>");

                        <?php if($user->enable_sounds): ?>
                        var audio = new Audio('<?php echo e(config('app.url')); ?>/sounds/success.mp3');
                        audio.play()
                        <?php endif; ?>

                        incrementOnSuccess();
                    } else {
                        handlecheckinFail(data);
                    }
                    $('input#asset_tag').val('');
                },
                error: function (data) {
                    handlecheckinFail(data);
                },
                complete: function() {
                    $('#checkin-loader').hide();
                }

            });

            return false;
        });

        function handlecheckinFail (data) {

            <?php if($user->enable_sounds): ?>
            var audio = new Audio('<?php echo e(config('app.url')); ?>/sounds/error.mp3');
            audio.play()
            <?php endif; ?>

            if (data.payload.asset_tag) {
                var asset_tag = data.payload.asset_tag;
                var model = data.payload.model;
                var model_number = data.payload.model_number;
            } else {
                var asset_tag = '';
                var model = '';
                var model_number = '';
            }
            if (data.messages) {
                var messages = data.messages;
            } else {
                var messages = '';
            }
            $('#checkedin tbody').prepend("<tr class='danger'><td>" + asset_tag + "</td><td>" + model + "</td><td>" + model_number + "</td><td>" + messages + "</td><td><i class='fas fa-times text-danger'></i></td></tr>");
        }

        function incrementOnSuccess() {
            var x = parseInt($('#checkin-counter').html());
            y = x + 1;
            $('#checkin-counter').html(y);
        }

        $("#checkin_tag").focus();

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/hardware/quickscan-checkin.blade.php ENDPATH**/ ?>