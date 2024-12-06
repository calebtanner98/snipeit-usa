<?php $__env->startSection('title'); ?>

 <?php echo e(trans('general.location')); ?>:
 <?php echo e($location->name); ?>

 
<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(route('locations.index')); ?>" class="btn btn-primary" style="margin-right: 10px;">
    <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-9">

      <div class="nav-tabs-custom">
          <ul class="nav nav-tabs hidden-print">

              <li class="active">
                  <a href="#users" data-toggle="tab">
                        <span class="hidden-lg hidden-md">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'users','class' => 'fa-2x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'users','class' => 'fa-2x']); ?>
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
                          <?php echo e(trans('general.users')); ?>

                          <?php echo ($location->users->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($location->users->count()).'</badge>' : ''; ?>


                      </span>
                  </a>
              </li>

              <li>
                  <a href="#assets" data-toggle="tab">
                    <span class="hidden-lg hidden-md">
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'assets','class' => 'fa-2x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'assets','class' => 'fa-2x']); ?>
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
                          <?php echo e(trans('admin/locations/message.current_location')); ?>

                          <?php echo ($location->assets()->AssetsForShow()->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($location->assets()->AssetsForShow()->count()).'</badge>' : ''; ?>

                    </span>
                  </a>
              </li>


              <li>
                  <a href="#rtd_assets" data-toggle="tab">
                    <span class="hidden-lg hidden-md">

                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'assets','class' => 'fa-2x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'assets','class' => 'fa-2x']); ?>
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
                          <?php echo e(trans('admin/hardware/form.default_location')); ?>

                          <?php echo ($location->rtd_assets()->AssetsForShow()->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($location->rtd_assets()->AssetsForShow()->count()).'</badge>' : ''; ?>

                    </span>
                  </a>
              </li>

              <li>
                  <a href="#assets_assigned" data-toggle="tab">
                    <span class="hidden-lg hidden-md">
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'assets','class' => 'fa-2x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'assets','class' => 'fa-2x']); ?>
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
                          <?php echo e(trans('admin/locations/message.assigned_assets')); ?>

                          <?php echo ($location->assignedAssets()->AssetsForShow()->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($location->assignedAssets()->AssetsForShow()->count()).'</badge>' : ''; ?>

                    </span>
                  </a>
              </li>


              <li>
                  <a href="#accessories" data-toggle="tab">
                    <span class="hidden-lg hidden-md">
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'accessories','class' => 'fa-2x ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'accessories','class' => 'fa-2x ']); ?>
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

                          <?php echo ($location->accessories->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($location->accessories->count()).'</badge>' : ''; ?>

                    </span>
                  </a>
              </li>

              <li>
                  <a href="#consumables" data-toggle="tab">
                    <span class="hidden-lg hidden-md">
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'consumables','class' => 'fa-2x ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'consumables','class' => 'fa-2x ']); ?>
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

                          <?php echo ($location->consumables->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($location->consumables->count()).'</badge>' : ''; ?>

                    </span>
                  </a>
              </li>

              <li>
                  <a href="#components" data-toggle="tab">
                    <span class="hidden-lg hidden-md">
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'components','class' => 'fa-2x ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'components','class' => 'fa-2x ']); ?>
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
                          <?php echo e(trans('general.components')); ?>

                          <?php echo ($location->components->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($location->components->count()).'</badge>' : ''; ?>

                    </span>
                  </a>
              </li>
              
              <li>
                  <a href="#history" data-toggle="tab">
                    <span class="hidden-lg hidden-md">
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'history','class' => 'fa-2x ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'history','class' => 'fa-2x ']); ?>
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
                          <?php echo e(trans('general.history')); ?>

                    </span>
                  </a>
              </li>
          </ul>


          <div class="tab-content">
              <div class="tab-pane active" id="users">
                    <h2 class="box-title"><?php echo e(trans('general.users')); ?></h2>
                      <div class="table table-responsive">
                          <?php echo $__env->make('partials.users-bulk-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                          <table
                                  data-columns="<?php echo e(\App\Presenters\UserPresenter::dataTableLayout()); ?>"
                                  data-cookie-id-table="usersTable"
                                  data-pagination="true"
                                  data-id-table="usersTable"
                                  data-search="true"
                                  data-side-pagination="server"
                                  data-show-columns="true"
                                  data-show-export="true"
                                  data-show-refresh="true"
                                  data-sort-order="asc"
                                  data-toolbar="#userBulkEditToolbar"
                                  data-bulk-button-id="#bulkUserEditButton"
                                  data-bulk-form-id="#usersBulkForm"
                                  data-click-to-select="true"
                                  id="usersTable"
                                  class="table table-striped snipe-table"
                                  data-url="<?php echo e(route('api.users.index', ['location_id' => $location->id])); ?>"
                                  data-export-options='{
                              "fileName": "export-locations-<?php echo e(str_slug($location->name)); ?>-users-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>

                          </table>
                      </div><!-- /.table-responsive -->
              </div><!-- /.tab-pane -->

              <div class="tab-pane" id="assets">
                      <h2 class="box-title"><?php echo e(trans('admin/locations/message.current_location')); ?></h2>

                      <div class="table table-responsive">
                          <?php echo $__env->make('partials.asset-bulk-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                          <table
                                  data-columns="<?php echo e(\App\Presenters\AssetPresenter::dataTableLayout()); ?>"
                                  data-cookie-id-table="assetsListingTable"
                                  data-pagination="true"
                                  data-id-table="assetsListingTable"
                                  data-search="true"
                                  data-side-pagination="server"
                                  data-show-columns="true"
                                  data-show-export="true"
                                  data-show-refresh="true"
                                  data-sort-order="asc"
                                  data-toolbar="#assetsBulkEditToolbar"
                                  data-bulk-button-id="#bulkAssetEditButton"
                                  data-bulk-form-id="#assetsBulkForm"
                                  data-click-to-select="true"
                                  id="assetsListingTable"
                                  class="table table-striped snipe-table"
                                  data-url="<?php echo e(route('api.assets.index', ['location_id' => $location->id])); ?>"
                                  data-export-options='{
                              "fileName": "export-locations-<?php echo e(str_slug($location->name)); ?>-assets-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>
                          </table>

                      </div><!-- /.table-responsive -->
              </div><!-- /.tab-pane -->

              <div class="tab-pane" id="assets_assigned">
                  <h2 class="box-title">
                      <?php echo e(trans('admin/locations/message.assigned_assets')); ?>

                  </h2>

                  <div class="table table-responsive">
                      <?php echo $__env->make('partials.asset-bulk-actions', ['id_divname' => 'AssignedAssetsBulkEditToolbar', 'id_formname' => 'assignedAssetsBulkForm', 'id_button' => 'AssignedbulkAssetEditButton'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                      <table
                              data-columns="<?php echo e(\App\Presenters\AssetPresenter::dataTableLayout()); ?>"
                              data-cookie-id-table="assetsAssignedListingTable"
                              data-pagination="true"
                              data-id-table="assetsAssignedListingTable"
                              data-search="true"
                              data-side-pagination="server"
                              data-show-columns="true"
                              data-show-export="true"
                              data-show-refresh="true"
                              data-sort-order="asc"
                              data-toolbar="#AssignedAssetsBulkEditToolbar"
                              data-bulk-button-id="#AssignedbulkAssetEditButton"
                              data-bulk-form-id="#assignedAssetsBulkForm"
                              data-click-to-select="true"
                              id="assetsListingTable"
                              class="table table-striped snipe-table"
                              data-url="<?php echo e(route('api.assets.index', ['assigned_to' => $location->id, 'assigned_type' => \App\Models\Location::class])); ?>"
                              data-export-options='{
                              "fileName": "export-locations-<?php echo e(str_slug($location->name)); ?>-assets-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>
                      </table>

                  </div><!-- /.table-responsive -->
              </div><!-- /.tab-pane -->

              <div class="tab-pane" id="rtd_assets">
                  <h2 class="box-title"><?php echo e(trans('admin/hardware/form.default_location')); ?></h2>

                  <div class="table table-responsive">
                      <?php echo $__env->make('partials.asset-bulk-actions', ['id_divname' => 'RTDassetsBulkEditToolbar', 'id_formname' => 'RTDassets', 'id_button' => 'RTDbulkAssetEditButton'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                      <table
                              data-columns="<?php echo e(\App\Presenters\AssetPresenter::dataTableLayout()); ?>"
                              data-cookie-id-table="RTDassetsListingTable"
                              data-pagination="true"
                              data-id-table="RTDassetsListingTable"
                              data-search="true"
                              data-side-pagination="server"
                              data-show-columns="true"
                              data-show-export="true"
                              data-show-refresh="true"
                              data-sort-order="asc"
                              data-toolbar="#RTDassetsBulkEditToolbar"
                              data-bulk-button-id="#RTDbulkAssetEditButton"
                              data-bulk-form-id="#RTDassetsBulkEditToolbar"
                              data-click-to-select="true"
                              id="RTDassetsListingTable"
                              class="table table-striped snipe-table"
                              data-url="<?php echo e(route('api.assets.index', ['rtd_location_id' => $location->id])); ?>"
                              data-export-options='{
                              "fileName": "export-rtd-locations-<?php echo e(str_slug($location->name)); ?>-assets-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>
                      </table>

                  </div><!-- /.table-responsive -->
              </div><!-- /.tab-pane -->
              


              <div class="tab-pane" id="accessories">
                  <h2 class="box-title"><?php echo e(trans('general.accessories')); ?></h2>
                  <div class="table table-responsive">
                      <table
                              data-columns="<?php echo e(\App\Presenters\AccessoryPresenter::dataTableLayout()); ?>"
                              data-cookie-id-table="accessoriesListingTable"
                              data-pagination="true"
                              data-id-table="accessoriesListingTable"
                              data-search="true"
                              data-side-pagination="server"
                              data-show-columns="true"
                              data-show-export="true"
                              data-show-refresh="true"
                              data-sort-order="asc"
                              id="accessoriesListingTable"
                              class="table table-striped snipe-table"
                              data-url="<?php echo e(route('api.accessories.index', ['location_id' => $location->id])); ?>"
                              data-export-options='{
                              "fileName": "export-locations-<?php echo e(str_slug($location->name)); ?>-accessories-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>
                      </table>
                  </div><!-- /.table-responsive -->
              </div><!-- /.tab-pane -->


              <div class="tab-pane" id="consumables">
                  <h2 class="box-title"><?php echo e(trans('general.consumables')); ?></h2>

                      <div class="table table-responsive">
                          <table
                                  data-columns="<?php echo e(\App\Presenters\ConsumablePresenter::dataTableLayout()); ?>"
                                  data-cookie-id-table="consumablesListingTable"
                                  data-pagination="true"
                                  data-id-table="consumablesListingTable"
                                  data-search="true"
                                  data-side-pagination="server"
                                  data-show-columns="true"
                                  data-show-export="true"
                                  data-show-refresh="true"
                                  data-sort-order="asc"
                                  id="consumablesListingTable"
                                  class="table table-striped snipe-table"
                                  data-url="<?php echo e(route('api.consumables.index', ['location_id' => $location->id])); ?>"
                                  data-export-options='{
                              "fileName": "export-locations-<?php echo e(str_slug($location->name)); ?>-consumables-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>
                          </table>

                      </div><!-- /.table-responsive -->
              </div><!-- /.tab-pane -->

              <div class="tab-pane" id="components">
                  <h2 class="box-title"><?php echo e(trans('general.components')); ?></h2>
                      <div class="table table-responsive">

                          <table
                                  data-columns="<?php echo e(\App\Presenters\ComponentPresenter::dataTableLayout()); ?>"
                                  data-cookie-id-table="componentsTable"
                                  data-pagination="true"
                                  data-id-table="componentsTable"
                                  data-search="true"
                                  data-side-pagination="server"
                                  data-show-columns="true"
                                  data-show-export="true"
                                  data-show-refresh="true"
                                  data-sort-order="asc"
                                  id="componentsTable"
                                  class="table table-striped snipe-table"
                                  data-url="<?php echo e(route('api.components.index', ['location_id' => $location->id])); ?>"
                                  data-export-options='{
                              "fileName": "export-locations-<?php echo e(str_slug($location->name)); ?>-components-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>

                          </table>
                      </div><!-- /.table-responsive -->
              </div><!-- /.tab-pane -->

                <div class="tab-pane" id="history">
                    <h2 class="box-title"><?php echo e(trans('general.history')); ?></h2>
                    <!-- checked out assets table -->
                    <div class="row">
                        <div class="col-md-12">
                            <table
                                    class="table table-striped snipe-table"
                                    id="assetHistory"
                                    data-pagination="true"
                                    data-id-table="assetHistory"
                                    data-search="true"
                                    data-side-pagination="server"
                                    data-show-columns="true"
                                    data-show-fullscreen="true"
                                    data-show-refresh="true"
                                    data-sort-order="desc"
                                    data-sort-name="created_at"
                                    data-show-export="true"
                                    data-export-options='{
                        "fileName": "export-location-asset-<?php echo e($location->id); ?>-history",
                        "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                    }'

                    data-url="<?php echo e(route('api.activity.index', ['target_id' => $location->id, 'target_type' => 'location'])); ?>"
                    data-cookie-id-table="assetHistory"
                    data-cookie="true">
                                <thead>
                                    <tr>
                                        <th data-visible="true" data-field="icon" style="width: 40px;" class="hidden-xs" data-formatter="iconFormatter"><?php echo e(trans('admin/hardware/table.icon')); ?></th>
                                        <th class="col-sm-2" data-visible="true" data-field="action_date" data-formatter="dateDisplayFormatter"><?php echo e(trans('general.date')); ?></th>
                                        <th class="col-sm-1" data-visible="true" data-field="admin" data-formatter="usersLinkObjFormatter"><?php echo e(trans('general.admin')); ?></th>
                                        <th class="col-sm-1" data-visible="true" data-field="action_type"><?php echo e(trans('general.action')); ?></th>
                                        <th class="col-sm-2" data-visible="true" data-field="item" data-formatter="polymorphicItemFormatter"><?php echo e(trans('general.item')); ?></th>
                                        <th class="col-sm-2" data-visible="true" data-field="target" data-formatter="polymorphicItemFormatter"><?php echo e(trans('general.target')); ?></th>
                                        <th class="col-sm-2" data-field="note"><?php echo e(trans('general.notes')); ?></th>
                                        <th class="col-md-3" data-field="signature_file" data-visible="false"  data-formatter="imageFormatter"><?php echo e(trans('general.signature')); ?></th>
                                        <th class="col-md-3" data-visible="false" data-field="file" data-visible="false"  data-formatter="fileUploadFormatter"><?php echo e(trans('general.download')); ?></th>
                                        <th class="col-sm-2" data-field="log_meta" data-visible="true" data-formatter="changeLogFormatter"><?php echo e(trans('admin/hardware/table.changed')); ?></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div> <!-- /.row -->
                </div> <!-- /.tab-pane history -->

          </div><!--/.col-md-9-->
      </div><!--/.col-md-9-->
  </div><!--/.col-md-9-->

  <div class="col-md-3">

      <?php if($location->image!=''): ?>
          <div class="col-md-12 text-center" style="padding-bottom: 20px;">
              <img src="<?php echo e(Storage::disk('public')->url('locations/'.e($location->image))); ?>" class="img-responsive img-thumbnail" style="width:100%" alt="<?php echo e($location->name); ?>">
          </div>
      <?php endif; ?>

      <?php if(($location->state!='') && ($location->country!='') && (config('services.google.maps_api_key'))): ?>
          <div class="col-md-12 text-center" style="padding-bottom: 10px;">
              <img src="https://maps.googleapis.com/maps/api/staticmap?markers=<?php echo e(urlencode($location->address.','.$location->city.' '.$location->state.' '.$location->country.' '.$location->zip)); ?>&size=700x500&maptype=roadmap&key=<?php echo e(config('services.google.maps_api_key')); ?>" class="img-thumbnail" style="width:100%" alt="Map">
          </div>
      <?php endif; ?>

      <div class="col-md-12">
          <ul class="list-unstyled" style="line-height: 20px; padding-bottom: 20px;">
              <?php if($location->address!=''): ?>
                  <li><?php echo e($location->address); ?></li>
              <?php endif; ?>
              <?php if($location->address2!=''): ?>
                  <li><?php echo e($location->address2); ?></li>
              <?php endif; ?>
              <?php if(($location->city!='') || ($location->state!='') || ($location->zip!='')): ?>
                  <li><?php echo e($location->city); ?> <?php echo e($location->state); ?> <?php echo e($location->zip); ?></li>
              <?php endif; ?>
              <?php if($location->manager): ?>
                  <li><?php echo e(trans('admin/users/table.manager')); ?>: <?php echo $location->manager->present()->nameUrl(); ?></li>
              <?php endif; ?>
              <?php if($location->parent): ?>
                  <li><?php echo e(trans('admin/locations/table.parent')); ?>: <?php echo $location->parent->present()->nameUrl(); ?></li>
              <?php endif; ?>
              <?php if($location->ldap_ou): ?>
                  <li><?php echo e(trans('admin/locations/table.ldap_ou')); ?>: <?php echo e($location->ldap_ou); ?></li>
              <?php endif; ?>

              <?php if((($location->address!='') && ($location->city!='')) || ($location->state!='') || ($location->country!='')): ?>
                      <li>
                        <a href="https://maps.google.com/?q=<?php echo e(urlencode($location->address.','. $location->city.','.$location->state.','.$location->country.','.$location->zip)); ?>" target="_blank">
                            <?php echo trans('admin/locations/message.open_map', ['map_provider_icon' => '<i class="fa-brands fa-google" aria-hidden="true"></i>']); ?>

                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'external-link']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'external-link']); ?>
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
                        </a>
                      </li>
                      <li>
                        <a href="https://maps.apple.com/?q=<?php echo e(urlencode($location->address.','. $location->city.','.$location->state.','.$location->country.','.$location->zip)); ?>" target="_blank">
                            <?php echo trans('admin/locations/message.open_map', ['map_provider_icon' => '<i class="fa-brands fa-apple" aria-hidden="true" style="font-size: 18px"></i>']); ?>

                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'external-link']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'external-link']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?></a>
                  </li>
              <?php endif; ?>

          </ul>
      </div>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $location)): ?>
      <div class="col-md-12">
          <a href="<?php echo e(route('locations.edit', ['location' => $location->id])); ?>" style="width: 100%;" class="btn btn-sm btn-warning btn-social">
              <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'edit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'edit']); ?>
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
              <?php echo e(trans('admin/locations/table.update')); ?>

          </a>
      </div>
      <?php endif; ?>

      <div class="col-md-12" style="padding-top: 5px;">
          <a href="<?php echo e(route('locations.print_assigned', ['locationId' => $location->id])); ?>" style="width: 100%;" class="btn btn-sm btn-primary btn-social hidden-print">
              <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'print']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'print']); ?>
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
              <?php echo e(trans('admin/locations/table.print_assigned')); ?>

          </a>
      </div>
      <div class="col-md-12" style="padding-top: 5px;">
          <a href="<?php echo e(route('locations.print_all_assigned', ['locationId' => $location->id])); ?>" style="width: 100%;" class="btn btn-sm btn-primary btn-social hidden-print">
              <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'print']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'print']); ?>
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
              <?php echo e(trans('admin/locations/table.print_all_assigned')); ?>

          </a>
      </div>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $location)): ?>
              <div class="col-md-12 hidden-print" style="padding-top: 10px;">

            <?php if($location->deleted_at==''): ?>

                <?php if($location->isDeletable()): ?>
                      <button class="btn btn-sm btn-block btn-danger btn-social delete-location" data-toggle="modal" data-title="<?php echo e(trans('general.delete')); ?>" data-content="<?php echo e(trans('general.sure_to_delete_var', ['item' => $location->name])); ?>" data-target="#dataConfirmModal">
                          <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'delete']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'delete']); ?>
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
                          <?php echo e(trans('general.delete')); ?>

                      </button>
                <?php else: ?>
                      <a href="#" class="btn btn-block btn-sm btn-danger btn-social hidden-print disabled" data-tooltip="true"  data-placement="top" data-title="<?php echo e(trans('general.cannot_be_deleted')); ?>">
                          <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'delete']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'delete']); ?>
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
                          <?php echo e(trans('general.delete')); ?>

                      </a>
                <?php endif; ?>

            <?php else: ?>
                  <form method="POST" action="<?php echo e(route('locations.restore', ['location' => $location->id])); ?>">
                      <?php echo csrf_field(); ?>
                      <button class="btn btn-sm btn-block btn-warning btn-social delete-asset">
                          <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'restore']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'restore']); ?>
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
                          <?php echo e(trans('general.restore')); ?>

                      </button>
                  </form>
            <?php endif; ?>
              </div>
    <?php endif; ?>



</div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>

    <script>
        $('#dataConfirmModal').on('show.bs.modal', function (event) {
            var content = $(event.relatedTarget).data('content');
            var title = $(event.relatedTarget).data('title');
            $(this).find(".modal-body").text(content);
            $(this).find(".modal-header").text(title);
        });
    </script>

<?php echo $__env->make('partials.bootstrap-table', [
'exportFile' => 'locations-export',
'search' => true
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/locations/view.blade.php ENDPATH**/ ?>