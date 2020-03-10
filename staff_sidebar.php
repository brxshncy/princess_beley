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
               <li class="nav-item">
                <a href="equipment_req.php" id="read" class="nav-link <?php echo $sidebar == 'Equipment Request' ? 'active' : '' ?>">
                  <i class="fas fa-envelope nav-icon"></i>
                  <p class="">Equipment Request
                    <span class="badge right err" id="notif">
                    </span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="equipment_status.php" id="read" class="nav-link <?php echo $sidebar == 'Equipment Status' ? 'active' : '' ?>">
                  <i class="far fa-clipboard nav-icon"></i>
                  <p class="">Equipment Status
                    <span class="badge right err" id="notif">
                    </span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="equipment_harvest.php" id="read" class="nav-link <?php echo $sidebar == 'Harvest Reports' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-file-code"></i>
                  <p class="">Harvest Reports
                    <span class="badge right err" id="notif">
                    </span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="equipment_reports.php" id="read" class="nav-link <?php echo $sidebar == 'Equipment Reports' ? 'active' : '' ?>">
                  <i class="fas fa-stream nav-icon"></i>
                  <p class="">Equipment Reports
                    <span class="badge right err" id="notif">
                    </span>
                  </p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link <?php echo $main_sidebar == 'Calendar' ? 'active"' : '' ?>">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="calendar_equipment.php" class="nav-link <?php echo $sidebar == 'Transactions' ? 'active' : '' ?>">
                  <i class="far fa-calendar nav-icon"></i>
                  <p>Transactions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="calendar_maintenance.php" class="nav-link <?php echo $sidebar == 'Maintenance' ? 'active' : '' ?>">
                  <i class="far fa-calendar nav-icon"></i>
                  <p>Maintenance</p>
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