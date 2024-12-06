<div>
    <div class="box box-default">
        <div class="box-header with-border">
            <div class="text-right">
                <a class="btn btn-info btn-sm pull-right"
                   onclick="$('#modal-create-token').modal('show');"
                   wire:click="$dispatch('openModal')">
                    <?php echo e(trans('general.create')); ?>

                </a>
            </div>
        </div>
        <div class="box-body">
            <!-- No Tokens Notice -->
            <!--[if BLOCK]><![endif]--><?php if($tokens->count() === 0): ?>
                <p>
                    <?php echo e(trans('account/general.no_tokens')); ?>

                </p>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <!-- Personal Access Tokens -->
            <div class="table table-responsive">
            <table class="table table-striped snipe-table">
                <?php if($tokens->count() > 0): ?>
                    <thead>
                    <tr>
                        <th class="col-md-3"><?php echo e(trans('general.name')); ?></th>
                        <th class="col-md-2"><?php echo e(trans('general.created_at')); ?></th>
                        <th class="col-md-2"><?php echo e(trans('general.expires')); ?></th>
                        <th class="col-md-2"><span class="sr-only"><?php echo e(trans('general.delete')); ?></span></th>
                    </tr>
                    </thead>
                    <tbody>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $tokens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $token): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td>
                            <?php echo e($token->name); ?>

                        </td>

                        <td>
                            <?php echo e($token->created_at); ?>

                        </td>

                        <td>
                            <?php echo e($token->expires_at); ?>

                        </td>
                        <td class="text-right">
                            <a class="action-link btn btn-danger btn-sm" wire:click="deleteToken('<?php echo e($token->id); ?>')"
                               wire:loading.attr="disabled" data-tooltip="true" title="<?php echo e(trans('general.delete')); ?>">
                                <i class="fas fa-trash" aria-hidden="true"></i>
                                <span class="sr-only">
                                    <?php echo e(trans('general.delete')); ?>

                                </span>
                            </a>
                        </td>
                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
            </table>
            </div>
        </div>
    </div>
    <!-- Create Token Modal -->
    <div wire:ignore.self class="modal fade" id="modal-create-token" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">
                        Create Token
                    </h4>
                </div>

                <div class="modal-body">
                    <!-- Form Errors -->
                    <!--[if BLOCK]><![endif]--><?php if($errors->has('name')): ?>
                        <div class="alert alert-danger">
                            <p><strong><?php echo e(trans('general.whoops')); ?></strong> <?php echo e(trans('general.something_went_wrong')); ?></p>
                            <br>
                            <ul>
                                <li>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="error">
                                        <?php echo e($message); ?>

                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                </li>
                            </ul>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <!-- Create Token Form -->
                    <form class="form-horizontal" role="form">
                        <!-- Name -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="name">Name</label>

                            <div class="col-md-6">
                                <input id="create-token-name" type="text" aria-label="name" class="form-control"
                                       name="name"
                                       wire:keydown.enter="createToken(name)"
                                       wire:model="name"
                                       autofocus
                                >
                            </div>
                        </div>
                    </form>

                </div>

                <!-- Modal Actions -->
                <div class="modal-footer">
                    <button type="button" class="btn primary" data-dismiss="modal"><?php echo e(trans('general.close')); ?></button>

                    <button type="button" class="btn btn-primary" wire:click="createToken(name)">
                        <?php echo e(trans('general.create')); ?>

                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- View New Token Modal -->
    <div class="modal fade" id="modal-access-token" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">
                        <?php echo e(trans('account/general.personal_access_token')); ?>

                    </h4>
                </div>

                <div class="modal-body">
                    <p>
                        <?php echo e(trans('account/general.here_is_api_key')); ?>

                    </p>

                    <pre><code><?php echo e($newTokenString); ?></code></pre>
                </div>

                <!-- Modal Actions -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('general.close')); ?></button>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('tokenCreated', token => {
            $('#modal-create-token').modal('hide');
            $('#modal-access-token').modal('show');
        })
        window.addEventListener('autoFocusModal', function() {
            $('#modal-create-token').on('shown.bs.modal', function() {
                $(this).find('[autofocus]').focus();
            });
        })
        // was trying to do a submit on the form when enter was pressed
        window.addEventListener("keydown", function (event) {
            if (event.key === 'Enter') {
                event.preventDefault();
            }
        })
    </script>
</div><?php /**PATH /var/www/html/snipeit/resources/views/livewire/personal-access-tokens.blade.php ENDPATH**/ ?>