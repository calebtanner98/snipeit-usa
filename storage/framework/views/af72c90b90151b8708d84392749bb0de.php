<?php $__env->startSection('title'); ?>
  <?php echo e($consumable->name); ?>

  <?php echo e(trans('general.consumable')); ?> -
  (<?php echo e(trans('general.remaining_var', ['count' => $consumable->numRemaining()])); ?>)
  <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
  <a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary pull-right">
    <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>




  <div class="row">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs hidden-print">

            <li class="active">
              <a href="#details" data-toggle="tab">
            <span class="hidden-lg hidden-md">
            <i class="fas fa-info-circle fa-2x"></i>
            </span>
                <span class="hidden-xs hidden-sm"><?php echo e(trans('admin/users/general.info')); ?></span>
              </a>
            </li>

            <li>
              <a href="#checkedout" data-toggle="tab">
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
                    <span class="hidden-xs hidden-sm"><?php echo e(trans('general.assigned')); ?>

                      <?php echo ($consumable->users_consumables > 0 ) ? '<badge class="badge badge-secondary">'.number_format($consumable->users_consumables).'</badge>' : ''; ?>

                    </span>
                  </a>
            </li>


            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('consumables.files', $consumable)): ?>
              <li>
                <a href="#files" data-toggle="tab">
                <span class="hidden-lg hidden-md">
                  <i class="far fa-file fa-2x" aria-hidden="true"></i>
                </span>
                <span class="hidden-xs hidden-sm"><?php echo e(trans('general.file_uploads')); ?>

                    <?php echo ($consumable->uploads->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($consumable->uploads->count()).'</badge>' : ''; ?>

                  </span>
                </a>
              </li>
            <?php endif; ?>

            <li>
              <a href="#history" data-toggle="tab">
                <span class="hidden-lg hidden-md">
                  <i class="fas fa-history fa-2x" aria-hidden="true"></i>
                </span>
                <span class="hidden-xs hidden-sm">
                  <?php echo e(trans('general.history')); ?>

                </span>
              </a>
            </li>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $consumable)): ?>
              <li class="pull-right">
                <a href="#" data-toggle="modal" data-target="#uploadFileModal">
                  <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'paperclip']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
          <div class="tab-pane active" id="details">
            <div class="row">
              <div class="info-stack-container">
              <!-- Start button column -->
              <div class="col-md-3 col-xs-12 col-sm-push-9 info-stack">

                <?php if($consumable->image!=''): ?>
                  <div class="col-md-12 text-center" style="padding-bottom: 20px;">
                    <a href="<?php echo e(Storage::disk('public')->url('consumables/'.e($consumable->image))); ?>" data-toggle="lightbox">
                      <img src="<?php echo e(Storage::disk('public')->url('consumables/'.e($consumable->image))); ?>" class="img-responsive img-thumbnail" alt="<?php echo e($consumable->name); ?>"></a>
                  </div>
                <?php endif; ?>

                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $consumable)): ?>
                  <div class="col-md-12">
                    <a href="<?php echo e(route('consumables.edit', $consumable->id)); ?>" style="margin-bottom:5px;"  class="btn btn-sm btn-block btn-social btn-warning hidden-print">
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
                      <?php echo e(trans('button.edit')); ?>

                    </a>
                  </div>
                <?php endif; ?>

                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checkout', $consumable)): ?>
                    <?php if($consumable->numRemaining() > 0): ?>
                      <div class="col-md-12">
                        <a href="<?php echo e(route('consumables.checkout.show', $consumable->id)); ?>" style="margin-bottom:5px;" class="btn btn-sm btn-block bg-maroon btn-social hidden-print">
                          <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'checkout']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                          <?php echo e(trans('general.checkout')); ?>

                        </a>
                      </div>
                    <?php else: ?>
                      <div class="col-md-12">
                        <button style="margin-bottom:10px;" class="btn btn-block bg-maroon btn-sm btn-social hidden-print disabled">
                          <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'checkout']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                          <?php echo e(trans('general.checkout')); ?>

                        </button>
                      </div>
                    <?php endif; ?>
                  <?php endif; ?>


                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', Consumable::class)): ?>

                    <div class="col-md-12">
                      <a href="<?php echo e(route('consumables.clone.create', $consumable->id)); ?>" style="margin-bottom:5px;"  class="btn btn-sm btn-block btn-info btn-social hidden-print">
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'clone']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'clone']); ?>
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
                        <?php echo e(trans('button.var.clone', ['item_type' => trans('general.consumable')])); ?>

                      </a>
                    </div>

                  <?php endif; ?>



                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $consumable)): ?>
                    <div class="col-md-12" style="padding-top: 10px; padding-bottom: 20px">
                      <?php if($consumable->deleted_at==''): ?>
                        <button class="btn btn-sm btn-block btn-danger btn-social hidden-print delete-asset" data-toggle="modal" data-title="<?php echo e(trans('general.delete')); ?>" data-content="<?php echo e(trans('general.sure_to_delete_var', ['item' => $consumable->name])); ?>" data-target="#dataConfirmModal">
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
                        <span class="sr-only"><?php echo e(trans('general.delete')); ?></span>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>
              </div>

              <!-- End button column -->

              <div class="col-md-9 col-xs-12 col-sm-pull-3 info-stack">

                <div class="row-new-striped" style="margin: 0px;">

                  <div class="row row-new-striped">
                    <!-- name -->
                    <div class="col-md-3 col-sm-2">
                      <?php echo e(trans('admin/users/table.name')); ?>

                    </div>
                    <div class="col-md-9 col-sm-2">
                      <?php echo e($consumable->name); ?>

                    </div>
                  </div>

                  <!-- company -->
                  <?php if($consumable->company): ?>
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('general.company')); ?>

                      </div>
                      <div class="col-md-9">
                        <?php echo e($consumable->company->name); ?>

                      </div>
                    </div>
                  <?php endif; ?>

                  <!-- category -->
                  <?php if($consumable->category): ?>
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('general.category')); ?>

                      </div>
                      <div class="col-md-9">
                        <?php echo e($consumable->category->name); ?>

                      </div>
                    </div>
                  <?php endif; ?>


                  <!-- remaining -->
                  <?php if($consumable->numRemaining()): ?>
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('general.remaining')); ?>

                      </div>
                      <div class="col-md-9">
                        <?php if($consumable->numRemaining() < (int) $consumable->min_amt): ?>
                          <i class="fas fa-exclamation-triangle text-orange"
                             aria-hidden="true"
                             data-tooltip="true"
                             data-placement="top"
                             title="<?php echo e(trans('admin/consumables/general.inventory_warning', ['min_count' => (int) $consumable->min_amt])); ?>">
                          </i>
                        <?php endif; ?>
                        <?php echo e($consumable->numRemaining()); ?>

                      </div>
                    </div>
                  <?php endif; ?>

                  <!-- min amt -->
                  <?php if($consumable->min_amt): ?>
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('general.min_amt')); ?>

                      </div>
                      <div class="col-md-9">
                        <?php echo e($consumable->min_amt); ?>

                      </div>
                    </div>
                  <?php endif; ?>

                  <!-- locationm -->
                  <?php if($consumable->location): ?>
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('general.location')); ?>

                      </div>
                      <div class="col-md-9">
                        <?php echo e($consumable->location->name); ?>

                      </div>
                    </div>
                  <?php endif; ?>

                  <!-- supplier -->
                  <?php if($consumable->supplier): ?>
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('general.supplier')); ?>

                      </div>
                      <div class="col-md-9">
                        <?php echo e($consumable->supplier->name); ?>

                      </div>
                    </div>
                  <?php endif; ?>

                  <!-- supplier -->
                  <?php if($consumable->manufacturer): ?>
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('general.manufacturer')); ?>

                      </div>
                      <div class="col-md-9">
                        <?php echo e($consumable->manufacturer->name); ?>

                      </div>
                    </div>
                  <?php endif; ?>

                  <?php if($consumable->purchase_cost): ?>
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('general.purchase_cost')); ?>

                      </div>
                      <div class="col-md-9">
                        <?php echo e($snipeSettings->default_currency); ?>

                        <?php echo e(Helper::formatCurrencyOutput($consumable->purchase_cost)); ?>

                      </div>
                    </div>
                  <?php endif; ?>

                  <?php if($consumable->order_number): ?>
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('general.order_number')); ?>

                      </div>
                      <div class="col-md-9">
                        <span class="js-copy"><?php echo e($consumable->order_number); ?></span>
                        <i class="fa-regular fa-clipboard js-copy-link" data-clipboard-target=".js-copy" aria-hidden="true" data-tooltip="true" data-placement="top" title="<?php echo e(trans('general.copy_to_clipboard')); ?>">
                          <span class="sr-only"><?php echo e(trans('general.copy_to_clipboard')); ?></span>
                        </i>

                      </div>
                    </div>
                  <?php endif; ?>

                  <?php if($consumable->item_no): ?>
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('admin/consumables/general.item_no')); ?>

                      </div>
                      <div class="col-md-9">

                        <span class="js-copy"><?php echo e($consumable->item_no); ?></span>
                        <i class="fa-regular fa-clipboard js-copy-link" data-clipboard-target=".js-copy" aria-hidden="true" data-tooltip="true" data-placement="top" title="<?php echo e(trans('general.copy_to_clipboard')); ?>">
                          <span class="sr-only"><?php echo e(trans('general.copy_to_clipboard')); ?></span>
                        </i>

                      </div>
                    </div>
                  <?php endif; ?>

                  <?php if($consumable->model_number): ?>
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('general.model_no')); ?>

                      </div>
                      <div class="col-md-9">

                        <span class="js-copy"><?php echo e($consumable->model_number); ?></span>
                        <i class="fa-regular fa-clipboard js-copy-link" data-clipboard-target=".js-copy" aria-hidden="true" data-tooltip="true" data-placement="top" title="<?php echo e(trans('general.copy_to_clipboard')); ?>">
                          <span class="sr-only"><?php echo e(trans('general.copy_to_clipboard')); ?></span>
                        </i>

                      </div>
                    </div>
                  <?php endif; ?>

                  <!-- purchase date -->
                  <?php if($consumable->purchase_date): ?>
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('general.purchase_date')); ?>

                      </div>
                      <div class="col-md-9">
                        <?php echo e(\App\Helpers\Helper::getFormattedDateObject($consumable->purchase_date, 'datetime', false)); ?>

                      </div>
                    </div>
                  <?php endif; ?>

                  <?php if($consumable->created_at): ?>
                    <!-- created at -->
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('general.created_at')); ?>

                      </div>
                      <div class="col-md-9">
                        <?php echo e(\App\Helpers\Helper::getFormattedDateObject($consumable->created_at, 'datetime')['formatted']); ?>

                      </div>
                    </div>
                  <?php endif; ?>

                  <?php if($consumable->updated_at): ?>
                    <!-- created at -->
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('general.updated_at')); ?>

                      </div>
                      <div class="col-md-9">
                        <?php echo e(\App\Helpers\Helper::getFormattedDateObject($consumable->updated_at, 'datetime')['formatted']); ?>

                      </div>
                    </div>
                  <?php endif; ?>

                  <?php if($consumable->admin): ?>
                    <!-- created at -->
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('general.created_by')); ?>

                      </div>
                      <div class="col-md-9">

                          <?php if($consumable->admin->deleted_at == ''): ?>
                            <a href="<?php echo e(route('users.show', ['user' => $consumable->admin])); ?>"><?php echo e($consumable->admin->present()->fullName); ?></a>
                          <?php else: ?>
                            <del><?php echo e($consumable->admin->present()->fullName); ?></del>
                          <?php endif; ?>

                      </div>
                    </div>
                  <?php endif; ?>

                  <?php if($consumable->notes): ?>
                    <!-- empty -->
                    <div class="row">

                      <div class="col-md-3">
                        <?php echo e(trans('admin/users/table.notes')); ?>

                      </div>
                      <div class="col-md-9">
                        <?php echo nl2br(Helper::parseEscapedMarkedownInline($consumable->notes)); ?>

                      </div>

                    </div>
                  <?php endif; ?>
                </div> <!--/end striped container-->
              </div> <!-- end col-md-9 -->
              </div><!-- end info-stack-container -->
            </div> <!--/.row-->
          </div><!-- /.tab-pane -->

          <div class="tab-pane" id="checkedout">

            <table
                    data-cookie-id-table="consumablesCheckedoutTable"
                    data-pagination="true"
                    data-id-table="consumablesCheckedoutTable"
                    data-search="false"
                    data-side-pagination="server"
                    data-show-columns="true"
                    data-show-export="true"
                    data-show-footer="true"
                    data-show-refresh="true"
                    data-sort-order="asc"
                    data-sort-name="name"
                    id="consumablesCheckedoutTable"
                    class="table table-striped snipe-table"
                    data-url="<?php echo e(route('api.consumables.show.users', $consumable->id)); ?>"
                    data-export-options='{
                "fileName": "export-consumables-<?php echo e(str_slug($consumable->name)); ?>-checkedout-<?php echo e(date('Y-m-d')); ?>",
                "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                }'>
              <thead>
              <tr>
                <th data-searchable="false" data-sortable="false" data-field="avatar" data-formatter="imageFormatter"><?php echo e(trans('general.image')); ?></th>
                <th data-searchable="false" data-sortable="false" data-field="name" formatter="usersLinkFormatter"><?php echo e(trans('general.user')); ?></th>
                <th data-searchable="false" data-sortable="false" data-field="created_at" data-formatter="dateDisplayFormatter">
                  <?php echo e(trans('general.date')); ?>

                </th>
                <th data-searchable="false" data-sortable="false" data-field="note"><?php echo e(trans('general.notes')); ?></th>
                <th data-searchable="false" data-sortable="false" data-field="admin"><?php echo e(trans('general.admin')); ?></th>
              </tr>
              </thead>
            </table>

          </div><!-- /checkedout -->


          <div class="tab-pane" id="files">
            <div class="row">

              <div class="col-md-12 col-sm-12">
                <div class="table-responsive">

                    <table
                            data-cookie-id-table="consumableUploadsTable"
                            data-id-table="consumableUploadsTable"
                            id="consumableUploadsTable"
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
                    "fileName": "export-consumables-uploads-<?php echo e(str_slug($consumable->name)); ?>-<?php echo e(date('Y-m-d')); ?>",
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
                      <?php if($consumable->uploads->count() > 0): ?>
                        <?php $__currentLoopData = $consumable->uploads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td>
                              <i class="<?php echo e(Helper::filetype_icon($file->filename)); ?> icon-med" aria-hidden="true"></i>
                              <span class="sr-only"><?php echo e(Helper::filetype_icon($file->filename)); ?></span>

                            </td>
                            <td>
                              <?php if($file->filename): ?>
                                <?php if( Helper::checkUploadIsImage($file->get_src('consumables'))): ?>
                                  <a href="<?php echo e(route('show.consumablefile', ['consumableId' => $consumable->id, 'fileId' => $file->id, 'download' => 'false'])); ?>" data-toggle="lightbox" data-type="image"><img src="<?php echo e(route('show.consumablefile', ['consumableId' => $consumable->id, 'fileId' => $file->id])); ?>" class="img-thumbnail" style="max-width: 50px;"></a>
                                <?php endif; ?>
                              <?php endif; ?>
                            </td>
                            <td>
                              <?php echo e($file->filename); ?>

                            </td>
                            <td data-value="<?php echo e((Storage::exists('private_uploads/consumables/'.$file->filename) ? Storage::size('private_uploads/consumables/'.$file->filename) : '')); ?>">
                              <?php echo e(@Helper::formatFilesizeUnits(Storage::exists('private_uploads/consumables/'.$file->filename) ? Storage::size('private_uploads/consumables/'.$file->filename) : '')); ?>

                            </td>

                            <td>
                              <?php if($file->note): ?>
                                <?php echo nl2br(Helper::parseEscapedMarkedownInline($file->note)); ?>

                              <?php endif; ?>
                            </td>
                            <td>
                              <?php if($file->filename): ?>
                                <a href="<?php echo e(route('show.consumablefile', [$consumable->id, $file->id])); ?>" class="btn btn-sm btn-default">
                                  <i class="fas fa-download" aria-hidden="true"></i>
                                  <span class="sr-only"><?php echo e(trans('general.download')); ?></span>
                                </a>

                                <a href="<?php echo e(route('show.consumablefile', [$consumable->id, $file->id, 'inline' => 'true'])); ?>" class="btn btn-sm btn-default" target="_blank">
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
                              <?php endif; ?>
                            </td>
                            <td><?php echo e($file->created_at); ?></td>
                            <td>
                              <a class="btn delete-asset btn-danger btn-sm" href="<?php echo e(route('delete/consumablefile', [$consumable->id, $file->id])); ?>" data-content="<?php echo e(trans('general.delete_confirm', ['item' => $file->filename])); ?>" data-title="<?php echo e(trans('general.delete')); ?>">
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
              </div>
            </div> <!--/ROW-->
          </div><!--/FILES-->

          <div class="tab-pane" id="history">
            <div class="table-responsive">

              <table
                      class="table table-striped snipe-table"
                      id="consumableHistory"
                      data-pagination="true"
                      data-id-table="consumableHistory"
                      data-search="true"
                      data-side-pagination="server"
                      data-show-columns="true"
                      data-show-fullscreen="true"
                      data-show-refresh="true"
                      data-sort-order="desc"
                      data-sort-name="created_at"
                      data-show-export="true"
                      data-export-options='{
                         "fileName": "export-consumable-<?php echo e($consumable->id); ?>-history",
                         "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                       }'

                      data-url="<?php echo e(route('api.activity.index', ['item_id' => $consumable->id, 'item_type' => 'consumable'])); ?>"
                      data-cookie-id-table="assetHistory"
                      data-cookie="true">
                <thead>
                <tr>
                  <th data-visible="true" data-field="icon" style="width: 40px;" class="hidden-xs" data-formatter="iconFormatter"><?php echo e(trans('admin/hardware/table.icon')); ?></th>
                  <th data-visible="true" data-field="action_date" data-sortable="true" data-formatter="dateDisplayFormatter"><?php echo e(trans('general.date')); ?></th>
                  <th data-visible="true" data-field="admin" data-formatter="usersLinkObjFormatter"><?php echo e(trans('general.admin')); ?></th>
                  <th data-visible="true" data-field="action_type"><?php echo e(trans('general.action')); ?></th>
                  <th class="col-sm-2" data-field="file" data-visible="false" data-formatter="fileUploadNameFormatter"><?php echo e(trans('general.file_name')); ?></th>
                  <th data-visible="true" data-field="item" data-formatter="polymorphicItemFormatter"><?php echo e(trans('general.item')); ?></th>
                  <th data-visible="true" data-field="target" data-formatter="polymorphicItemFormatter"><?php echo e(trans('general.target')); ?></th>
                  <th data-field="note"><?php echo e(trans('general.notes')); ?></th>
                  <th data-field="signature_file" data-visible="false"  data-formatter="imageFormatter"><?php echo e(trans('general.signature')); ?></th>
                  <th data-visible="false" data-field="file" data-visible="false"  data-formatter="fileUploadFormatter"><?php echo e(trans('general.download')); ?></th>
                  <th data-field="log_meta" data-visible="true" data-formatter="changeLogFormatter"><?php echo e(trans('admin/hardware/table.changed')); ?></th>
                  <th data-field="remote_ip" data-visible="false" data-sortable="true"><?php echo e(trans('admin/settings/general.login_ip')); ?></th>
                  <th data-field="user_agent" data-visible="false" data-sortable="true"><?php echo e(trans('admin/settings/general.login_user_agent')); ?></th>
                  <th data-field="action_source" data-visible="false" data-sortable="true"><?php echo e(trans('general.action_source')); ?></th>
                </tr>
                </thead>
              </table>
            </div>
          </div><!-- /.tab-pane -->
      </div><!-- /.tab-content -->
    </div><!-- nav-tabs-custom -->
  </div>

  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\User::class)): ?>
    <?php echo $__env->make('modals.upload-file', ['item_type' => 'consumable', 'item_id' => $consumable->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>



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


  <?php echo $__env->make('partials.bootstrap-table', ['simple_view' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/consumables/view.blade.php ENDPATH**/ ?>