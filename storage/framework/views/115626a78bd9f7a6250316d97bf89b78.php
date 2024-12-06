<?php $__env->startSection('title'); ?>
    <?php echo e(trans_choice('general.audit_due_days', $settings->audit_warning_days, ['days' => $settings->audit_warning_days])); ?>

<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>
    
    <div class="row">
        <div class="col-md-12">

            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs hidden-print">

                    <li class="active">
                        <a href="#due" data-toggle="tab"><?php echo e(trans('general.audit_due')); ?>

                          <span class="hidden-lg hidden-md">
                            <i class="far fa-file fa-2x" aria-hidden="true"></i>
                          </span>
                            <span class="badge"><?php echo e((isset($total_due_for_audit)) ? $total_due_for_audit : ''); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="#overdue" data-toggle="tab"><?php echo e(trans('general.audit_overdue')); ?>

                            <span class="hidden-lg hidden-md">
                            <i class="far fa-file fa-2x" aria-hidden="true"></i>
                          </span>
                            <span class="badge"><?php echo e((isset($total_overdue_for_audit)) ? $total_overdue_for_audit : ''); ?></span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div class="tab-pane active" id="due">

                        <?php echo $__env->make('partials.asset-bulk-actions',
                            [
                                'id_divname'  => 'dueAssetEditToolbar',
                                'id_formname' => 'dueAssetEditForm',
                                'id_button'   => 'dueAssetEditButton'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="row">
                            <div class="table table-responsive">
                        <div class="col-md-12">
                            <table
                                    data-click-to-select="true"
                                    data-columns="<?php echo e(\App\Presenters\AssetAuditPresenter::dataTableLayout()); ?>"
                                            data-cookie-id-table="dueAssetAuditListing"
                                    data-pagination="true"
                                            data-id-table="dueAssetAuditListing"
                                    data-search="true"
                                    data-side-pagination="server"
                                    data-show-columns="true"
                                    data-show-fullscreen="true"
                                    data-show-export="true"
                                    data-show-footer="true"
                                    data-show-refresh="true"
                                    data-sort-order="asc"
                                    data-sort-name="name"
                                            data-toolbar="#dueAssetEditToolbar"
                                            data-bulk-button-id="#dueAssetEditButton"
                                            data-bulk-form-id="#dueAssetEditForm"
                                            id="#dueAssetAuditListing"
                                    class="table table-striped snipe-table"
                                            data-url="<?php echo e(route('api.assets.list-upcoming', ['action' => 'audits', 'upcoming_status' => 'due'])); ?>"
                                    data-export-options='{
                "fileName": "export-assets-due-audit-<?php echo e(date('Y-m-d')); ?>",
                "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                }'>
                            </table>
                                </div> <!-- end col-md-12 -->
                            </div><!-- end table-responsive -->
                        </div><!-- end row -->
                    </div><!-- end tab-pane -->

                    <div class="tab-pane" id="overdue">

                        <?php echo $__env->make('partials.asset-bulk-actions',
                                [
                                    'id_divname'  => 'overdueAssetEditToolbar',
                                    'id_formname' => 'overdueAssetEditForm',
                                    'id_button'   => 'overdueAssetEditButton'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="row">
                            <div class="table table-responsive">
                                <div class="col-md-12">
                                    <table
                                        data-click-to-select="true"
                                        data-columns="<?php echo e(\App\Presenters\AssetAuditPresenter::dataTableLayout()); ?>"
                                        data-cookie-id-table="overdueAssetAuditListing"
                                        data-pagination="true"
                                        data-id-table="overdueAssetAuditListing"
                                        data-search="true"
                                        data-side-pagination="server"
                                        data-show-columns="true"
                                        data-show-fullscreen="true"
                                        data-show-export="true"
                                        data-show-footer="true"
                                        data-show-refresh="true"
                                        data-sort-order="asc"
                                        data-sort-name="name"
                                        data-toolbar="#overdueAssetEditToolbar"
                                        data-bulk-button-id="#overdueAssetEditButton"
                                        data-bulk-form-id="#overdueAssetEditForm"
                                        id="#overdueAssetAuditListing"
                                        class="table table-striped snipe-table"
                                        data-url="<?php echo e(route('api.assets.list-upcoming', ['action' => 'audits', 'upcoming_status' => 'overdue'])); ?>"
                                        data-export-options='{
            "fileName": "export-assets-overdue-audit-<?php echo e(date('Y-m-d')); ?>",
            "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
            }'>
                                    </table>
                                </div> <!-- end col-md-12 -->
                            </div><!-- end table-responsive -->
                        </div><!-- end row -->
                    </div><!-- end tab-pane -->
                </div><!-- end tab-content -->
            </div><!-- end nav-tabs-custom -->

                        </div><!-- /.col -->
                    </div><!-- /.row -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
    <?php echo $__env->make('partials.bootstrap-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/hardware/audit-due.blade.php ENDPATH**/ ?>