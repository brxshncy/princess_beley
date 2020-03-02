<?php 
session_start();
$title = "Commodity";
$main_sidebar = "Commodity";
$sidebar = "Commodity";
$header_content = "Commodities";
$header = "City of Agriculture Equipment Inventory";
include('header.php');
 ?>
<?php include('staff_sidebar.php'); ?>	
<?php include('content_header.php'); ?>
<section class="content">
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col col-md-8">
    </div>
    <div class="col text-right col-md-2">
       <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#cmodal">
               <i class="fas fa-plus-circle mr-1"></i> Add New
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
<div class="row justify-content-center">
    <div class="col col-md-8">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Inspected Area Records</h3>
            </div>
        <div class="card-body">
         <table id="area_inspected_table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="text-center">No.</th>
                  <th class="text-center">Commodity</th>
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                      require('controller/db.php');
                      $equipment = "SELECT * from commodity";
                      $qry = $conn->query($equipment) or trigger_error(mysqli_error($conn)." ".$equipment);
                      $code = 0;
                      while($a = mysqli_fetch_assoc($qry)){ $code++;?>
                        <tr>
                          <td class="text-center"><?php echo $code ?></td>
                          <td class="text-center"><?php echo ucwords($a['commodity_name']) ?> </td>
                          <td class="text-center">
                            <button type="button" class="btn btn-info l" id="<?php echo $a['id'] ?>">Edit</button>
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
<?php include('commodity_add.php'); ?>
<?php include('commodity_edit.php'); ?>
<?php include('footer.php'); ?>