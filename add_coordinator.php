<?php 
session_start();
$title = "District Coordinators";
$main_sidebar = "District Coordinators";
$sidebar = "District Coordinators";
$header_content = "District Coordinators";
$header = "District Coordinators";
include('header.php');
 ?>
<?php include('sidebar.php'); ?>	
<?php include('content_header.php'); ?>
<section class="content">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col col-md-10">
    </div>
    <div class="col text-right col-md-2">
       <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#district_add_modal">
               <i class="fas fa-plus-circle mr-1"></i> Add District Coordinators
        </button>
    </div>
</div>
<?php if(isset($_SESSION['suc'])): ?>
  <div class="row mb-2 justify-content-center">
    <div class="col">
      <div class="bg-success disabled color-palette p-1">
        <p class="text-center">
          <?php
              echo $_SESSION['suc'];
              unset($_SESSION['suc']);
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
              <h3 class="card-title">Inspected Area Records</h3>
            </div>
        <div class="card-body">
         <table id="area_inspected_table" class="table table-bordered table-hover table table-striped projects">
                <thead>
                <tr>
                  <th class="text-center">Name</th>
                  <th class="text-center">Contact</th>
                  <th class="text-center">Address</th>
                  <th class="text-center">Age</th>
                  <th class="text-center">Area Assigned</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    require('controller/db.php');
                    $dc = "SELECT *, a.area_address as area_address,d.id as d_id FROM district_coordinator d LEFT JOIN area_inspected a ON d.area_id = a.id ORDER BY d.id DESC";
                    $qry = $conn->query($dc) or trigger_error(mysqli_error($conn)." ".$dc);
                    while($row = mysqli_fetch_assoc($qry)){?>
                    <tr>
                      <td class="text-center"><?php echo ucwords($row['fname']." ".$row['lname']); ?></td>
                      <td class="text-center"><?php echo $row['contact']   ?></td>
                      <td class="text-center"><?php echo ucwords($row['address']); ?></td>
                      <?php
                        $age = date("Y") - date("Y",strtotime($row['bday']));
                      ?>
                      <td class="text-center"><?php echo $age; ?></td>
                      <td class="text-center"><?php echo ucwords($row['area_address']); ?></td>
                      <td class="text-center">
                        <?php
                            if($row['status'] == 0){
                              echo "<span class='badge badge-success'>Active</span>";
                            }
                            else if($row['status'] == 1){
                              echo "<span class='badge badge-danger'>Inactive</span>";
                            }
                        ?>
                      </td>
                      <td class="text-center">
                        <button type="button" id="<?php echo $row['d_id'] ?>" class="btn btn-warning dc_edit">Edit</button>
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
<?php include('dc_add_modal.php'); ?>
<?php include('dc_edit_modal.php'); ?>
<?php include('footer.php'); ?>