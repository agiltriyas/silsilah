<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar toggled sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home') ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-info"></i>
        </div>
        <div class="sidebar-brand-text mx-3"></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider mt-0">

    <!-- Heading -->
    <div class="sidebar-heading" style="margin-bottom:-10px;">
        Admin
    </div>
    <?php if ($title == 'Data Admin') : ?>
        <li class="nav-item active" style="margin-bottom:-20px;">
        <?php else : ?>
        <li class="nav-item" style="margin-bottom:-20px;">
        <?php endif; ?>

        <!-- jika sub_menu.id = extra_sub_menu_id -->
        <a class="nav-link" href="<?= base_url('admin') ?>">
            <i class="fas fa-user-cog"></i>
            <span>Data Admin</span></a>
        </li>

        <?php if ($title == 'Edit Home') : ?>
            <li class="nav-item active" style="margin-bottom:-20px;">
            <?php else : ?>
            <li class="nav-item" style="margin-bottom:-20px;">
            <?php endif; ?>
            <a class="nav-link" href="<?= base_url('admin/edithome') ?>">
                <i class="fas fa-edit"></i>
                <span>Edit Home</span></a>
            </li>
            <!-- Divider -->
            <!-- Nav Item - Dashboard -->

            <li class="nav-item" style="margin-bottom:-20px;">
                <a class="nav-link" href="<?= base_url('silsilah') ?>">
                    <i class="fas fa-sitemap"></i>
                    <span>Silsilah</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

            <li class="nav-item" style="margin-top:-15px;">
                <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                    <i class="fas fa-fw fa-power-off"></i>
                    <span>logout</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

</ul>
<!-- End of Sidebar -->