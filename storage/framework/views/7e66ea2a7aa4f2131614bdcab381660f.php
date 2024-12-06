<!-- resources/views/user-portal/profile.blade.php -->


<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>My Profile</h3>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">Name</th>
                            <td><?php echo e(auth()->user()->first_name); ?> <?php echo e(auth()->user()->last_name); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Username</th>
                            <td><?php echo e(auth()->user()->username); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td><?php echo e(auth()->user()->email); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Location</th>
                            <td><?php echo e(auth()->user()->location->name); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Job Title</th>
                            <td><?php echo e(auth()->user()->job_title); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Last Login</th>
                            <td><?php echo e(auth()->user()->last_login_at); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Created At</th>
                            <td><?php echo e(auth()->user()->created_at); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Profile Actions -->
            <div class="col-md-4">
                <div class="profile-picture">
                    <i class="fas fa-user-circle fa-7x"></i> <!-- Default User Icon -->
                </div>
                <div class="action-buttons mt-4">
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user-portal.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/snipeit/resources/views/user-portal/profile.blade.php ENDPATH**/ ?>