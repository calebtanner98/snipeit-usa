<?php $__env->startSection('title'); ?>
  <?php echo e(trans('general.depreciations')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(route('depreciations.create')); ?>" class="btn btn-primary pull-right">
  <?php echo e(trans('general.create')); ?></a>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-9">
    <div class="box box-default">
      <div class="box-body">
        <div class="table-responsive">

          <table
                  data-columns="<?php echo e(\App\Presenters\DepreciationPresenter::dataTableLayout()); ?>"
                  data-cookie-id-table="depreciationsTable"
                  data-pagination="true"
                  data-id-table="depreciationsTable"
                  data-search="true"
                  data-side-pagination="server"
                  data-show-columns="true"
                  data-show-export="true"
                  data-show-refresh="true"
                  data-sort-order="asc"
                  id="depreciationsTable"
                  class="table table-striped snipe-table"
                  data-url="<?php echo e(route('api.depreciations.index')); ?>"
                  data-export-options='{
                    "fileName": "export-depreciations-<?php echo e(date('Y-m-d')); ?>",
                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                    }'>

          </table>
        </div>
      </div>
    </div>
  </div> <!-- /.col-md-9-->


  <!-- side address column -->
  <div class="col-md-3">
    <h2><?php echo e(trans('admin/depreciations/general.about_asset_depreciations')); ?></h4>
    <p><?php echo e(trans('admin/depreciations/general.about_depreciations')); ?> </p>
  </div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials.bootstrap-table', ['exportFile' => 'depreciations-export', 'search' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/depreciations/index.blade.php ENDPATH**/ ?>