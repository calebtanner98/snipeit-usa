<div>
    <div class="box box-default">

        <div class="box-header">
                <h2 class="box-title">
                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'oauth']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'oauth']); ?>
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
                    <?php echo e(trans('admin/settings/general.oauth_clients')); ?>

                </h2>
                <!--[if BLOCK]><![endif]--><?php if($authorizationError): ?>
                    <div class="alert alert-danger">
                        <p><?php echo e(trans('admin/users/message.insufficient_permissions')); ?>

                        <br>
                        <?php echo e($authorizationError); ?>

                        </p>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <div class="box-tools pull-right">
                        <a class="btn btn-primary"
                           wire:click="$dispatch('openModal')"
                           onclick="$('#modal-create-client').modal('show');">
                            <?php echo e(trans('general.create')); ?>

                        </a>
                </div>
            </div>

            <div class="box-body">
                <!-- Current Clients -->
                <!--[if BLOCK]><![endif]--><?php if($clients->count() === 0): ?>
                    <p>
                        <?php echo e(trans('admin/settings/general.oauth_no_clients')); ?>

                    </p>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <!--[if BLOCK]><![endif]--><?php if($clients->count() > 0): ?>
                    <table data-cookie-id-table="OAuthClientsTable"
                           data-pagination="true"
                           data-id-table="OAuthClientsTable"
                           data-side-pagination="client"
                           data-sort-order="desc"
                           data-sort-name="created_at"
                           id="OAuthClientsTable"
                           class="table table-striped snipe-table">
                    <thead>
                        <tr>
                            <th><?php echo e(trans('general.id')); ?></th>
                            <th data-sortable="true"><?php echo e(trans('general.name')); ?></th>
                            <th data-sortable="true"><?php echo e(trans('admin/settings/general.oauth_redirect_url')); ?></th>
                            <th data-sortable="true"><?php echo e(trans('admin/settings/general.oauth_secret')); ?></th>
                            <th data-sortable="true"><?php echo e(trans('general.created_at')); ?></th>
                            <th data-sortable="true"><?php echo e(trans('general.updated_at')); ?></th>
                            <th>
                                <span class="sr-only">
                                    <?php echo e(trans('general.actions')); ?>

                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <!-- ID -->
                                <td>
                                    <?php echo e($client->id); ?>

                                </td>

                                <!-- Name -->
                                <td>
                                    <?php echo e($client->name); ?>

                                </td>

                                <!-- Redirect -->
                                <td>
                                    <code><?php echo e($client->redirect); ?></code>
                                </td>

                                <!-- Secret -->
                                <td>
                                    <code><?php echo e($client->secret); ?></code>
                                </td>

                                <td>
                                    <?php echo e($client->created_at ? Helper::getFormattedDateObject($client->created_at, 'datetime', false) : ''); ?>

                                </td>

                                <td>
                                    <!--[if BLOCK]><![endif]--><?php if($client->created_at != $client->updated_at): ?>
                                        <?php echo e($client->updated_at ? Helper::getFormattedDateObject($client->updated_at, 'datetime', false) : ''); ?>

                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </td>

                                <!-- Edit / Delete Button -->
                                <td class="text-right">

                                    <a class="action-link btn btn-sm btn-warning"
                                       wire:click="editClient('<?php echo e($client->id); ?>')"
                                       onclick="$('#modal-edit-client').modal('show');">
                                        <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                        <span class="sr-only">
                                            <?php echo e(trans('general.update')); ?>

                                        </span>
                                    </a>

                                    <a class="action-link btn btn-danger btn-sm" wire:click="deleteClient('<?php echo e($client->id); ?>')">
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
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>



        <div>
            <!--[if BLOCK]><![endif]--><?php if($authorized_tokens->count() > 0): ?>
                <div>
                    <div class="box box-default">
                        <div class="box-header">
                            <h2 class="box-title">
                                <?php echo e(trans('admin/settings/general.oauth_authorized_apps')); ?>

                            </h2>
                        </div>

                        <div class="box-body">
                            <!-- Authorized Tokens -->
                            <table data-cookie-id-table="AuthorizedAppsTable"
                                   data-pagination="true"
                                   data-id-table="AuthorizedAppsTable"
                                   data-toolbar="#AuthorizedAppsToolbar"
                                   data-side-pagination="client"
                                   data-sort-order="desc"
                                   data-sort-name="created_at"
                                   id="AuthorizedAppsTable"
                                   class="table table-striped snipe-table">
                                <thead>
                                <tr>
                                    <th data-sortable="true"><?php echo e(trans('general.name')); ?></th>
                                    <th data-sortable="true"> <?php echo e(trans('account/general.personal_access_token')); ?></th>
                                    <th data-sortable="true"><?php echo e(trans('admin/settings/general.oauth_scopes')); ?></th>
                                    <th data-sortable="true"><?php echo e(trans('general.created_at')); ?></th>
                                    <th data-sortable="true"><?php echo e(trans('general.expires')); ?></th>
                                    <th>
                                        <span class="sr-only">
                                            <?php echo e(trans('general.actions')); ?>

                                        </span>
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $authorized_tokens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $token): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <!-- Client Name -->
                                        <td>
                                            <?php echo e($token->client->name); ?>

                                        </td>

                                        <td>
                                            <?php echo e($token->name); ?>

                                        </td>

                                        <!-- Scopes -->
                                        <td>
                                            <!--[if BLOCK]><![endif]--><?php if(!$token->scopes): ?>
                                                <span class="label label-default">
                                                    <?php echo e(trans('admin/settings/general.no_scopes')); ?>

                                                </span>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        </td>

                                        <td>
                                            <?php echo e($token->created_at ? Helper::getFormattedDateObject($token->created_at, 'datetime', false) : ''); ?>

                                        </td>

                                        <td>
                                            <?php echo e($token->expires_at ? Helper::getFormattedDateObject($token->expires_at, 'datetime', false) : ''); ?>

                                        </td>
                                        <!-- Revoke Button -->
                                        <td>
                                            <a class="btn btn-sm btn-danger pull-right"
                                                wire:click="deleteToken('<?php echo e($token->id); ?>')"
                                            >
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
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->





    <!-- Create Client Modal -->
    <div class="modal fade" id="modal-create-client" tabindex="-1" role="dialog" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h2 class="modal-title">
                        <?php echo e(trans('admin/settings/general.create_client')); ?>

                    </h2>
                </div>

                <div class="modal-body">
                    <!-- Form Errors -->
                    <!--[if BLOCK]><![endif]--><?php if($errors->has('name') || $errors->has('redirect')): ?>
                        <div class="alert alert-danger">
                            <p><strong>Whoops!</strong> Something went wrong!</p>
                            <br>
                            <ul>
                                <?php if($errors->has('name')): ?>
                                    <li><?php echo e($errors->first('name')); ?></li>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                <!--[if BLOCK]><![endif]--><?php if($errors->has('redirect')): ?>
                                    <li><?php echo e($errors->first('redirect')); ?></li>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </ul>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <!-- Create Client Form -->
                    <form class="form-horizontal" role="form">
                        <!-- Name -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="create-client-name">
                                <?php echo e(trans('general.name')); ?>

                            </label>

                            <div class="col-md-7">
                                <input id="create-client-name"
                                       type="text"
                                       aria-label="create-client-name"
                                       class="form-control"
                                       wire:model="name"
                                       wire:keydown.enter="createClient"
                                       autofocus>

                                <span class="help-block">
                                   <?php echo e(trans('admin/settings/general.oauth_name_help')); ?>

                                </span>
                            </div>
                        </div>

                        <!-- Redirect URL -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="redirect"><?php echo e(trans('admin/settings/general.oauth_redirect_url')); ?></label>

                            <div class="col-md-7">
                                <input type="text"
                                       class="form-control"
                                       aria-label="redirect"
                                       name="redirect"
                                       wire:model="redirect"
                                       wire:keydown.enter="createClient"
                                >

                                <span class="help-block">
                                    <?php echo e(trans('admin/settings/general.oauth_callback_url')); ?>

                                </span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal Actions -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button"
                            class="btn btn-primary"
                            wire:click="createClient"
                    >
                        Create
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Edit Client Modal -->
    <div class="modal fade" id="modal-edit-client" tabindex="-1" role="dialog" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">
                        <?php echo e(trans('general.update')); ?>

                    </h4>
                </div>


                <div class="modal-body">
                    <!--[if BLOCK]><![endif]--><?php if($errors->has('newName') || $errors->has('newRedirect')): ?>
                        <div class="alert alert-danger">
                            <p><strong>Whoops!</strong> Something went wrong!</p>
                            <br>
                            <ul>
                                <?php if($errors->has('newName')): ?>
                                    <li><?php echo e($errors->first('newName')); ?></li>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                <!--[if BLOCK]><![endif]--><?php if($errors->has('newRedirect')): ?>
                                    <li><?php echo e($errors->first('newRedirect')); ?></li>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                <!--[if BLOCK]><![endif]--><?php if($authorizationError): ?>
                                    <li><?php echo e($authorizationError); ?></li>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </ul>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <!-- Edit Client Form -->
                    <form class="form-horizontal">
                        <!-- Name -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="edit-client-name">Name</label>

                            <div class="col-md-7">
                                <input
                                        id="edit-client-name"
                                        type="text"
                                        aria-label="edit-client-name"
                                        class="form-control"
                                        wire:model.live="editName"
                                        wire:keydown.enter="updateClient('<?php echo e($editClientId); ?>')"
                                >

                                <span class="help-block">
                                    <?php echo e(trans('admin/settings/general.oauth_name_help')); ?>

                                </span>
                            </div>
                        </div>

                        <!-- Redirect URL -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="redirect"><?php echo e(trans('admin/settings/general.oauth_redirect_url')); ?></label>

                            <div class="col-md-7">
                                <input
                                        type="text"
                                        class="form-control"
                                        name="redirect"
                                        aria-label="redirect"
                                        wire:model="editRedirect"
                                        wire:keydown.enter="updateClient('<?php echo e($editClientId); ?>')"
                                >

                                <span class="help-block">
                                    <?php echo e(trans('admin/settings/general.oauth_callback_url')); ?>

                                </span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal Actions -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <button
                            class="btn btn-primary"
                            wire:click="updateClient('<?php echo e($editClientId); ?>')"
                    >
                        Update Client
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Livewire.on('openModal', () => {
                $('#modal-create-client').modal('show').on('shown.bs.modal', function() {
                    $(this).find('[autofocus]').focus();
                });
            });
        });
        window.addEventListener('clientCreated', function() {
            $('#modal-create-client').modal('hide');
        });
        window.addEventListener('editClient', function() {
            $('#modal-edit-client').modal('show');
        });
        window.addEventListener('clientUpdated', function() {
            $('#modal-edit-client').modal('hide');
        });



    </script>
</div>

<?php $__env->startSection('moar_scripts'); ?>
    <?php echo $__env->make('partials.bootstrap-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php /**PATH /var/www/html/snipeit/resources/views/livewire/oauth-clients.blade.php ENDPATH**/ ?>