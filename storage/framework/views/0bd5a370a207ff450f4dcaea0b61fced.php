
<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin/settings/general.webhook_title')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(route('settings.index')); ?>" class="btn btn-primary"> <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

<div><!-- livewire div - do not remove -->
    <form class="form-horizontal" role="form" wire:submit="submit">
        <?php echo e(csrf_field()); ?>


        <div class="row">

            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                <div class="panel box box-default">

                    <div class="box-header with-border">
                        <h2 class="box-title">
                            <i class="<?php echo e($webhook_icon); ?>"></i> <?php echo e(trans('admin/settings/general.webhook', ['app' => $webhook_name] )); ?>

                        </h2>
                    </div>

                <div class="box-body">
                    <!--[if BLOCK]><![endif]--><?php if($webhook_selected != 'general'): ?>
                    <div class="col-md-12">
                            <p>
                                <?php echo trans('admin/settings/general.webhook_integration_help',array('webhook_link' => $webhook_link, 'app' => $webhook_name)); ?>

                            </p>
                        <br>
                    </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <div class="col-md-12" style="border-top: 0px;">

                        <!--[if BLOCK]><![endif]--><?php if(session()->has('success')): ?>
                            <div class="alert alert-success fade in">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php if(session()->has('error')): ?>
                            <div class="alert alert-danger fade in">
                                <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <div class="form-group">
                            <div class="col-md-2">
                                <label for="webhook_selected">
                                    <?php echo e(trans('general.integration_option')); ?>


								</label>
                            </div>
                            <div class="col-md-9 required" wire:ignore>

                            <!--[if BLOCK]><![endif]--><?php if(Helper::isDemoMode()): ?>
								<?php echo e(Form::select('webhook_selected', array('slack' => trans('admin/settings/general.slack'), 'general' => trans('admin/settings/general.general_webhook'),'google' => trans('admin/settings/general.google_workspaces'), 'microsoft' => trans('admin/settings/general.ms_teams')), old('webhook_selected', $webhook_selected), array('class'=>'select2 form-control', 'aria-label' => 'webhook_selected', 'id' => 'select2', 'style'=>'width:100%', 'disabled'))); ?>

                            <?php else: ?>
                                <?php echo e(Form::select('webhook_selected', array('slack' => trans('admin/settings/general.slack'), 'general' => trans('admin/settings/general.general_webhook'),'google' => trans('admin/settings/general.google_workspaces'), 'microsoft' => trans('admin/settings/general.ms_teams')), old('webhook_selected', $webhook_selected), array('class'=>'select2 form-control', 'aria-label' => 'webhook_selected', 'id' => 'select2', 'data-minimum-results-for-search' => '-1', 'style'=>'width:100%'))); ?>

                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                            </div>
                        </div>

                        <!--[if BLOCK]><![endif]--><?php if(Helper::isDemoMode()): ?>
                            <?php echo $__env->make('partials.forms.demo-mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <!--Webhook endpoint-->
                        <div class="form-group<?php echo e($errors->has('webhook_endpoint') ? ' error' : ''); ?>">
                            <div class="col-md-2">
                                <?php echo e(Form::label('webhook_endpoint', trans('admin/settings/general.webhook_endpoint',['app' => $webhook_name ]))); ?>

                            </div>
                            <div class="col-md-9 required">
                                    <input type="text" wire:model.blur="webhook_endpoint" class="form-control" placeholder="<?php echo e($webhook_placeholder); ?>" value="<?php echo e(old('webhook_endpoint', $webhook_endpoint)); ?>"<?php echo e(Helper::isDemoMode() ? ' disabled' : ''); ?>>
                                <?php echo $errors->first('webhook_endpoint', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                            </div>
                        </div>

                        <!--[if BLOCK]><![endif]--><?php if(Helper::isDemoMode()): ?>
                            <?php echo $__env->make('partials.forms.demo-mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                        <!-- Webhook channel -->
                        <!--[if BLOCK]><![endif]--><?php if($webhook_selected != 'microsoft' && $webhook_selected!= 'google'): ?>
                            <div class="form-group<?php echo e($errors->has('webhook_channel') ? ' error' : ''); ?>">
                                <div class="col-md-2">
                                    <?php echo e(Form::label('webhook_channel', trans('admin/settings/general.webhook_channel',['app' => $webhook_name ]))); ?>

                                </div>
                                <div class="col-md-9 required">
                                        <input type="text" wire:model.blur="webhook_channel" class="form-control" placeholder="#IT-Ops" value="<?php echo e(old('webhook_channel', $webhook_channel)); ?>"<?php echo e(Helper::isDemoMode() ? ' disabled' : ''); ?>>

                                    <?php echo $errors->first('webhook_channel', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                                </div>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <!--[if BLOCK]><![endif]--><?php if(Helper::isDemoMode()): ?>
                            <?php echo $__env->make('partials.forms.demo-mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <!-- Webhook botname -->
                        <!--[if BLOCK]><![endif]--><?php if($webhook_selected != 'microsoft' && $webhook_selected != 'google'): ?>
                            <div class="form-group<?php echo e($errors->has('webhook_botname') ? ' error' : ''); ?>">
                                <div class="col-md-2">
                                    <?php echo e(Form::label('webhook_botname', trans('admin/settings/general.webhook_botname',['app' => $webhook_name ]))); ?>

                                </div>
                                <div class="col-md-9">
                                        <input type="text" wire:model.blur="webhook_botname" class='form-control' placeholder="Snipe-Bot" <?php echo e(old('webhook_botname', $webhook_botname)); ?><?php echo e(Helper::isDemoMode() ? ' disabled' : ''); ?>>
                                    <?php echo $errors->first('webhook_botname', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                                </div><!--col-md-10-->
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <!--[if BLOCK]><![endif]--><?php if(!Helper::isDemoMode()): ?>
                            <?php echo $__env->make('partials.forms.demo-mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <!--Webhook Integration Test-->

                            <!--[if BLOCK]><![endif]--><?php if($webhook_endpoint != null && $webhook_channel != null): ?>
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-9">
                                        <a href="#" wire:click.prevent="<?php echo e($webhook_test); ?>"
                                           class="btn btn-default btn-sm pull-left">
                                            <i class="<?php echo e($webhook_icon); ?>" aria-hidden="true"></i>
                                                <?php echo trans('admin/settings/general.webhook_test',['app' => ucwords($webhook_selected) ]); ?>

                                        </a>
                                        <div wire:loading>
                                            <span style="padding-left: 5px; font-size: 20px">
                                                <i class="fas fa-spinner fa-spin" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div><!-- /.col-md-12 -->
               </div><!-- /.box-body -->

                <div class="box-footer">
                    <div class="text-right col-md-12">

                        <button type="reset" wire:click.prevent="clearSettings" class="col-md-2 text-left btn btn-danger pull-left"<?php echo e(Helper::isDemoMode() ? ' disabled' : ''); ?>><?php echo e(trans('general.clear_and_save')); ?></button>

                        <a class="btn btn-link pull-left" href="<?php echo e(route('settings.index')); ?>"><?php echo e(trans('button.cancel')); ?></a>


                        <button type="submit" <?php echo e($isDisabled); ?> class="btn btn-primary"<?php echo e(Helper::isDemoMode() ? ' disabled' : ''); ?>>
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
<?php endif; ?> <?php echo e($save_button); ?></button>

                    </div> <!-- /.col-md-12 -->
                </div><!--box-footer-->

           </div> <!-- /.box -->
       </div> <!-- /.col-md-8-->
    </div> <!-- /.row -->
</form>
</div>  <!-- /livewire div -->




<?php $__env->startSection('moar_scripts'); ?>
<script>
    $(document).ready(function () {
        $('#select2').select2();
        $('#select2').on('change', function (e) {
            var data = $('#select2').select2("val");
            window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('webhook_selected', data);
        });
    });


</script>
<?php $__env->stopSection(); ?>


<?php /**PATH /var/www/html/snipeit/resources/views/livewire/slack-settings-form.blade.php ENDPATH**/ ?>