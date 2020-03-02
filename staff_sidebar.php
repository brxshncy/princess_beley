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
            <a href="#" class="nav-link <?php echo $main_sidebar == 'Commodity' ? 'active"' : '' ?>">
              <i class="nav-icon fas fa-seedling"></i>
              <p>
                Commodity
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="commodity.php" class="nav-link <?php echo $sidebar == 'Commodity' ? 'active' : '' ?>">
                    <i class="fas fa-carrot nav-icon"></i>
                    <p>List of Commodities</p>
                  </a>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link <?php echo $main_sidebar == 'Inspect Area' ? 'active"' : '' ?>">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Inspected Areas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="area_inspected.php" class="nav-link <?php echo $sidebar == 'Inspect Area' ? 'active' : '' ?>">
                  <i class="far fa-map nav-icon"></i>
                  <p>Area Records</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link <?php echo $main_sidebar == 'Equipment' ? 'active"' : '' ?>">
              <i class="nav-icon fas fa-tractor"></i>
              <p>
                Equipment
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="equipment.php" class="nav-link <?php echo $sidebar == 'Equipment' ? 'active' : '' ?>">
                  <i class="fas fa-tools nav-icon"></i>
                  <p>Equipment Inventory</p>
                </a>
              </li>

            </ul>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                <a href="logout.php" class="nav-link">
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