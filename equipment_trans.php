<?php 
session_start();
if(isset($_SESSION['id'])){ ?>
<?php 
$title = "District Coordinator Dashboard";
$sidebar = "Equipments";
$main_s = "Equipments";
include('header.php');
 ?>
<?php include('dc_sidebar.php'); ?>	
<?php 
$header_content = "Equipments";
$header = "Equipments";
include('content_header.php');
?>

	<section class="content">
	  <div class="container-fluid">
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
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Equipments</h3>
            </div>
        <div class="card-body">
         <table id="area_inspected_table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="text-center">No.</th>
                  <th class="text-center">Equipment Name</th>
                  <th class="text-center">Commodities</th>
                  <th class="text-center">Function/Description</th>
                  <th class="text-center">status</th>
                  <th class="text-center">Availabality</th>
                  <th class="text-center">Action</th>
                </tr>
                </thead>  
                <tbody>
                    <?php 
                      require('controller/db.php');
                      $id = $_SESSION['id'];  
                      $bene = "SELECT * FROM equipment ORDER BY id DESC";
                      $qry = $conn->query($bene) or trigger_error(mysqli_error($conn)." ".$bene);
                      $counter = 0;
                      while($row = mysqli_fetch_assoc($qry)){ $counter++;?>
                        <tr>
                          <td class="text-center"><?php  echo $counter; ?></td>
                          <td class="text-center"><?php  echo $row['equipment_name']; ?></td>
                          <td class="text-center">
                              <?php
                                if($row['commodity'] == 0){
                                  echo "any commodity";
                                }else{
                                $comms = explode(",",$row['commodity']);
                                foreach($comms as $comm){
                                  $equipment = "SELECT * FROM commodity WHERE id ='$comm'";
                                  $qry_1 = $conn->query($equipment) or trigger_error(mysqli_error($conn)." ".$equipment);
                                  $a = mysqli_fetch_assoc($qry_1);
                                    echo $a['commodity_name'].",";
                                } }
                              ?>
                          </td>
                          <td class="text-center">
                              <?php
                                 echo $row['description'];
                              ?>
                          </td>
                          <td class="text-center">
                            <?php 
                            date_default_timezone_set("Asia/Manila");
                                    if($row['status'] == 2){
                                        echo "<span class='badge badge-warning p-2'>Non Operational</span>"; 
                                    } 
                                    else if($row['status'] == 1){
                                      $stats = "<a href='javascript:void(0)' id='".$row['id']."'>";
                                          $stats .="<span class='badge badge-success p-2'>Operational</span>"; 
                                          $stats .= "</a>";
                                        echo $stats;
                                    }
                                    else if($row['status'] == 3){
                                        echo "<span class='badge badge-warning'>Under Maintenance</span>";
                                    }
                            ?> 
                          </td>
                          <td class="text-center">
                                <?php
                                    if($row['availability'] == 0){
                                      echo "<i class='fas fa-check text-success'></i>"; 
                                    }
                                    else if($row['availability'] == 1){
                                      echo "<i class='fas fa-times text-danger'></i>"; 
                                    }
                                ?>
                          </td>
                          <td class="text-center">
                              <?php
                                if($row['availability'] == 0 && $row['status'] == 1){ ?>
                                   <a href="javascript:void(0)" id="<?php echo $row['id'] ?>" class="req" title="Send Request">
                                      <i class="fas fa-envelope text-success"></i>
                                  </a>
                               <?php } else if($row['availability'] == 1 || $row['status'] == 2 || $row['status'] == 3) { ?>
                                 <a href="javascript:void(0)" id="<?php echo $row['id'] ?>" class="req" title="Book Request">
                                      <i class="fas fa-book text-info"></i>
                                  </a>
                               <?php } ?>
                          </td>
                        </tr>
                     <?php }
                    ?>
                </tbody>
         </table>
        </div>
    </div>
</div>
</div>
</div>
</section>
<?php include('trans_add.php'); ?>

<?php include('footer.php'); ?>


<?php }  else {
	$_SESSION['err'] = "You need to log in as District Coordinator first";
	header("location:index.php");
}
?>

