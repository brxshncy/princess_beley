         <?php 
session_start();
$title = "Equipment Request";
$main_sidebar = "Equipment";
$sidebar = "Equipment Request";
$header_content = "Manage Equipment Request";
$header = "Requests";
include('header.php');
 ?>
<?php include('staff_sidebar.php'); ?>  
<?php include('content_header.php'); ?>
<section class="content">
<div class="container-fluid">
  <div class="row mt-4">
    <div class="col col-md-10">
    </div>
    <div class="col text-right col-md-2">
    </div>
</div>
<?php if(isset($_SESSION['add'])): ?>
  <div class="row mb-2 justify-content-center">
    <div class="col">
      <div class="bg-success disabled color-palette p-1">
        <p class="text-center">
          <?php
              echo $_SESSION['add'];
              unset($_SESSION['add']);
          ?>
        </p>
      </div>
    </div>
  </div>
<?php endif ?>
<?php if(isset($_SESSION['update'])): ?>
  <div class="row mb-2 justify-content-center">
    <div class="col">
      <div class="bg-info disabled color-palette p-1">
        <p class="text-center">
          <?php
              echo $_SESSION['update'];
              unset($_SESSION['update']);
          ?>
        </p>
      </div>
    </div>
  </div>
<?php endif ?>
<?php if(isset($_SESSION['aa'])): ?>
  <div class="row mb-2 justify-content-center">
    <div class="col">
      <div class="bg-warning disabled color-palette p-1">
        <p class="text-center">
          <?php
              echo $_SESSION['aa'];
              unset($_SESSION['aa']);
          ?>
        </p>
      </div>
    </div>
  </div>
<?php endif ?>
<?php if(isset($_SESSION['err'])): ?>
  <div class="row mb-2 justify-content-center">
    <div class="col">
      <div class="bg-danger disabled color-palette p-1">
        <p class="text-center">
          <?php
              echo $_SESSION['err'];
              unset($_SESSION['err']);
          ?>
        </p>
      </div>
    </div>
  </div>
<?php endif ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Pending Requests</h3>
            </div>
        <div class="card-body">
         <table id="area_inspected_table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="text-center">Equipment</th>
                  <th class="text-center">Beneficiary</th>
                  <th class="text-center">Location</th>
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                      require('controller/db.php');
                      $equipment = "SELECT t.id as t_id, t.area_id as area_id, t.reason as reason, e.equipment_name as equipment, b.benefeciaries as benefeciaries from transaction t LEFT JOIN equipment e ON t.eqp_id = e.id LEFT JOIN benefeciaries b ON b.id = t.bfcry_id";
                      $qry = $conn->query($equipment) or trigger_error(mysqli_error($conn)." ".$equipment);
                      while($a = mysqli_fetch_assoc($qry)){?>
                        <tr>
                          <td class="text-center"><?php echo ucwords($a['equipment']) ?> </td>
                          <td class="text-center"><?php echo ucfirst($a['benefeciaries']) ?> </td>
                          <td class="text-center">
                            <?php
                              $c = $a['area_id'];
                                $address = "SELECT a.area_address as area_address, b.baranggay_name as brgy FROM area_inspected a LEFT JOIN barangay b ON b.id=a.barangay_area WHERE a.id = '$c'";
                                $qry_1 = $conn->query($address) or trigger_error(mysqli_error($conn)." ".$address);
                                $b  = mysqli_fetch_assoc($qry_1);

                                echo $b['brgy']." ".ucwords($b['area_address']);
                            ?>
                          </td>
                          <td class="text-center">                  
                              <a href="javascript:void(0)" id="<?php echo $a['t_id'] ?>" class="view_req mr-2" Title = "Accept">
                               <i class="fas fa-eye text-success mr-2"></i>
                             </a>
                          </td>
                        </tr>
                  <?php } ?>
                </tbody>
         </table>
        </div>
    </div>
</div>
</div>
</div>
</section>
<?php include('equip_req_a.php'); ?>
<?php include('footer.php'); ?>