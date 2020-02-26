 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link <?php echo $main_sidebar == 'Dashboard' ? 'active"' : '' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="area_inspected.php" class="nav-link <?php echo $sidebar == 'Inspect Area' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Area Inspection</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="equipment.php" class="nav-link <?php echo $sidebar == 'Equipment' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Equipment Inventory</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="logout.php" class="nav-link <?php echo $sidebar == 'Equipment Inventory' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Log out</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  <div class="content-wrapper">