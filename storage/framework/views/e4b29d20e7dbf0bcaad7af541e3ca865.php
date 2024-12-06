<?php $__env->startSection('title'); ?>
<?php echo e(trans('general.editprofile')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-9">
  <?php echo e(Form::open(['method' => 'POST', 'files' => true, 'class' => 'form-horizontal', 'autocomplete' => 'off'])); ?>

  <!-- CSRF Token  --> 
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
    <div class="box box-default">
      <div class="box-body">
        <!-- First Name -->
        <div class="form-group <?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>">
          <label for="first_name" class="col-md-3 control-label"><?php echo e(trans('general.first_name')); ?>

          </label>
          <div class="col-md-8 required">
            <input class="form-control" type="text" name="first_name" id="first_name" value="<?php echo e(old('first_name', $user->first_name)); ?>" required />
            <?php echo $errors->first('first_name', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

          </div>
        </div>

        <!-- Last Name -->
        <div class="form-group <?php echo e($errors->has('last_name') ? ' has-error' : ''); ?>">
          <label for="last_name" class="col-md-3 control-label">
            <?php echo e(trans('general.last_name')); ?>

          </label>
          <div class="col-md-8 required">
            <input class="form-control" type="text" name="last_name" id="last_name" value="<?php echo e(old('last_name', $user->last_name)); ?>" />
            <?php echo $errors->first('last_name', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

          </div>
        </div>


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('self.edit_location')): ?>
        <!-- Location -->
        <?php echo $__env->make('partials.forms.edit.location-profile-select', ['translated_name' => trans('general.location')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>


        <!-- Language -->
        <div class="form-group <?php echo e($errors->has('locale') ? 'has-error' : ''); ?>">
          <label class="col-md-3 control-label" for="locale"><?php echo e(trans('general.language')); ?></label>
          <div class="col-md-7">

            <?php if(!config('app.lock_passwords')): ?>
              <?php echo Form::locales('locale', old('locale', $user->locale), 'select2'); ?>

              <?php echo $errors->first('locale', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

            <?php else: ?>
              <p class="help-block"><?php echo e(trans('general.feature_disabled')); ?></p>
            <?php endif; ?>

          </div>
        </div>

        <?php if($snipeSettings->allow_user_skin=='1'): ?>
        <!-- Skin -->
        <div class="form-group <?php echo e($errors->has('skin') ? 'error' : ''); ?>">
          <label for="skin" class="col-md-3 control-label">
            <?php echo e(trans('general.skin')); ?>

          </label>
          <div class="col-md-8">
            <?php echo Form::user_skin('skin', old('skin', $user->skin), 'select2'); ?>

            <?php echo $errors->first('skin', '<span class="alert-msg">:message</span>'); ?>

          </div>
        </div>
        <?php endif; ?>

        <!-- Phone -->
        <div class="form-group <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
          <label class="col-md-3 control-label" for="phone"><?php echo e(trans('admin/users/table.phone')); ?></label>
          <div class="col-md-4">
            <input class="form-control" type="text" name="phone" id="phone" value="<?php echo e(old('phone', $user->phone)); ?>" />
            <?php echo $errors->first('phone', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

          </div>
        </div>

        <!-- Website URL -->
        <div class="form-group <?php echo e($errors->has('website') ? ' has-error' : ''); ?>">
          <label for="website" class="col-md-3 control-label"><?php echo e(trans('general.website')); ?></label>
          <div class="col-md-8">
            <input class="form-control" type="text" name="website" id="website" value="<?php echo e(old('website', $user->website)); ?>" />
            <?php echo $errors->first('website', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

          </div>
        </div>

        <div class="form-group">
          <div class="col-md-9 col-md-offset-3">
            <label class="form-control">
              <input type="checkbox" name="enable_sounds" value="1" <?php echo e(old('enable_sounds', $user->enable_sounds) ? 'checked' : ''); ?>>
              <?php echo e(trans('account/general.enable_sounds')); ?>

            </label>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-9 col-md-offset-3">
            <label class="form-control">
              <input type="checkbox" name="enable_confetti" value="1" <?php echo e(old('enable_confetti', $user->enable_confetti) ? 'checked' : ''); ?>>
              <?php echo e(trans('account/general.enable_confetti')); ?>

            </label>
          </div>
        </div>

        <!-- Gravatar Email -->
        <div class="form-group <?php echo e($errors->has('gravatar') ? ' has-error' : ''); ?>">
          <label for="gravatar" class="col-md-3 control-label"><?php echo e(trans('general.gravatar_email')); ?>

            <small>(Private)</small>
          </label>
          <div class="col-md-8">
            <input class="form-control" type="text" name="gravatar" id="gravatar" value="<?php echo e(old('gravatar', $user->gravatar)); ?>" />
            <?php echo $errors->first('gravatar', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

            <p>
              <img src="//secure.gravatar.com/avatar/<?php echo e(md5(strtolower(trim($user->gravatar)))); ?>" width="30" height="30" alt="<?php echo e($user->present()->fullName()); ?> avatar image">
              <?php echo trans('general.gravatar_url'); ?>

            </p>
          </div>
        </div>

        <!-- Avatar -->

        <?php if(($user->avatar) && ($user->avatar!='')): ?>
          <div class="form-group<?php echo e($errors->has('image_delete') ? ' has-error' : ''); ?>">
            <div class="col-md-9 col-md-offset-3">
              <label for="image_delete" class="form-control">
                <?php echo e(Form::checkbox('image_delete', '1', old('image_delete'), ['id' => 'image_delete', 'aria-label'=>'image_delete'])); ?>

                <?php echo e(trans('general.image_delete')); ?>

              </label>
              <?php echo $errors->first('image_delete', '<span class="alert-msg">:message</span>'); ?>

            </div>
          </div>
          <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
              <img src="<?php echo e(Storage::disk('public')->url(app('users_upload_path').e($user->avatar))); ?>" class="img-responsive">
              <?php echo $errors->first('image_delete', '<span class="alert-msg">:message</span>'); ?>

            </div>
          </div>
        <?php endif; ?>


        <?php echo $__env->make('partials.forms.edit.image-upload', ['fieldname' => 'avatar', 'image_path' => app('users_upload_path')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <!-- Two factor opt in -->
        <?php if($snipeSettings->two_factor_enabled=='1'): ?>
        <div class="form-group <?php echo e($errors->has('two_factor_optin') ? 'has-error' : ''); ?>">
          <div class="col-md-7 col-md-offset-3">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('self.two_factor')): ?>
              <label class="form-control"><?php echo e(Form::checkbox('two_factor_optin', '1', old('two_factor_optin', $user->two_factor_optin))); ?>

            <?php else: ?>
                <label class="form-control form-control--disabled"><?php echo e(Form::checkbox('two_factor_optin', '1', old('two_factor_optin', $user->two_factor_optin),['disabled' => 'disabled'])); ?>

            <?php endif; ?>

            <?php echo e(trans('admin/settings/general.two_factor_enabled_text')); ?></label>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('self.two_factor')): ?>
              <p class="help-block"><?php echo e(trans('admin/settings/general.two_factor_enabled_warning')); ?></p>
            <?php else: ?>
              <p class="help-block"><?php echo e(trans('admin/settings/general.two_factor_enabled_edit_not_allowed')); ?></p>
            <?php endif; ?>
            <?php if(config('app.lock_passwords')): ?>
              <p class="help-block"><?php echo e(trans('general.feature_disabled')); ?></p>
            <?php endif; ?>
          </div>
        </div>
        <?php endif; ?>



      </div> <!-- .box-body -->
      <div class="text-right box-footer">
        <a class="btn btn-link" href="<?php echo e(URL::previous()); ?>"><?php echo e(trans('button.cancel')); ?></a>
        <button type="submit" class="btn btn-primary"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '0bc333070fe8fbc263fd4a4e307b8773::icon','data' => ['type' => 'checkmark']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
    </div> <!-- .box-default -->
    <?php echo e(Form::close()); ?>

  </div> <!-- .col-md-9 -->
</div> <!-- .row-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/test-deploy/resources/views/account/profile.blade.php ENDPATH**/ ?>