

<script nonce="<?php echo e(csrf_token()); ?>">

    window.setTimeout(function () {
        $('#modal-genPassword').pGenerator({
            'bind': 'click',
            'passwordElement': '#modal-password',
            'displayElement': '#modal-generated-password',
            'passwordLength': 16,
            'uppercase': true,
            'lowercase': true,
            'numbers': true,
            'specialChars': true,
            'onPasswordGenerated': function (generatedPassword) {
                $('#modal-password_confirmation').val($('#modal-password').val());
            }
        });
    }, 1000);
</script>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2 class="modal-title"><?php echo e(trans('admin/users/table.createuser')); ?></h2>
        </div>
            <div class="modal-body">
                <form action="<?php echo e(route('api.users.store')); ?>" onsubmit="return false">
                    <div class="alert alert-danger" id="modal_error_msg" style="display:none">
                    </div>
                    
                    <!-- Setup of default company, taken from asset creator -->
					<?php if($user->company): ?>
						<input type="hidden" name="company_id" id='modal-company' value='<?php echo e($user->company->id); ?>' class="form-control">
					<?php endif; ?>
					
					<!-- Select company, only for users with multicompany access - replace default company -->
					<div class="dynamic-form-row">
						<?php echo $__env->make('partials.forms.edit.company-select', ['translated_name' => trans('general.company'), 'fieldname' => 'company_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</div>
                    <div class="dynamic-form-row">
                        <?php echo $__env->make('partials.forms.edit.location-profile-select', ['translated_name' => trans('general.location'), 'fieldname' => 'location_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    
                    <div class="dynamic-form-row">
                        <div class="col-md-3 col-xs-12"><label for="modal-first_name"><?php echo e(trans('general.first_name')); ?>:</label></div>
                        <div class="col-md-8 col-xs-12 required"><input type='text' name="first_name" id='modal-first_name' class="form-control"></div>
                    </div>

                    <div class="dynamic-form-row">
                        <div class="col-md-3 col-xs-12"><label for="modal-last_name"><?php echo e(trans('general.last_name')); ?>:</label></div>
                        <div class="col-md-8 col-xs-12"><input type='text' name="last_name" id='modal-last_name' class="form-control"> </div>
                    </div>

                    <div class="dynamic-form-row">
                        <div class="col-md-3 col-xs-12"><label for="modal-username"><?php echo e(trans('admin/users/table.username')); ?>:</label></div>
                        <div class="col-md-8 col-xs-12 required"><input type='text' name="username" id='modal-username' class="form-control"></div>
                    </div>

					<!-- User email address -->		
					<div class="dynamic-form-row">
                        <div class="col-md-3 col-xs-12"><label for="modal-email"><?php echo e(trans('admin/users/table.email')); ?>:</label></div>
                        <div class="col-md-8 col-xs-12">
						<input class="form-control" type="text" name="email" id="modal-email" autocomplete="off">
						<?php echo $errors->first('email', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?> 
						</div>
                    </div>

                    <div class="dynamic-form-row">
                        <div class="col-md-3 col-xs-12"><label for="modal-password"><?php echo e(trans('admin/users/table.password')); ?>:</label></div>
                        <div class="col-md-8 col-xs-12 required"><input type='password' name="password" id='modal-password' class="form-control">
                            <a href="#" class="left" id="modal-genPassword">Generate</a>
                        </div>
                    </div>

                    <div class="dynamic-form-row">
                        <div class="col-md-3 col-xs-12"><label for="modal-password_confirmation"><?php echo e(trans('admin/users/table.password_confirm')); ?>:</label></div>
                        <div class="col-md-8 col-xs-12 required"><input type='password' name="password_confirmation" id='modal-password_confirmation' class="form-control">
                            <div id="modal-generated-password"></div>
                        </div>
                    </div>
                    

                    
					<!-- Checkbox for activation new user, by default set for activated -->
					<div class="dynamic-form-row">
						<div class="col-md-offset-3 col-md-8 col-xs-12">
                            <label class="form-control">
						        <input type="checkbox" value="1" name="activated" id="modal-activated" <?php echo e((old('activated', $user->activated)) == '1' ? ' checked="checked"' : ''); ?> aria-label="activated">
                                <?php echo e(trans('general.login_enabled')); ?>

                            </label>
						</div>
                    </div>                    
                    
                </form>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('button.cancel')); ?></button>
            <button type="button" class="btn btn-primary" id="modal-save"><?php echo e(trans('general.save')); ?></button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script>
    $(document).ready(function(){
        $('#modal-first_name').focus();
    });
</script><?php /**PATH /var/www/html/snipeit/resources/views/modals/user.blade.php ENDPATH**/ ?>