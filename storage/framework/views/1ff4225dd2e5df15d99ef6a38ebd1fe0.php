<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin/settings/general.php_info')); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
    <a href="<?php echo e(route('settings.index')); ?>" class="btn btn-default"> <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header">
                    <h2 class="box-title"><?php echo e(trans('admin/settings/general.php_info')); ?></h2>
                </div>
                <div class="box-body">

                    <?php
                    ob_start();
                    phpinfo();

                    preg_match ('%<style type="text/css">(.*?)</style>.*?(<body>.*</body>)%s', ob_get_clean(), $matches);

                    # $matches [1]; # Style information
                    # $matches [2]; # Body information
                        
                    echo "<div class='phpinfodisplay'><style type='text/css'>\n",
                    join( "\n",
                        array_map(
                            function ($i) {
                                return ".phpinfodisplay " . preg_replace( "/,/", ",.phpinfodisplay ", $i );
                            },
                            preg_split( '/\n/', $matches[1] )
                        )
                    ),
                    "</style>\n",
                    $matches[2],
                    "\n</div>\n";
                    ?>
                </div>
            </div> <!-- /box-body-->
        </div> <!--/box-default-->

    </div><!--/col-md-8-->
</div><!--/row-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/settings/phpinfo.blade.php ENDPATH**/ ?>