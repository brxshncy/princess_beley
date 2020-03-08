<?php 
session_start();
$title = "Equipment Request";
$main_sidebar = "Equipment";
$sidebar = "Equipment Status";
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
                  <th class="text-center">Date Borrowed</th>
                  <th class="text-center">Expected Date to Return</th>
                  <th class="text-center">Date Returned</th>
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                      require('controller/db.php');
                      $equipment = "SELECT re.date_return as return_date,t.id as t_id,t.date_return as date_return,t.date_borrowed as date_borrowed,b.specific_area as specific_area,t.reason as reason, e.equipment_name as equipment, b.benefeciaries as benefeciaries from transaction t LEFT JOIN  equipment e ON t.eqp_id = e.id LEFT JOIN benefeciaries b ON b.id = t.bfcry_id left join return_equipment re ON re.transaction_id = t.id WHERE t.state = 1";
                      $qry = $conn->query($equipment) or trigger_error(mysqli_error($conn)." ".$equipment);
                      while($a = mysqli_fetch_assoc($qry)){?>
                        <tr>
                          <td class="text-center"><?php echo ucwords($a['equipment']) ?> </td>
                          <td class="text-center"><?php echo ucfirst($a['benefeciaries']) ?> </td>
                          <td class="text-center">
                            <?php
                                echo date("D F j, Y",strtotime($a['date_borrowed']));
                            ?>
                          </td>
                          <td class="text-center">
                            <?php
                                echo date("D F j, Y",strtotime($a['date_return']));
                            ?>
                          </td>
                          <td class="text-center">
                              <?php
                                  if($a['return_date'] == ''){
                                    echo "Not yet returned";

                                  }
                                  else{
                                    echo date("D F j, Y",strtotime($a['return_date']));
                                  }
                              ?>  
                          </td>
                          <td class="text-center"> 
                              <?php
                                  if($a['return_date'] == ''){?>
                              <a href="javascript:void(0)" class="text-center" id="<?php echo $a['t_id'] ?>" data-toggle="modal" data-target="#m<?php echo $a['t_id']; ?>">
                                <i class="fas fa-people-carry text-success"></i>
                             </a>

                              <?php } 
                              else
                               { 
                                  $t_id = $a['t_id'];
                                  $harvest = "SELECT *,ee.id as ee_id FROM post_harvest ph left join transaction tt on tt.id = ph.transac_id left join equipment ee on ee.id = tt.eqp_id  WHERE transac_id = '$t_id'";
                                  $qrqr = $conn->query($harvest) or trigger_error(mysqli_error($conn)." ".$harvest);
                                  $oo = mysqli_fetch_assoc($qrqr);
                                  $e_id = $oo['ee_id'];
                                  if(mysqli_num_rows($qrqr) > 0){
                                    $up = "UPDATE equipment SET availability = 0 WHERE id ='$e_id'";
                                    $qryy = $conn->query($up) or trigger_error(mysqli_error($conn)." ".$up);
                                    if($qryy){
                                      echo "Harvest Recorded";
                                    }
                                    else{
                                      echo "error";
                                    }
                                  }
                                  else{?>
                                     <a href="javascript:void(0)" class="text-center harvest" id="<?php echo $a['t_id'] ?>" title="Post Harvest Accumlation">
                                        <i class="fas fa-desktop text-info"></i>
                                    </a>
                                <?php  }
                               ?>
                           
                             <?php }
                              ?>                 
      <div class="modal fade" id="m<?php echo $a['t_id']; ?>">
        <div class="modal-dialog">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <h4 class="modal-title">Confirm Action</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="controller/return_eqp.php" method="post">
            <div class="modal-body">
             <div class="row">
              <div class="col">
                <p>Is the equipment <b><u><?php echo ucwords($a['equipment']) ?></u></b> return on <b><u><?php echo date("D F j, Y") ?></u></b>.</p>
                <input type="hidden" value="<?php echo $a['t_id']; ?>" name="t_id">
              </div>
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" name="confirm" class="btn btn-outline-light">Confirm</button>
            </div>
          </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
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
<?php include('equipment_harvest_modal.php');?>
<?php include('footer.php'); ?>