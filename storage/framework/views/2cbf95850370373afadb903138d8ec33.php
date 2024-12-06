<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin/users/general.create_user')); ?> ::
<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<p><?php echo e(trans('admin/users/general.create_user_page_explanation')); ?></p>

<form action="<?php echo e(route('setup.user.save')); ?>" method="POST">
  <?php echo e(csrf_field()); ?>


  <div class="col-lg-12" style="padding-top: 20px;">

    <!-- Site Name -->
    <div class="row">
      <div class="form-group col-lg-12 required <?php echo e($errors->has('site_name') ? 'error' : ''); ?>">
        <label for="site_name">
          <?php echo e(trans('general.site_name')); ?>

        </label>
        <?php echo e(Form::text('site_name', old('site_name'), array('class' => 'form-control','placeholder' => 'Snipe-IT Asset Management'))); ?>


        <?php echo $errors->first('site_name', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

      </div>
    </div>

  <div class="row">

    <!-- Language -->
    <div class="form-group col-lg-6<?php echo e((Helper::checkIfRequired(\App\Models\User::class, 'default_language')) ? ' required' : ''); ?> <?php echo e($errors->has('default_language') ? 'error' : ''); ?>">
      <label for="locale">
        <?php echo e(trans('admin/settings/general.default_language')); ?>

      </label>
      <?php echo Form::locales('locale', old('locale', "en-US"), 'select2'); ?>

      <?php echo $errors->first('locale', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

    </div>

    <!-- Currency -->
    <div class="form-group col-lg-6<?php echo e((Helper::checkIfRequired(\App\Models\Setting::class, 'default_currency')) ? ' required' : ''); ?> <?php echo e($errors->has('default_currency') ? 'error' : ''); ?>">
      <?php echo e(Form::label('default_currency', trans('admin/settings/general.default_currency'))); ?>

      <?php echo e(Form::text('default_currency', old('default_currency'), array('class' => 'form-control','placeholder' => 'USD', 'maxlength'=>'3', 'style'=>'width: 60px;'))); ?>


      <?php echo $errors->first('default_currency', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

    </div>

  </div>

  <div class="row">

    <div class="form-group col-lg-6">

      <label class="form-control form-control">
        <input type="checkbox" value="1" name="auto_increment_assets"><?php echo e(trans('admin/settings/general.auto_increment_assets')); ?>

      </label>

    </div>

    <!-- Multi Company Support -->
    <div class="form-group col-lg-6">
      <label class="form-control form-control">
        <input type="checkbox" value="1" name="full_multiple_companies_support">  <?php echo e(trans('admin/settings/general.full_multiple_companies_support_text')); ?>

      </label>
    </div>


  </div>

  <div class="row">

    <div class="form-group col-lg-6<?php echo e((Helper::checkIfRequired(\App\Models\User::class, 'auto_increment_prefix')) ? ' required' : ''); ?> <?php echo e($errors->has('auto_increment_prefix') ? 'error' : ''); ?>">
      <?php echo e(Form::label('auto_increment_prefix', trans('admin/settings/general.auto_increment_prefix'))); ?>

      <?php echo e(Form::text('auto_increment_prefix', old('auto_increment_prefix'), array('class' => 'form-control'))); ?>


      <?php echo $errors->first('auto_increment_prefix', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

    </div>

    <div class="form-group col-lg-6<?php echo e((Helper::checkIfRequired(\App\Models\User::class, 'zerofill_count')) ? ' required' : ''); ?> <?php echo e($errors->has('zerofill_count') ? 'error' : ''); ?>">
      <?php echo e(Form::label('zerofill_count', trans('admin/settings/general.zerofill_count'))); ?>

      <?php echo e(Form::text('zerofill_count', old('zerofill_count', 5), array('class' => 'form-control'))); ?>


      <?php echo $errors->first('zerofill_count', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

    </div>
  </div>


    <!-- email domain -->
    <div class="row">
      <div class="form-group col-lg-6 required <?php echo e($errors->has('email_domain') ? 'error' : ''); ?>">
        <?php echo e(Form::label('email_domain', trans('general.email_domain'))); ?>

        <?php echo e(Form::text('email_domain', old('email_domain'), array('class' => 'form-control','placeholder' => 'example.com'))); ?>

        <span class="help-block"><?php echo e(trans('general.email_domain_help')); ?></span>

        <?php echo $errors->first('email_domain', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

      </div>

      <!-- email format  -->
      <div class="form-group col-lg-6<?php echo e((Helper::checkIfRequired(\App\Models\User::class, 'email_format')) ? ' required' : ''); ?> <?php echo e($errors->has('email_format') ? 'error' : ''); ?>">
        <?php echo e(Form::label('email_format', trans('general.email_format'))); ?>

        <?php echo Form::username_format('email_format', old('email_format', 'filastname'), 'select2'); ?>

        <?php echo $errors->first('email_format', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

      </div>
    </div>

    <!-- Name -->
    <div class="row">
      <!-- first name -->
      <div class="form-group col-lg-6<?php echo e((Helper::checkIfRequired(\App\Models\User::class, 'first_name')) ? ' required' : ''); ?> <?php echo e($errors->has('first_name') ? 'error' : ''); ?>">
        <?php echo e(Form::label('first_name', trans('general.first_name'))); ?>

        <?php echo e(Form::text('first_name', old('first_name'), array('class' => 'form-control','placeholder' => 'Jane'))); ?>

        <?php echo $errors->first('first_name', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

      </div>

      <!-- last name -->
      <div class="form-group col-lg-6 required <?php echo e($errors->has('last_name') ? 'error' : ''); ?>">
        <?php echo e(Form::label('last_name', trans('general.last_name'))); ?>

        <?php echo e(Form::text('last_name', old('last_name'), array('class' => 'form-control','placeholder' => 'Smith'))); ?>

        <?php echo $errors->first('last_name', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

      </div>
    </div>

    <div class="row">
      <!-- email-->
      <div class="form-group col-lg-6<?php echo e((Helper::checkIfRequired(\App\Models\User::class, 'email')) ? ' required' : ''); ?> <?php echo e($errors->has('email') ? 'error' : ''); ?>">
        <?php echo e(Form::label('email', trans('admin/users/table.email'))); ?>

        <?php echo e(Form::email('email', config('mail.from.address'), array('class' => 'form-control','placeholder' => 'you@example.com'))); ?>

        <?php echo $errors->first('email', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

      </div>

      <!-- username -->
      <div class="form-group col-lg-6<?php echo e((Helper::checkIfRequired(\App\Models\User::class, 'username')) ? ' required' : ''); ?> <?php echo e($errors->has('username') ? 'error' : ''); ?>">
        <?php echo e(Form::label('username', trans('admin/users/table.username'))); ?>

        <?php echo e(Form::text('username', old('username'), array('class' => 'form-control','placeholder' => 'jsmith'))); ?>

        <?php echo $errors->first('username', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

      </div>
    </div>

    <div class="row">
      <!-- password -->
      <div class="form-group col-lg-6<?php echo e((Helper::checkIfRequired(\App\Models\User::class, 'password')) ? ' required' : ''); ?> <?php echo e($errors->has('password') ? 'error' : ''); ?>">
        <?php echo e(Form::label('password', trans('admin/users/table.password'))); ?>

        <?php echo e(Form::password('password', array('class' => 'form-control'))); ?>

        <?php echo $errors->first('password', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

      </div>

      <!-- password confirm -->
      <div class="form-group col-lg-6<?php echo e((Helper::checkIfRequired(\App\Models\User::class, 'password')) ? ' required' : ''); ?> <?php echo e($errors->has('password_confirm') ? 'error' : ''); ?>">
        <?php echo e(Form::label('password_confirmation', trans('admin/users/table.password_confirm'))); ?>

        <?php echo e(Form::password('password_confirmation', array('class' => 'form-control'))); ?>

        <?php echo $errors->first('password_confirmation', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

      </div>
    </div>

    <!-- Email credentials -->
    <div class="form-group col-lg-12">
      <label class="form-control form-control">
        <input type="checkbox" value="1" name="email_creds"><?php echo e(trans('admin/users/general.email_credentials_text')); ?>

      </label>
    </div>
  </div> <!--/.COL-LG-12-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('button'); ?>
  <button class="btn btn-primary"><?php echo e(trans('admin/users/general.next_save_user')); ?></button>
</form>
<?php echo \Illuminate\View\Factory::parentPlaceholder('button'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/setup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/test-deploy/resources/views/setup/user.blade.php ENDPATH**/ ?>