<?php $__env->startSection('title0'); ?>
    <?php echo e(trans('general.request_portal')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>
    <?php echo $__env->yieldContent('title0'); ?> <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="row">
        <!-- panel -->
    <div class="col-lg-2 col-xs-4">
            <!-- small box -->
            <div class="dashboard small-box bg-primary" style="border-radius: 12px">
                <div class="inner">
                    <h3><?php echo e($assets->count()); ?></h3>
                    <p>Available Assets</p>
                </div>
                <div class="icon" aria-hidden="true">
                    <i class="fa fa-server"></i>
                </div>                    
            </div>
        </div><!-- ./col -->

        <div class="col-lg-2 col-xs-4">
            <!-- small box -->
            <div class="dashboard small-box bg-yellow" style="border-radius: 12px">
                <div class="inner">
                    <h3><?php echo e($licenses->count()); ?></h3>
                    <p>Available Licenses</p>
                </div>
                <div class="icon" aria-hidden="true">
                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'licenses']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'licenses']); ?>
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
                </div>
            </div>
        </div><!-- ./col -->

        <!-- panel -->
        <div class="col-lg-2 col-xs-4">
            <!-- small box -->
            <div class="dashboard small-box bg-purple" style="border-radius: 12px">
                <div class="inner">
                    <h3><?php echo e($accessories->count()); ?></h3>
                    <p>Available Accessories</p>
                </div>
                <div class="icon" aria-hidden="true">
                    <i class="fa fa-headphones"></i>
                </div>                    
            </div>
        </div><!-- ./col -->

        <div class="col-lg-2 col-xs-4">
            <!-- small box -->
            <div class="dashboard small-box bg-green" style="border-radius: 12px">
                <div class="inner">
                    <h3><?php echo e($components->count()); ?></h3>
                    <p>Available Components</p>
                </div>
                <div class="icon" aria-hidden="true">
                    <i class="fa fa-microchip"></i>
                </div>                    
            </div>
        </div>

        <div class="col-lg-2 col-xs-4">
            <!-- small box -->
            <div class="dashboard small-box bg-teal" style="border-radius: 12px">
                <div class="inner">
                    <h3><?php echo e($consumables->count()); ?></h3>
                    <p>Available Consumables</p>
                </div>
                <div class="icon" aria-hidden="true">
                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'consumables']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'consumables']); ?>
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
                </div>                  
            </div>
        </div>
        <div class="col-lg-2 col-xs-4">
            <!-- small box -->
            <div class="dashboard small-box bg-red" style="border-radius: 12px">
                <div class="inner">
                    <h3><?php echo e($pendingRequestCount); ?></h3>
                    <p>Pending Requests</p>
                </div>
                <div class="icon" aria-hidden="true">
                    <i class="fa fa-envelope"></i>
                </div>                    
            </div>
        </div>
    </div>

    <div class="row">
        <!--table -->
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <?php if(auth()->user()->hasAccess('assets.view.requestable')): ?>
                        <?php if($assets->count() > 0): ?>
                            <li class="active">
                                <a href="#assets" data-toggle="tab"
                                    title="<?php echo e(trans('general.assets')); ?>"><?php echo e(trans('general.assets')); ?>

                                    <badge class="badge badge-secondary"> <?php echo e($assets->count()); ?></badge>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if($licenses->count() > 0): ?>
                        <?php if(auth()->user()->hasAccess('licenses.requestable.view')): ?>
                            <li class="">
                                <a href="#licenses" data-toggle="tab"
                                    title="<?php echo e(trans('general.licenses')); ?>"><?php echo e(trans('general.licenses')); ?>

                                    <badge class="badge badge-secondary"><?php echo e($licenses->count()); ?></badge>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if($accessories->count() > 0): ?>
                        <?php if(auth()->user()->hasAccess('accessories.requestable.view')): ?>
                            <li class="">
                                <a href="#accessories" data-toggle="tab"
                                    title="<?php echo e(trans('general.accessories')); ?>"><?php echo e(trans('general.accessories')); ?>

                                    <badge class="badge badge-secondary"><?php echo e($accessories->count()); ?></badge>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if($components->count() > 0): ?>
                        <?php if(auth()->user()->hasAccess('components.requestable.view')): ?>
                            <li class="">
                                <a href="#components" data-toggle="tab"
                                    title="<?php echo e(trans('general.components')); ?>"><?php echo e(trans('general.components')); ?>

                                    <badge class="badge badge-secondary"><?php echo e($components->count()); ?></badge>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(auth()->user()->hasAccess('consumables.requestable.view')): ?>
                        <?php if($consumables->count() > 0): ?>
                        <li class="">
                            <a href="#consumables" data-toggle="tab" title="Consumables">Consumables
                                <badge class="badge badge-secondary"><?php echo e($consumables->count()); ?></badge>
                            </a>
                        </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if($employeeWaitlist->count() > 0): ?>
                        <li class="">
                            <a href="#waitlist" data-toggle="tab" title="Waitlist">Waitlist
                                <badge class="badge badge-secondary"><?php echo e($employeeWaitlist->count()); ?></badge>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content">
                    <?php if($assets->count() > 0): ?>
                        <div class="tab-pane active" id="assets">
                            <div class="table-responsive">
                                <table data-click-to-select="true" data-cookie-id-table="requestableAssetsListingTable"
                                    data-pagination="true" data-id-table="requestableAssetsListingTable" data-search="true"
                                    data-side-pagination="server" data-show-columns="true" data-show-export="false"
                                    data-show-footer="false" data-show-refresh="true" data-sort-order="asc"
                                    data-sort-name="name" data-toolbar="#assetsBulkEditToolbar"
                                    data-bulk-button-id="#bulkAssetEditButton" data-bulk-form-id="#assetsBulkForm"
                                    id="assetsListingTable" class="table table-striped snipe-table"
                                    data-url="<?php echo e(route('api.assets.requestable', ['requestable' => true])); ?>">

                                    <thead>
                                        <tr>
                                            <th class="col-md-1" data-field="image" data-formatter="imageFormatter"
                                                data-sortable="true">
                                                <?php echo e(trans('general.image')); ?></th>
                                            <th class="col-md-2" data-field="asset_tag" data-sortable="true">
                                                <?php echo e(trans('general.asset_tag')); ?></th>
                                            <th class="col-md-2" data-field="model" data-sortable="true">
                                                <?php echo e(trans('admin/hardware/table.asset_model')); ?></th>
                                            <th class="col-md-2" data-field="model_number" data-sortable="true">
                                                <?php echo e(trans('admin/models/table.modelnumber')); ?></th>
                                            <th class="col-md-2" data-field="name" data-sortable="true">
                                                <?php echo e(trans('admin/hardware/form.name')); ?></th>
                                            <th class="col-md-3" data-field="serial" data-sortable="true">
                                                <?php echo e(trans('admin/hardware/table.serial')); ?></th>

                                            <?php $__currentLoopData = \App\Models\CustomField::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($field->field_encrypted == '0' && $field->show_in_requestable_list == '1'): ?>
                                                    <th class="col-md-2"
                                                        data-field="custom_fields.<?php echo e($field->db_column); ?>"
                                                        data-sortable="true"><?php echo e($field->name); ?></th>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <th class="col-md-1" data-formatter="assetRequestActionsFormatter"
                                                data-field="actions" data-sortable="false">
                                                <?php echo e(trans('table.actions')); ?></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(auth()->user()->hasAccess('licenses.requestable.view')): ?>
                        <?php if($licenses->count() > 0): ?>
                            <div class="tab-pane" id="licenses">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table data-click-to-select="true"
                                                data-cookie-id-table="requestableLicensesListingTable"
                                                data-pagination="true" data-id-table="requestableLicensesListingTable"
                                                data-search="true" data-side-pagination="server" data-show-columns="true"
                                                data-show-export="false" data-show-footer="false"
                                                data-show-refresh="true" data-sort-order="asc" data-sort-name="name"
                                                id="licensesListingTable" class="table table-striped snipe-table"
                                                data-url="<?php echo e(route('api.licenses.requestable')); ?>"
                                                data-response-handler="responseHandler"
                                                data-formatter="licenseActionsFormatter">
                                                <thead>
                                                    <tr>
                                                        <th class="col-md-2" data-field="manufacturer"
                                                            data-sortable="false">
                                                            Manufacturer
                                                        </th>
                                                        <th class="col-md-2" data-field="name" data-sortable="true">
                                                            License Name
                                                        </th>
                                                        <th class="col-md-2" data-field="freeSeats"
                                                            data-sortable="false">
                                                            Remaining Seats
                                                        </th>
                                                        <th class="col-md-2" data-field="actions"
                                                            data-formatter="licenseActionsFormatter">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(auth()->user()->hasAccess('accessories.requestable.view')): ?>
                        <?php if($accessories->count() > 0): ?>
                            <div class="tab-pane" id="accessories">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table data-click-to-select="true"
                                                data-cookie-id-table="requestableAccessoriesListingTable"
                                                data-pagination="true" data-id-table="requestableAccessoriesListingTable"
                                                data-search="true" data-side-pagination="server" data-show-columns="true"
                                                data-show-export="false" data-show-footer="false"
                                                data-show-refresh="true" data-sort-order="asc" data-sort-name="name"
                                                id="accessoriesListingTable" class="table table-striped snipe-table"
                                                data-url="<?php echo e(route('api.accessories.requestable')); ?>"
                                                data-response-handler="accessoriesResponseHandler">
                                                <thead>
                                                    <tr>
                                                        <th class="col-md-2" data-field="name" data-sortable="false">
                                                            Name
                                                        </th>
                                                        <th class="col-md-2" data-field="manufacturer_name"
                                                            data-sortable="false">
                                                            Manufacturer
                                                        </th>
                                                        <th class="col-md-2" data-field="supplier_name"
                                                            data-sortable="false">
                                                            Supplier
                                                        </th>
                                                        <th class="col-md-2" data-field="numRemaining" data-sortable="false">
                                                            Quantity Available
                                                        </th>
                                                        <th class="col-md-2" data-field="location" data-sortable="false">
                                                            Location
                                                        </th>
                                                        <th class="col-md-2" data-field="actions"
                                                            data-formatter="accessoriesActionsFormatter">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(auth()->user()->hasAccess('components.requestable.view')): ?>
                        <?php if($components->count() > 0): ?>
                            <div class="tab-pane" id="components">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table data-click-to-select="true"
                                                data-cookie-id-table="requestableComponentsListingTable"
                                                data-pagination="true" data-id-table="requestableComponentsListingTable"
                                                data-search="true" data-side-pagination="server" data-show-columns="true"
                                                data-show-export="false" data-show-footer="false"
                                                data-show-refresh="true" data-sort-order="asc" data-sort-name="name"
                                                id="componentsListingTable" class="table table-striped snipe-table"
                                                data-url="<?php echo e(route('api.components.requestable')); ?>"
                                                data-response-handler="componentsResponseHandler">
                                                <thead>
                                                    <tr>
                                                        <th class="col-md-2" data-field="name" data-sortable="false">
                                                            Name
                                                        </th>
                                                        <th class="col-md-2" data-field="qty" data-sortable="false">
                                                            Quantity Available
                                                        </th>
                                                        <th class="col-md-2" data-field="category" data-sortable="false">
                                                            Category
                                                        </th>
                                                        <th class="col-md-3" data-field="actions"
                                                            data-formatter="componentActionsFormatter">
                                                            Quantity & Actions
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(auth()->user()->hasAccess('consumables.requestable.view')): ?>
                        <?php if($consumables->count() > 0): ?>
                            <div class="tab-pane" id="consumables">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table data-click-to-select="true"
                                                data-cookie-id-table="requestableConsumablesListingTable"
                                                data-pagination="true" data-id-table="requestableConsumablesListingTable"
                                                data-search="true" data-side-pagination="server" data-show-columns="true"
                                                data-show-export="false" data-show-footer="false"
                                                data-show-refresh="true" data-sort-order="asc" data-sort-name="name"
                                                id="consumablesListingTable" class="table table-striped snipe-table"
                                                data-url="<?php echo e(route('api.consumables.requestable')); ?>"
                                                data-response-handler="consumablesResponseHandler">
                                                <thead>
                                                    <tr>
                                                        <th class="col-md-2" data-field="name" data-sortable="false">
                                                            Name
                                                        </th>
                                                        <th class="col-md-2" data-field="qty" data-sortable="false">
                                                            Quantity Available
                                                        </th>
                                                        <th class="col-md-2" data-field="category" data-sortable="false">
                                                            Category
                                                        </th>
                                                        <th class="col-md-3" data-field="actions" data-formatter="consumableActionsFormatter">
                                                            Quantity & Actions
                                                        </th>                                                        
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if($employeeWaitlist->count() > 0): ?>
                        <div class="tab-pane" id="waitlist">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table data-click-to-select="true" data-cookie-id-table="waitlistTable"
                                            data-pagination="true" data-id-table="waitlistTable" data-search="true"
                                            data-side-pagination="server" data-show-columns="true"
                                            data-show-export="false" data-show-footer="false" data-show-refresh="true"
                                            data-sort-order="asc" data-sort-name="name" id="waitlistTable"
                                            class="table table-striped snipe-table"
                                            data-url="<?php echo e(route('api.waitlist.requestable')); ?>"
                                            data-response-handler="waitlistResponseHandler">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-2" data-field="requestable_model" data-sortable="false">
                                                        Item
                                                    </th>
                                                    <th class="col-md-2" data-field="type" data-sortable="false">
                                                        Type
                                                    </th>
                                                    <th class="col-md-2" data-field="quantity" data-sortable="false">
                                                        Quantity Requested
                                                    </th>
                                                    <th class="col-md-2" data-field="requested_at" data-formatter="dateDisplayFormatter" data-sortable="false">
                                                        Requested At
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
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('moar_scripts'); ?>
    <?php echo $__env->make('partials.bootstrap-table', [
        'exportFile' => 'requested-export',
        'search' => true,
        'clientSearch' => true,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <script nonce="<?php echo e(csrf_token()); ?>">
        $("a[name='Request']").click(function(event) {
            // event.preventDefault();
            quantity = $(this).closest('td').siblings().find('input').val();
            currentUrl = $(this).attr('href');
            // $(this).attr('href', currentUrl + '?quantity=' + quantity);
            // alert($(this).attr('href'));
        });
    </script>
    <script>
        function responseHandler(res) {
            return {
                total: res.total, 
                rows: res.licenses 
            };
        }
        function waitlistResponseHandler(res) {
            return {
                total: res.total,
                rows: res.waitlist
            };
        }
        function accessoriesResponseHandler(res) {
            return {
                total: res.total,
                rows: res.accessories
            };
        }
        function componentsResponseHandler(res) {
            return {
                total: res.total,
                rows: res.components
            };
        }
        function consumablesResponseHandler(res) {
                return {
                    total: res.total,
                    rows: res.consumables
                };
            }
    </script>

    <script>
        function assetRequestActionsFormatter(value, row, index) {
            if (row.assigned_to_self) {
                return `
            <button type="button" class="btn btn-danger btn-sm" style="border-radius: 6px" disabled data-tooltip="true" title="Cancel this item request">
                <?php echo e(trans('button.cancel')); ?>

            </button>
        `;
            } else if (row.assigned_to != null) {
                if (!row.is_on_waitlist) {
                    return `
                <button type="button" class="btn btn-warning btn-sm" style="border-radius: 6px" onclick="handleAssetWaitlistRequest(${row.id})" data-tooltip="true" title="Waitlist this item">
                    Waitlist
                </button>
            `;
                } else {
                    return `
                <button type="button" class="btn btn-warning btn-sm" style="border-radius: 6px" disabled data-tooltip="true" title="Already on waitlist">
                    Waitlisted
                </button>
            `;
                }
            } else if (row.available_actions.cancel) {
                return `
            <form action="<?php echo e(config('app.url')); ?>/account/request-asset/${row.id}" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 6px" data-tooltip="true" title="Cancel this item request">
                    <?php echo e(trans('button.cancel')); ?>

                </button>
            </form>
        `;
            } else if (row.available_actions.request) {
                return `
            <form action="<?php echo e(config('app.url')); ?>/account/request-asset/${row.id}" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-primary btn-sm" style="border-radius: 6px" data-tooltip="true" title="<?php echo e(trans('general.request_item')); ?>">
                    <?php echo e(trans('button.request')); ?>

                </button>
            </form>
        `;
            }
        }

        function licenseActionsFormatter(value, row, index) {
            if (row.is_requested_by_user || row.is_assigned_to_user) {
                return `
            <button type="button" class="btn btn-danger btn-sm" style="border-radius: 6px" onclick="handleCancelLicenseRequest(${row.id})" ${row.is_assigned_to_user ? 'disabled' : ''}>
                Cancel
            </button>
        `;
            } else if (row.freeSeats < 1 && !row.is_on_waitlist) {
                return `
            <button type="button" class="btn btn-warning btn-sm" style="border-radius: 6px" onclick="handleLicenseWaitlistRequest(${row.id})">
                Waitlist
            </button>
        `;
            } else if (row.is_on_waitlist) {
                return `
            <button type="button" class="btn btn-warning btn-sm" style="border-radius: 6px" disabled>
                Waitlisted
            </button>
        `;
            } else {
                return `
            <button type="button" class="btn btn-primary btn-sm" style="border-radius: 6px" onclick="handleLicenseRequest(${row.id})">
                Request
            </button>
        `;
            }
        }

        function waitlistActionsFormatter(value, row, index) {
                return `
            <button type="button" class="btn btn-danger btn-sm" style="border-radius: 6px" onclick="handleCancelWaitlistRequest(${row.id})"}>
                Cancel
            </button>
        `
        }

        function accessoriesActionsFormatter(value, row, index) {
            if (row.is_requested_by_user) {
                return `
            <button type="button" class="btn btn-danger btn-sm" style="border-radius: 6px" onclick="handleCancelAccessoryRequest(${row.id})" ${row.is_assigned_to_user ? 'disabled' : ''}>
                Cancel
            </button>
        `;
            } else if (row.numRemaining < 1 && !row.is_on_waitlist) {
                return `
                    <div class="d-flex align-items-center">
                        <input type="number" class="form-control form-control-sm mr-2" id="accessory_quantity-${row.id}" 
                            style="width: 70px; display: inline-block;" min="1" value="1" />
                        <button type="button" class="btn btn-warning btn-sm" style="border-radius: 6px" onclick="handleAccessoryWaitlistRequest(${row.id})">
                            Waitlist
                        </button>
                    </div>

        `;
            } else if (row.is_on_waitlist) {
                return `
            <button type="button" class="btn btn-warning btn-sm" style="border-radius: 6px" disabled>
                Waitlisted
            </button>
        `;
            } else {
                return `

                <div class="d-flex align-items-center">
                    <input type="number" class="form-control form-control-sm mr-2" id="accessory_quantity-${row.id}" 
                        style="width: 70px; display: inline-block;" min="1" max="${row.numRemaining}" value="1" />
                    <button type="button" class="btn btn-primary btn-sm" style="border-radius: 6px" onclick="handleAccessoryRequest(${row.id})">
                        Request
                    </button>
                </div>
        `;
            }
        }

        function componentActionsFormatter(value, row, index) {
            if (row.is_requested_by_user && !row.fulfilled_on) {
                return `
            <button type="button" class="btn btn-danger btn-sm" style="border-radius: 6px" onclick="handleCancelComponentRequest(${row.id})">
                Cancel
            </button>
        `;
            } else if (row.qty < 1 && !row.is_on_waitlist) {
                return `

                <div class="d-flex align-items-center">
                    <input type="number" class="form-control form-control-sm mr-2" id="component_quantity-${row.id}" 
                        style="width: 70px; display: inline-block;" min="1" value="1" />
                    <button type="button" class="btn btn-warning btn-sm" style="border-radius: 6px" onclick="handleComponentWaitlistRequest(${row.id})">
                        Waitlist
                    </button>
                </div>
        `;
            } else if (row.is_on_waitlist) {
                return `
            <button type="button" class="btn btn-warning btn-sm" style="border-radius: 6px" disabled>
                Waitlisted
            </button>
        `;
            } else {
                return `
                    <div class="d-flex align-items-center">
                        <input type="number" class="form-control form-control-sm mr-2" id="component_quantity-${row.id}" 
                            style="width: 70px; display: inline-block;" min="1" max="${row.qty}" value="1" />
                        <button type="button" class="btn btn-primary btn-sm" style="border-radius: 6px" onclick="handleComponentRequest(${row.id})">
                            Request
                        </button>
                    </div>
        `;
            }
        }

        function consumableActionsFormatter(value, row, index) {
            if (row.is_requested_by_user) {
                return `
                    <div>
                        <button type="button" class="btn btn-danger btn-sm" style="border-radius: 6px" onclick="handleCancelConsumableRequest(${row.id})">
                            Cancel
                        </button>
                    </div>
                `;
            } else if (row.qty < 1 && !row.is_on_waitlist) {
                return `
                    <div class="d-flex align-items-center">
                        <input type="number" class="form-control form-control-sm mr-2" id="consumable_quantity-${row.id}" 
                            style="width: 70px; display: inline-block;" min="1" value="1" />
                        <button type="button" class="btn btn-warning btn-sm" style="border-radius: 6px" onclick="handleConsumableWaitlistRequest(${row.id})">
                            Waitlist
                        </button>
                    </div>
                `;
            } else if (row.is_on_waitlist) {
                return `
                    <div>
                        <button type="button" class="btn btn-warning btn-sm" style="border-radius: 6px" disabled>
                            Waitlisted
                        </button>
                    </div>
                `;
            } else {
                return `
                    <div class="d-flex align-items-center">
                        <input type="number" class="form-control form-control-sm mr-2" id="consumable_quantity-${row.id}" 
                            style="width: 70px; display: inline-block;" min="1" max="${row.qty}" value="1" />
                        <button type="button" class="btn btn-primary btn-sm" style="border-radius: 6px" onclick="handleConsumableRequest(${row.id})">
                            Request
                        </button>
                    </div>
                `;
            }
        }


        function canceledStatusFormatter(value, row) {
            if (row.canceled_at) {
                return '<span class="label label-danger">' + "<?php echo e(trans('general.canceled')); ?>" + '</span>';
            } else {
                return '<span class="label label-warning">' + "<?php echo e(trans('general.pending')); ?>" + '</span>';
            }
        }

        // JavaScript function to handle license request on button click
        function handleLicenseRequest(licenseId) {
            // Create a form element
            let form = document.createElement("form");
            form.action = `<?php echo e(config('app.url')); ?>/account/request-license/${licenseId}`;
            form.method = "POST";

            // Add CSRF token input to the form
            let csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = '<?php echo e(csrf_token()); ?>';
            form.appendChild(csrfInput);

            // Append the form to the body (it must be part of the document to submit)
            document.body.appendChild(form);

            // Submit the form
            form.submit();
        }

        // JavaScript function to handle license request cancellation on button click
        function handleCancelLicenseRequest(licenseId) {
            let form = document.createElement("form");
            form.action = `<?php echo e(config('app.url')); ?>/account/cancel-license-request/${licenseId}`;
            form.method = "POST";

            // Add CSRF token input to the form
            let csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = '<?php echo e(csrf_token()); ?>';
            form.appendChild(csrfInput);

            document.body.appendChild(form);
            form.submit();
        }

        // JavaScript function to handle license request cancellation on button click
        function handleCancelWaitlistRequest(waitlistId) {
            let form = document.createElement("form");
            form.action = `<?php echo e(config('app.url')); ?>/account/cancel-waitlist-request/${waitlistId}`;
            form.method = "POST";

            // Add CSRF token input to the form
            let csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = '<?php echo e(csrf_token()); ?>';
            form.appendChild(csrfInput);

            document.body.appendChild(form);
            form.submit();
        }
        
        // JavaScript function to handle consumable request with quantity input
        function handleAccessoryRequest(accessory_id) {
            // Get the quantity input value
            const quantityInput = document.getElementById(`accessory_quantity-${accessory_id}`);
            const quantity = quantityInput ? parseInt(quantityInput.value, 10) : 1;

            // Validate quantity
            if (isNaN(quantity) || quantity < 1) {
                alert("Please enter a valid quantity.");
                return;
            }

            // Create a form dynamically
            let form = document.createElement("form");
            form.action = `<?php echo e(config('app.url')); ?>/account/request-accessory/${accessory_id}`;
            form.method = "POST";

            // Add CSRF token input
            let csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = '<?php echo e(csrf_token()); ?>';
            form.appendChild(csrfInput);

            // Add quantity input
            let quantityInputHidden = document.createElement("input");
            quantityInputHidden.type = "hidden";
            quantityInputHidden.name = "quantity";
            quantityInputHidden.value = quantity;
            form.appendChild(quantityInputHidden);

            // Append and submit the form
            document.body.appendChild(form);
            form.submit();
        }

        // JavaScript function to handle consumable request with quantity input
        function handleConsumableRequest(consumable_id) {
            // Get the quantity input value
            const quantityInput = document.getElementById(`consumable_quantity-${consumable_id}`);
            const quantity = quantityInput ? parseInt(quantityInput.value, 10) : 1;

            console.log(`Fetched quantity for ID ${consumable_id}:`, quantityInput.value);
            console.log(`Element for ID ${consumable_id}:`, quantityInput);

            // Validate quantity
            if (isNaN(quantity) || quantity < 1) {
                alert("Please enter a valid quantity.");
                return;
            }

            // Create a form dynamically
            let form = document.createElement("form");
            form.action = `<?php echo e(config('app.url')); ?>/account/request-consumable/${consumable_id}`;
            form.method = "POST";

            // Add CSRF token input
            let csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = '<?php echo e(csrf_token()); ?>';
            form.appendChild(csrfInput);

            // Add quantity input
            let quantityInputHidden = document.createElement("input");
            quantityInputHidden.type = "hidden";
            quantityInputHidden.name = "quantity";
            quantityInputHidden.value = quantity;
            form.appendChild(quantityInputHidden);

            // Append and submit the form
            document.body.appendChild(form);
            form.submit();
        }


        // JavaScript function to handle license request cancellation on button click
        function handleCancelConsumableRequest(consumable_id) {
            let form = document.createElement("form");
            form.action = `<?php echo e(config('app.url')); ?>/account/cancel-consumable-request/${consumable_id}`;
            form.method = "POST";

            // Add CSRF token input to the form
            let csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = '<?php echo e(csrf_token()); ?>';
            form.appendChild(csrfInput);

            document.body.appendChild(form);
            form.submit();
        }

        // JavaScript function to handle accessory request cancellation on button click
        function handleCancelAccessoryRequest(accessory_id) {
            let form = document.createElement("form");
            form.action = `<?php echo e(config('app.url')); ?>/account/cancel-accessory-request/${accessory_id}`;
            form.method = "POST";

            let csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = '<?php echo e(csrf_token()); ?>';
            form.appendChild(csrfInput);

            document.body.appendChild(form);
            form.submit();
        }

        function handleComponentRequest(component_id) {
            // Get the quantity input value
            const quantityInput = document.getElementById(`component_quantity-${component_id}`);
            const quantity = quantityInput ? parseInt(quantityInput.value, 10) : 1;

            // Validate quantity
            if (isNaN(quantity) || quantity < 1) {
                alert("Please enter a valid quantity.");
                return;
            }

            // Create a form dynamically
            let form = document.createElement("form");
            form.action = `<?php echo e(config('app.url')); ?>/account/request-component/${component_id}`;
            form.method = "POST";

            // Add CSRF token input
            let csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = '<?php echo e(csrf_token()); ?>';
            form.appendChild(csrfInput);

            // Add quantity input
            let quantityInputHidden = document.createElement("input");
            quantityInputHidden.type = "hidden";
            quantityInputHidden.name = "quantity";
            quantityInputHidden.value = quantity;
            form.appendChild(quantityInputHidden);

            // Append and submit the form
            document.body.appendChild(form);
            form.submit();
        }

        // JavaScript function to handle component request cancellation on button click
        function handleCancelComponentRequest(component_id) {
            let form = document.createElement("form");
            form.action = `<?php echo e(config('app.url')); ?>/account/cancel-component-request/${component_id}`;
            form.method = "POST";

            let csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = '<?php echo e(csrf_token()); ?>';
            form.appendChild(csrfInput);

            document.body.appendChild(form);
            form.submit();
        }

        // JavaScript function to handle license waitlist request on button click
        function handleLicenseWaitlistRequest(licenseId) {
            let form = document.createElement("form");
            form.action = `<?php echo e(config('app.url')); ?>/account/license-wait-request/${licenseId}`;
            form.method = "POST";

            let csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = '<?php echo e(csrf_token()); ?>';
            form.appendChild(csrfInput);

            document.body.appendChild(form);

            form.submit();
        }

        // JavaScript function to handle components waitlist request on button click
        function handleAccessoryWaitlistRequest(accessory_id) {
            // Get the quantity input value
            const quantityInput = document.getElementById(`accessory_quantity-${accessory_id}`);
            const quantity = quantityInput ? parseInt(quantityInput.value, 10) : 1;

            // Validate quantity
            if (isNaN(quantity) || quantity < 1) {
                alert("Please enter a valid quantity.");
                return;
            }
            
            let form = document.createElement("form");
            form.action = `<?php echo e(config('app.url')); ?>/account/accessory-wait-request/${accessory_id}`;
            form.method = "POST";

            let csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = '<?php echo e(csrf_token()); ?>';
            form.appendChild(csrfInput);

            // Add quantity input
            let quantityInputHidden = document.createElement("input");
            quantityInputHidden.type = "hidden";
            quantityInputHidden.name = "quantity";
            quantityInputHidden.value = quantity;
            form.appendChild(quantityInputHidden);

            document.body.appendChild(form);
            form.submit();
        }

        // JavaScript function to handle components waitlist request on button click
        function handleComponentWaitlistRequest(component_id) {
            // Get the quantity input value
            const quantityInput = document.getElementById(`component_quantity-${component_id}`);
            const quantity = quantityInput ? parseInt(quantityInput.value, 10) : 1;

            // Validate quantity
            if (isNaN(quantity) || quantity < 1) {
                alert("Please enter a valid quantity.");
                return;
            }
            
            let form = document.createElement("form");
            form.action = `<?php echo e(config('app.url')); ?>/account/component-wait-request/${component_id}`;
            form.method = "POST";

            let csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = '<?php echo e(csrf_token()); ?>';
            form.appendChild(csrfInput);

            // Add quantity input
            let quantityInputHidden = document.createElement("input");
            quantityInputHidden.type = "hidden";
            quantityInputHidden.name = "quantity";
            quantityInputHidden.value = quantity;
            form.appendChild(quantityInputHidden);

            document.body.appendChild(form);
            form.submit();
        }

        // JavaScript function to handle asset waitlist request on button click
        function handleAssetWaitlistRequest(asset_id) {
            let form = document.createElement("form");
            form.action = `<?php echo e(config('app.url')); ?>/account/asset-wait-request/${asset_id}`;
            form.method = "POST";

            let csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = '<?php echo e(csrf_token()); ?>';
            form.appendChild(csrfInput);

            document.body.appendChild(form);

            form.submit();
        }

        // JavaScript function to handle asset waitlist request on button click
        function handleConsumableWaitlistRequest(consumable_id) {

            // Get the quantity input value
            const quantityInput = document.getElementById(`consumable_quantity-${consumable_id}`);
            const quantity = quantityInput ? parseInt(quantityInput.value, 10) : 1;

            // Validate quantity
            if (isNaN(quantity) || quantity < 1) {
                alert("Please enter a valid quantity.");
                return;
            }
            
            let form = document.createElement("form");
            form.action = `<?php echo e(config('app.url')); ?>/account/consumable-wait-request/${consumable_id}`;
            form.method = "POST";

            let csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = '<?php echo e(csrf_token()); ?>';
            form.appendChild(csrfInput);

            // Add quantity input
            let quantityInputHidden = document.createElement("input");
            quantityInputHidden.type = "hidden";
            quantityInputHidden.name = "quantity";
            quantityInputHidden.value = quantity;
            form.appendChild(quantityInputHidden);

            document.body.appendChild(form);
            form.submit();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/account/requestable-assets.blade.php ENDPATH**/ ?>