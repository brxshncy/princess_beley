<?php 
session_start();
$title = "Equipment";
$main_sidebar = "Equipment";
$sidebar = "Equipment";
$header_content = "Manage Equipment";
$header = "City of Agriculture Equipment Inventory";
include('header.php');
 ?>
<?php include('staff_sidebar.php'); ?>	
<?php include('content_header.php'); ?>
<section class="content">
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col col-md-10">
    </div>
    <div class="col text-right col-md-2">
       <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#equipment_add">
               <i class="fas fa-plus-circle mr-1"></i> Add Equipment
        </button>
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
              <h3 class="card-title">Equipment</h3>
            </div>
        <div class="card-body">
         <table id="area_inspected_table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="text-center">Equipment</th>
                  <th class="text-center">Description</th>
                  <th class="text-center">Commodity</th>
                  <th class="text-center">(Capacity & Unit Measure)</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                      require('controller/db.php');
                      $equipment = "SELECT * FROM equipment ORDER BY id DESC";
                      $qry = $conn->query($equipment) or trigger_error(mysqli_error($conn)." ".$equipment);
                      $code = "EQPMT";
                      while($a = mysqli_fetch_assoc($qry)){?>
                        <tr>
                          <td class="text-center"><?php echo ucwords($a['equipment_name']) ?> </td>
                          <td class="text-center"><?php echo ucfirst($a['description']) ?> </td>
                          <td class="text-center">

                            <?php
                              if($a['commodity'] == 0){
                                echo "any commodity";
                              }
                              else{
                                $commodity = explode(",",$a['commodity']);
                                foreach($commodity as $commodity){
                                  $comm = "SELECT * FROM commodity WHERE id = '$commodity'";
                                  $qry_1 = $conn->query($comm) or trigger_error(mysqli_error($conn." ".$comm));
                                  while($b = mysqli_fetch_assoc($qry_1)){
                                    echo $b['commodity_name'] == ''? 'Any commodities' : ucwords($b['commodity_name']).", ";
                                  }
                                }
                              }
                                
                            ?>
                          </td>
                          <td class="text-center"><?php echo $a['capacity']." ".$a['unit'] ?> </td>

                          <td class="text-center">
                            <?php 
                            date_default_timezone_set("Asia/Manila");
                              $eqp_id = $a['id'];

                                $date_sched = "SELECT date_sched from equipment_maintenance WHERE equipment_id = '$eqp_id'";
                                $qrqr = $conn->query($date_sched) or trigger_error(mysqli_error($conn)." ".$date_sched);
                                $z = mysqli_fetch_assoc($qrqr);
                                    if($z['date_sched'] == date("Y-m-d")){
                                      $id = $a['id'];
                                        $update = "UPDATE equipment SET status = 3, availability = 1 WHERE id ='$id'";
                                        $qry_1 = $conn->query($update) or trigger_error(mysqli_error($conn)." ".$update);
                                    }
                                    if($a['status'] == 2){
                                        echo "<span class='badge badge-danger p-2'>Non Operational</span>"; 
                                    } 
                                    else if($a['status'] == 1){
                                        $stats = "<a href='javascript:void(0)' id='".$a['id']."'>";
                                        $stats .="<span class='badge badge-success p-2'>Operational</span>"; 
                                        $stats .= "</a>";
                                        echo $stats;
                                    }
                                    else if($a['status'] == 3){?>
                                      <a href="javascript:void(0)" data-toggle="modal" data-target="#m<?php echo $a['id'] ?>" title="Set Equipment to Operational">
                                        <span class='badge badge-warning'>Under Maintenance</span>
                                      </a>
                              <?php    }
                            ?> 
                          </td>
                        <?php include('operational_modal.php'); ?>
                          <td class="text-center">                  
                              <a href="javascript:void(0)" id="<?php echo $a['id'] ?>" class="edit_equipment mr-2" Title = "Edit">
                               <i class="fas fa-edit ml-2"></i>
                             </a>
                             <a href="javascript:void(0)" title="View Maintenance Schedule" data-toggle="modal" data-target="#c<?php echo $a['id'] ?>">
                               <i class="fas fa-info mr-2 text-success"></i>
                             </a>
                             <?php
                                if($a['status'] == 3){
                                    echo "";
                                }
                                else{?>
                             <a href="javascript:void(0)" id="<?php echo $a['id'] ?>" class="maintenance" Title = "Set Maintenance">
                              <i class="fas fa-exclamation-triangle text-warning"></i>
                             </a>
                              <?php }
                             ?>

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
<?php include('equipment_add_modal.php');?>
<?php include('equipment_edit_modal.php');?>
<?php include('equipment_maintenance_modal.php');?>
<?php include('area_view_modal.php');?>
<?php include('area_edit_modal.php');?>
<?php include('footer.php'); ?>