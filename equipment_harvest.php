<?php 
session_start();
$title = "Harvest Reportst";
$main_sidebar = "Equipment";
$sidebar = "Harvest Reports";
$header_content = "Monitor Equipment Reports";
$header = "Equipment Harvest Reports";
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
              <h3 class="card-title">Harvest Reports</h3>
            </div>
        <div class="card-body">
         <table id="area_inspected_table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="text-center">Date Borrowed</th>
                  <th class="text-center">Date Returned</th>
                  <th class="text-center">Equipment</th>
                  <th class="text-center">Crops</th>
                  <th class="text-center">Volume</th>
                  <th class="text-center">Benefeciaries</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                      require('controller/db.php');
                      $harvest = "SELECT * FROM post_harvest pb left join transaction t on t.id = pb.transac_id left join equipment e on t.eqp_id = e.id left join commodity c on c.id = pb.crops_id left join benefeciaries b on b.id = t.bfcry_id order by t.date_borrowed ASC";
                      $qry = $conn->query($harvest) or trigger_error(mysqli_error($conn)." ".$harvest);
                      while($a = mysqli_fetch_assoc($qry)){?>
                        <tr>
                          <td class="text-center"><?php echo $a['date_borrowed']; ?></td>
                          <td class="text-center"><?php echo $a['date_return']; ?></td>
                          <td class="text-center"><?php echo $a['equipment_name']; ?></td>
                          <td class="text-center"><?php echo $a['commodity_name']; ?></td>
                          <td class="text-center"><?php echo $a['volume']; ?></td>
                          <td class="text-center"><?php echo $a['benefeciaries']; ?></td>
                        </tr>
                    <?php }  ?>
                </tbody>
         </table>
        </div>
    </div>
</div>
</div>
</div>
</section>
<?php include('equip_req_a.php'); ?>
<?php include('equipment_harvest_modal.php');?>
<?php include('footer.php'); ?>