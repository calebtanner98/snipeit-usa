<?php $__env->startSection('title'); ?>

 <?php echo e($manufacturer->name); ?>

 <?php echo e(trans('general.manufacturer')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>

  <a href="<?php echo e(route('manufacturers.index')); ?>" class="btn btn-primary text-right" style="margin-right: 10px;"><?php echo e(trans('general.back')); ?></a>


  <div class="btn-group pull-right">
     <button class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?php echo e(trans('button.actions')); ?>

     <span class="caret"></span>
      </button>
      <ul class="dropdown-menu">
        <li><a href="<?php echo e(route('manufacturers.edit', $manufacturer->id)); ?>"><?php echo e(trans('admin/manufacturers/table.update')); ?></a></li>
        <li><a href="<?php echo e(route('manufacturers.create')); ?>"><?php echo e(trans('admin/manufacturers/table.create')); ?></a></li>
      </ul>
  </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="nav-tabs-custom">

      <ul class="nav nav-tabs">
        <li class="active">

          <a href="#assets" data-toggle="tab">
            <span class="hidden-lg hidden-md">
              <i class="fas fa-barcode fa-2x"></i>
            </span>
            <span class="hidden-xs hidden-sm">
                <?php echo e(trans('general.assets')); ?>

                <?php echo ($manufacturer->assets()->AssetsForShow()->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($manufacturer->assets()->AssetsForShow()->count()).'</badge>' : ''; ?>

            </span>
          </a>

        </li>
        <li>
          <a href="#licenses" data-toggle="tab">
            <span class="hidden-lg hidden-md">
               <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'licenses','class' => 'fa-2x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'licenses','class' => 'fa-2x']); ?>
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
            </span>
            <span class="hidden-xs hidden-sm">
              <?php echo e(trans('general.licenses')); ?>

              <?php echo ($manufacturer->licenses->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($manufacturer->licenses->count()).'</badge>' : ''; ?>

            </span>

          </a>
        </li>
        <li>
          <a href="#accessories" data-toggle="tab">

             <span class="hidden-lg hidden-md">
              <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'accessories','class' => 'fa-2x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'accessories','class' => 'fa-2x']); ?>
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
            </span>
            <span class="hidden-xs hidden-sm">
              <?php echo e(trans('general.accessories')); ?>

              <?php echo ($manufacturer->accessories->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($manufacturer->accessories->count()).'</badge>' : ''; ?>

            </span>
          </a>
        </li>
        <li>
          <a href="#consumables" data-toggle="tab">

             <span class="hidden-lg hidden-md">
               <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'consumables','class' => 'fa-2x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'consumables','class' => 'fa-2x']); ?>
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
            </span>
            <span class="hidden-xs hidden-sm">
              <?php echo e(trans('general.consumables')); ?>

              <?php echo ($manufacturer->consumables->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($manufacturer->consumables->count()).'</badge>' : ''; ?>

            </span>

          </a>
        </li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane fade in active" id="assets">

          <?php echo $__env->make('partials.asset-bulk-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <div class="table table-responsive">
          <table
                  data-columns="<?php echo e(\App\Presenters\AssetPresenter::dataTableLayout()); ?>"
                  data-cookie-id-table="assetsListingTable"
                  data-pagination="true"
                  data-id-table="assetsListingTable"
                  data-toolbar="#assetsBulkEditToolbar"
                  data-bulk-button-id="#bulkAssetEditButton"
                  data-bulk-form-id="#assetsBulkForm"
                  data-search="true"
                  data-show-fullscreen="true"
                  data-side-pagination="server"
                  data-show-columns="true"
                  data-show-export="true"
                  data-show-refresh="true"
                  data-sort-order="asc"
                  id="assetsListingTable"
                  class="table table-striped snipe-table"
                  data-url="<?php echo e(route('api.assets.index', ['manufacturer_id' => $manufacturer->id, 'itemtype' => 'assets'])); ?>"
                  data-export-options='{
              "fileName": "export-manufacturers-<?php echo e(str_slug($manufacturer->name)); ?>-assets-<?php echo e(date('Y-m-d')); ?>",
              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
              }'>
          </table>
          </div>

        </div> <!-- /.tab-pane assets -->

        <div class="tab-pane fade" id="licenses">

          <table
                  data-columns="<?php echo e(\App\Presenters\LicensePresenter::dataTableLayout()); ?>"
                  data-cookie-id-table="licensesTable"
                  data-pagination="true"
                  data-id-table="licensesTable"
                  data-search="true"
                  data-show-footer="true"
                  data-side-pagination="server"
                  data-show-columns="true"
                  data-show-export="true"
                  data-show-refresh="true"
                  data-sort-order="asc"
                  id="licensesTable"
                  class="table table-striped snipe-table"
                  data-url="<?php echo e(route('api.licenses.index', ['manufacturer_id' => $manufacturer->id])); ?>"
                  data-export-options='{
              "fileName": "export-manufacturers-<?php echo e(str_slug($manufacturer->name)); ?>-licenses-<?php echo e(date('Y-m-d')); ?>",
              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
              }'>
          </table>


        </div><!-- /.tab-pan licenses-->

        <div class="tab-pane fade" id="accessories">

          <table
                  data-columns="<?php echo e(\App\Presenters\AccessoryPresenter::dataTableLayout()); ?>"
                  data-cookie-id-table="accessoriesTable"
                  data-pagination="true"
                  data-id-table="accessoriesTable"
                  data-search="true"
                  data-show-footer="true"
                  data-side-pagination="server"
                  data-show-columns="true"
                  data-show-export="true"
                  data-show-refresh="true"
                  data-sort-order="asc"
                  id="accessoriesTable"
                  class="table table-striped snipe-table"
                  data-url="<?php echo e(route('api.accessories.index', ['manufacturer_id' => $manufacturer->id])); ?>"
                  data-export-options='{
              "fileName": "export-manufacturers-<?php echo e(str_slug($manufacturer->name)); ?>-accessories-<?php echo e(date('Y-m-d')); ?>",
              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
              }'>
          </table>


        </div> <!-- /.tab-pan accessories-->

        <div class="tab-pane fade" id="consumables">

          <table
                  data-columns="<?php echo e(\App\Presenters\ConsumablePresenter::dataTableLayout()); ?>"
                  data-cookie-id-table="consumablesTable"
                  data-pagination="true"
                  data-id-table="consumablesTable"
                  data-search="true"
                  data-show-footer="true"
                  data-side-pagination="server"
                  data-show-columns="true"
                  data-show-export="true"
                  data-show-refresh="true"
                  data-sort-order="asc"
                  id="consumablesTable"
                  class="table table-striped snipe-table"
                  data-url="<?php echo e(route('api.consumables.index', ['manufacturer_id' => $manufacturer->id])); ?>"
                  data-export-options='{
              "fileName": "export-manufacturers-<?php echo e(str_slug($manufacturer->name)); ?>-consumabled-<?php echo e(date('Y-m-d')); ?>",
              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
              }'>
          </table>



        </div> <!-- /.tab-pan consumables-->

      </div> <!-- /.tab-content -->
    </div>  <!-- /.nav-tabs-custom -->
  </div><!-- /. col-md-12 -->
</div> <!-- /.row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials.bootstrap-table', ['exportFile' => 'manufacturer' . $manufacturer->name . '-export', 'search' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/manufacturers/view.blade.php ENDPATH**/ ?>