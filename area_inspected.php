<?php 
session_start();
$title = "Inspected Area Info";
$main_sidebar = "Inspect Area";
$sidebar = "Inspect Area";
$header_content = "Inspected Area Info";
$header = "City of Agriculture Inspected Area Informations";
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
       <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#modal-xl">
               <i class="fas fa-plus-circle mr-1"></i> Add Area Inspection
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
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Inspected Area Records</h3>
            </div>
        <div class="card-body">
         <table id="area_inspected_table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="text-center">Barangay</th>
                  <th class="text-center">Full Address</th>
                  <th class="text-center">Commodities</th>
                  <th class="text-center">Soil type</th>
                  <th class="text-center">Area Platform</th>
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  require('controller/db.php');
                  $area = "SELECT *, b.baranggay_name as barangay, a.id as a_id FROM area_inspected a LEFT JOIN barangay b ON b.id = a.barangay_area ORDER BY a.id DESC";
                  $qry = $conn->query($area) or trigger_error(mysqli_error($conn)." ".$area);
                  while($a = mysqli_fetch_assoc($qry)){?>
                   <tr>
                      <td class="text-center"><?php echo $a['barangay'] ?></td>
                      <td class="text-center"><?php echo ucwords($a['area_address']); ?></td>
                      <td class="text-center">
                        <?php 
                            $com = explode(",",$a['commodity']);
                            foreach($com as $com){
                              $go =  "SELECT * FROM commodity where id = '$com'";
                              $qry_1 = $conn->query($go);
                              $b = mysqli_fetch_assoc($qry_1);
                                echo $b['commodity_name']." ";
                            } 
                        ?>
                        </td>
                      <td class="text-center"><?php echo $a['soil_type'] ?></td>
                      <td class="text-center"><?php echo $a['area_platform'] ?></td>
                      <td class="text-center">
                        <button class="btn btn-success view_area"  id="<?php echo $a['a_id'] ?>">View</button>
                        <button class="btn btn-warning edit_area"  id="<?php echo $a['a_id'] ?>">Edit</button>
                      </td>
                   </tr>
                 <?php  }
                ?>
                </tbody>
         </table>
        </div>
    </div>
</div>
</div>
</div>
</section>
<?php include('add_area_modal.php');?>
<?php include('area_view_modal.php');?>
<?php include('area_edit_modal.php');?>
<?php include('footer.php'); ?>