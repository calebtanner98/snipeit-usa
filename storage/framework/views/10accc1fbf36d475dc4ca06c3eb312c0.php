<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(url('/portal')); ?>" class="brand-link">
        <span class="brand-text font-weight-light">TAS Request Portal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- Add user panel here if needed -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <!-- Add menu items here -->
                <li class="nav-item">
                    <a href="<?php echo e(url('/requestable-assets')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-store"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH /var/www/html/snipeit/resources/views/user-portal/sidebar.blade.php ENDPATH**/ ?>