<?php $__env->startSection('title'); ?>

 <?php echo e($component->name); ?>

 <?php echo e(trans('general.component')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header_right'); ?>
  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage', $component)): ?>
    <div class="dropdown pull-right">
      <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
        <?php echo e(trans('button.actions')); ?>

          <span class="caret"></span>
      </button>
      
      <ul class="dropdown-menu pull-right" role="menu22">
        <?php if($component->assigned_to != ''): ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checkin', $component)): ?>
          <li role="menuitem">
            <a href="<?php echo e(route('components.checkin.show', $component->id)); ?>">
              <?php echo e(trans('admin/components/general.checkin')); ?>

            </a>
          </li>
          <?php endif; ?>
        <?php else: ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checkout', $component)): ?>
          <li role="menuitem">
            <a href="<?php echo e(route('components.checkout.show', $component->id)); ?>">
              <?php echo e(trans('admin/components/general.checkout')); ?>

            </a>
          </li>
          <?php endif; ?>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $component)): ?>
        <li role="menuitem">
          <a href="<?php echo e(route('components.edit', $component->id)); ?>">
            <?php echo e(trans('admin/components/general.edit')); ?>

          </a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-9">

    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs hidden-print">

        <li class="active">
          <a href="#checkedout" data-toggle="tab">
            <span class="hidden-lg hidden-md">
            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '0bc333070fe8fbc263fd4a4e307b8773::icon','data' => ['type' => 'info-circle','class' => 'fa-2x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'info-circle','class' => 'fa-2x']); ?>
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
            <span class="hidden-xs hidden-sm"><?php echo e(trans('admin/users/general.info')); ?></span>
          </a>
        </li>


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('components.files', $component)): ?>
          <li>
            <a href="#files" data-toggle="tab">
            <span class="hidden-lg hidden-md">
            <i class="far fa-file fa-2x" aria-hidden="true"></i></span>
              <span class="hidden-xs hidden-sm"><?php echo e(trans('general.file_uploads')); ?>

                <?php echo ($component->uploads->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($component->uploads->count()).'</badge>' : ''; ?>

            </span>
            </a>
          </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('components.files', $component)): ?>
          <li class="pull-right">
            <a href="#" data-toggle="modal" data-target="#uploadFileModal">
              <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '0bc333070fe8fbc263fd4a4e307b8773::icon','data' => ['type' => 'paperclip']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'paperclip']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> <?php echo e(trans('button.upload')); ?>

            </a>
          </li>
        <?php endif; ?>
      </ul>

      <div class="tab-content">

        <div class="tab-pane active" id="checkedout">
          <div class="table table-responsive">

            <table
                    data-cookie-id-table="componentsCheckedoutTable"
                    data-pagination="true"
                    data-id-table="componentsCheckedoutTable"
                    data-search="true"
                    data-side-pagination="server"
                    data-show-columns="true"
                    data-show-export="true"
                    data-show-footer="true"
                    data-show-refresh="true"
                    data-sort-order="asc"
                    data-sort-name="name"
                    id="componentsCheckedoutTable"
                    class="table table-striped snipe-table"
                    data-url="<?php echo e(route('api.components.assets', $component->id)); ?>"
                    data-export-options='{
                "fileName": "export-components-<?php echo e(str_slug($component->name)); ?>-checkedout-<?php echo e(date('Y-m-d')); ?>",
                "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                }'>
              <thead>
              <tr>
                <th data-searchable="false" data-sortable="false" data-field="name" data-formatter="hardwareLinkFormatter">
                  <?php echo e(trans('general.asset')); ?>

                </th>
                <th data-searchable="false" data-sortable="false" data-field="qty">
                  <?php echo e(trans('general.qty')); ?>

                </th>
                <th data-searchable="false" data-sortable="false" data-field="note">
                  <?php echo e(trans('general.notes')); ?>

                </th>
                <th data-searchable="false" data-sortable="false" data-field="created_at" data-formatter="dateDisplayFormatter">
                  <?php echo e(trans('general.date')); ?>

                </th>
                <th data-switchable="false" data-searchable="false" data-sortable="false" data-field="checkincheckout" data-formatter="componentsInOutFormatter">
                  <?php echo e(trans('general.checkin')); ?>/<?php echo e(trans('general.checkout')); ?>

                </th>
              </tr>
              </thead>
            </table>

          </div>
        </div> <!-- close tab-pane div -->


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('components.files', $component)): ?>
          <div class="tab-pane" id="files">

            <div class="table-responsive">
              <table
                      data-cookie-id-table="componentUploadsTable"
                      data-id-table="componentUploadsTable"
                      id="componentUploadsTable"
                      data-search="true"
                      data-pagination="true"
                      data-side-pagination="client"
                      data-show-columns="true"
                      data-show-export="true"
                      data-show-footer="true"
                      data-toolbar="#upload-toolbar"
                      data-show-refresh="true"
                      data-sort-order="asc"
                      data-sort-name="name"
                      class="table table-striped snipe-table"
                      data-export-options='{
                    "fileName": "export-components-uploads-<?php echo e(str_slug($component->name)); ?>-<?php echo e(date('Y-m-d')); ?>",
                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","delete","download","icon"]
                    }'>
                <thead>
                <tr>
                  <th data-visible="true" data-field="icon" data-sortable="true"><?php echo e(trans('general.file_type')); ?></th>
                  <th class="col-md-2" data-searchable="true" data-visible="true" data-field="image"><?php echo e(trans('general.image')); ?></th>
                  <th class="col-md-2" data-searchable="true" data-visible="true" data-field="filename" data-sortable="true"><?php echo e(trans('general.file_name')); ?></th>
                  <th class="col-md-1" data-searchable="true" data-visible="true" data-field="filesize"><?php echo e(trans('general.filesize')); ?></th>
                  <th class="col-md-2" data-searchable="true" data-visible="true" data-field="notes" data-sortable="true"><?php echo e(trans('general.notes')); ?></th>
                  <th class="col-md-1" data-searchable="true" data-visible="true" data-field="download"><?php echo e(trans('general.download')); ?></th>
                  <th class="col-md-2" data-searchable="true" data-visible="true" data-field="created_at" data-sortable="true"><?php echo e(trans('general.created_at')); ?></th>
                  <th class="col-md-1" data-searchable="true" data-visible="true" data-field="actions"><?php echo e(trans('table.actions')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php if($component->uploads->count() > 0): ?>
                  <?php $__currentLoopData = $component->uploads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td>
                        <i class="<?php echo e(Helper::filetype_icon($file->filename)); ?> icon-med" aria-hidden="true"></i>
                        <span class="sr-only"><?php echo e(Helper::filetype_icon($file->filename)); ?></span>

                      </td>
                      <td>
                        <?php if($file->filename): ?>
                          <?php if( Helper::checkUploadIsImage($file->get_src('components'))): ?>
                            <a href="<?php echo e(route('show.componentfile', ['componentId' => $component->id, 'fileId' => $file->id, 'download' => 'false'])); ?>" data-toggle="lightbox" data-type="image"><img src="<?php echo e(route('show.componentfile', ['componentId' => $component->id, 'fileId' => $file->id])); ?>" class="img-thumbnail" style="max-width: 50px;"></a>
                          <?php endif; ?>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php echo e($file->filename); ?>

                      </td>
                      <td data-value="<?php echo e((Storage::exists('private_uploads/components/'.$file->filename) ? Storage::size('private_uploads/components/'.$file->filename) : '')); ?>">
                        <?php echo e(@Helper::formatFilesizeUnits(Storage::exists('private_uploads/components/'.$file->filename) ? Storage::size('private_uploads/components/'.$file->filename) : '')); ?>

                      </td>

                      <td>
                        <?php if($file->note): ?>
                          <?php echo e($file->note); ?>

                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if($file->filename): ?>
                          <nobr><a href="<?php echo e(route('show.componentfile', [$component->id, $file->id])); ?>" class="btn btn-sm btn-default">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '0bc333070fe8fbc263fd4a4e307b8773::icon','data' => ['type' => 'download']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'download']); ?>
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
                            <span class="sr-only"><?php echo e(trans('general.download')); ?></span>
                          </a>

                          <a href="<?php echo e(route('show.componentfile', [$component->id, $file->id, 'inline' => 'true'])); ?>" class="btn btn-sm btn-default" target="_blank">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '0bc333070fe8fbc263fd4a4e307b8773::icon','data' => ['type' => 'external-link']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                          </nobr>
                        <?php endif; ?>
                      </td>
                      <td><?php echo e($file->created_at); ?></td>
                      <td>
                        <a class="btn delete-asset btn-danger btn-sm" href="<?php echo e(route('delete/componentfile', [$component->id, $file->id])); ?>" data-content="<?php echo e(trans('general.delete_confirm', ['item' => $file->filename])); ?>" data-title="<?php echo e(trans('general.delete')); ?>">
                          <i class="fas fa-trash icon-white" aria-hidden="true"></i>
                          <span class="sr-only"><?php echo e(trans('general.delete')); ?></span>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                  <tr>
                    <td colspan="8"><?php echo e(trans('general.no_results')); ?></td>
                  </tr>
                <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div> <!-- /.tab-pane -->
        <?php endif; ?>

      </div>
    </div>
  </div> <!-- .col-md-9-->


  <!-- side address column -->
  <div class="col-md-3">
    <?php if($component->image!=''): ?>
      <div class="col-md-12 text-center" style="padding-bottom: 15px;">
        <a href="<?php echo e(Storage::disk('public')->url('components/'.e($component->image))); ?>" data-toggle="lightbox">
          <img src="<?php echo e(Storage::disk('public')->url('components/'.e($component->image))); ?>" class="img-responsive img-thumbnail" alt="<?php echo e($component->name); ?>"></a>
      </div>

    <?php endif; ?>

    <?php if($component->serial!=''): ?>
    <div class="col-md-12" style="padding-bottom: 5px;"><strong><?php echo e(trans('admin/hardware/form.serial')); ?>: </strong>
    <?php echo e($component->serial); ?> </div>
    <?php endif; ?>

    <?php if($component->purchase_date): ?>
    <div class="col-md-12" style="padding-bottom: 5px;"><strong><?php echo e(trans('admin/components/general.date')); ?>: </strong>
    <?php echo e($component->purchase_date); ?> </div>
    <?php endif; ?>

    <?php if($component->purchase_cost): ?>
    <div class="col-md-12" style="padding-bottom: 5px;"><strong><?php echo e(trans('admin/components/general.cost')); ?>:</strong>
    <?php echo e($snipeSettings->default_currency); ?>


    <?php echo e(Helper::formatCurrencyOutput($component->purchase_cost)); ?> </div>
    <?php endif; ?>

    <?php if($component->order_number): ?>
    <div class="col-md-12" style="padding-bottom: 5px;"><strong><?php echo e(trans('general.order_number')); ?>:</strong>
    <?php echo e($component->order_number); ?> </div>
    <?php endif; ?>

    <?php if($component->notes): ?>

      <div class="col-md-12">
        <strong>
          <?php echo e(trans('general.notes')); ?>

        </strong>
      </div>
      <div class="col-md-12">
        <?php echo nl2br(Helper::parseEscapedMarkedownInline($component->notes)); ?>

      </div>
    </div>
    <?php endif; ?>

  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $component)): ?>
    <div class="col-md-12 hidden-print" style="padding-top: 5px;">
      <a href="<?php echo e(route('components.edit', $component->id)); ?>" class="btn btn-sm btn-warning btn-social btn-block hidden-print">
        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '0bc333070fe8fbc263fd4a4e307b8773::icon','data' => ['type' => 'edit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
        <?php echo e(trans('admin/components/general.edit')); ?>

      </a>
    </div>
  <?php endif; ?>

  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checkout', Component::class)): ?>
    <div class="col-md-12 hidden-print" style="padding-top: 5px;">
            <a href="<?php echo e(route('components.checkout.show', $component->id)); ?>" class="btn btn-sm bg-maroon btn-social btn-block hidden-print">
                 <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '0bc333070fe8fbc263fd4a4e307b8773::icon','data' => ['type' => 'checkout']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkout']); ?>
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
              <?php echo e(trans('admin/components/general.checkout')); ?>

            </a>
    </div>
  <?php endif; ?>


</div>
</div> <!-- .row-->

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('components.files', Component::class)): ?>
  <?php echo $__env->make('modals.upload-file', ['item_type' => 'component', 'item_id' => $component->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials.bootstrap-table', ['exportFile' => 'component' . $component->name . '-export', 'search' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/test-deploy/resources/views/components/view.blade.php ENDPATH**/ ?>