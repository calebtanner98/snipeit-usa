<?php $__env->startSection('title'); ?>
    <?php if($item->id): ?>
        <?php echo e($updateText); ?>

    <?php else: ?>
        <?php echo e($createText); ?>

    <?php endif; ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary pull-right">
    <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('content'); ?>

<!-- row -->
<div class="row">
    <!-- col-md-8 -->
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0">

        <form id="create-form" class="form-horizontal" method="post" action="<?php echo e((isset($formAction)) ? $formAction : \Request::url()); ?>" autocomplete="off" role="form" enctype="multipart/form-data">

        <!-- box -->
        <div class="box box-default">
            <!-- box-header -->
            <div class="box-header with-border">

                <?php if((isset($topSubmit) && ($topSubmit=='true')) || (isset($item->id))): ?>

                <div class="col-md-12 box-title text-right" style="padding: 0px; margin: 0px;">
                        <div class="col-md-9 text-left">
                            <?php if($item->id): ?>
                                <h2 class="box-title" style="padding-top: 8px; padding-bottom: 7px;">
                                    <?php echo e($item->display_name); ?>

                                </h2>
                            <?php endif; ?>
                        </div>
                        <?php if(isset($topSubmit) && ($topSubmit=='true')): ?>
                        <div class="col-md-3 text-right" style="padding-right: 10px;">
                            <button type="submit" class="btn btn-primary pull-right">
                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
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
<?php endif; ?>
                                <?php echo e(trans('general.save')); ?>

                            </button>
                        </div>
                        <?php endif; ?>
                </div>
            </div><!-- /.box-header -->
            <?php endif; ?>

            <!-- box-body -->
            <div class="box-body">

                <div style="padding-top: 30px;">
                    <?php if($item->id): ?>
                    <?php echo e(method_field('PUT')); ?>

                    <?php endif; ?>

                    <!-- CSRF Token -->
                    <?php echo e(csrf_field()); ?>

                    <?php echo $__env->yieldContent('inputFields'); ?>
                        <?php if (isset($component)) { $__componentOriginal897bfaf5cfb025541cae5f511fed1c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal897bfaf5cfb025541cae5f511fed1c5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => '3f7b628a1a585b60fccfd7fdfdab6ee9::redirect_submit_options','data' => ['indexRoute' => $index_route ?? null,'buttonLabel' => trans('general.save'),'options' => $options ?? []]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('redirect_submit_options'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['index_route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($index_route ?? null),'button_label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('general.save')),'options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($options ?? [])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal897bfaf5cfb025541cae5f511fed1c5f)): ?>
<?php $attributes = $__attributesOriginal897bfaf5cfb025541cae5f511fed1c5f; ?>
<?php unset($__attributesOriginal897bfaf5cfb025541cae5f511fed1c5f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal897bfaf5cfb025541cae5f511fed1c5f)): ?>
<?php $component = $__componentOriginal897bfaf5cfb025541cae5f511fed1c5f; ?>
<?php unset($__componentOriginal897bfaf5cfb025541cae5f511fed1c5f); ?>
<?php endif; ?>
                </div>

            </div> <!-- ./box-body -->
        </div> <!-- box -->
        </form>
    </div> <!-- col-md-8 -->

</div><!-- ./row -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/layouts/edit-form.blade.php ENDPATH**/ ?>