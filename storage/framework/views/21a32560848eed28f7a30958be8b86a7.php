<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin/hardware/form.bulk_delete')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary pull-right">
  <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <p><?php echo e(trans('admin/hardware/form.bulk_delete_help')); ?></p>
    <form class="form-horizontal" method="post" action="<?php echo e(route('hardware/bulkdelete')); ?>" autocomplete="off" role="form">
      <?php echo e(csrf_field()); ?>

      <div class="box box-default">
        <div class="box-header with-border">
          <h2 class="box-title" style="color: red"><?php echo e(trans('admin/hardware/form.bulk_delete_warn', ['asset_count' => count($assets)])); ?></h2>
        </div>

        <div class="box-body">
          <table class="table table-striped table-condensed">
            <thead>
              <tr>
                <td></td>
                <td><?php echo e(trans('admin/hardware/table.id')); ?></td>
                <td><?php echo e(trans('general.asset_name')); ?></td>
                <td><?php echo e(trans('admin/hardware/table.location')); ?></td>
                <td><?php echo e(trans('admin/hardware/table.assigned_to')); ?></td>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><input type="checkbox" name="ids[]" value="<?php echo e($asset->id); ?>" checked="checked"></td>
                <td><?php echo e($asset->id); ?></td>
                <td><?php echo e($asset->present()->name()); ?></td>
                <td>
                  <?php if($asset->location): ?>
                  <?php echo e($asset->location->name); ?>

                  <?php endif; ?>
                </td>
                <td>
                  <?php if($asset->assignedTo): ?>
                  <?php echo e($asset->assignedTo->present()->name()); ?>

                  <?php endif; ?>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->

        <div class="box-footer text-right">
          <a class="btn btn-link" href="<?php echo e(URL::previous()); ?>" method="post" enctype="multipart/form-data"><?php echo e(trans('button.cancel')); ?></a>
          <button type="submit" class="btn btn-success" id="submit-button"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::icon','data' => ['type' => 'checkmark']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkmark']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> <?php echo e(trans('button.delete')); ?></button>
        </div><!-- /.box-footer -->
      </div><!-- /.box -->
    </form>
  </div> <!-- .col-md-12-->
</div><!--.row-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/hardware/bulk-delete.blade.php ENDPATH**/ ?>