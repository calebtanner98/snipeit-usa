<?php $__env->startSection('title'); ?>
    <?php echo e(trans('general.requested_assets')); ?> History
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#assets" role="tab" data-toggle="tab"><?php echo e(trans('general.assets')); ?></a>
                        </li>
                        <li><a href="#licenses" role="tab" data-toggle="tab"><?php echo e(trans('general.licenses')); ?></a></li>
                        <li><a href="#accessories" role="tab" data-toggle="tab"><?php echo e(trans('general.accessories')); ?></a>
                        </li>
                        <li><a href="#components" role="tab" data-toggle="tab"><?php echo e(trans('general.components')); ?></a>
                        </li>
                        <li><a href="#consumables" role="tab" data-toggle="tab"><?php echo e(trans('general.consumables')); ?></a>
                        </li>
                        <li><a href="#waitlist" role="tab" data-toggle="tab">Waitlist</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="assets">
                            <table data-cookie-id-table="userRequestsAssets" data-pagination="true"
                                data-id-table="userRequestsAssets" data-side-pagination="server" data-show-columns="true"
                                data-show-export="true" data-show-refresh="true" data-sort-order="desc"
                                id="userRequestsAssets" class="table table-striped snipe-table"
                                data-url="<?php echo e(route('api.assets.requested')); ?>"
                                data-export-options='{
                                    "fileName": "my-requested-assets-<?php echo e(date('Y-m-d')); ?>",
                                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                                }'>
                                <thead>
                                    <tr>
                                        <th data-field="name"><?php echo e(trans('general.item_name')); ?></th>
                                        <th data-field="qty"><?php echo e(trans('general.qty')); ?></th>
                                        <th data-field="request_date" data-formatter="dateDisplayFormatter">
                                            <?php echo e(trans('general.requested_date')); ?></th>
                                        <th data-field="fulfilled_at">Fulfilled On</th>
                                        <th data-field="canceled_at">Canceled At</th>
                                        <th data-field="returned_on">Returned On</th>

                                        <?php $__currentLoopData = \App\Models\CustomField::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($field->field_encrypted == '0' && $field->show_in_requestable_list == '1'): ?>
                                                <th data-field="custom_fields.<?php echo e($field->db_column); ?>"><?php echo e($field->name); ?>

                                                </th>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="tab-pane" id="licenses">
                            <table data-cookie-id-table="userRequestsLicenses" 
                                   data-pagination="true"
                                   data-id-table="userRequestsLicenses" 
                                   data-side-pagination="server" 
                                   data-show-columns="true"
                                   data-show-export="true" 
                                   data-show-refresh="true" 
                                   data-sort-order="desc"
                                   id="userRequestsLicenses" 
                                   class="table table-striped snipe-table"
                                   data-url="<?php echo e(route('api.licenses.requested')); ?>"
                                   data-response-handler="licenseResponseHandler"
                                   data-export-options='{
                                       "fileName": "my-requested-licenses-<?php echo e(date('Y-m-d')); ?>",
                                       "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                                   }'>
                                <thead>
                                    <tr>
                                        <th data-field="name"><?php echo e(trans('general.name')); ?></th>
                                        <th data-field="qty">Quantity</th>
                                        <th data-field="request_date" data-formatter="dateDisplayFormatter">
                                            <?php echo e(trans('general.requested_date')); ?></th>
                                        <th data-field="fulfilled_at">Fulfilled On</th>
                                        <th data-field="canceled_at">Canceled On</th>
                                        <th data-field="returned_on">Returned On</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="tab-pane" id="accessories">
                            <table data-cookie-id-table="userRequestsAccessories"
                                   data-pagination="true"
                                   data-id-table="userRequestsAccessories"
                                   data-side-pagination="server"
                                   data-show-columns="true"
                                   data-show-export="true"
                                   data-show-refresh="true"
                                   data-sort-order="desc"
                                   id="userRequestsAccessories"
                                   class="table table-striped snipe-table"
                                   data-url="<?php echo e(route('api.accessories.requested')); ?>"
                                   data-response-handler="accessoryResponseHandler"
                                   data-export-options='{
                                       "fileName": "my-requested-accessories-<?php echo e(date('Y-m-d')); ?>",
                                       "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                                   }'>
                                <thead>
                                    <tr>
                                        <th data-field="name"><?php echo e(trans('general.name')); ?></th>
                                        <th data-field="qty">Quantity</th>
                                        <th data-field="request_date" data-formatter="dateDisplayFormatter">
                                            <?php echo e(trans('general.requested_date')); ?></th>
                                        <th data-field="fulfilled_at">Fulfilled On</th>
                                        <th data-field="canceled_at">Canceled On</th>
                                        <th data-field="returned_on">Returned On</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="tab-pane" id="components">
                            <table data-cookie-id-table="userRequestsComponents"
                                   data-pagination="true"
                                   data-id-table="userRequestsComponents"
                                   data-side-pagination="server"
                                   data-show-columns="true"
                                   data-show-export="true"
                                   data-show-refresh="true"
                                   data-sort-order="desc"
                                   id="userRequestsComponents"
                                   class="table table-striped snipe-table"
                                   data-url="<?php echo e(route('api.components.requested')); ?>"
                                   data-response-handler="componentResponseHandler"
                                   data-export-options='{
                                       "fileName": "my-requested-components-<?php echo e(date('Y-m-d')); ?>",
                                       "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                                   }'>
                                <thead>
                                    <tr>
                                        <th data-field="name"><?php echo e(trans('general.name')); ?></th>
                                        <th data-field="qty">Quantity</th>
                                        <th data-field="request_date" data-formatter="dateDisplayFormatter">
                                            <?php echo e(trans('general.requested_date')); ?>

                                        </th>
                                        <th data-field="fulfilled_at">Fulfilled On</th>
                                        <th data-field="canceled_at">Canceled On</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="tab-pane" id="consumables">
                            <table data-cookie-id-table="userRequestsConsumables"
                                   data-pagination="true"
                                   data-id-table="userRequestsConsumables"
                                   data-side-pagination="server"
                                   data-show-columns="true"
                                   data-show-export="true"
                                   data-show-refresh="true"
                                   data-sort-order="desc"
                                   id="userRequestsConsumables"
                                   class="table table-striped snipe-table"
                                   data-url="<?php echo e(route('api.consumables.requested')); ?>"
                                   data-response-handler="consumableResponseHandler"
                                   data-export-options='{
                                       "fileName": "my-requested-consumables-<?php echo e(date('Y-m-d')); ?>",
                                       "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                                   }'>
                                <thead>
                                    <tr>
                                        <th data-field="name"><?php echo e(trans('general.name')); ?></th>
                                        <th data-field="qty">Quantity</th>
                                        <th data-field="request_date" data-formatter="dateDisplayFormatter">
                                            <?php echo e(trans('general.requested_date')); ?>

                                        </th>
                                        <th data-field="fulfilled_at">Fulfilled On</th>
                                        <th data-field="canceled_at">Canceled On</th>
                                    </tr>
                                </thead>
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
                                            data-url="<?php echo e(route('api.waitlist.profile')); ?>"
                                            data-response-handler="waitlistResponseHandler">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-2" data-field="requestable_model" data-sortable="false">
                                                        Item
                                                    </th>
                                                    <th class="col-md-1" data-field="type" data-sortable="false">
                                                        Type
                                                    </th>
                                                    <th class="col-md-1 text-center" data-field="quantity" data-sortable="false">
                                                        Quantity
                                                    </th>
                                                    <th class="col-md-1" data-field="requested_at" data-formatter="dateDisplayFormatter" data-sortable="false">
                                                        Requested At
                                                    </th>
                                                    <th class="col-md-1" data-field="canceled_at"  data-formatter="dateDisplayFormatter" data-sortable="false">
                                                        Canceled At
                                                    </th>          
                                                    <th class="col-md-1" data-field="closed_at"  data-formatter="dateDisplayFormatter" data-sortable="false">
                                                        Closed At
                                                    </th>
                                                    <th class="col-md-1" data-field="denied_at"  data-formatter="dateDisplayFormatter" data-sortable="false">
                                                        Denied At
                                                    </th>                                            
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .box-body -->
                </div> <!-- .box-default -->
            </div> <!-- .col-md-12 -->
        </div> <!-- .row-->
    <script>
        function waitlistResponseHandler(res) {
            return {
                total: res.total,
                rows: res.waitlist
            };
        }
        function assetsResponseHandler(res) {
            return {
                total: res.total,
                rows: res.assets
            };
        }
        
        function licenseResponseHandler(res) {
                return {
                    total: res.total, 
                    rows: res.license 
                };
        }

        function accessoryResponseHandler(res) {
            return {
                total: res.total,
                rows: res.rows
            };
        }

        function componentResponseHandler(res) {
            return {
                total: res.total,
                rows: res.rows
            };
        }

        function consumableResponseHandler(res) {
            return {
                total: res.total,
                rows: res.rows
            };
        }
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
    <?php echo $__env->make('partials.bootstrap-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/account/requested.blade.php ENDPATH**/ ?>