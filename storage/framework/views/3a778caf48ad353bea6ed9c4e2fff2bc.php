<?php $__env->startSection('title'); ?>
    <?php echo e(trans('general.bulk_edit')); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header_right'); ?>
    <a href="<?php echo e(URL::previous()); ?>" class="btn btn-sm btn-primary pull-right">
        <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <style>
        .radio {
            margin-left: -20px;
        }
    </style>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <p><?php echo e(trans('admin/users/general.bulk_update_help')); ?></p>

            <div class="callout callout-warning">
                <i class="fas fa-exclamation-triangle"></i> <?php echo e(trans('admin/users/general.bulk_update_warn', ['user_count' => count($users)])); ?>

            </div>

            <form class="form-horizontal" method="post" action="<?php echo e(route('users/bulkeditsave')); ?>" autocomplete="off" role="form">
                <?php echo e(csrf_field()); ?>


                <div class="box box-default">
                    <div class="box-body">


                        <!--  Department -->
                        <?php echo $__env->make('partials.forms.edit.department-select', ['translated_name' => trans('general.department'), 'fieldname' => 'department_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                        <div class="form-group">
                            <div class=" col-md-9 col-md-offset-3">
                                <label class="form-control">
                                    <?php echo e(Form::checkbox('null_department_id', '1', false)); ?>

                                    <?php echo e(trans_choice('general.set_users_field_to_null', count($users), ['field' => trans('general.department'), 'user_count' => count($users)])); ?>

                                </label>
                            </div>
                        </div>


                        <!-- Location -->
                        <?php echo $__env->make('partials.forms.edit.location-select', ['translated_name' => trans('general.location'), 'fieldname' => 'location_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="form-group">
                            <div class=" col-md-9 col-md-offset-3">
                                <label class="form-control">
                                    <?php echo e(Form::checkbox('null_location_id', '1', false)); ?>

                                    <?php echo e(trans_choice('general.set_users_field_to_null', count($users), ['field' => trans('general.location'), 'user_count' => count($users)])); ?>

                                </label>
                            </div>
                        </div>


                        <!-- Company -->
                        <?php if(\App\Models\Company::canManageUsersCompanies()): ?>
                            <?php echo $__env->make('partials.forms.edit.company-select', ['translated_name' => trans('general.select_company'), 'fieldname' => 'company_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <div class="form-group">
                                <div class=" col-md-9 col-md-offset-3">
                                    <label class="form-control">
                                        <?php echo e(Form::checkbox('null_company_id', '1', false)); ?>

                                        <?php echo e(trans_choice('general.set_users_field_to_null', count($users), ['field' => trans('general.company'), 'user_count' => count($users)])); ?>

                                    </label>
                                </div>
                            </div>

                        <?php endif; ?>

                        <!-- Manager -->
                    <?php echo $__env->make('partials.forms.edit.user-select', ['translated_name' => trans('admin/users/table.manager'), 'fieldname' => 'manager_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="form-group">
                            <div class=" col-md-9 col-md-offset-3">
                                <label class="form-control">
                                    <?php echo e(Form::checkbox('null_manager_id', '1', false)); ?>

                                    <?php echo e(trans_choice('general.set_users_field_to_null', count($users), ['field' => trans('admin/users/table.manager'), 'user_count' => count($users)])); ?>

                                </label>
                            </div>
                        </div>


                        <!-- Language -->
                        <div class="form-group <?php echo e($errors->has('locale') ? 'has-error' : ''); ?>">
                            <label class="col-md-3 control-label" for="locale"><?php echo e(trans('general.language')); ?></label>
                            <div class="col-md-8">
                                <?php echo Form::locales('locale', old('locale', ''), 'select2'); ?>

                                <?php echo $errors->first('locale', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class=" col-md-9 col-md-offset-3">
                                <label class="form-control">
                                    <?php echo e(Form::checkbox('null_locale', '1', false)); ?>

                                    <?php echo e(trans_choice('general.set_users_field_to_null', count($users), ['field' => trans('general.language'), 'user_count' => count($users)])); ?>

                                </label>
                            </div>
                        </div>

                        <!-- City -->
                        <div class="form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
                            <label class="col-md-3 control-label" for="city"><?php echo e(trans('general.city')); ?></label>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="city" id="city" aria-label="city" />
                                <?php echo $errors->first('city', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                            </div>
                        </div>

                         <!-- remote -->
                         <div class="form-group">
                            <div class="col-sm-3 control-label">
                                <?php echo e(trans('admin/users/general.remote')); ?>

                            </div>
                            <div class="col-sm-9">

                                    <label for="no_change" class="form-control">
                                        <?php echo e(Form::radio('remote', '', true, ['id' => 'no_change', 'aria-label'=>'no_change'])); ?>

                                        <?php echo e(trans('general.do_not_change')); ?>

                                    </label>
                                    <label for="remote" class="form-control">
                                        <?php echo e(Form::radio('remote', '1', old('remote'), ['id' => 'remote', 'aria-label'=>'remote'])); ?>

                                        <?php echo e(trans('admin/users/general.remote_label')); ?>

                                    </label>
                                    <label for="not_remote" class="form-control">
                                        <?php echo e(Form::radio('remote', '0', old('remote'), ['id' => 'not_remote', 'aria-label'=>'not_remote'])); ?>

                                        <?php echo e(trans('admin/users/general.not_remote_label')); ?>

                                    </label>


                            </div>
                        </div> <!--/form-group-->

                        <!-- ldap_sync -->
                        <div class="form-group">
                            <div class="col-sm-3 control-label">
                                <?php echo e(trans('general.ldap_sync')); ?>

                            </div>
                            <div class="col-sm-9">
                                    <label for="no_change" class="form-control">
                                        <?php echo e(Form::radio('ldap_import', '', true, ['id' => 'no_change', 'aria-label'=>'ldap_import'])); ?>

                                        <?php echo e(trans('general.do_not_change')); ?>

                                    </label>
                                    <label for="ldap_import" class="form-control">
                                        <?php echo e(Form::radio('ldap_import', '0', old('ldap_import'), ['id' => 'ldap_import', 'aria-label'=>'ldap_import'])); ?>

                                        <?php echo e(trans('general.ldap_import')); ?>

                                    </label>
                            </div>
                        </div> <!--/form-group-->

                        <!-- activated -->
                        <div class="form-group">
                            <div class="col-sm-3 control-label">
                                <?php echo e(trans('general.autoassign_licenses')); ?>

                            </div>
                            <div class="col-sm-9">

                                <label for="no_change_autoassign_licenses" class="form-control">
                                    <?php echo e(Form::radio('autoassign_licenses', '', true, ['id' => 'no_change_autoassign_licenses', 'aria-label'=>'no_change_autoassign_licenses'])); ?>

                                    <?php echo e(trans('general.do_not_change')); ?>

                                </label>
                                <label for="autoassign_licenses" class="form-control">
                                    <?php echo e(Form::radio('autoassign_licenses', '1', old('autoassign_licenses'), ['id' => 'autoassign_licenses', 'aria-label'=>'autoassign_licenses'])); ?>

                                    <?php echo e(trans('general.autoassign_licenses_help')); ?>

                                </label>
                                <label for="dont_autoassign_licenses" class="form-control">
                                    <?php echo e(Form::radio('autoassign_licenses', '0', old('autoassign_licenses'), ['id' => 'dont_autoassign_licenses', 'aria-label'=>'dont_autoassign_licenses'])); ?>

                                    <?php echo e(trans('general.no_autoassign_licenses_help')); ?>

                                </label>

                            </div>
                        </div> <!--/form-group-->

                        <!-- activated -->
                        <div class="form-group">
                            <div class="col-sm-3 control-label">
                                <?php echo e(trans('general.login_enabled')); ?>

                            </div>
                            <div class="col-sm-9">

                                    <label for="no_change" class="form-control">
                                        <?php echo e(Form::radio('activated', '', true, ['id' => 'no_change', 'aria-label'=>'no_change'])); ?>

                                        <?php echo e(trans('general.do_not_change')); ?>

                                    </label>
                                    <label for="activated" class="form-control">
                                        <?php echo e(Form::radio('activated', '1', old('activated'), ['id' => 'activated', 'aria-label'=>'activated'])); ?>

                                        <?php echo e(trans('admin/users/general.user_activated')); ?>

                                    </label>
                                    <label for="deactivated" class="form-control">
                                        <?php echo e(Form::radio('activated', '0', old('activated'), ['id' => 'deactivated', 'aria-label'=>'deactivated'])); ?>

                                        <?php echo e(trans('admin/users/general.user_deactivated')); ?>

                                    </label>

                            </div>
                        </div> <!--/form-group-->


                        <!--  Groups -->
                        <div class="form-group<?php echo e($errors->has('groups') ? ' has-error' : ''); ?>">
                            <label class="col-md-3 control-label" for="groups"> <?php echo e(trans('general.groups')); ?></label>
                            <div class="col-md-6">
                                <?php if((config('app.lock_passwords') || (!Auth::user()->isSuperUser()))): ?>
                                    <span class="help-block"><?php echo e(trans('admin/users/general.group_memberships_helpblock')); ?></p>
                                <?php else: ?>
                                    <div class="controls">
                                        <select name="groups[]" id="groups[]" multiple="multiple" class="form-control" aria-label="groups">
                                        <option value=""><?php echo e(trans('admin/users/general.remove_group_memberships')); ?> </option>

                                  <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($id); ?>"><?php echo e($group); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <span class="help-block">
                          <?php echo e(trans('admin/users/table.groupnotes')); ?>

                        </span>
                      </div> <!--/controls-->
                        <?php endif; ?>
                    </div> <!--/col-md-5-->
                    </div>


                        <!-- Start Date -->
                        <div class="form-group <?php echo e($errors->has('start_date') ? ' has-error' : ''); ?>">
                            <label for="start_date" class="col-md-3 control-label"><?php echo e(trans('general.start_date')); ?></label>
                            <div class="col-md-4">
                                <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd"  data-autoclose="true">
                                    <input type="text" class="form-control" placeholder="<?php echo e(trans('general.start_date')); ?>" name="start_date" id="start_date" value="<?php echo e(old('start_date')); ?>">
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
                                <?php echo $errors->first('start_date', '<span class="alert-msg"><i class="fas fa-times"></i> :message</span>'); ?>

                            </div>
                            <div class="col-md-5">
                                <label class="form-control">
                                    <?php echo e(Form::checkbox('null_start_date', '1', false)); ?>

                                    <?php echo e(trans_choice('general.set_to_null', count($users),['selection_count' => count($users)])); ?>

                                </label>
                            </div>
                        </div>

                        <!-- End Date -->
                        <div class="form-group <?php echo e($errors->has('end_date') ? ' has-error' : ''); ?>">
                            <label for="end_date" class="col-md-3 control-label"><?php echo e(trans('general.end_date')); ?></label>
                            <div class="col-md-4">
                                <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd"  data-autoclose="true">
                                    <input type="text" class="form-control" placeholder="<?php echo e(trans('general.end_date')); ?>" name="end_date" id="end_date" value="<?php echo e(old('end_date')); ?>">
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
                                <?php echo $errors->first('end_date', '<span class="alert-msg"><i class="fas fa-times"></i> :message</span>'); ?>

                            </div>
                            <div class="col-md-5">
                                <label class="form-control">
                                    <?php echo e(Form::checkbox('null_end_date', '1', false)); ?>

                                    <?php echo e(trans_choice('general.set_to_null', count($users),['selection_count' => count($users)])); ?>

                                </label>
                            </div>
                        </div>


                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="ids[<?php echo e($user->id); ?>]" value="<?php echo e($user->id); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div> <!--/.box-body-->

                    <div class="box-footer text-right">
                        <a class="btn btn-link pull-left" href="<?php echo e(URL::previous()); ?>"><?php echo e(trans('button.cancel')); ?></a>

                        <button type="submit" class="btn btn-success"<?php echo e((config('app.lock_passwords') ? ' disabled' : '')); ?>>
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
                            <?php echo e(trans('general.update')); ?>

                        </button>

                    </div><!-- /.box-footer -->
                </div> <!--/.box.box-default-->
            </form>
        </div> <!--/.col-md-8-->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/users/bulk-edit.blade.php ENDPATH**/ ?>