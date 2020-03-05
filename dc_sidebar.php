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
            <a href="#" class="nav-link <?php echo $main_s == 'Beneficiaries' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Beneficiaries
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="beneficiaries.php" class="nav-link <?php echo $sidebar == 'Beneficiaries' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Beneficiaries</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link <?php echo $main_s == 'Equipments' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-american-sign-language-interpreting"></i>
              <p>
                Transactions
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="equipment_trans.php" class="nav-link <?php echo $sidebar == 'Equipments' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-tools"></i>
                  <p>Equipments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="equipment_accept.php" id="dc_read" class="nav-link <?php echo $sidebar == 'Notification' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-bell"></i>
                  <p>Notification</p>
                  <?php
                    require('controller/db.php');
                     $lol = $_SESSION['id'];
                     $notif = "SELECT COUNT(state) as state FROM transaction WHERE state = 1 AND dc_id = '$lol' AND dc_notif = 0";
                     $qry = $conn->query($notif) or trigger_error(mysqli_error($con)." ".$notif);
                     $c = mysqli_fetch_assoc($qry);

                     if($c['state'] > 0){
                       echo "<span class='badge right badge-danger'>".$c['state']."</span>";
                     }
                     else{
                      echo "";
                     }
                  ?>

                </a>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <ul class="nav nav-treeview">
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