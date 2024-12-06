<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item">
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                </ul>
            </div>
        </li>
    </ul>

    <a href="#" class="navbar-brand">
        <img class="d-inline-block align-top" width="60px" height="60px" src="<?php echo e(asset('tasLogo.png')); ?>"
            alt="TAS Logo" />
    </a>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i> <?php echo e(auth()->user()->first_name); ?> <?php echo e(auth()->user()->last_name); ?>

            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#passwordChangeModal">
                    <i class="fas fa-key mr-2"></i> Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a href="" class="dropdown-item"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
                <form id="logout-form" action="" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </li>
    </ul>

</nav>

<!-- Password Change Modal -->
<div class="modal fade" id="passwordChangeModal" tabindex="-1" role="dialog"
    aria-labelledby="passwordChangeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordChangeModalLabel"><i class="fas fa-key"></i> Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="password-change-form" action="" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="current_password"><i class="fas fa-lock"></i> Current Password</label>
                        <input type="password" name="current_password" id="current_password" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="new_password"><i class="fas fa-lock"></i> New Password</label>
                        <input type="password" name="new_password" id="new_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="new_password_confirmation"><i class="fas fa-lock"></i> Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                            class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Change Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/snipeit/resources/views/user-portal/navbar.blade.php ENDPATH**/ ?>