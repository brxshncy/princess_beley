 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
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
            <a href="dashboard.php" class="nav-link <?php echo $main_sidebar == 'District Coordinators' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_coordinator.php" class="nav-link <?php echo $sidebar == 'District Coordinators' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>District Coordinators</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="dashboard.php" class="nav-link <?php echo $main_sidebar == 'Benefeciaries' ? 'active' : '' ?>">
              <i class="fas fa-users nav-icon"></i>
              <p>
                Benefeciaries
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="benefeciary_report.php" class="nav-link <?php echo $sidebar == 'Benefeciaries' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of Benefeciaries</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="dashboard.php" class="nav-link <?php echo $main_sidebar == 'Area Inspected' ? 'active' : '' ?>">
              <i class="fas fa-users nav-icon"></i>
              <p>
                Area Inspected
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="area_inspected_report.php" class="nav-link <?php echo $sidebar == 'Area Inspected' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of Area Inspected</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Log out
                </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  <div class="content-wrapper">