<style>
    #sidebarLogo {
        display: flex;
    }

    #sidebarLogoMini {
        display: none;
    }

    #navbarLogo {
        display: none;
    }

    @media (max-width: 768px) {
        #sidebarLogoMini {
            display: none;
        }

        #sidebarLogo {
            display: none;
        }

        #navbarLogo {
            display: flex;
        }

    }
</style>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <a class="navbar-brand brand-logo mx-auto" id="sidebarLogo" href="<?= current_url() ?>"><img src="<?= base_url('assets/public/') ?>images/logo.png" alt="logo" width="150" /></a>
        <a class="mx-auto" href="<?= current_url() ?>" id="sidebarLogoMini"><img src="<?= base_url('assets/public/') ?>images/logo-mini.png" alt="logo" width="50" /></a>
        <li class="nav-item sidebar-category">
            <p>Navigation</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home') ?>">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                <div class="badge badge-info badge-pill">2</div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('id/project') ?>">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">Project</span>
                <div class="badge badge-info badge-pill">2</div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('id/user') ?>">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">User</span>
                <div class="badge badge-info badge-pill">2</div>
            </a>
        </li>
        <li class="nav-item sidebar-category">
            <p>Components</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('id/myproject') ?>">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">My Project</span>
                <div class="badge badge-info badge-pill">2</div>
            </a>
        </li>

    </ul>
</nav>
<!-- partial -->