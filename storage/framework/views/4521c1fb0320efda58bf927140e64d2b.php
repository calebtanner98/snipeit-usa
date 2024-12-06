<?php $__env->startSection('title0'); ?>
    <?php echo e(trans('admin/hardware/general.requested')); ?>

    <?php echo e(trans('general.assets')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>
    <?php echo $__env->yieldContent('title0'); ?> <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if($requestedItems->count() > 0 || $waitlistItems->count() > 0): ?>
                                <div class="table-responsive">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#assets" data-toggle="tab">Assets <badge
                                                    class="badge badge-secondary"> <?php echo e($pendingAssetRequestCount); ?>

                                                </badge>
                                            </a></li>
                                        <li><a href="#licenses" data-toggle="tab">Licenses <badge
                                                    class="badge badge-secondary"> <?php echo e($pendingLicenseRequestCount); ?>

                                                </badge></a></li>
                                        <li><a href="#accessories" data-toggle="tab">Accessories <badge
                                                    class="badge badge-secondary"> <?php echo e($pendingAccessoryRequestCount); ?>

                                                </badge></a></li>
                                        <li><a href="#components" data-toggle="tab">Components <badge
                                                    class="badge badge-secondary"> <?php echo e($pendingComponentRequestCount); ?>

                                                </badge></a></li>
                                        <li><a href="#consumables" data-toggle="tab">Consumables <badge
                                            class="badge badge-secondary"> <?php echo e($pendingConsumableRequestCount); ?>

                                        </badge></a></li>
                                        <li><a href="#waitlist" data-toggle="tab">Waitlist <badge
                                            class="badge badge-secondary"> <?php echo e($waitlistItems->count()); ?>

                                        </badge></a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="assets">
                                            <table name="requestedAssets" id="requestedAssets"
                                                class="table table-striped snipe-table" data-toolbar="#toolbar"
                                                data-advanced-search="true" data-search="true" data-show-columns="true"
                                                data-show-export="true" data-pagination="true"
                                                data-id-table="requestedAssets" data-cookie-id-table="requestedAssets"
                                                data-export-options='{
                                                    "fileName": "export-assetrequests-<?php echo e(date('Y-m-d')); ?>",
                                                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                                                }'>
                                                <thead>
                                                    <tr role="row">
                                                        <th class="col-md-2">Item Name</th>
                                                        <th class="col-md-2" data-sortable="true">
                                                            <?php echo e(trans('admin/hardware/table.location')); ?></th>
                                                        <th class="col-md-2" data-sortable="true">
                                                            <?php echo e(trans('admin/hardware/table.requesting_user')); ?></th>
                                                        <th class="col-md-2">
                                                            <?php echo e(trans('admin/hardware/table.requested_date')); ?></th>
                                                        <th class="col-md-2">Status</th>
                                                        <th class="col-md-2"><?php echo e(trans('button.actions')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $requestedItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($request->requestable && $request->itemType() == 'asset'): ?>
                                                            <tr>
                                                                <?php echo e(csrf_field()); ?>

                                                                <td>
                                                                    <a href="<?php echo e(config('app.url')); ?>/hardware/<?php echo e($request->requestable->id); ?>">
                                                                        <?php echo e($request->name()); ?>

                                                                    </a>
                                                                </td>
                                                                <td><?php echo e($request->location() ? $request->location()->name : ''); ?></td>
                                                                <td>
                                                                    <?php if($request->requestingUser() && !$request->requestingUser()->trashed()): ?>
                                                                        <a href="<?php echo e(config('app.url')); ?>/users/<?php echo e($request->requestingUser()->id); ?>">
                                                                            <?php echo e($request->requestingUser()->present()->fullName()); ?>

                                                                        </a>
                                                                    <?php else: ?>
                                                                        (deleted user)
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td><?php echo e(App\Helpers\Helper::getFormattedDateObject($request->created_at, 'datetime', false)); ?></td>
                                                                <td>
                                                                    <?php if($request->fulfilled_at): ?>
                                                                        <span class="label label-success"><?php echo e(trans('general.fulfilled')); ?></span>
                                                                    <?php elseif($request->canceled_at): ?>
                                                                        <span class="label label-danger"><?php echo e(trans('general.canceled')); ?></span>
                                                                    <?php else: ?>
                                                                        <span class="label label-warning"><?php echo e(trans('general.pending')); ?></span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if(!$request->fulfilled_at && !$request->canceled_at && $request->requestable->assigned_to == ''): ?>
                                                                    <a href="<?php echo e(config('app.url')); ?>/hardware/<?php echo e($request->requestable->id); ?>/checkout/<?php echo e($request->id); ?>"
                                                                        class="btn btn-success btn-sm" data-tooltip="true"
                                                                        title="<?php echo e(trans('general.checkout')); ?>">
                                                                        <i class="fas fa-check" style="color: white;"></i>
                                                                    </a>
                                                                    <?php elseif($request->requestable->assigned_to != ''): ?>
                                                                    <a href="<?php echo e(config('app.url')); ?>/hardware/<?php echo e($request->requestable->id); ?>/checkin"
                                                                        class="btn btn-sm bg-blue" data-tooltip="true"
                                                                        title="Check In Item"><i class="fas fa-sign-in-alt"></i></a>
                                                                    <?php endif; ?>
                                                                    <?php if(!$request->fulfilled_at && !$request->canceled_at): ?>
                                                                    <!-- Cancel Button -->
                                                                    <?php echo e(Form::open(['method' => 'POST', 'route' => ['account/request-item', $request->itemType(), $request->requestable->id, true, $request->requestingUser()->id], 'style' => 'display:inline;'])); ?>

                                                                    <button class="btn btn-warning btn-sm" data-tooltip="true" title="<?php echo e(trans('general.cancel_request')); ?>">
                                                                        <i class="fas fa-times"></i>
                                                                    </button>
                                                                    <?php echo e(Form::close()); ?>

                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="licenses">
                                            <table name="requestedLicenses" id="requestedLicenses"
                                                class="table table-striped snipe-table" data-toolbar="#toolbar"
                                                data-pagination="true" data-id-table="requestedLicenses" data-search="true"
                                                data-show-columns="true" data-show-export="true"
                                                data-export-options='{
                                            "fileName": "export-requestedlicenses-<?php echo e(date('Y-m-d')); ?>",
                                            "ignoreColumn": ["actions"]
                                            }'>
                                                <thead>
                                                    <tr role="row">
                                                        <th class="col-md-2"><?php echo e(trans('admin/licenses/table.title')); ?></th>
                                                        <th class="col-md-1"><?php echo e(trans('admin/licenses/form.seats')); ?></th>
                                                        <th class="col-md-1">
                                                            <?php echo e(trans('admin/licenses/form.remaining_seats')); ?></th>
                                                        <th class="col-md-2">
                                                            <?php echo e(trans('admin/hardware/table.requesting_user')); ?></th>
                                                        <th class="col-md-2">
                                                            <?php echo e(trans('admin/hardware/table.requested_date')); ?></th>
                                                        <th class="col-md-1"><?php echo e(trans('general.status')); ?></th>
                                                        <th class="col-md-1"><?php echo e(trans('button.actions')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $requestedItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($request->canceled_at === null && $request->itemType() == 'license'): ?>
                                                            <tr>
                                                                <?php echo e(csrf_field()); ?>

                                                                <td>
                                                                    <?php if($request->license): ?>
                                                                        <a
                                                                            href="<?php echo e(route('licenses.show', $request->license_id)); ?>">
                                                                            <?php echo e($request->license->name); ?>

                                                                        </a>
                                                                    <?php else: ?>
                                                                        <?php echo e(trans('admin/licenses/general.deleted')); ?>

                                                                    <?php endif; ?>
                                                                </td>
                                                                <td><?php echo e($request->seats_requested); ?></td>
                                                                <td>
                                                                    <?php if($request->license && $request->license->canceled_at === null): ?>
                                                                        <?php echo e($request->license->freeSeats()->count()); ?>

                                                                    <?php else: ?>
                                                                        <?php echo e(trans('admin/licenses/general.not_available')); ?>

                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if($request->user): ?>
                                                                        <a
                                                                            href="<?php echo e(route('users.show', $request->user->id)); ?>">
                                                                            <?php echo e($request->user->present()->fullName()); ?>

                                                                        </a>
                                                                    <?php else: ?>
                                                                        <?php echo e(trans('general.user_deleted')); ?>

                                                                    <?php endif; ?>
                                                                </td>
                                                                <td><?php echo e(\App\Helpers\Helper::getFormattedDateObject($request->created_at, 'datetime', false)); ?>

                                                                </td>
                                                                <td>
                                                                    <?php if($request->fulfilled_at): ?>
                                                                        <span
                                                                            class="label label-success"><?php echo e(trans('general.fulfilled')); ?></span>
                                                                    <?php elseif($request->canceled_at): ?>
                                                                        <span
                                                                            class="label label-danger"><?php echo e(trans('general.canceled')); ?></span>
                                                                    <?php else: ?>
                                                                        <span
                                                                            class="label label-warning"><?php echo e(trans('general.pending')); ?></span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if(!$request->fulfilled_at && !$request->canceled_at): ?>
                                                                    <?php if( $request->license->freeSeats()->count() > 0 ): ?>
                                                                    <a href="<?php echo e(config('app.url')); ?>/licenses/<?php echo e($request->license->id); ?>/checkout-request/<?php echo e($request->id); ?>"
                                                                        class="btn btn-success btn-sm text"
                                                                        data-tooltip="true"
                                                                        title="<?php echo e(trans('general.checkout')); ?>">
                                                                        <i class="fas fa-check"
                                                                            style="color: white;"></i>
                                                                    </a>
                                                                    <?php endif; ?>
                                                                        <a href="<?php echo e(config('app.url')); ?>/account/cancel-license-request/<?php echo e($request->license_id); ?>/<?php echo e($request->user_id); ?>"                                                                            class="btn btn-warning btn-sm"
                                                                            data-tooltip="true"
                                                                            title="<?php echo e(trans('general.cancel_request')); ?>">
                                                                            <i class="fas fa-times"></i>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="accessories">
                                            <table name="requestedAccessories" id="requestedAccessories"
                                                class="table table-striped snipe-table" data-toolbar="#toolbar"
                                                data-advanced-search="true" data-search="true" data-show-columns="true"
                                                data-show-export="true" data-pagination="true"
                                                data-id-table="requestedAccessories"
                                                data-cookie-id-table="requestedAccessories"
                                                data-export-options='{
                                                    "fileName": "export-accessoryrequests-<?php echo e(date('Y-m-d')); ?>",
                                                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                                                }'>
                                                <thead>
                                                    <tr role="row">
                                                        <th class="col-md-3">Item Name</th>
                                                        <th class="col-md-2" data-sortable="true">
                                                            Quantity Requested</th>  
                                                        <th class="col-md-2" data-sortable="true">
                                                            Requesting User</th>
                                                        <th class="col-md-2">
                                                            <?php echo e(trans('admin/hardware/table.requested_date')); ?></th>
                                                        <th class="col-md-2" data-sortable="true">
                                                            Status</th>
                                                        <th class="col-md-1"><?php echo e(trans('button.actions')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $requestedItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($request->canceled_at === null && $request->itemType() == 'accessory'): ?>
                                                            <tr>
                                                                <?php echo e(csrf_field()); ?>

                                                                <td>
                                                                    <?php if($request->accessory): ?>
                                                                        <a
                                                                            href="<?php echo e(route('accessories.show', $request->accessory_id)); ?>">
                                                                            <?php echo e($request->accessory->name); ?>

                                                                        </a>
                                                                    <?php else: ?>
                                                                        <?php echo e(trans('admin/accessories/general.deleted')); ?>

                                                                    <?php endif; ?>
                                                                </td>
                                                                <td><?php echo e($request->quantity); ?></td>
                                                                <td>
                                                                    <?php if($request->user): ?>
                                                                        <a
                                                                            href="<?php echo e(route('users.show', $request->user->id)); ?>">
                                                                            <?php echo e($request->user->present()->fullName()); ?>

                                                                        </a>
                                                                    <?php else: ?>
                                                                        <?php echo e(trans('general.user_deleted')); ?>

                                                                    <?php endif; ?>
                                                                </td>
                                                                <td><?php echo e(\App\Helpers\Helper::getFormattedDateObject($request->created_at, 'datetime', false)); ?>

                                                                </td>
                                                                <td>
                                                                    <?php if($request->fulfilled_at): ?>
                                                                        <span
                                                                            class="label label-success"><?php echo e(trans('general.fulfilled')); ?></span>
                                                                    <?php elseif($request->canceled_at): ?>
                                                                        <span
                                                                            class="label label-danger"><?php echo e(trans('general.canceled')); ?></span>
                                                                    <?php else: ?>
                                                                        <span
                                                                            class="label label-warning"><?php echo e(trans('general.pending')); ?></span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if(!$request->fulfilled_at && !$request->canceled_at): ?>
                                                                    <a href="<?php echo e(config('app.url')); ?>/accessories/<?php echo e($request->accessory->id); ?>/checkout/<?php echo e($request->id); ?>"
                                                                        class="btn btn-sm bg-green"
                                                                        data-tooltip="true"
                                                                        title="<?php echo e(trans('general.checkout_user_tooltip')); ?>"><i class="fas fa-check"
                                                                        style="color: white;"></i>
                                                                    </a>
                                                                        <a href="<?php echo e(config('app.url')); ?>/accessories/cancel-request/<?php echo e($request->id); ?>" class="btn btn-warning btn-sm"
                                                                            data-tooltip="true"
                                                                            title="<?php echo e(trans('general.cancel_request')); ?>">
                                                                            <i class="fas fa-times"></i>
                                                                        </a>

                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="components">
                                            <table name="requestedComponents" id="requestedComponents"
                                                class="table table-striped snipe-table" data-toolbar="#toolbar"
                                                data-advanced-search="true" data-search="true" data-show-columns="true"
                                                data-show-export="true" data-pagination="true"
                                                data-id-table="requestedComponents"
                                                data-cookie-id-table="requestedComponents"
                                                data-export-options='{
                                                    "fileName": "export-component-requests-<?php echo e(date('Y-m-d')); ?>",
                                                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                                                }'>
                                                <thead>
                                                    <tr role="row">
                                                        <th class="col-md-2">Item Name</th>
                                                        <th class="col-md-2" data-sortable="true">
                                                            Quantity Requested</th>
                                                        <th class="col-md-1" data-sortable="true">
                                                            Remaining</th>                                                            
                                                        <th class="col-md-2" data-sortable="true">
                                                            Requesting User</th>
                                                        <th class="col-md-2">
                                                            <?php echo e(trans('admin/hardware/table.requested_date')); ?></th>
                                                        <th class="col-md-2" data-sortable="true">
                                                            Status</th>
                                                        <th class="col-md-1"><?php echo e(trans('button.actions')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $requestedItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($request->canceled_at === null && $request->itemType() == 'component'): ?>
                                                            <tr>
                                                                <?php echo e(csrf_field()); ?>

                                                                <td>
                                                                    <?php if($request->component): ?>
                                                                        <a
                                                                            href="<?php echo e(route('components.show', $request->component_id)); ?>">
                                                                            <?php echo e($request->component->name); ?>

                                                                        </a>
                                                                    <?php else: ?>
                                                                        <?php echo e(trans('admin/component/general.deleted')); ?>

                                                                    <?php endif; ?>
                                                                </td>
                                                                <td><?php echo e($request->quantity); ?></td>
                                                                <td><?php echo e($request->component->numRemaining()); ?></td>
                                                                <td>
                                                                    <?php if($request->user): ?>
                                                                        <a
                                                                            href="<?php echo e(route('users.show', $request->user->id)); ?>">
                                                                            <?php echo e($request->user->present()->fullName()); ?>

                                                                        </a>
                                                                    <?php else: ?>
                                                                        <?php echo e(trans('general.user_deleted')); ?>

                                                                    <?php endif; ?>
                                                                </td>
                                                                <td><?php echo e(\App\Helpers\Helper::getFormattedDateObject($request->created_at, 'datetime', false)); ?>

                                                                </td>
                                                                <td>
                                                                    <?php if($request->fulfilled_at): ?>
                                                                        <span
                                                                            class="label label-success"><?php echo e(trans('general.fulfilled')); ?></span>
                                                                    <?php elseif($request->deleted_at): ?>
                                                                        <span
                                                                            class="label label-danger"><?php echo e(trans('general.canceled')); ?></span>
                                                                    <?php else: ?>
                                                                        <span
                                                                            class="label label-warning"><?php echo e(trans('general.pending')); ?></span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if($request->component->numRemaining() > 0): ?>
                                                                        <a href="<?php echo e(config('app.url')); ?>/components/<?php echo e($request->component->id); ?>/checkout/<?php echo e($request->id); ?>"
                                                                            class="btn btn-success btn-sm text"
                                                                            data-tooltip="true"
                                                                            title="<?php echo e(trans('general.checkout')); ?>">
                                                                            <i class="fas fa-check"
                                                                                style="color: white;"></i>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                    <a href="<?php echo e(config('app.url')); ?>/components/cancel-request/<?php echo e($request->id); ?>" class="btn btn-warning btn-sm"
                                                                        data-tooltip="true"
                                                                        title="<?php echo e(trans('general.cancel_request')); ?>">
                                                                        <i class="fas fa-times"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="consumables">
                                            <table name="requestedConsumables" id="requestedConsumables"
                                                class="table table-striped snipe-table" data-toolbar="#toolbar"
                                                data-advanced-search="true" data-search="true" data-show-columns="true"
                                                data-show-export="true" data-pagination="true"
                                                data-id-table="requestedConsumables"
                                                data-cookie-id-table="requestedConsumables"
                                                data-export-options='{
                                                    "fileName": "export-consumables-requests-<?php echo e(date('Y-m-d')); ?>",
                                                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                                                }'>
                                                <thead>
                                                    <tr role="row">
                                                        <th class="col-md-2">Item Name</th>
                                                        <th class="col-md-2" data-sortable="true">
                                                            Quantity Requested</th>
                                                        <th class="col-md-1" data-sortable="true">
                                                            Remaining</th>
                                                        <th class="col-md-2" data-sortable="true">
                                                            Requesting User</th>
                                                        <th class="col-md-2">
                                                            <?php echo e(trans('admin/hardware/table.requested_date')); ?></th>
                                                        <th class="col-md-2" data-sortable="true">
                                                            Status</th>
                                                        <th class="col-md-1"><?php echo e(trans('button.actions')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $requestedItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($request->canceled_at === null && $request->itemType() == 'consumable'): ?>
                                                            <tr>
                                                                <?php echo e(csrf_field()); ?>

                                                                <td>
                                                                    <?php if($request->consumable): ?>
                                                                        <a
                                                                            href="<?php echo e(route('consumables.show', $request->consumable_id)); ?>">
                                                                            <?php echo e($request->consumable->name); ?>

                                                                        </a>
                                                                    <?php else: ?>
                                                                        <?php echo e(trans('admin/consumable/general.deleted')); ?>

                                                                    <?php endif; ?>
                                                                </td>
                                                                <td><?php echo e($request->quantity); ?></td>
                                                                <td><?php echo e($request->consumable->numRemaining()); ?></td>
                                                                <td>
                                                                    <?php if($request->user): ?>
                                                                        <a
                                                                            href="<?php echo e(route('users.show', $request->user->id)); ?>">
                                                                            <?php echo e($request->user->present()->fullName()); ?>

                                                                        </a>
                                                                    <?php else: ?>
                                                                        <?php echo e(trans('general.user_deleted')); ?>

                                                                    <?php endif; ?>
                                                                </td>
                                                                <td><?php echo e(\App\Helpers\Helper::getFormattedDateObject($request->created_at, 'datetime', false)); ?>

                                                                </td>
                                                                <td>
                                                                    <?php if($request->fulfilled_at): ?>
                                                                        <span
                                                                            class="label label-success"><?php echo e(trans('general.fulfilled')); ?></span>
                                                                    <?php elseif($request->deleted_at): ?>
                                                                        <span
                                                                            class="label label-danger"><?php echo e(trans('general.canceled')); ?></span>
                                                                    <?php else: ?>
                                                                        <span
                                                                            class="label label-warning"><?php echo e(trans('general.pending')); ?></span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if($request->consumable->numRemaining() > 0): ?>
                                                                        <a href="<?php echo e(config('app.url')); ?>/consumables/<?php echo e($request->consumable->id); ?>/checkout/<?php echo e($request->id); ?>"
                                                                            class="btn btn-success btn-sm text"
                                                                            data-tooltip="true"
                                                                            title="<?php echo e(trans('general.checkout')); ?>">
                                                                            <i class="fas fa-check"
                                                                                style="color: white;"></i>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                    <a href="<?php echo e(config('app.url')); ?>/consumables/cancel-request/<?php echo e($request->id); ?>" class="btn btn-warning btn-sm"
                                                                        data-tooltip="true"
                                                                        title="<?php echo e(trans('general.cancel_request')); ?>">
                                                                        <i class="fas fa-times"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="waitlist">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table data-click-to-select="true" data-cookie-id-table="waitlistAllTable"
                                                            data-pagination="true" data-id-table="waitlistAllTable" data-search="true"
                                                            data-side-pagination="server" data-show-columns="true"
                                                            data-show-export="false" data-show-footer="false" data-show-refresh="true"
                                                            data-sort-order="asc" data-sort-name="name" id="waitlistAllTable"
                                                            class="table table-striped snipe-table"
                                                            data-url="<?php echo e(route('api.waitlist.all')); ?>"
                                                            data-response-handler="waitlistResponseHandler">
                                                            <thead>
                                                                <tr>
                                                                    <th class="col-md-2" data-field="requestable_model" data-sortable="false">
                                                                        Item
                                                                    </th>
                                                                    <th class="col-md-2" data-field="quantity" data-sortable="false">
                                                                        Quantity
                                                                    </th>
                                                                    <th class="col-md-2" data-field="requested_at" data-formatter="dateDisplayFormatter" data-sortable="false">
                                                                        Requested At
                                                                    </th>
                                                                    <th class="col-md-2" data-field="name" data-sortable="false">
                                                                        Requested By
                                                                    </th>
                                                                    <th class="col-md-2" data-field="canceled_at" data-formatter="canceledStatusFormatter" data-sortable="false">
                                                                        Status
                                                                    </th>                                                    
                                                                    <th class="col-md-2" data-field="actions" data-formatter="waitlistActionsFormatter">Actions</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="col-md-12">
                                    <div class="alert alert-info alert-block">
                                        <i class="fas fa-info-circle"></i>
                                        <?php echo e(trans('general.no_results')); ?>

                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function waitlistResponseHandler(res) {
            return {
                total: res.total,
                rows: res.waitlist
            };
        }
        function waitlistActionsFormatter(value, row, index) {
                return `
            <button type="button" class="btn btn-success btn-sm" title="Close Request" onclick="handleCloseWaitlistRequest(${row.id})"}>
                                                                                            <i class="fas fa-check"
                                                                                style="color: white;"></i>
                                                                                
            </button>
            <button type="button" class="btn btn-warning btn-sm" title="Cancel Request" onclick="handleCancelWaitlistRequest(${row.id})"}>
                                                                                            <i class="fas fa-x"
                                                                                style="color: white;"></i>
                                                                                
            </button>
            <button type="button" class="btn btn-danger btn-sm" title="Deny Request" onclick="handleDenyWaitlistRequest(${row.id})"}>
                                                                                            <i class="fas fa-ban"
                                                                                style="color: white;"></i>
                                                                                
            </button>
        `
        }
        
        function canceledStatusFormatter(value, row) {
            if (row.canceled_at) {
                return '<span class="label label-danger">' + "<?php echo e(trans('general.canceled')); ?>" + '</span>';
            } else {
                return '<span class="label label-warning">' + "<?php echo e(trans('general.pending')); ?>" + '</span>';
            }
        }

        function handleCancelWaitlistRequest(waitlistId) {
            let form = document.createElement("form");
            form.action = `<?php echo e(config('app.url')); ?>/account/cancel-waitlist-admin/${waitlistId}`;
            form.method = "POST";

            let csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = '<?php echo e(csrf_token()); ?>';
            form.appendChild(csrfInput);

            document.body.appendChild(form);
            form.submit();
        }

        function handleCloseWaitlistRequest(waitlistId) {
            let form = document.createElement("form");
            form.action = `<?php echo e(config('app.url')); ?>/account/close-waitlist-admin/${waitlistId}`;
            form.method = "POST";

            let csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = '<?php echo e(csrf_token()); ?>';
            form.appendChild(csrfInput);

            document.body.appendChild(form);
            form.submit();
        }
        function handleDenyWaitlistRequest(waitlistId) {
            let form = document.createElement("form");
            form.action = `<?php echo e(config('app.url')); ?>/account/deny-waitlist-admin/${waitlistId}`;
            form.method = "POST";

            let csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = '<?php echo e(csrf_token()); ?>';
            form.appendChild(csrfInput);

            document.body.appendChild(form);
            form.submit();
        }
    </script>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
    <?php echo $__env->make('partials.bootstrap-table', [
        'exportFile' => 'requested-export',
        'search' => true,
        'clientSearch' => true,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/test-deploy/resources/views/hardware/requested.blade.php ENDPATH**/ ?>