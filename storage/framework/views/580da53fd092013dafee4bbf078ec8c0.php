<!-- resources/views/user-portal/index.blade.php -->


<?php $__env->startSection('content'); ?>
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- AVAILABLE ASSETS Statistic -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3><?php echo e($requestableAssetsCount); ?></h3>
                        <p>Available Assets</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>

            <!-- AVAILABLE LICENSES Statistic -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo e($requestableLicensesCount); ?></h3>
                        <p>Available Licenses</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>

            <!-- OVERDUE ASSETS Statistic -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3>#</h3>
                        <p>Overdue Assets</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>

            <!-- PENDING REQUESTS Statistic -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3>#</h3>
                        <p>Pending Requests</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Search and Filters -->
            <div class="container-fluid filters">
                <div class="row">
                    <div class="col-md-6">
                        <input class="form-control mb-4" type="text"
                            placeholder="Search by name, description, or type" />
                    </div>
                    <div class="col-md-3 mb-4">
                        <select class="form-control">
                            <option>Type</option>
                            <option>Assets</option>
                            <option>Licenses</option>
                            <!-- Add more types as needed -->
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control">
                            <option>Model</option>
                            <?php $__currentLoopData = $modelsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option><?php echo e($model->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <!-- Add more manufacturers as needed -->
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-outline card-red">
            <!-- Tabs -->
            <div class="card-header p-2 d-flex justify-content-between bg-light">
                <div>
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" href="#assets" data-toggle="tab">Assets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#licenses" data-toggle="tab">Licenses</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="assets">
                        <div class="table-responsive">
                            <table id="assetsTable" class="table table-md">
                                <thead>
                                    <tr>
                                        <th class="text-left">Model</th>
                                        <th>Name</th>
                                        <th>Asset Tag</th>
                                        <th>Model Number</th>
                                        <th>Serial</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $requestableAssets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-left"><?php echo e($asset->model->name); ?></td>
                                            <td><?php echo e($asset->name); ?></td>
                                            <td><?php echo e($asset->asset_tag); ?>

                                            </td>
                                            <td><?php echo e($asset->model->model_number); ?></td>
                                            <td><?php echo e($asset->serial); ?></td>
                                            <td>
                                                <form
                                                    action="<?php echo e(config('app.url')); ?>/account/request-asset/<?php echo e($asset->id); ?>"
                                                    method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="btn btn-primary btn-sm">Request</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="licenses">
                        <div class="table-responsive">
                            <table id="licensesTable" class="table table-md">
                                <thead>
                                    <tr>
                                        <th class="text-left">Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $requestableLicenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $license): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-left"><?php echo e($license->name); ?></td>
                                            <td>
                                                <button class="btn btn-primary btn-sm">Request</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <style>
        body {
            background-color: #f8f9fa;
            /* Light background */
        }

        .navbar {
            background-color: #343A40;
            /* Snipe-IT style dark navbar */
            border-bottom: 1px solid #6c757d;
        }

        .navbar-brand,
        .nav-link {
            color: #ffffff !important;
            /* White text */
        }

        .inventory-header {
            background-color: #343a40;
            /* Dark Snipe-IT theme */
            color: white;
            padding: 20px;
            font-size: 24px;
            text-align: center;
        }

        .card {
            border: 1px solid #dee2e6;
            /* Soft border for Snipe-IT theme */
            margin-bottom: 20px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
        }

        .card:hover {
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
        }

        .card-body {
            text-align: center;
        }

        .btn-checkout {
            background-color: #007bff;
            /* Snipe-IT blue */
            color: teal;
        }

        .btn-checkout:hover {
            background-color: #0056b3;
            /* Darker blue on hover */
        }

        .filters {
            margin-top: 20px;
        }

        .filters select,
        .filters input {
            border-radius: 0.25rem;
            box-shadow: none;
            border: 1px solid #ced4da;
        }

        .card-header .nav-link {
            color: #343a40 !important;
            /* Dark text color for better contrast */
        }

        .card-header .nav-link.active {
            color: #ffffff !important;
            /* Keep white text for the active state */
            background-color: #007bff;
            /* Or any color you prefer for active links */
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user-portal.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/user-portal/index.blade.php ENDPATH**/ ?>